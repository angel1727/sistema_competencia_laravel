@extends('adminlte::page')

@section('title', 'Postulantes')

@section('content_header')
    <h1>Postulantes</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row g-4">
                    <!-- Panel lateral de acciones -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-warning text-white fw-bold text-center">
                                Panel de Control
                            </div>
                            <div class="card-body text-center">
                                <button class="btn btn-success w-100 mb-2" data-toggle="modal" data-target="#postulanteModal">
                                    <i class="fas fa-user-plus me-1"></i> Agregar
                                </button>
                                <button id="btnEditar" class="btn btn-warning w-100 mb-2" disabled>
                                    <i class="fas fa-edit me-1"></i> Editar
                                </button>
                                <button id="btnEliminar" class="btn btn-danger w-100" disabled>
                                    <i class="fas fa-trash me-1"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Sección principal de tarjetas -->
                    <div class="col-md-8">
                        <div class="card-body" style="max-height: 80vh; overflow-y: auto;">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-secondary text-white fw-bold text-center">
                                    Lista de Postulantes
                                </div>
                                <div class="card-body">
                                    <!-- Buscador -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                                        <input type="text" id="buscadorPostulante" class="form-control"
                                            placeholder="Buscar por nombre, ciudad o rol">
                                    </div>

                                    <!-- Tarjetas de postulantes -->
                                    <form id="formPostulantes" method="post">
                                        <input type="hidden" name="accion" value="eliminar_multiple">
                                        <div class="row" id="postulantesList">
                                            <div class="col-12 col-sm-6 col-lg-6 mb-4">
                                                <div
                                                    class="card h-100 shadow-lg border-0 rounded-4 card-selectable position-relative">

                                                    <!-- Checkbox -->
                                                    <div class="form-check top-0 end-0 m-2">
                                                        <input class="form-check-input seleccionPostulante" type="checkbox"
                                                            name="ids[]" value="">
                                                    </div>

                                                    <!-- Cuerpo con scroll -->
                                                    <div class="card-body p-3" style="max-height: 300px; overflow-y: auto;">
                                                        <h5 class="card-title text-primary fw-bold">
                                                            <i class="fas fa-user-circle me-1"></i>
                                                            Carlos Angel Cari Callisaya
                                                        </h5>
                                                        <br>
                                                        <p class="mb-1"><i
                                                                class="fas fa-file-alt me-1 text-muted"></i><strong>CI:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-map-marker-alt me-1 text-muted"></i><strong>Ciudad:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-home me-1 text-muted"></i><strong>Dirección:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-envelope me-1 text-muted"></i><strong>Email:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-mobile-alt me-1 text-muted"></i><strong>Móvil:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-phone me-1 text-muted"></i><strong>Fijo:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-money-bill me-1 text-muted"></i><strong>NIT:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-building me-1 text-muted"></i><strong>Registro
                                                                SIGEP:</strong></p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-briefcase me-1 text-muted"></i><strong>Matrícula:</strong>
                                                        </p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-heartbeat me-1 text-muted"></i><strong>Seguro
                                                                Salud:</strong></p>
                                                        <p class="mb-1"><i
                                                                class="fas fa-shield-alt me-1 text-muted"></i><strong>Riesgo:</strong>
                                                        </p>
                                                        <p class="mb-3"><i
                                                                class="fas fa-calendar-check me-1 text-muted"></i><strong>Registrado:</strong>
                                                        </p>

                                                        <!-- Botón PDF -->
                                                        <a href="" target="_blank"
                                                            class="btn btn-outline-danger btn-sm w-100 mt-2">
                                                            <i class="fas fa-file-pdf me-1"></i> Descargar PDF
                                                        </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12 text-center">
                                                <p>No hay postulantes registrados.</p>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Agregar Postulante y Relacionados -->
            @include('admin.postulantes.create')
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        /* Barra de pestañas con scroll horizontal */
        .nav-tabs {
            overflow-x: auto;
            overflow-y: hidden;
            flex-wrap: nowrap;
            /* evita que bajen de línea */
            -webkit-overflow-scrolling: touch;
            /* scroll suave en móviles */
            border-bottom: 2px solid #ddd;
        }

        /* Centrar el texto dentro de cada pestaña */
        .nav-tabs .nav-link {
            text-align: center;
            white-space: nowrap;
            /* evita que el texto se corte en varias líneas */
            padding: 0.75rem 1.25rem;
            /* más espacio para que se vea estético */
            color: #495057;
            /* gris oscuro por defecto */
            transition: all 0.3s ease;
        }

        /* Hover (cuando pasas el mouse) */
        .nav-tabs .nav-link:hover {
            color: #28a745;
            /* verde al pasar el mouse */
        }

        /* Activo (cuando está seleccionada la pestaña) */
        .nav-tabs .nav-link.active {
            color: #fff !important;
            background-color: #28a745 !important;
            border-color: #28a745 #28a745 #fff;
            /* verde arriba, blanco abajo */
            border-radius: 6px 6px 0 0;
            /* bordes redondeados arriba */
            font-weight: 600;
        }

        /* Ajuste del modal con scroll interno */
        .modal-dialog {
            max-height: 90vh;
            /* Altura máxima del modal */
            display: flex;
            flex-direction: column;
        }

        .modal-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .modal-body {
            overflow-y: auto;
            /* Scroll solo en el body */
            max-height: calc(90vh - 120px);
            /* resta header y footer */
            padding: 1rem;
        }

        .modal-footer {
            position: sticky;
            bottom: 0;
            background: #fff;
            /* Fondo blanco para que no se pierda */
            border-top: 1px solid #dee2e6;
            z-index: 100;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
    <script>
        const cards = document.querySelectorAll('.card-selectable');
        const btnEditar = document.getElementById('btnEditar');
        const btnEliminar = document.getElementById('btnEliminar');

        let selectedCard = null;

        cards.forEach(card => {
            card.addEventListener('click', () => {
                // Remover selección anterior
                cards.forEach(c => c.classList.remove('border-primary', 'border-3'));

                // Marcar nueva selección
                card.classList.add('border-primary', 'border-3');
                selectedCard = card;

                // Activar botones
                btnEditar.disabled = false;
                btnEliminar.disabled = false;
            });
        });

        btnEditar.addEventListener('click', () => {
            if (selectedCard) {
                const data = JSON.parse(selectedCard.dataset.postulante);
                const modal = new bootstrap.Modal(document.getElementById('modalAgregar'));
                // Aquí puedes cargar datos al modal, ejemplo:
                document.querySelector('#modalAgregar input[name="nombre"]').value = data.nombre;
                // ...
                modal.show();
            }
        });

        btnEliminar.addEventListener('click', () => {
            if (selectedCard) {
                const id = selectedCard.dataset.id;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción eliminará el postulante.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'post';
                        form.innerHTML = `
            <input type="hidden" name="accion" value="eliminar">
            <input type="hidden" name="id" value="${id}">`;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        });
    </script>
    <!-- =================== SCRIPTS (clonar + debug) =================== -->
    <script>
        // DEBUG: ver si el form existe y si el submit se dispara
        document.addEventListener('DOMContentLoaded', function() {
            const f = document.getElementById('postulanteForm');
            if (!f) {
                console.warn(
                    'postulanteForm NO encontrado en DOM (verifica que reemplazaste todas las ocurrencias duplicadas).'
                );
                return;
            }
            f.addEventListener('submit', function(e) {
                console.log('postulanteForm -> submit fired (si llegas aquí, el submit se ejecuta).');
                // no hacemos e.preventDefault aquí: dejamos que el form se envíe al backend
            });
        });
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de educación --}}
    <script>
        function agregarEducacion() {
            const container = document.getElementById('educacionContainer');
            const bloques = container.getElementsByClassName('educacion-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name educacion[0][campo] -> educacion[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/educacion\[\d+\]/, `educacion[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Educacion agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarEducacion(btn) {
            const block = btn.closest('.educacion-block');
            const container = document.getElementById('educacionContainer');
            const total = container.getElementsByClassName('educacion-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de educación?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexEducacion();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexEducacion();
            }
        }

        function reindexEducacion() {
            const container = document.getElementById('educacionContainer');
            const bloques = container.getElementsByClassName('educacion-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/educacion\[\d+\]\[(.+)\]/, `educacion[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `educacion[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de capacitacion y formacion --}}
    <script>
        function agregarCapacitacion() {
            const container = document.getElementById('capacitacionContainer');
            const bloques = container.getElementsByClassName('capacitacion-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name capacitacionInf[0][campo] -> capacitacionInf[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/capacitacionInf\[\d+\]/, `capacitacionInf[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Capacitacion y Formacion agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarCapacitacion(btn) {
            const block = btn.closest('.capacitacion-block');
            const container = document.getElementById('capacitacionContainer');
            const total = container.getElementsByClassName('capacitacion-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de Capacitacion y Formacion.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de Capacitacion y Formacion?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexCapacitacion();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexCapacitacion();
            }
        }

        function reindexCapacitacion() {
            const container = document.getElementById('capacitacionContainer');
            const bloques = container.getElementsByClassName('capacitacion-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/capacitacionInf\[\d+\]\[(.+)\]/,
                        `capacitacionInf[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `capacitacionInf[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de Idiomas --}}
    <script>
        function agregarIdiomas() {
            const container = document.getElementById('idiomasContainer');
            const bloques = container.getElementsByClassName('idiomas-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name Idiomas[0][campo] -> Idiomas[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/Idiomas\[\d+\]/, `Idiomas[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Idiomas agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarIdiomas(btn) {
            const block = btn.closest('.idiomas-block');
            const container = document.getElementById('idiomasContainer');
            const total = container.getElementsByClassName('idiomas-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de idiomas.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de Idiomas?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexIdiomas();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexIdiomas();
            }
        }

        function reindexIdiomas() {
            const container = document.getElementById('idiomasContainer');
            const bloques = container.getElementsByClassName('idiomas-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/Idiomas\[\d+\]\[(.+)\]/, `Idiomas[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `Idiomas[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de conocimientos TIC --}}
    <script>
        function agregarConocimientoTIC() {
            const container = document.getElementById('conocimientosTICContainer');
            const bloques = container.getElementsByClassName('conocimientosTIC-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name ConocimientosTIC[0][campo] -> ConocimientosTIC[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/ConocimientosTIC\[\d+\]/, `ConocimientosTIC[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de conocimiento en uso de TIC agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarConocimientoTIC(btn) {
            const block = btn.closest('.conocimientosTIC-block');
            const container = document.getElementById('conocimientosTICContainer');
            const total = container.getElementsByClassName('conocimientosTIC-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de conocimiento en uso de TIC.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de conocimiento en uso de TIC?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexConocimientoTIC();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexConocimientoTIC();
            }
        }

        function reindexConocimientoTIC() {
            const container = document.getElementById('conocimientosTICContainer');
            const bloques = container.getElementsByClassName('conocimientosTIC-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/ConocimientosTIC\[\d+\]\[(.+)\]/,
                        `ConocimientosTIC[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `ConocimientosTIC[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de Experiencia Laboral --}}
    <script>
        function agregarExperienciaLab() {
            const container = document.getElementById('experienciaLabContainer');
            const bloques = container.getElementsByClassName('experienciaLab-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name experienciaLab[0][campo] -> experienciaLab[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/experienciaLab\[\d+\]/, `experienciaLab[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Experiencia Laboral agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarExperienciaLab(btn) {
            const block = btn.closest('.experienciaLab-block');
            const container = document.getElementById('experienciaLabContainer');
            const total = container.getElementsByClassName('experienciaLab-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de Experiencia Laboral.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de Experiencia Laboral?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexExperienciaLab();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexExperienciaLab();
            }
        }

        function reindexExperienciaLab() {
            const container = document.getElementById('experienciaLabContainer');
            const bloques = container.getElementsByClassName('experienciaLab-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/experienciaLab\[\d+\]\[(.+)\]/,
                        `experienciaLab[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `experienciaLab[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de Experiencia en Evaluaciones y/o Auditorias --}}
    <script>
        function agregarEvaluacion() {
            const container = document.getElementById('evaluacionContainer');
            const bloques = container.getElementsByClassName('evaluacion-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name evaluacion[0][campo] -> evaluacion[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/evaluacion\[\d+\]/, `evaluacion[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Experiencia en Evaluaciones y/o Auditorias agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarEvaluacion(btn) {
            const block = btn.closest('.evaluacion-block');
            const container = document.getElementById('evaluacionContainer');
            const total = container.getElementsByClassName('evaluacion-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de Experiencia en Evaluaciones y/o Auditorias.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de Experiencia en Evaluaciones y/o Auditorias?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexEvaluacion();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexEvaluacion();
            }
        }

        function reindexEvaluacion() {
            const container = document.getElementById('evaluacionContainer');
            const bloques = container.getElementsByClassName('evaluacion-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/evaluacion\[\d+\]\[(.+)\]/, `evaluacion[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `evaluacion[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de Experiencia en implementacion/consultoria/docencia/facilitador --}}
    <script>
        function agregarExperienciaImpl() {
            const container = document.getElementById('experienciaImplementacionContainer');
            const bloques = container.getElementsByClassName('experienciaImplementacion-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name experienciaImplementacion[0][campo] -> experienciaImplementacion[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/experienciaImplementacion\[\d+\]/,
                    `experienciaImplementacion[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de Experiencia en implementacion/consultoria/docencia/facilitador agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarExperienciaImpl(btn) {
            const block = btn.closest('.experienciaImplementacion-block');
            const container = document.getElementById('experienciaImplementacionContainer');
            const total = container.getElementsByClassName('experienciaImplementacion-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de Experiencia en implementacion/consultoria/docencia/facilitador.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de Experiencia en implementacion/consultoria/docencia/facilitador?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexExperienciaImpl();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexExperienciaImpl();
            }
        }

        function reindexExperienciaImpl() {
            const container = document.getElementById('experienciaImplementacionContainer');
            const bloques = container.getElementsByClassName('experienciaImplementacion-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/experienciaImplementacion\[\d+\]\[(.+)\]/,
                        `experienciaImplementacion[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos tipo nivelacademico[]), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `experienciaImplementacion[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- esquemas --}}
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17025 Lab. de Ensayo --}}
    <script>
        function agregarEnsayo() {
            const container = document.getElementById('ensayoContainer');
            const bloques = container.getElementsByClassName('ensayo-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name ensayo[0][campo] -> ensayo[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/ensayo\[\d+\]/, `ensayo[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17025 Lab. de Ensayo agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarEnsayo(btn) {
            const block = btn.closest('.ensayo-block');
            const container = document.getElementById('ensayoContainer');
            const total = container.getElementsByClassName('ensayo-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17025 Lab. de Ensayo.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17025 Lab. de Ensayo?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexEnsayo();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexEnsayo();
            }
        }

        function reindexEnsayo() {
            const container = document.getElementById('ensayoContainer');
            const bloques = container.getElementsByClassName('ensayo-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/ensayo\[\d+\]\[(.+)\]/, `ensayo[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `ensayo[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17025 Lab. de Calibracion --}}
    <script>
        function agregarCalibracion() {
            const container = document.getElementById('calibracionContainer');
            const bloques = container.getElementsByClassName('calibracion-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name calibracion[0][campo] -> calibracion[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/calibracion\[\d+\]/, `calibracion[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17025 Lab. de Calibracion agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarCalibracion(btn) {
            const block = btn.closest('.calibracion-block');
            const container = document.getElementById('calibracionContainer');
            const total = container.getElementsByClassName('calibracion-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17025 Lab. de Calibracion.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17025 Lab. de Calibracion?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexCalibracion();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexCalibracion();
            }
        }

        function reindexCalibracion() {
            const container = document.getElementById('calibracionContainer');
            const bloques = container.getElementsByClassName('calibracion-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/calibracion\[\d+\]\[(.+)\]/, `calibracion[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `calibracion[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 15189 Lab. clinicos --}}
    <script>
        function agregarClinico() {
            const container = document.getElementById('clinicoContainer');
            const bloques = container.getElementsByClassName('clinico-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name clinico[0][campo] -> clinico[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/clinico\[\d+\]/, `clinico[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 15189 Lab. clinicos agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarClinico(btn) {
            const block = btn.closest('.clinico-block');
            const container = document.getElementById('clinicoContainer');
            const total = container.getElementsByClassName('clinico-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 15189 Lab. clinicos.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 15189 Lab. clinicos?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexClinico();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexClinico();
            }
        }

        function reindexClinico() {
            const container = document.getElementById('clinicoContainer');
            const bloques = container.getElementsByClassName('clinico-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/clinico\[\d+\]\[(.+)\]/, `clinico[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `clinico[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17043 Experto Tecnico Estadistico --}}
    <script>
        function agregarETE() {
            const container = document.getElementById('ETEContainer');
            const bloques = container.getElementsByClassName('ETE-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name ETE[0][campo] -> ETE[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/ETE\[\d+\]/, `ETE[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17043 Experto Tecnico Estadistico agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarETE(btn) {
            const block = btn.closest('.ETE-block');
            const container = document.getElementById('ETEContainer');
            const total = container.getElementsByClassName('ETE-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17043 Experto Tecnico Estadistico.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17043 Experto Tecnico Estadistico?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexETE();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexETE();
            }
        }

        function reindexETE() {
            const container = document.getElementById('ETEContainer');
            const bloques = container.getElementsByClassName('ETE-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/ETE\[\d+\]\[(.+)\]/, `ETE[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `ETE[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17043 Experto Tecnico --}}
    <script>
        function agregarET() {
            const container = document.getElementById('ETContainer');
            const bloques = container.getElementsByClassName('ET-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name ET[0][campo] -> ET[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/ET\[\d+\]/, `ET[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17043 Experto Tecnico agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarET(btn) {
            const block = btn.closest('.ET-block');
            const container = document.getElementById('ETContainer');
            const total = container.getElementsByClassName('ET-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17043 Experto Tecnico.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17043 Experto Tecnico?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexET();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexET();
            }
        }

        function reindexET() {
            const container = document.getElementById('ETContainer');
            const bloques = container.getElementsByClassName('ET-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/ET\[\d+\]\[(.+)\]/, `ET[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `ET[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17020 Organismo de Inspeccion --}}
    <script>
        function agregarOI() {
            const container = document.getElementById('OIContainer');
            const bloques = container.getElementsByClassName('OI-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name ET[0][campo] -> ET[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/OI\[\d+\]/, `OI[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17020 Organismo de Inspeccion agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarOI(btn) {
            const block = btn.closest('.OI-block');
            const container = document.getElementById('OIContainer');
            const total = container.getElementsByClassName('OI-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17020 Organismo de Inspeccion.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17020 Organismo de Inspeccion?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexOI();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexOI();
            }
        }

        function reindexOI() {
            const container = document.getElementById('OIContainer');
            const bloques = container.getElementsByClassName('OI-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/OI\[\d+\]\[(.+)\]/, `OI[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `OI[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17065 Organismo de Certificacion de Productos --}}
    <script>
        function agregarOCP() {
            const container = document.getElementById('OCPContainer');
            const bloques = container.getElementsByClassName('OCP-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name OCP[0][campo] -> OCP[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/OCP\[\d+\]/, `OCP[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17065 Organismo de Certificacion de Productos agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarOCP(btn) {
            const block = btn.closest('.OCP-block');
            const container = document.getElementById('OCPContainer');
            const total = container.getElementsByClassName('OCP-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17065 Organismo de Certificacion de Productos.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17065 Organismo de Certificacion de Productos?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexOCP();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexOCP();
            }
        }

        function reindexOCP() {
            const container = document.getElementById('OCPContainer');
            const bloques = container.getElementsByClassName('OCP-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/OCP\[\d+\]\[(.+)\]/, `OCP[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `OCP[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de Gestion --}}
    <script>
        function agregarOCSG() {
            const container = document.getElementById('OCSGContainer');
            const bloques = container.getElementsByClassName('OCSG-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name OCP[0][campo] -> OCP[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/OCSG\[\d+\]/, `OCSG[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de Gestion agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarOCSG(btn) {
            const block = btn.closest('.OCSG-block');
            const container = document.getElementById('OCSGContainer');
            const total = container.getElementsByClassName('OCSG-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de Gestion .'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de Gestion?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexOCSG();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexOCSG();
            }
        }

        function reindexOCSG() {
            const container = document.getElementById('OCSGContainer');
            const bloques = container.getElementsByClassName('OCSG-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/OCSG\[\d+\]\[(.+)\]/, `OCSG[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `OCSG[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17024 Certificacion de Personas --}}
    <script>
        function agregarCP() {
            const container = document.getElementById('CPContainer');
            const bloques = container.getElementsByClassName('CP-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name CP[0][campo] -> CP[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/CP\[\d+\]/, `CP[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17024 Certificacion de Personas agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarCP(btn) {
            const block = btn.closest('.CP-block');
            const container = document.getElementById('CPContainer');
            const total = container.getElementsByClassName('CP-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17024 Certificacion de Personas.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17024 Certificacion de Personas?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexCP();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexCP();
            }
        }

        function reindexCP() {
            const container = document.getElementById('CPContainer');
            const bloques = container.getElementsByClassName('CP-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/CP\[\d+\]\[(.+)\]/, `CP[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `CP[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
    {{-- Funciones para clonar / eliminar / reindexar bloques de ISO/IEC 17034 Proveedor de Materiales de Referencia --}}
    <script>
        function agregarPMR() {
            const container = document.getElementById('PMRContainer');
            const bloques = container.getElementsByClassName('PMR-block');
            const original = bloques[0];
            const clon = original.cloneNode(true);
            const index = bloques.length;
            clon.setAttribute('data-index', index);
            clon.querySelectorAll('input, select, textarea').forEach(input => {
                // limpiar valor
                if (input.type !== 'hidden') input.value = '';
                // actualizar name PMR[0][campo] -> PMR[index][campo]
                const name = input.getAttribute('name') || '';
                input.setAttribute('name', name.replace(/PMR\[\d+\]/, `PMR[${index}]`));
            });
            container.appendChild(clon);
            if (window.Swal) Swal.fire({
                icon: 'success',
                title: 'Bloque de ISO/IEC 17034 Proveedor de Materiales de Referencia agregado',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function eliminarPMR(btn) {
            const block = btn.closest('.PMR-block');
            const container = document.getElementById('PMRContainer');
            const total = container.getElementsByClassName('PMR-block').length;
            if (total <= 1) {
                if (window.Swal) return Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Debe haber al menos un bloque de ISO/IEC 17034 Proveedor de Materiales de Referencia.'
                });
                return;
            }
            if (window.Swal) {
                Swal.fire({
                    title: '¿Eliminar este bloque de ISO/IEC 17034 Proveedor de Materiales de Referencia?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) {
                        block.remove();
                        reindexPMR();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 900,
                            showConfirmButton: false
                        });
                    }
                });
            } else {
                block.remove();
                reindexPMR();
            }
        }

        function reindexPMR() {
            const container = document.getElementById('PMRContainer');
            const bloques = container.getElementsByClassName('PMR-block');
            Array.from(bloques).forEach((b, i) => {
                b.setAttribute('data-index', i);
                b.querySelectorAll('input, select, textarea').forEach(input => {
                    const name = input.getAttribute('name') || '';
                    const newName = name.replace(/PMR\[\d+\]\[(.+)\]/, `PMR[${i}][$1]`);
                    // si no coincide la regex (posible nombres antiguos), intenta normalizar:
                    if (newName === name && /\w+\[\]$/.test(name)) {
                        const field = name.replace(/\[\]$/, '');
                        input.setAttribute('name', `PMR[${i}][${field}]`);
                    } else {
                        input.setAttribute('name', newName);
                    }
                });
            });
        }
    </script>
@stop
