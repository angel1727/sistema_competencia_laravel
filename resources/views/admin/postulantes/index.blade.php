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
                                <button class="btn btn-success w-100 mb-2" data-toggle="modal" data-target="#modalAgregar">
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
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

@stop
