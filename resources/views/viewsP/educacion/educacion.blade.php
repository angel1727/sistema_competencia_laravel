<form method="POST" action="{{ route('educacion.guardar') }}">
    @csrf
    <div class="tab-pane fade show active" id="formacion" role="tabpanel">
        <div class="col-md-12">
            <p><strong>Nota importante: </strong>Toda la información proporcionada a continuación, deberá ser debidamente respaldada, para evidenciar su veracidad.</p>
        </div> 
        <div class="accordion" id="accordionEducacion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseEducacion1"
                        aria-expanded="true" aria-controls="collapseEducacion1">
                        Educación
                    </button>
                </h2>
                <div id="collapseEducacion1" class="accordion-collapse collapse show"
                    data-bs-parent="#accordionEducacion">
                    <div class="accordion-body">
                        <div class="row g-3">
                            <div id="formaciones-container-educacion">
                                <!-- Iterar sobre los valores viejos o usar una entrada vacía por defecto -->
                                @php
                                    // Si hay viejos valores de nivel_academico, usamos esos; si no, un array con un solo elemento para empezar
                                    $nivelesViejos = old('nivel_academico', ['']);
                                @endphp

                                @foreach ($nivelesViejos as $index => $valorNivel)
                                    <div class="formacion-item p-3 mb-3 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Nivel Académico</label>
                                                <input type="text"
                                                    placeholder="Ej: Universitario ó Maestría ó Especialización"
                                                    name="nivel_academico[]"
                                                    class="form-control @error('nivel_academico.'.$index) is-invalid @enderror"
                                                    value="{{ old('nivel_academico.'.$index) }}"
                                                />
                                                @error('nivel_academico.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Grado Obtenido</label>
                                                <input type="text"
                                                    placeholder="Ej: Licenciatura ó Diplomado ó Técnico Especializado"
                                                    name="grado_obtenido[]"
                                                    class="form-control @error('grado_obtenido.'.$index) is-invalid @enderror"
                                                    value="{{ old('grado_obtenido.'.$index) }}"
                                                />
                                                @error('grado_obtenido.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Centro Educativo (Universidad / Instituto)</label>
                                                <input type="text"
                                                    placeholder="Ej: Universidad San Pedro USP ó Instituto San Ángel"
                                                    name="centro_educativo[]"
                                                    class="form-control @error('centro_educativo.'.$index) is-invalid @enderror"
                                                    value="{{ old('centro_educativo.'.$index) }}"
                                                />
                                                @error('centro_educativo.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Fecha de obtención del título</label>
                                                <input type="date"
                                                    name="fecha_titulo[]"
                                                    class="form-control @error('fecha_titulo.'.$index) is-invalid @enderror"
                                                    value="{{ old('fecha_titulo.'.$index) }}"
                                                />
                                                @error('fecha_titulo.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-personalizado btn-agregar">➕ Añadir Formulario</button>
                                                <button type="button" class="btn btn-personalizado eliminar eliminar-formacion">🗑️ Eliminar formulario</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseEducacion2" aria-expanded="false" aria-controls="collapseEducacion2">
                        Conocimiento en Idiomas
                    </button>
                </h2>
                <div id="collapseEducacion2" class="accordion-collapse collapse" data-bs-parent="#accordionEducacion">
                    <div class="accordion-body">
                        <div class="row g-3">
                            <div id="formaciones-container-idiomas">
                                @php
                                    $idiomasViejos = old('idioma', ['']);
                                @endphp

                                @foreach ($idiomasViejos as $index => $valorIdioma)
                                    <div class="formacion-item p-3 mb-3 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Idioma</label>
                                                <input type="text"
                                                    placeholder="Ej: Inglés ó Francés"
                                                    name="idioma[]"
                                                    class="form-control @error('idioma.'.$index) is-invalid @enderror"
                                                    value="{{ old('idioma.'.$index) }}"
                                                />
                                                @error('idioma.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nivel escritura</label>
                                                <select name="nivel_escritura[]"
                                                    class="form-select @error('nivel_escritura.'.$index) is-invalid @enderror"
                                                >
                                                    <option value="">--Seleccione su nivel--</option>
                                                    <option value="1 Básico" {{ old('nivel_escritura.'.$index) == '1 Básico' ? 'selected' : '' }}>1 - Básico</option>
                                                    <option value="3 Intermedio" {{ old('nivel_escritura.'.$index) == '3 Intermedio' ? 'selected' : '' }}>3 - Intermedio</option>
                                                    <option value="5 Avanzado" {{ old('nivel_escritura.'.$index) == '5 Avanzado' ? 'selected' : '' }}>5 - Avanzado</option>
                                                </select>
                                                @error('nivel_escritura.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nivel oral</label>
                                                <select name="nivel_oral[]"
                                                    class="form-select @error('nivel_oral.'.$index) is-invalid @enderror"
                                                >
                                                    <option value="">--Seleccione su nivel--</option>
                                                    <option value="1 Básico" {{ old('nivel_oral.'.$index) == '1 Básico' ? 'selected' : '' }}>1 - Básico</option>
                                                    <option value="3 Intermedio" {{ old('nivel_oral.'.$index) == '3 Intermedio' ? 'selected' : '' }}>3 - Intermedio</option>
                                                    <option value="5 Avanzado" {{ old('nivel_oral.'.$index) == '5 Avanzado' ? 'selected' : '' }}>5 - Avanzado</option>
                                                </select>
                                                @error('nivel_oral.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nombre del curso o certificación</label>
                                                <input type="text"
                                                    placeholder="Ej: Certificado en idiomas ó Técnico en Inglés"
                                                    name="nombre_curso[]"
                                                    class="form-control @error('nombre_curso.'.$index) is-invalid @enderror"
                                                    value="{{ old('nombre_curso.'.$index) }}"
                                                />
                                                @error('nombre_curso.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Entidad emisora del curso o la certificación</label>
                                                <input type="text"
                                                    placeholder="Ej: Instituto CBA ó Centro de idiomas"
                                                    name="entidad_certificacion[]"
                                                    class="form-control @error('entidad_certificacion.'.$index) is-invalid @enderror"
                                                    value="{{ old('entidad_certificacion.'.$index) }}"
                                                />
                                                @error('entidad_certificacion.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Fecha emisión</label>
                                                <input type="date"
                                                    name="fecha_emision[]"
                                                    class="form-control @error('fecha_emision.'.$index) is-invalid @enderror"
                                                    value="{{ old('fecha_emision.'.$index) }}"
                                                />
                                                @error('fecha_emision.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-personalizado btn-agregar">➕ Añadir Formulario</button>
                                                <button type="button" class="btn btn-personalizado eliminar eliminar-formacion">🗑️ Eliminar formulario</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseEducacion3" aria-expanded="false" aria-controls="collapseEducacion3">
                        Conocimiento en Uso de Tecnología de la Información y Comunicación
                    </button>
                </h2>
                <div id="collapseEducacion3" class="accordion-collapse collapse" data-bs-parent="#accordionEducacion">
                    <div class="accordion-body">
                        <div class="row g-3">
                            <div id="formaciones-container-tic">
                                @php
                                    $tecnosViejos = old('herramienta_tecnologia', ['']);
                                @endphp

                                @foreach ($tecnosViejos as $index => $valorHerramienta)
                                    <div class="formacion-item p-3 mb-3 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Herramienta - Tecnología</label>
                                                <input type="text"
                                                    placeholder="Ej. Microsoft Excel ó Microsoft Teams"
                                                    name="herramienta_tecnologia[]"
                                                    class="form-control @error('herramienta_tecnologia.'.$index) is-invalid @enderror"
                                                    value="{{ old('herramienta_tecnologia.'.$index) }}"
                                                />
                                                @error('herramienta_tecnologia.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nivel de conocimiento</label>
                                                <select name="nivel_conocimiento[]"
                                                    class="form-select @error('nivel_conocimiento.'.$index) is-invalid @enderror"
                                                >
                                                    <option value="">--Seleccione su nivel--</option>
                                                    <option value="1 Básico" {{ old('nivel_conocimiento.'.$index) == '1 Básico' ? 'selected' : '' }}>1 - Básico</option>
                                                    <option value="3 Intermedio" {{ old('nivel_conocimiento.'.$index) == '3 Intermedio' ? 'selected' : '' }}>3 - Intermedio</option>
                                                    <option value="5 Avanzado" {{ old('nivel_conocimiento.'.$index) == '5 Avanzado' ? 'selected' : '' }}>5 - Avanzado</option>
                                                </select>
                                                @error('nivel_conocimiento.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Frecuencia de uso</label>
                                                <select name="frecuencia_uso[]"
                                                    class="form-select @error('frecuencia_uso.'.$index) is-invalid @enderror"
                                                >
                                                    <option value="">--Seleccione una opción--</option>
                                                    <option value="Diario" {{ old('frecuencia_uso.'.$index) == 'Diario' ? 'selected' : '' }}>Diario</option>
                                                    <option value="Mensual" {{ old('frecuencia_uso.'.$index) == 'Mensual' ? 'selected' : '' }}>Mensual</option>
                                                    <option value="En ocasiones" {{ old('frecuencia_uso.'.$index) == 'En ocasiones' ? 'selected' : '' }}>En ocasiones</option>
                                                </select>
                                                @error('frecuencia_uso.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">¿Cuenta con certificación?</label>
                                                <select name="certificacion[]"
                                                    class="form-select @error('certificacion.'.$index) is-invalid @enderror"
                                                >
                                                    <option value="">--Seleccione su respuesta--</option>
                                                    <option value="Si" {{ old('certificacion.'.$index) == 'Si' ? 'selected' : '' }}>Si</option>
                                                    <option value="No" {{ old('certificacion.'.$index) == 'No' ? 'selected' : '' }}>No</option>
                                                    <option value="En proceso" {{ old('certificacion.'.$index) == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                                </select>
                                                @error('certificacion.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nombre de la capacitación y entidad emisora</label>
                                                <input type="text"
                                                    placeholder="Ej. Excel para análisis de datos ó No aplica"
                                                    name="nombre_entidad_capacitacion[]"
                                                    class="form-control @error('nombre_entidad_capacitacion.'.$index) is-invalid @enderror"
                                                    value="{{ old('nombre_entidad_capacitacion.'.$index) }}"
                                                />
                                                @error('nombre_entidad_capacitacion.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Fecha</label>
                                                <input type="date"
                                                    name="fecha_tic[]"
                                                    class="form-control @error('fecha_tic.'.$index) is-invalid @enderror"
                                                    value="{{ old('fecha_tic.'.$index) }}"
                                                />
                                                @error('fecha_tic.'.$index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-personalizado btn-agregar">➕ Añadir Formulario</button>
                                                <button type="button" class="btn btn-personalizado eliminar eliminar-formacion">🗑️ Eliminar formulario</button>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">
                <ion-icon name="save-outline"></ion-icon> Guardar Educación - Formación
            </button>
        </div>
    </div>
</form>