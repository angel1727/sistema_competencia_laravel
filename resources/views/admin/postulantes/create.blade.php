<div class="modal fade" id="postulanteModal" tabindex="-1" aria-labelledby="postulanteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <form id="postulanteForm" method="post" action="{{ route('admin.postulantes.store') }}">
                @csrf
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAgregarLabel"><i class="fas fa-user-plus me-2"></i>Registrar
                        Postulante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs mb-3" id="tabsPostulante" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-datos" data-toggle="tab" data-target="#datos"
                                type="button">Datos Personales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-educacion" data-toggle="tab" data-target="#educacion"
                                type="button">Educación</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-exp" data-toggle="tab" data-target="#capacitacionInf"
                                type="button">Capacitacion y Formacion</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-exp" data-toggle="tab" data-target="#Idiomas"
                                type="button">Idiomas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-exp" data-toggle="tab" data-target="#ConocimientosTIC"
                                type="button">Conocimientos en uso de TIC</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-exp" data-toggle="tab" data-target="#InformacionLab"
                                type="button">Informacion
                                Laboral</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-esquemas" data-toggle="tab" data-target="#experienciaLab"
                                type="button">Experiencia Laboral</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-esquemas" data-toggle="tab" data-target="#evaluacion"
                                type="button">Experiencia en
                                Evaluaciones</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-exp" data-toggle="tab"
                                data-target="#experienciaImplementacion" type="button">Experiencia en
                                Implementacion/Consultoria/Docencia/Facilitador</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-esquemas" data-toggle="tab" data-target="#esquemas"
                                type="button">Experiencia Tecnica por
                                Esquema</button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content border rounded-3 p-3">
                        <!-- 📌 Datos Personales -->
                        <div class="tab-pane fade show active" id="datos" role="tabpanel">
                            <h5 class="text-secondary">Datos Personales</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Apellido:</label>
                                    <input type="text" name="apellido" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">CI:</label>
                                    <input type="text" name="ci" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ciudad:</label>
                                    <input type="text" name="ciudad" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Dirección:</label>
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email:</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Celular:</label>
                                    <input type="text" name="celular" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Teléfono:</label>
                                    <input type="text" name="telefono" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">NIT:</label>
                                    <input type="text" name="nit" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">SIGEP:</label>
                                    <input type="text" name="sigep" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Matricula de Comercio:</label>
                                    <input type="text" name="matricula" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Seguro de Salud:</label>
                                    <input type="text" name="seguro" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Seguro de Riesgos:</label>
                                    <input type="text" name="sriesgos" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- 📌 Educación -->
                        <div class="tab-pane fade" id="educacion" role="tabpanel">
                            <h5 class="text-secondary">Educación</h5>
                            <div id="educacionContainer">
                                <div class="educacion-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarEducacion(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nivel Académico:</label>
                                            <input type="text" name="nivelacademico[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Grado Obtenido:</label>
                                            <input type="text" name="gradoacademico[]" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Centro Educativo/Universidad/Instituto:</label>
                                            <input type="text" name="centroeducativo[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fecha de Título:</label>
                                            <input type="date" name="fechatitulo[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más educacion -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarEducacion()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otra Educacion
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Capacitacion y Formacion -->
                        <div class="tab-pane fade" id="capacitacionInf" role="tabpanel">
                            <h5 class="text-secondary">Capacitación y Formación</h5>
                            <div id="capacitacionContainer">
                                <div class="capacitacion-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarCapacitacion(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Esquemas:</label>
                                            <select class="form-select" name="iso_norma[]">
                                                <option value="">-- Selecciona --</option>
                                                <option value="ISO/IEC 17025">ISO/IEC 17025 Lab. de Ensayo</option>
                                                <option value="ISO/IEC 17025">ISO/IEC 17025 Lab. de Calibracion
                                                </option>
                                                <option value="ISO/IEC 15189">ISO/IEC 15189 Lab. Clinicos</option>
                                                <option value="ISO/IEC 17020">ISO/IEC 17020 Org. de Inspeccion</option>
                                                <option value="ISO/IEC 17043">ISO/IEC 17043 Prov. de Ensayos de Aptiud
                                                </option>
                                                <option value="ISO/IEC 17024">ISO/IEC 17024 Org. de Certificacion de
                                                    Personas</option>
                                                <option value="ISO/IEC 17021">ISO/IEC 17021-1 Org. de Certificacion de
                                                    Sistemas de Gestion</option>
                                                <option value="ISO/IEC 17024">ISO/IEC 17024 Org. de Certificacion de
                                                    Certificacion de Productos</option>
                                                <option value="ISO/IEC 17034">ISO/IEC 17034 Prov. de Materiales de
                                                    Referencia</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tipo de Formacion:</label>
                                            <input type="text" name="iso_detalle[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tema:</label>
                                            <input type="text" name="iso_institucion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Organismo que Brindo la Capacitacion:</label>
                                            <input type="text" name="iso_ciudad[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fecha:</label>
                                            <input type="date" name="iso_fecha[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Duración (horas):</label>
                                            <input type="number" name="iso_duracion[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más ISO -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarCapacitacion()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque Capacitacion y Formacion
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Idiomas -->
                        <div class="tab-pane fade" id="Idiomas" role="tabpanel">
                            <h5 class="text-secondary">Idiomas</h5>
                            <div id="idiomasContainer">
                                <div class="idiomas-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarIdiomas(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Idiomas:</label>
                                            <input type="text" name="idiomas[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Nivel Escrito:</label>
                                            <select class="form-select" name="nivel_escrito[]">
                                                <option value="">-- Selecciona --</option>
                                                <option value="basico">Basico</option>
                                                <option value="intermedio">Intermedio</option>
                                                <option value="avanzado">Avanzado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Nivel Oral:</label>
                                            <select class="form-select" name="nivel_oral[]">
                                                <option value="">-- Selecciona --</option>
                                                <option value="basico">Basico</option>
                                                <option value="intermedio">Intermedio</option>
                                                <option value="avanzado">Avanzado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nombre del curso o certificacion:</label>
                                            <input type="text" name="nombre_curso[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Entidad emisora del Curso o la
                                                certificacion:</label>
                                            <input type="text" name="entidad_emisora[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Fecha de Emision:</label>
                                            <input type="date" name="fecha_emision[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más Idiomas -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarIdiomas()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro Idioma
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Conocimiento en uso de tecnologia de la informacion y comunicacion -->
                        <div class="tab-pane fade" id="ConocimientosTIC" role="tabpanel">
                            <h5 class="text-secondary">Conocimiento en uso de tecnologia de la informacion y comunicacion</h5>
                            <div id="conocimientosTICContainer">
                                <div class="conocimientosTIC-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarConocimientoTIC(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Herramienta/Tecnologica:</label>
                                            <input type="text" name="herramienta_tecnologica[]"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Nivel de Conocimiento:</label>
                                            <select class="form-select" name="nivel_conocimiento[]">
                                                <option value="">-- Selecciona --</option>
                                                <option value="basico">Basico</option>
                                                <option value="intermedio">Intermedio</option>
                                                <option value="avanzado">Avanzado</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Frecuencia de Uso:</label>
                                            <input type="text" name="frecuencia_uso[]" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Nombre de la Capacitacion y Entidad
                                                Emisora:</label>
                                            <input type="text" name="nombre_entidad_capacitacion[]"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">¿Cuenta con Certificacion:</label>
                                            <input type="text" name="certificacion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fecha:</label>
                                            <input type="date" name="fecha_tic[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más conocimiento TIC -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarConocimientoTIC()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de Conocimiento en uso de TIC
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Informacion Laboral -->
                        <div class="tab-pane fade" id="InformacionLab" role="tabpanel">
                            <h5 class="text-secondary">Conocimiento en uso de tecnologia de la informacion y comunicacion</h5>
                            <div class="row g-3">
                                <h5 class="text-secondary">Informacion donde Trabaja Actualmente</h5>
                                <br>
                                <div class="col-md-12">
                                    <label class="form-label">Nombre de la Empresa:</label>
                                    <input type="text" name="nomempresa" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Direccion:</label>
                                    <input type="text" name="direccionL" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Departamento:</label>
                                    <input type="text" name="departamento" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Telefono:</label>
                                    <input type="text" name="telefono" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Correo:</label>
                                    <input type="text" name="correo" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cargo:</label>
                                    <input type="text" name="cargo" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tiempo de Permanencia:</label>
                                    <input type="text" name="tiempopermanencia" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Persona Referencia:</label>
                                    <input type="text" name="personareferencia" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Telefono de la Persona de Referencia:</label>
                                    <input type="text" name="telefonoreferencia" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Descripcion de las Actividades, Responsabilidades,
                                        Funciones Asignada:</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                                        placeholder="Escribe una descripción..."></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- 📌 Experiencia Laboral -->
                        <div class="tab-pane fade" id="experienciaLab" role="tabpanel">
                            <div id="experienciaLabContainer">
                                <div class="experienciaLab-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarExperienciaLab(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Empresa/Institución:</label>
                                            <input type="text" name="empresa[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tipo de Organización (Pública, Privada u
                                                otra):</label>
                                            <input type="text" name="tipoOrganizacion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Cargo Desempeñado:</label>
                                            <input type="text" name="cargo[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Descripción de las Actividades:</label>
                                            <input type="text" name="descripccion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Desde:</label>
                                            <input type="date" name="desde[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Hasta:</label>
                                            <input type="date" name="hasta[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Duración (meses):</label>
                                            <input type="number" name="duracion[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más ISO -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarExperienciaLab()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de Experiencia Laboral
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Experiencia en Evaluaciones y/o auditorias de 1ra, 2da y 3ra parte  -->
                        <div class="tab-pane fade" id="evaluacion" role="tabpanel">
                            <div id="evaluacionContainer">
                                <div class="evaluacion-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarEvaluacion(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Evaluacion y/o Auditoria:</label>
                                            <select class="form-select" name="evaluacion[]">
                                                <option value="">-- Selecciona --</option>
                                                <option value="ISO/IEC 17025">1ra Parte</option>
                                                <option value="ISO/IEC 17025">2da Parte</option>
                                                <option value="ISO/IEC 15189">3ra Parte</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Organización Contratante del Servicio:</label>
                                            <input type="text" name="organizaciont[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Organización Evaluada o Auditada:</label>
                                            <input type="text" name="orevaluada[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tipo de Organización:</label>
                                            <input type="text" name="tipo[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Rol Designado:</label>
                                            <input type="text" name="roldesignado[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Norma Aplicada:</label>
                                            <input type="text" name="normaaplicada[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fecha:</label>
                                            <input type="date" name="fechaevaluacion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Duración (horas):</label>
                                            <input type="number" name="duracionhoras[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más ISO -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarEvaluacion()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de Experiencia en Evaluaciones y/o Auditorias
                                </button>
                            </div>
                        </div>
                        <!-- 📌 Experiencia en implementacion/consultoria/docencia/facilitador -->
                        <div class="tab-pane fade" id="experienciaImplementacion" role="tabpanel">
                            <div id="experienciaImplementacionContainer">
                                <div class="experienciaImplementacion-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-danger btn-sm top-0 end-0 m-2"
                                        onclick="eliminarExperienciaImpl(this)"> <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Organicacion Contratante de Servicio:</label>
                                            <input type="text" name="organizacioni[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Organicacion Beneficiada:</label>
                                            <input type="text" name="orgbeneficiada[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Funcion:</label>
                                            <input type="text" name="funcion[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fecha:</label>
                                            <input type="date" name="fecha[]" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Duración (horas):</label>
                                            <input type="number" name="duracionhoras[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más ISO -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-success" onclick="agregarExperienciaImpl()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de Experiencia en Implementacion/Consultoria/Docencia/Facilitador
                                </button>
                            </div>
                        </div>
                        <!-- 📌 esquemas ISO -->
                        <div class="tab-pane fade" id="esquemas" role="tabpanel">
                            <h5 class="text-secondary">ISO/IEC 17025 Lab. de Ensayo</h5>
                            <div id="ensayoContainer">
                                <div class="ensayo-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarEnsayo(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Ensayo:</label>
                                            <input type="text" name="ensayo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Técnica:</label>
                                            <input type="text" name="tecnica[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma/Documento:</label>
                                            <input type="text" name="itemensato[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item de Ensayo / Matriz:</label>
                                            <input type="text" name="itemensayo[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarEnsayo()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17025 Lab. de Ensayo
                                </button>
                            </div>

                            <!-- ISO 17025 calibracion -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17025 Lab. de Calibracion</h5>
                            <div id="calibracionContainer">
                                <div class="calibracion-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarCalibracion(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Magnitud:</label>
                                            <input type="text" name="ensayo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item Bajo Calibracion:</label>
                                            <input type="text" name="tecnica[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma/Documento:</label>
                                            <input type="text" name="itemensato[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary"
                                    onclick="agregarCalibracion()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17025 Lab. de Calibracion.
                                </button>
                            </div>

                            <!-- script de añadir esquema 15189 clinicos -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 15189 Lab. clinicos</h5>
                            <div id="clinicoContainer">
                                <div class="clinico-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarClinico(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Area/Campo:</label>
                                            <input type="text" name="area[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Analisi/Ensayo/Examen:</label>
                                            <input type="text" name="analisis[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tecnica:</label>
                                            <input type="text" name="tecnica[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Muestra / Matriz:</label>
                                            <input type="text" name="muestra[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarClinico()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 15189 Lab. clinicos
                                </button>
                            </div>
                            <!-- script de añadir esquema 17043 experto tecnico estadistico -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17043 Experto Tecnico Estadistico</h5>
                            <div id="ETEContainer">
                                <div class="ETE-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarETE(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Nombre del EA o CIL en el que Participo:</label>
                                            <input type="text" name="nombre[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Empresa u Organizacion que lo Contrato para el
                                                Trartamiento de Datos:</label>
                                            <input type="text" name="empresa[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Software utilizado para el Tratamiento de
                                                Datos:</label>
                                            <input type="text" name="software[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Normas Aplicadas para el Tratamientos de
                                                Datos:</label>
                                            <input type="text" name="normas[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tiempo de Desarrollo de EA o CIL (Meses):</label>
                                            <input type="number" name="tiempod[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarETE()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17043 Experto Tecnico Estadistico
                                </button>
                            </div>
                            <!-- script de añadir esquema 17043 experto tecnico -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17043 Experto Tecnico</h5>
                            <div id="ETContainer">
                                <div class="ET-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarET(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Ensayo/Magnitud:</label>
                                            <input type="text" name="ensayo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Técnica:</label>
                                            <input type="text" name="tecnica[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma/Documento:</label>
                                            <input type="text" name="itemensato[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item de Ensayo/Matriz/Item Bajo
                                                Calibracion:</label>
                                            <input type="text" name="itemensayo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarET()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17043 Experto Tecnico
                                </button>
                            </div>
                            <!-- script de añadir esquema 17020  -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17020 Organismo de Inspeccion</h5>
                            <div id="OIContainer">
                                <div class="OI-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarOI(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Campo o Sector de Inspeccion:</label>
                                            <input type="text" name="campo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Sub-Sector:</label>
                                            <input type="text" name="sector[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item Inspeccionado:</label>
                                            <input type="text" name="iteminspeccion[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Metodo o Documento normativo para la
                                                Inspeccion:</label>
                                            <input type="text" name="matodo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarOI()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17020 Organismo de Inspeccion
                                </button>
                            </div>
                            <!-- script de añadir esquema 17065  -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17065 Organismo de Certificacion de Productos</h5>
                            <div id="OCPContainer">
                                <div class="OCP-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarOCP(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Tipo de Certificacion</label>
                                            <input type="text" name="tipocert[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Producto/Proceso/Servicio:</label>
                                            <input type="text" name="producto[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Documento Normativo:</label>
                                            <input type="text" name="documentos[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Division NACE:</label>
                                            <input type="text" name="division[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Codigo CPA:</label>
                                            <input type="text" name="codigo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarOCP()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17065 Organismo de Certificacion de Productos
                                </button>
                            </div>
                            <!-- script de añadir esquema 17021-1  -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de
                                Gestion</h5>
                            <div id="OCSGContainer">
                                <div class="OCSG-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarOCSG(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Sistemas de Gestion:</label>
                                            <input type="text" name="sisges[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma:</label>
                                            <input type="text" name="norma[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Codigo IAF-Sector:</label>
                                            <input type="text" name="codigo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Nombre del Sector:</label>
                                            <input type="text" name="sector[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarOCSG()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17021-1 Organismo de Certificacion de Sistemas de
                                Gestion
                                </button>
                            </div>
                            <!-- script de añadir esquema 17024  -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17024 Certificacion de Personas</h5>
                            <div id="CPContainer">
                                <div class="CP-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarCP(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Sector o Campo:</label>
                                            <input type="text" name="secto[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Actividad Espesifica:</label>
                                            <input type="text" name="actividad[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item/Matriz:</label>
                                            <input type="text" name="item[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Normas/Documentos Utilizados para realizar la
                                                Evaluacion:</label>
                                            <input type="text" name="tiempoexp[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar otro ensayo -->
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-primary" onclick="agregarCP()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otro bloque de ISO/IEC 17024 Certificacion de Personas
                                </button>
                            </div>
                            <!-- script de añadir esquema 17034  -->
                            <hr class="mt-4 mb-3">
                            <h5 class="text-secondary">ISO/IEC 17034 Proveedor de Materiales de Referencia</h5>
                            <div id="PMRContainer">
                                <div class="PMR-block border p-3 rounded mb-3 position-relative">
                                    <!-- Botón eliminar este bloque -->
                                    <button type="button"
                                        class="btn btn-danger btn-sm  top-0 end-0 m-2"
                                        onclick="eliminarPMR(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Ensayo:</label>
                                            <input type="text" name="ensayo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Técnica:</label>
                                            <input type="text" name="tecnica[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma/Documento:</label>
                                            <input type="text" name="documento[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Item de Ensayo / Matriz:</label>
                                            <input type="text" name="item[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Norma Aplicada para la Preparacion de los
                                                Items:</label>
                                            <input type="text" name="norma[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Años de Experiencia:</label>
                                            <input type="number" name="tiempoexp[]" class="form-control"
                                                min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para agregar más experiencias -->
                            <div class="text-end mb-3">
                                <button type="button" class="btn btn-outline-primary"
                                    onclick="agregarPMR()">
                                    <i class="fas fa-plus-circle me-1"></i> Agregar otra bloque de ISO/IEC 17034 Proveedor de Materiales de Referencia
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="modal-footer">
                        <button type="submit" name="accion" value="agregar_completo" class="btn btn-success">
                            <i class="bi bi-save me-1"></i> Guardar todo
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
