<?php
/**
 * Procesador simple de vistas Blade
 * Para desarrollo sin necesidad de todas las dependencias de Laravel
 */

class BladeProcessor {
    private $viewPath;
    private $variables = [];
    private $sections = [];
    
    public function __construct($basePath) {
        $this->viewPath = $basePath . '/resources/views';
    }
    
    public function render($uri) {
        switch ($uri) {
            case '/':
                return $this->renderLayout('main');
            
            case '/register':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    return $this->handleRegisterSubmit();
                }
                return $this->renderLayout('register');
            
            case '/profile':
                return $this->renderLayout('profile');
            
            default:
                http_response_code(404);
                return '<h1>404 - Página no encontrada</h1>';
        }
    }
    
    private function renderLayout($view) {
        $content = $this->loadAndProcessView($view);
        return $content;
    }
    
    private function loadAndProcessView($name) {
        $path = $this->viewPath . '/' . str_replace('.', '/', $name) . '.blade.php';
        
        if (!file_exists($path)) {
            return "<h1>Error: Vista $name no encontrada</h1>";
        }
        
        $content = file_get_contents($path);
        
        // Buscar @extends
        $layout = null;
        $mainContent = $content;
        
        if (preg_match('/@extends\([\'"]([^\'"]+)[\'"]\)/', $content, $matches)) {
            $layout = $matches[1];
            // Remover la directiva de extends
            $mainContent = preg_replace('/@extends\([\'"][^\'"]+[\'"]\)/', '', $content);
        }
        
        // Procesar @section / @endsection
        $this->sections = [];
        $mainContent = preg_replace_callback(
            '/@section\([\'"]([^\'"]+)[\'"]\)(.*?)@endsection/s',
            function($m) {
                $this->sections[$m[1]] = $m[2];
                return '';
            },
            $mainContent
        );
        
        // Si hay layout, cargar y renderizar con la sección de contenido
        if ($layout) {
            $layoutPath = $this->viewPath . '/' . str_replace('.', '/', $layout) . '.blade.php';
            if (file_exists($layoutPath)) {
                $layoutContent = file_get_contents($layoutPath);
                
                // Reemplazar @yield('content') con el contenido de la sección
                if (isset($this->sections['content'])) {
                    $layoutContent = str_replace("@yield('content')", $this->sections['content'], $layoutContent);
                } else {
                    $layoutContent = str_replace("@yield('content')", $mainContent, $layoutContent);
                }
                
                $mainContent = $layoutContent;
            }
        }
        
        // Procesar directivas de Blade
        $mainContent = $this->processBladeDirectives($mainContent);
        
        return $mainContent;
    }
    
    private function processBladeDirectives($content) {
        // Remover directivas no necesarias
        $content = str_replace('@csrf', '', $content);
        $content = preg_replace('/@extends\([\'"][^\'"]+[\'"]\)/', '', $content);
        $content = preg_replace('/@section\([\'"]content[\'"]\)/', '', $content);
        $content = preg_replace('/@endsection/', '', $content);
        
        // Procesar componentes <x-nombre />
        $content = $this->processComponents($content);
        
        // Procesar route() - primero dentro de {{ }}
        $content = preg_replace_callback("/\{\{\s*route\('([^']+)'\)\s*\}\}/", function($m) {
            $routes = [
                'register' => '/register',
                'register.store' => '/register',
                'profile' => '/profile',
                'profile.update.personal' => '/profile/personal',
                'profile.update.password' => '/profile/password',
                'profile.update.notifications' => '/profile/notifications',
            ];
            return isset($routes[$m[1]]) ? $routes[$m[1]] : '#';
        }, $content);
        
        // Procesar route() sin {{ }}
        $content = preg_replace_callback("/route\('([^']+)'\)/", function($m) {
            $routes = [
                'register' => '/register',
                'register.store' => '/register',
                'profile' => '/profile',
                'profile.update.personal' => '/profile/personal',
                'profile.update.password' => '/profile/password',
                'profile.update.notifications' => '/profile/notifications',
            ];
            return isset($routes[$m[1]]) ? $routes[$m[1]] : '#';
        }, $content);
        
        return $content;
    }
    
    private function processComponents($content) {
        // Procesar componentes <x-header />, <x-menu />, <x-footer />
        $content = preg_replace_callback('/<x-(\w+)\s*\/?>/i', function($m) {
            $componentName = strtolower($m[1]);
            $componentFile = $this->viewPath . '/components/' . $componentName . '.blade.php';
            
            if (file_exists($componentFile)) {
                $componentContent = file_get_contents($componentFile);
                // Procesar recursivamente por si el componente tiene directivas
                $componentContent = $this->processBladeDirectives($componentContent);
                return $componentContent;
            }
            
            return '';
        }, $content);
        
        return $content;
    }
    
    private function handleRegisterSubmit() {
        $errors = [];
        
        // Validar datos
        if (empty($_POST['name'])) $errors['name'] = 'El nombre es obligatorio';
        if (empty($_POST['surname'])) $errors['surname'] = 'Los apellidos son obligatorios';
        if (empty($_POST['email'])) $errors['email'] = 'El email es obligatorio';
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email inválido';
        if (empty($_POST['phone'])) $errors['phone'] = 'El teléfono es obligatorio';
        if (empty($_POST['address'])) $errors['address'] = 'La dirección es obligatoria';
        if (empty($_POST['city'])) $errors['city'] = 'La ciudad es obligatoria';
        if (empty($_POST['postal_code'])) $errors['postal_code'] = 'El código postal es obligatorio';
        if (empty($_POST['password'])) $errors['password'] = 'La contraseña es obligatoria';
        if (strlen($_POST['password']) < 8) $errors['password'] = 'Mínimo 8 caracteres';
        if ($_POST['password'] !== ($_POST['password_confirmation'] ?? '')) {
            $errors['password'] = 'Las contraseñas no coinciden';
        }
        if (empty($_POST['terms'])) $errors['terms'] = 'Debes aceptar los términos';
        
        if (empty($errors)) {
            // Éxito - guardar usuario (aquí iría la lógica de DB)
            return '<div style="padding: 20px; background: #dff0d8; border: 1px solid #d6e9f8; border-radius: 4px; margin: 20px;">
                        <h2>¡Éxito!</h2>
                        <p>Cuenta creada correctamente. <a href="/">Volver al inicio</a></p>
                    </div>' . $this->renderLayout('register');
        } else {
            // Errores - mostrar formulario con errores
            $errorHtml = '<div style="background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px; padding: 15px; margin-bottom: 20px;">';
            $errorHtml .= '<h4>Errores en el formulario:</h4><ul>';
            foreach ($errors as $error) {
                $errorHtml .= "<li>$error</li>";
            }
            $errorHtml .= '</ul></div>';
            
            return $errorHtml . $this->renderLayout('register');
        }
    }
}

function renderPage($uri) {
    $processor = new BladeProcessor(__DIR__ . '/..');
    echo $processor->render($uri);
}
