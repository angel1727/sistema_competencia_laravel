<form method="POST" action="{{ route('experiencia.guardar') }}" enctype="multipart/form-data">
    @csrf
    <div class="tab-pane fade show active" id="experiencia" role="tabpanel">
        <div class="col-md-12">
            <p><strong>Nota Importante: </strong> Toda la información registrada trabajo actual, experiencia laboral, 
                evaluaciones y/o auditorías, así como implementación, consultoría y/o facilitación, 
                debe estar debidamente respaldada con documentación, la cual será solicitada en la etapa de postulación.
            </p>
        </div>
        <div class="row g-3">
            <!-- Campos de empresa actual -->
            <div class="info-actual-empresa p-3 mb-3 rounded">
                <span class="info-actual-empresa__legend">Información laboral actual</span>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Empresa Actual (Nombre)</label>
                        <input type="text" placeholder="Ej: Alimentos Perecederos" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa') }}" />
                        @error('empresa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Dirección (Lugar de Trabajo)</label>
                        <input type="text" placeholder="Ej: Calle Parada #749 entre Av. Ramada" 
                        name="empresa_direccion" class="form-control @error('empresa_direccion') is-invalid @enderror" value="{{ old('empresa_direccion') }}" />
                        @error('empresa_direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Departamento (Área de Trabajo)</label>
                        <input type="text" placeholder="Ej: Empacado-Laboratorio" name="departamento" class="form-control @error('departamento') is-invalid @enderror" value="{{ old('departamento') }}" />
                        @error('departamento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Teléfono (Empresa)</label>
                        <input type="text" placeholder="Ej: 22123456" name="empresa_telefono" class="form-control @error('empresa_telefono') is-invalid @enderror" value="{{ old('empresa_telefono') }}" />
                        @error('empresa_telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Correo Institucional</label>
                        <input type="email" placeholder="Ej: jose@ap.bo.com" name="empresa_correo" class="form-control @error('empresa_correo') is-invalid @enderror" value="{{ old('empresa_correo') }}" />
                        @error('empresa_correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Cargo Actual</label>
                        <input type="text" placeholder="Ej: Encargado de laboratorio" name="cargo" class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo') }}" />
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tiempo de Permanencia</label>
                        <input type="text" placeholder="Ej: Plazo Fijo-Contrato-Auxiliar" name="tiempo_permanencia" class="form-control @error('tiempo_permanencia') is-invalid @enderror" value="{{ old('tiempo_permanencia') }}" />
                        @error('tiempo_permanencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Persona de Referencia</label>
                        <input type="text" placeholder="Ej: Pedro Pepe - Supervisor Industrial" name="persona_referencia" class="form-control @error('persona_referencia') is-invalid @enderror" value="{{ old('persona_referencia') }}" />
                        @error('persona_referencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Teléfono de Referencia</label>
                        <input type="text" placeholder="Ej: 70607000" name="telefono_referencia" class="form-control @error('telefono_referencia') is-invalid @enderror" value="{{ old('telefono_referencia') }}" />
                        @error('telefono_referencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descripción de Actividades - Responsabilidades</label>
                        <textarea placeholder="Descripcicon breve y puntual" name="descripcion_responsabilidades" class="form-control @error('descripcion_responsabilidades') is-invalid @enderror" rows="3">{{ old('descripcion_responsabilidades') }}</textarea>
                        @error('descripcion_responsabilidades')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Acordeones para experiencias múltiples -->
            <div class="accordion" id="accordionExperiencia">
                <!-- Experiencia Laboral -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExperiencia1" aria-expanded="true" aria-controls="collapseExperiencia1">
                            Experiencia Laboral
                        </button>
                    </h2>
                    <div id="collapseExperiencia1" class="accordion-collapse collapse show" data-bs-parent="#accordionExperiencia">
                        <div class="accordion-body">
                            <div class="row g-3">
                                <div id="formaciones-container-experiencia-laboral">
                                    @php
                                        $experiencias = old('empresa_institucion', ['']);
                                    @endphp

                                    @foreach ($experiencias as $index => $valorExpLaboral)
                                        <div class="formacion-item p-3 mb-3 rounded">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Empresa - Institución</label>
                                                    <input
                                                        type="text"
                                                        placeholder="Ej: Cartones y Papeles del Valle CPV"
                                                        name="empresa_institucion[]"
                                                        class="form-control @error('empresa_institucion.' . $index) is-invalid @enderror"
                                                        value="{{ old('empresa_institucion.' . $index) }}"
                                                        placeholder="Ej: Empresa XYZ"
                                                    />
                                                    @error('empresa_institucion.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Tipo de Organización</label>
                                                    <input
                                                        type="text"
                                                        name="tipo_organizacion[]"
                                                        class="form-control @error('tipo_organizacion.' . $index) is-invalid @enderror"
                                                        value="{{ old('tipo_organizacion.' . $index) }}"
                                                        placeholder="Ej: Pública, Privada, ONG"
                                                    />
                                                    @error('tipo_organizacion.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Cargo Desempeñado</label>
                                                    <input
                                                        type="text"
                                                        name="cargo_desempenado[]"
                                                        class="form-control @error('cargo_desempenado.' . $index) is-invalid @enderror"
                                                        value="{{ old('cargo_desempenado.' . $index) }}"
                                                        placeholder="Ej: Supervisor del Proyecto"
                                                    />
                                                    @error('cargo_desempenado.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Fecha Desde</label>
                                                    <input
                                                        type="date"
                                                        name="fecha_desde[]"
                                                        class="form-control @error('fecha_desde.' . $index) is-invalid @enderror"
                                                        value="{{ old('fecha_desde.' . $index) }}"
                                                    />
                                                    @error('fecha_desde.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Fecha Hasta</label>
                                                    <input
                                                        type="date"
                                                        name="fecha_hasta[]"
                                                        class="form-control @error('fecha_hasta.' . $index) is-invalid @enderror"
                                                        value="{{ old('fecha_hasta.' . $index) }}"
                                                    />
                                                    @error('fecha_hasta.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Duración en meses</label>
                                                    <div class="contador d-flex align-items-center gap-2">
                                                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="btn btn-light">
                                                            <ion-icon name="remove-circle-outline"></ion-icon>
                                                        </button>
                                                        <input
                                                            type="number"
                                                            name="duracion_meses[]"
                                                            class="form-control @error('duracion_meses.' . $index) is-invalid @enderror"
                                                            min="0"
                                                            max="99"
                                                            value="{{ old('duracion_meses.' . $index) ?? 0 }}"
                                                            readonly
                                                        />
                                                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="btn btn-light">
                                                            <ion-icon name="add-circle-outline"></ion-icon>
                                                        </button>
                                                    </div>
                                                    @error('duracion_meses.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-9">
                                                    <label class="form-label">Descripción de Actividades</label>
                                                    <textarea
                                                        name="descripcion_actividades[]"
                                                        class="form-control @error('descripcion_actividades.' . $index) is-invalid @enderror"
                                                        rows="3"
                                                        placeholder="Describe tus funciones y responsabilidades sea breve y puntual"
                                                    >{{ old('descripcion_actividades.' . $index) }}</textarea>
                                                    @error('descripcion_actividades.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mt-3">
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

                <!-- Auditorías -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExperiencia2" aria-expanded="false" aria-controls="collapseExperiencia2">
                            Experiencia en Evaluaciones y/o Auditorías
                        </button>
                    </h2>
                    <div id="collapseExperiencia2" class="accordion-collapse collapse" data-bs-parent="#accordionExperiencia">
                        <div class="accordion-body">
                            <div class="row g-3">
                                <div id="formaciones-container-evaluaciones">
                                    @php
                                        $evaluaciones = old('area', ['']);
                                    @endphp

                                    @foreach ($evaluaciones as $index => $valorAudi)
                                        <div class="formacion-item p-3 mb-3 rounded">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Seleccione si es 1ra o 2da o 3ra parte</label>
                                                    <select name="area[]" class="form-select @error('area.' . $index) is-invalid @enderror">
                                                        <option value="">--Seleccione--</option>
                                                        <option value="1ra Parte" {{ old('area.' . $index) == '1ra Parte' ? 'selected' : '' }}>1ra Parte</option>
                                                        <option value="2da Parte" {{ old('area.' . $index) == '2da Parte' ? 'selected' : '' }}>2da Parte</option>
                                                        <option value="3ra Parte" {{ old('area.' . $index) == '3ra Parte' ? 'selected' : '' }}>3ra Parte</option>
                                                    </select>
                                                    @error('area.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Organización contratante del servicio</label>
                                                    <input type="text" placeholder="Ej: DTA" name="organizacion_servicio[]" class="form-control @error('organizacion_servicio.' . $index) is-invalid @enderror"
                                                        value="{{ old('organizacion_servicio.' . $index) }}" />
                                                    @error('organizacion_servicio.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Organización evaluada o auditada</label>
                                                    <input type="text" placeholder="Ej: Somare-Petrovisa- Ibnorca" name="organizacion_evaluada[]" class="form-control @error('organizacion_evaluada.' . $index) is-invalid @enderror"
                                                        value="{{ old('organizacion_evaluada.' . $index) }}" />
                                                    @error('organizacion_evaluada.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Tipo de Organismo</label>
                                                    <input type="text" placeholder="Ej: Inspeccion" name="tipo_organismo[]" class="form-control @error('tipo_organismo.' . $index) is-invalid @enderror"
                                                        value="{{ old('tipo_organismo.' . $index) }}" />
                                                    @error('tipo_organismo.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Rol designado</label>
                                                    <input type="text" placeholder="Ej: Experto Técnico - Evaluador en Supervisión - Evaluador Líder " 
                                                    name="rol_designado[]" class="form-control @error('rol_designado.' . $index) is-invalid @enderror"
                                                        value="{{ old('rol_designado.' . $index) }}" />
                                                    @error('rol_designado.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Norma Aplicada</label>
                                                    <input type="text" placeholder="Ej: Norma 17020 - Norma 17065 - Norma 17024" name="norma_aplicada[]" class="form-control @error('norma_aplicada.' . $index) is-invalid @enderror"
                                                        value="{{ old('norma_aplicada.' . $index) }}" />
                                                    @error('norma_aplicada.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Fecha</label>
                                                    <input type="date" name="fecha[]" class="form-control @error('fecha.' . $index) is-invalid @enderror"
                                                        value="{{ old('fecha.' . $index) }}" />
                                                    @error('fecha.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Duración en horas</label>
                                                    <div class="contador d-flex align-items-center gap-2">
                                                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="btn btn-light">
                                                            <ion-icon name="remove-circle-outline"></ion-icon>
                                                        </button>
                                                        <input 
                                                            type="number" 
                                                            name="duracion_horas[]" 
                                                            class="form-control @error('duracion_horas.' . $index) is-invalid @enderror"
                                                            min="0" 
                                                            max="99" 
                                                            value="{{ old('duracion_horas.' . $index) ?? 0 }}" 
                                                            readonly 
                                                            />
                                                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="btn btn-light">
                                                            <ion-icon name="add-circle-outline"></ion-icon>
                                                        </button>
                                                    </div>
                                                    @error('duracion_horas.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mt-3">
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

                <!-- Acordeón Experiencia en Consultoría / Facilitador -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExperiencia3" aria-expanded="false" aria-controls="collapseExperiencia3">
                            Experiencia en Implementación/Consultoría/Facilitador
                        </button>
                    </h2>
                    <div id="collapseExperiencia3" class="accordion-collapse collapse" data-bs-parent="#accordionExperiencia">
                        <div class="accordion-body">
                            <div class="row g-3">
                                <div id="formaciones-container-consultoria">
                                    @php
                                        $consultorias = old('organizacion_servicio_consul', ['']);
                                    @endphp

                                    @foreach ($consultorias as $index => $valorConsultoria)
                                        <div class="formacion-item p-3 mb-3 rounded">
                                            <div class="row g-3">
                                                <!-- Organización contratante -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Organización contratante del servicio</label>
                                                    <input
                                                        type="text"
                                                        placeholder="Ej: SICE YPFP - Ibmetro"
                                                        name="organizacion_servicio_consul[]"
                                                        class="form-control @error('organizacion_servicio_consul.' . $index) is-invalid @enderror"
                                                        value="{{ old('organizacion_servicio_consul.' . $index) }}"
                                                    />
                                                    @error('organizacion_servicio_consul.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Organización beneficiada -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Organización Beneficiada</label>
                                                    <input
                                                        type="text"
                                                        placeholder="Ej: Depósitos Aduaneros Bolivianos"
                                                        name="organizacion_beneficiada[]"
                                                        class="form-control @error('organizacion_beneficiada.' . $index) is-invalid @enderror"
                                                        value="{{ old('organizacion_beneficiada.' . $index) }}"
                                                    />
                                                    @error('organizacion_beneficiada.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Función -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Función (Que desempeño?)</label>
                                                    <input
                                                        type="text"
                                                        placeholder="Mantemiento - Facilitador"
                                                        name="funcion[]"
                                                        class="form-control @error('funcion.' . $index) is-invalid @enderror"
                                                        value="{{ old('funcion.' . $index) }}"
                                                    />
                                                    @error('funcion.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Fecha -->
                                                <div class="col-md-3">
                                                    <label class="form-label">Fecha</label>
                                                    <input
                                                        type="date"
                                                        name="fecha_consul[]"
                                                        class="form-control @error('fecha_consul.' . $index) is-invalid @enderror"
                                                        value="{{ old('fecha_consul.' . $index) }}"
                                                    />
                                                    @error('fecha_consul.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Duración en horas -->
                                                <div class="col-md-3">
                                                    <label class="form-label">Duración en horas</label>
                                                    <div class="contador d-flex align-items-center gap-2">
                                                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="btn btn-light">
                                                            <ion-icon name="remove-circle-outline"></ion-icon>
                                                        </button>
                                                        <input
                                                            type="number"
                                                            name="duracion_horas_consul[]"
                                                            class="form-control @error('duracion_horas_consul.' . $index) is-invalid @enderror"
                                                            min="0"
                                                            max="999"
                                                            value="{{ old('duracion_horas_consul.' . $index) ?? 0 }}"
                                                            readonly
                                                            {{-- autocomplete="off" --}}
                                                        />
                                                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="btn btn-light">
                                                            <ion-icon name="add-circle-outline"></ion-icon>
                                                        </button>
                                                    </div>
                                                    @error('duracion_horas_consul.' . $index)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Botones -->
                                                <div class="col-md-12 mt-3">
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
        </div>
        
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">
                <ion-icon name="save-outline"></ion-icon> Guardar Experiencia
            </button>
        </div>
    </div>
</form>