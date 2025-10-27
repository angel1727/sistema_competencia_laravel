{{-- @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

<div class="row g-3">
    <div class="col-12">
        <!-- Lista de requisitos -->
        <div class="requirements-list">
            <h3>Los siguientes documentos en formato (.pdf):</h3>
            <p><strong>Nota:</strong> Por favor, asegúrese de nombrar cada archivo según su contenido. Ejemplo.: NIT.pdf, SIGEP.pdf, CV.pdf, etc.</p>
            <ul>
                <li data-doc="nit">
                    <strong>1. Número de Identificación Tributaria NIT </strong>-
                    <i class="filename">Ej. El nombre de archivo: NIT.pdf (máx. 2MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 2MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="sigep">
                    <strong>2. Registro SIGEP</strong> -
                    <i class="filename">Ej. El nombre de archivo: SIGEP.pdf (máx. 2 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 2MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="matricula">
                    <strong>3. Matrícula de comercio (para empresas)</strong> -
                    <i class="filename">Ej. El nombre de archivo: Matricula Comercio.pdf (máx. 2 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 2MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="seguro-salud">
                    <strong>4. Nro de seguro salud - Empresa afiliadora</strong> -
                    <i class="filename">Ej. El nombre de archivo: Seguro Salud.pdf (máx. 2 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 2MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="seguro-riesgo">
                    <strong>5. Seguro riesgo contra accidentes</strong> -
                    <i class="filename">Ej. El nombre de archivo: Seguro Riesgos.pdf (máx. 2 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 2MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="curriculum-vitae">
                    <strong>6. Curriculum vitae</strong> -
                    <i class="filename">Ej. El nombre de archivo: CV.pdf (máx. 5 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 5MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="capacitacion-formacion">
                    <strong>7. Capacitación y Formación</strong> -
                    <i class="filename">Ej. El nombre de archivo: Capacitacion.pdf (máx. 5 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 5MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>

                <li data-doc="experiencia-tecnica">
                    <strong>8. Experiencia Técnica</strong> -
                    <i class="filename">Ej. El nombre de archivo: Experiencia Tecnica.pdf (máx. 5 MB)</i>
                    <span class="info-icon">
                        <ion-icon name="help-circle-outline"   ></ion-icon>
                        <div class="tooltip-text   ">
                            El documento debe pesar máximo 5MB y debe estar en formato .pdf
                        </div>
                    </span>
                </li>
            </ul>
        </div>

        <div class="text-center mt-4">
            @php
                $id_postulante = Session::get('id_postulante');
                $habilitado = !empty($id_postulante);
                $claseBoton = $habilitado ? 'btn btn-success' : 'btn btn-secondary disabled';
            @endphp

            @if($habilitado)
                <!-- Botón habilitado -->
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeT5LAtNlKPnAP42h4Y1pLlIXo5xRDpiGkdw0nPBrCj_34xIQ/viewform?usp=dialog"
                    target="_blank"
                    class="{{ $claseBoton }}"
                    id="btnDocumentos"
                    onclick="manejarClicFormulario(event)">
                    <ion-icon name="cloud-upload-outline" class="icon-upload"></ion-icon>
                    Llenar el Formulario con la Documentación Requerida
                </a>
            @else
                <!-- Botón deshabilitado -->
                <span class="{{ $claseBoton }}"
                    id="btnDocumentos"
                    onclick="mostrarAlertaDocumentos()">
                    <ion-icon name="cloud-upload-outline" class="icon-upload"></ion-icon>
                    Completar formularios anteriores primero
                </span>

                <p class="text-muted mt-2">Debe completar los formularios anteriores para habilitar esta opción</p>
            @endif
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    // Función para mostrar alerta cuando el botón está deshabilitado
    function mostrarAlertaDocumentos() {
        Swal.fire({
            icon: 'warning',
            title: 'Formularios pendientes',
            html: 'Para adjuntar documentos, primero debe completar los siguientes formularios:<br><br>' +
                '• <strong>Datos Personales</strong><br>' +
                '• <strong>Formación Académica</strong><br>' +
                '• <strong>Experiencia Laboral</strong><br>' +
                '• <strong>Capacitaciones</strong><br>' +
                '• <strong>Experiencia Técnica</strong>',
            confirmButtonText: 'Entendido',
            confirmButtonColor: '#f3a100',
            background: '#ffffff'
        });
    }

    // Función principal que maneja el clic en el botón habilitado
    function manejarClicFormulario(event) {
        // Prevenir que el enlace se abra inmediatamente
        event.preventDefault();

        const enlaceFormulario = event.currentTarget.href;

        // Mostrar confirmación
        Swal.fire({
            icon: 'info',
            title: 'Importante!',
            html: 'Al continuar, se abrirá el formulario solo una vez para cargar la documentación y se cerrará la sesión actual.<br><br>' +
                '<strong>Nota:</strong> Si completa el formulario, su postulación será exitosa.',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#198754',
            cancelButtonColor: '#dc3545',
            background: '#ffffff'
        }).then((result) => {
            if (result.isConfirmed) {
                // Cerrar la sesión primero
                cerrarSesionYAbrirFormulario(enlaceFormulario);
            }
        });
    }

    // Función para cerrar sesión y luego abrir el formulario
    function cerrarSesionYAbrirFormulario(enlaceFormulario) {
        // Mostrar mensaje de espera
        Swal.fire({
            title: 'Procesando...',
            text: 'Cerrando sesión y preparando formulario',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Cerrar la sesión via AJAX usando la ruta de Laravel
        fetch('{{ route("adjuntardocumentos.cerrarsesion") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.cerrado) {
                // Cerrar el SweetAlert de carga
                Swal.close();

                // Abrir el formulario de Google en nueva pestaña
                window.open(enlaceFormulario, '_blank');

                // Mostrar mensaje final
                Swal.fire({
                    icon: 'success',
                    title: '¡Formulario listo!',
                    html: 'El formulario se ha abierto en una nueva pestaña.<br><br>' +
                        '<strong>Recuerde:</strong> Si completa el formulario, su postulación será exitosa.<br>' +
                        'La postulación se ha cerrado. Ya no puedes llenar los formularios nuevamente.',
                    confirmButtonText: 'Entendido',
                    confirmButtonColor: '#198754',
                    background: '#ffffff'
                }).then(() => {
                    // Recargar la página para actualizar el estado del botón
                    window.location.reload();
                });
            }
        })
        .catch(error => {
            console.error('Error al cerrar sesión:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud',
                confirmButtonText: 'Entendido',
                confirmButtonColor: '#dc3545'
            });
        });
    }

    // Aplicar estilos cuando el documento esté cargado
    document.addEventListener('DOMContentLoaded', function() {
        const btnDocumentos = document.getElementById('btnDocumentos');

        // Si el botón está deshabilitado, aplicar estilos adicionales
        if (btnDocumentos && btnDocumentos.classList.contains('disabled')) {
            btnDocumentos.style.pointerEvents = 'auto';
            btnDocumentos.style.cursor = 'not-allowed';
        }

        // Tooltips para los íconos de información
        const infoIcons = document.querySelectorAll('.info-icon');
        infoIcons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                const tooltip = this.querySelector('.tooltip-text');
                if (tooltip) {
                    tooltip.style.display = 'block';
                }
            });
            
            icon.addEventListener('mouseleave', function() {
                const tooltip = this.querySelector('.tooltip-text');
                if (tooltip) {
                    tooltip.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection