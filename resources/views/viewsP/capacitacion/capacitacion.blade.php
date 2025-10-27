<form method="POST" action="{{ route('capacitacion.guardar') }}">
    @csrf
    <div class="tab-pane fade show active" id="capacitacion" role="tabpanel">
        <div class="col-md-12">
            <p><strong>Nota Importante: </strong> Indicar únicamente la formación o capacitación específica en servicios / áreas técnicas / laboratorios / sistemas de
            gestión, entre otros, relacionadas con el esquema en el cuál desea calificarse
            </p>
        </div>
        <!-- CONTENEDOR PRINCIPAL DE TODAS LAS FORMACIONES -->
        <div id="formaciones-container"> <!-- ESTE ID DEBE COINCIDIR CON TU JS -->
            <!-- FORMULARIO INDIVIDUAL CLONABLE -->
            @php
                $formaciones = old('area', ['']);
            @endphp

            @foreach ($formaciones as $index => $valor)
                <div class="formacion-item p-3 mb-3 rounded">
                    <div class="row g-3">
                        <!-- Área -->
                        <div class="col-md-12">
                            <label class="form-label">Área ISO/IEC a postular: Evaluadores</label>
                            <select name="area[]" class="form-select @error('area.' . $index) is-invalid @enderror" required>
                                <option value="">-- Seleccione el esquema --</option>
                                <option value="Laboratorios de Ensayo ISO-IEC 17025" {{ old('area.' . $index) == 'Laboratorios de Ensayo ISO-IEC 17025' ? 'selected' : '' }}>
                                    Laboratorios de Ensayo (ISO/IEC 17025)</option>
                                <option value="Laboratorios de Calibración ISO IEC 17025" {{ old('area.' . $index) == 'Laboratorios de Calibración ISO IEC 17025' ? 'selected' : '' }}>
                                    Laboratorios de Calibración (ISO/IEC 17025)</option>
                                <option value="Laboratorios Clínicos ISO 15189" {{ old('area.' . $index) == 'Laboratorios Clínicos ISO 15189' ? 'selected' : '' }}>
                                    Laboratorios Clínicos (ISO 15189)</option>
                                <option value="Organismo de Inspección ISO-IEC 17020" {{ old('area.' . $index) == 'Organismo de Inspección ISO-IEC 17020' ? 'selected' : '' }}>
                                    Organismo de Inspección (ISO/IEC 17020)</option>
                                <option value="Proveedores de ensayo de aptitud ISO-IEC 17043" {{ old('area.' . $index) == 'Proveedores de ensayo de aptitud ISO-IEC 17043' ? 'selected' : '' }}>
                                    Proveedores de ensayo de aptitud (ISO/IEC 17043)</option>
                                <option value="Organismo de Certificación de Personas ISO-IEC 17024" {{ old('area.' . $index) == 'Organismo de Certificación de Personas ISO-IEC 17024' ? 'selected' : '' }}>
                                    Organismo de Certificación de Personas (ISO/IEC 17024)</option>
                                <option value="Organismo de Certificación de Sistemas de Gestion ISO-IEC17021-1" {{ old('area.' . $index) == 'Organismo de Certificación de Sistemas de Gestion ISO-IEC17021-1' ? 'selected' : '' }}>
                                    Organismo de Certificación de Sistemas de Gestión (ISO/IEC 17021-1)</option>
                                <option value="Organismo de Certificación de Producto ISO-IEC 17065" {{ old('area.' . $index) == 'Organismo de Certificación de Producto ISO-IEC 17065' ? 'selected' : '' }}>
                                    Organismo de Certificación de Producto (ISO/IEC 17065)</option>
                                <option value="Proveedores de Materiales de Referencia ISO-IEC 17034" {{ old('area.' . $index) == 'Proveedores de Materiales de Referencia ISO-IEC 17034' ? 'selected' : '' }}>
                                    Proveedores de Materiales de Referencia (ISO/IEC 17034)</option>
                            </select>
                            
                            @error('area.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Tipo de formación -->
                        <div class="col-md-3">
                            <label class="form-label">Tipo de formación</label>
                            <input type="text" placeholder="Ej Curso-Seminario-Pasantia" name="tipo_capacitacion[]" class="form-control @error('tipo_capacitacion.' . $index) is-invalid @enderror"
                                value="{{ old('tipo_capacitacion.' . $index) }}">
                            @error('tipo_capacitacion.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tema -->
                        <div class="col-md-9">
                            <label class="form-label">Tema</label>
                            <input type="text" name="tema_capacitacion[]" class="form-control @error('tema_capacitacion.' . $index) is-invalid @enderror"
                                value="{{ old('tema_capacitacion.' . $index) }}">
                            @error('tema_capacitacion.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Organismo -->
                        <div class="col-md-6">
                            <label class="form-label">Organismo que brindó la capacitación</label>
                            <input type="text" placeholder="Ej: Ibmetro-Ibnorca-Procoin" name="organismo_capacitacion[]" class="form-control @error('organismo_capacitacion.' . $index) is-invalid @enderror"
                                value="{{ old('organismo_capacitacion.' . $index) }}">
                            @error('organismo_capacitacion.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-3">
                            <label class="form-label">Fecha Ej:31-12-2025</label>
                            <input type="date" name="fecha_capacitacion[]" class="form-control @error('fecha_capacitacion.' . $index) is-invalid @enderror"
                                value="{{ old('fecha_capacitacion.' . $index) }}">
                            @error('fecha_capacitacion.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Duración -->
                        <div class="col-md-3">
                            <label class="form-label">Duración en horas</label>
                            <div class="contador d-flex align-items-center gap-2">
                                <button type="button" onclick="this.nextElementSibling.stepDown()" class="btn btn-light">
                                    <ion-icon name="remove-circle-outline"></ion-icon>
                                </button>
                                <input type="number" name="duracion_horas_capacitacion[]" class="form-control @error('duracion_horas_capacitacion.' . $index) is-invalid @enderror"
                                    min="0" max="99" value="{{ old('duracion_horas_capacitacion.' . $index) ?? 0 }}" readonly />
                                <button type="button" onclick="this.previousElementSibling.stepUp()" class="btn btn-light">
                                    <ion-icon name="add-circle-outline"></ion-icon>
                                </button>
                            </div>
                            @error('duracion_horas_capacitacion.' . $index)
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

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">
                <ion-icon name="save-outline"></ion-icon> Guardar Capacitación - Formación
            </button>
        </div>
    </div>
</form>