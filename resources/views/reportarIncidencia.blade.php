@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="pt-20 pb-20 min-h-screen">
    <div class="max-w-[1280px] mx-auto px-6">
        
        <div class="mb-8 pt-16 lg:pt-0">
            <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                Reportar Incidencia
            </h1>

            <p class="text-slate-600 dark:text-slate-400">
                Ayúdenos a mejorar nuestra ciudad. Su reporte será canalizado directamente al departamento correspondiente.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-[#1B365D] rounded-lg border border-[#1B365D] p-8 text-white shadow-sm">
                    <h2 class="text-xl font-bold mb-4">Reporte Ciudadano</h2>
                    <p class="text-sm text-blue-100 mb-6">
                        Su reporte será canalizado directamente al departamento correspondiente para su pronta resolución.
                    </p>
                    
                    <div class="space-y-5">
                        <div class="flex gap-3">
                            <span class="material-symbols-outlined text-blue-300">check_circle</span>
                            <div>
                                <p class="font-bold text-sm">Precisión</p>
                                <p class="text-xs text-blue-100 mt-1">Proporcione detalles específicos y una ubicación exacta.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <span class="material-symbols-outlined text-blue-300">photo_camera</span>
                            <div>
                                <p class="font-bold text-sm">Evidencia</p>
                                <p class="text-xs text-blue-100 mt-1">Una fotografía ayuda significativamente a evaluar la prioridad.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8 shadow-sm">
                    <h3 class="text-lg font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                        Canal de Soporte
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                        Si tiene problemas con el formulario, contacte al soporte técnico.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-slate-400">mail</span>
                        <a href="mailto:soporte@govconnect.es" class="text-sm font-bold text-slate-900 dark:text-white hover:underline">
                            soporte@govconnect.es
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8 shadow-sm">
                    
                    <h2 class="text-2xl font-bold text-[#1B365D] dark:text-blue-400 mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">edit_document</span>
                        Detalles de la Incidencia
                    </h2>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-sm" role="alert">
                            <div class="flex items-center">
                                <span class="material-symbols-outlined mr-2">check_circle</span>
                                <p class="font-bold">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('incidencias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="titulo" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Título de la incidencia <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="titulo" 
                                    name="titulo" 
                                    required 
                                    placeholder="Ej. Bache profundo en calle principal"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <div class="form-group">
                                <label for="categoria" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Categoría <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="categoria" 
                                    name="categoria" 
                                    required 
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                >
                                    <option value="" disabled selected>Seleccione una categoría</option>
                                    <option value="infraestructura">Infraestructura y Vías</option>
                                    <option value="limpieza">Limpieza y Residuos</option>
                                    <option value="iluminacion">Iluminación Pública</option>
                                    <option value="seguridad">Seguridad y Orden</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Descripción <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="descripcion" 
                                name="descripcion" 
                                rows="4" 
                                required 
                                placeholder="Describa los detalles del incidente para ayudarnos a entender mejor la situación..."
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            ></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div class="form-group flex flex-col">
                                <label for="ubicacion" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Ubicación <span class="text-red-500">*</span>   
                                </label>
                                <p class="text-xs text-slate-500 mb-2">Haz clic en el mapa para situar la incidencia.</p>
    
                                <div id="mapa" class="w-full h-48 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-300 dark:border-slate-600 z-0 relative mb-3"></div>
    
                                <input 
                                    type="text" 
                                    id="ubicacion" 
                                    name="ubicacion" 
                                    value="" 
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white" 
                                    readonly 
                                    required 
                                    placeholder="Buscando dirección..."
                                >
                            </div>

                            <div class="form-group flex flex-col">
                                <label for="fotografia" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Fotografía 
                                </label>
                                <div class="flex-1 border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors flex flex-col items-center justify-center relative cursor-pointer min-h-[200px] overflow-hidden">
                                    
                                    <input 
                                        type="file" 
                                        id="fotografia" 
                                        name="fotografia" 
                                        accept=".jpeg,.jpg,.png" 
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    />
                                    
                                    <div id="dropzone-text" class="flex flex-col items-center justify-center pointer-events-none">
                                        <span class="material-symbols-outlined text-4xl text-[#1B365D] dark:text-blue-400 mb-2">cloud_upload</span>
                                        <span class="text-sm font-bold text-[#1B365D] dark:text-blue-400">Subir archivo</span>
                                        <span class="text-xs text-slate-500 mt-1">Formatos: .jpeg, .jpg, .png</span>
                                    </div>

                                    <img id="preview-img" src="" alt="Vista previa" class="absolute inset-0 w-full h-full object-cover hidden pointer-events-none" />
                                    
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                            <button 
                                type="submit" 
                                class="flex-1 px-6 py-3 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all flex justify-center items-center gap-2"
                            >
                                <span class="material-symbols-outlined">send</span>
                                Enviar Reporte
                            </button>
                            <button 
                                type="reset" 
                                class="flex-1 px-6 py-3 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white font-bold rounded-lg hover:bg-slate-300 dark:hover:bg-slate-600 active:scale-95 transition-all"
                            >
                                Cancelar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('fotografia').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImg = document.getElementById('preview-img');
        const dropzoneText = document.getElementById('dropzone-text');

        if (file) {
            // Creamos una URL temporal para la imagen
            const objectUrl = URL.createObjectURL(file);
            
            // Le pasamos la URL a la etiqueta img y la mostramos
            previewImg.src = objectUrl;
            previewImg.classList.remove('hidden');
            
            // Ocultamos el texto y el icono de subir archivo
            dropzoneText.classList.add('hidden');
        } else {
            // Si el usuario cancela, volvemos a mostrar el texto original
            previewImg.src = '';
            previewImg.classList.add('hidden');
            dropzoneText.classList.remove('hidden');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Coordenadas de Granada
        const latInicial = 37.1773;
        const lngInicial = -3.5986;

        const map = L.map('mapa').setView([latInicial, lngInicial], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const marker = L.marker([latInicial, lngInicial], {draggable: true}).addTo(map);

        function actualizarInput(lat, lng) {
            // Ponemos un texto de carga mientras la API busca la calle
            document.getElementById('ubicacion').value = "Buscando dirección...";
            
            // Buscamos la calle real a partir de las coordenadas
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        // Si encuentra la calle, la muestra en el input visible
                        document.getElementById('ubicacion').value = data.display_name;
                    } else {
                        // Si hay error, pone las coordenadas para que no se quede vacío
                        document.getElementById('ubicacion').value = lat.toFixed(6) + ', ' + lng.toFixed(6);
                    }
                })
                .catch(error => {
                    console.error("Error al geocodificar:", error);
                    document.getElementById('ubicacion').value = lat.toFixed(6) + ', ' + lng.toFixed(6);
                });
        }

        actualizarInput(latInicial, lngInicial);

        marker.on('dragend', function() {
            const pos = marker.getLatLng();
            actualizarInput(pos.lat, pos.lng);
        });

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            actualizarInput(e.latlng.lat, e.latlng.lng);
        });
    });
</script>

@endsection