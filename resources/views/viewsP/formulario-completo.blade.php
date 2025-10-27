@extends('layouts.app')

@section('content')
<!-- sección del formulario -->
<section id="hoja-de-vida" class="formulario">
    <div class="container mt-5">
        <hr style="border: none; height: 5px; background-color: #fea100; margin: 20px 0;">
        <h2 id="titulo-tabs" class="mb-4 text-center"> DTA-FOR-086 Evaluadores y Expertos Técnicos</h2>
        <div class="col-md-12">
            <p>Regístrate y postula en este portal, donde podrás subir tus documentos. Si cuentas con formación sólida,
            experiencia comprobada y compromiso con la mejora continua, esta es tu oportunidad para contribuir al desarrollo del
            país y crecer profesionalmente.</p>
        </div>
        
        <!-- Envoltura SOLO para las pestañas -->
        <div class="tabs-wrapper position-relative">
            <button class="scroll-btn scroll-left" onclick="scrollTabs(-200)">
                <ion-icon name="chevron-back-circle-outline" size="large"></ion-icon>
            </button>
            <div class="tabs-container">
                <ul class="nav nav-tabs mb-3 flex-nowrap" id="myTab" role="tablist" style="white-space: nowrap;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personales-tab" data-bs-toggle="tab" data-bs-target="#personales" type="button" role="tab">1. Datos Personales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="formacion-tab" data-bs-toggle="tab" data-bs-target="#formacion" type="button" role="tab">2. Educación y Formación</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="experiencia-tab" data-bs-toggle="tab" data-bs-target="#experiencia" type="button" role="tab">3. Experiencia</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab">4. Capacitación y Formación</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="exp_tecnica-tab" data-bs-toggle="tab" data-bs-target="#exp_tecnica" type="button" role="tab">5. Experiencia Técnica</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="adj_documentos-tab" data-bs-toggle="tab" data-bs-target="#adj_documentos" type="button" role="tab">6. Adjuntar documentos</button>
                    </li>
                </ul>
            </div>
            <button class="scroll-btn scroll-right" onclick="scrollTabs(200)">
                <ion-icon name="chevron-forward-circle-outline" size="large"></ion-icon>
            </button>
        </div>

        <div class="tab-content" id="myTabContent">
            <!-- Pestaña 1: Datos Personales -->
            <div class="tab-pane fade show active" id="personales" role="tabpanel">
                @include('postulante.postulante')
            </div>
            
            <!-- Pestaña 2: Educación -->
            <div class="tab-pane fade" id="formacion" role="tabpanel">
                @include('educacion.educacion')
            </div>
            
            <!-- Pestaña 3: Experiencia -->
            <div class="tab-pane fade" id="experiencia" role="tabpanel">
                @include('experiencia.experiencia')
            </div>
            
            <!-- Pestaña 4: Capacitación -->
            <div class="tab-pane fade" id="capacitacion" role="tabpanel">
                @include('capacitacion.capacitacion')
            </div>
            
            <!-- Pestaña 5: Experiencia Técnica -->
            <div class="tab-pane fade" id="exp_tecnica" role="tabpanel">
                 @include('exptecnica.exptecnica')
            </div>
            
            <!-- Pestaña 6: Documentos -->
            <div class="tab-pane fade" id="adj_documentos" role="tabpanel">
                @include('adjuntardocumentos.adjuntardocumentos')
            </div>

        </div>
    </div>
</section>
@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para hacer scroll suave al contenedor de pestañas
        const scrollToTabs = () => {
            const tabsElement = document.getElementById('myTab');
            if (!tabsElement) return;

            // Ajusta 70 según el tamaño de tu header fijo si tienes uno
            const y = tabsElement.getBoundingClientRect().top + window.pageYOffset - 220;
            window.scrollTo({ top: y, behavior: 'smooth' });
        };
        
        // Mensaje de Éxito
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f3a100',
                background: '#ffffff',
                allowOutsideClick: false
            }).then(() => {
                setTimeout(() => {
                    scrollToTabs();
                }, 300);
            });
        @endif

        //  el mensaje de error general 
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#f3a100',
                background: '#ffffff',
                allowOutsideClick: false
            }).then(() => {
                setTimeout(() => {
                    scrollToTabs();
                }, 300);
            });
        @endif

        // Errores de validación
        // @if($errors->any())
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Error',
        //         html: `@foreach ($errors->all() as $error)
        //             <p>{{ $error }}</p>
        //         @endforeach`,
        //         confirmButtonColor: '#f3a100',
        //         background: '#ffffff',
        //         allowOutsideClick: false
        //     }).then(() => {
        //         setTimeout(() => {
        //             scrollToTabs();
        //         }, 300);
        //     });
        // @endif
        // ⚠️ Errores de validación (campos requeridos, formatos, etc.)
        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'Error',
                html: `{!! implode('', $errors->all('<p>:message</p>')) !!}`,
                confirmButtonColor: '#f3a100',
                background: '#ffffff',
                allowOutsideClick: false
            }).then(() => {
                setTimeout(() => {
                    scrollToTabs();
                }, 300);
            });
        @endif

        // Activar tab desde el parámetro ?tab=
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');

        if (tabParam) {
            const tabElement = document.getElementById(tabParam + '-tab');
            if (tabElement) {
                const tab = new bootstrap.Tab(tabElement);
                tab.show();

                // Después de mostrar el tab, hacemos scroll al contenedor de tabs
                /*setTimeout(() => {
                    scrollToTabs();
                }, 300); // 300ms para que el tab se muestre antes del scroll*/
            }
        }
    });
</script>
@endsection



