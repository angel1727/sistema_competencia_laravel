<form method="POST" action="{{ route('exptecnica.guardar') }}">
    @csrf
    <div class="tab-pane fade show active" id="exp_tecnica" role="tabpanel">
        <div class="col-md-12">
            <p><strong>Nota Importante: </strong> Es requerido contar con un respaldo de los años de experiencia en las los
            ensayos declarados, se debe contar con un mínimo de 2 años de experiencia, en caso de no contar con respaldo
            específico de los ensayos declarados, debe adjuntar el registro de declaración jurada de competencia DTA-FOR-195.
            </p>
        </div>
        <h2>INFORMACION DE EXPERIENCIA TECNICA POR ESQUEMA</h2>
        <!-- CONTENEDOR PRINCIPAL DE TODAS LAS FORMACIONES -->
        <div id="experienciaWrapper">
            <div class="experiencia-item-1 p-3 mb-3 rounded">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Área ISO/IEC con Experiencia Técnica</label>
                        <select name="experiencia[0][area]" class="form-select">
                            <option value="">--Seleccione el Esquema--</option>
                            <option value="ETISO_17025en">Laboratorios de Ensayo (ISO/IEC 17025)</option>
                            <option value="ETISO_17025cal">Laboratorios de Calibración (ISO/IEC 17025)</option>
                            <option value="ETISO_15189">Laboratorios Clínicos (ISO 15189)</option>
                            <option value="ETISO_17043est">Proveedores de EA - Estadístico (ISO/IEC 17043)</option>
                            <option value="ETISO_17043tec">Proveedores de EA - Técnico (ISO/IEC 17043)</option>
                            <option value="ETISO_17020">Organismo de Inspección (ISO/IEC 17020)</option>
                            <option value="ETISO_17065">Certificación de Producto (ISO/IEC 17065)</option>
                            <option value="ETISO_17021_1">Certificación de Sistemas (ISO/IEC 17021-1)</option>
                            <option value="ETISO_17024">Certificación de Personas (ISO/IEC 17024)</option>
                            <option value="ETISO_17034">Materiales de Referencia (ISO/IEC 17034)</option>
                        </select>
                    </div>

                    <!-- Aquí se insertarán dinámicamente los campos extra -->
                    <div class="col-md-12 extra-fields"></div>

                    <!-- Botón para eliminar solo este bloque -->
                    <div class="col-md-12">
                        <button type="button" class="btn-personalizado eliminar removeExperienciaBtn">🗑️ Eliminar
                            experiencia</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón único para añadir más bloques -->
        <div class="mb-3">
            <button type="button" id="addExperienciaBtn" class="btn-personalizado">➕ Añadir experiencia</button>
        </div>
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">
                <ion-icon name="save-outline" style="font-size: 22px;"></ion-icon> Guardar Experiencia Técnica
            </button>
        </div>
    </div>
</form>

<!-- Script de reconstrucción SOLO -->
@if ($errors->any() || old('experiencia'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    const oldData = @json(old('experiencia', []));
    const errores = @json($errors->toArray());

    console.log('Reconstruyendo formulario con:', oldData);

    // Esperar a que el JS base esté listo
    setTimeout(() => {
        iniciarReconstruccion();
    }, 800);

    function iniciarReconstruccion() {
        if (!oldData.length) return;

        // 1. RECONSTRUIR BLOQUES
        reconstruirBloques().then(() => {
            // 2. RECONSTRUIR SUBFORMULARIOS
            return reconstruirSubformularios();
        }).then(() => {
            // 3. APLICAR VALIDACIONES
            aplicarValidaciones();
            console.log('Reconstrucción completada');
        });
    }

    function reconstruirBloques() {
        return new Promise((resolve) => {
            let bloquesCreados = 0;
            const totalBloques = oldData.length;

            oldData.forEach((exp, i) => {
                setTimeout(() => {
                    if (i > 0) {
                        // Crear nuevo bloque
                        document.getElementById('addExperienciaBtn').click();
                    }

                    // Configurar el select del bloque
                    setTimeout(() => {
                        const select = document.querySelector(`select[name="experiencia[${i}][area]"]`);
                        if (select && exp.area) {
                            select.value = exp.area;
                            select.dispatchEvent(new Event('change'));
                        }

                        bloquesCreados++;
                        if (bloquesCreados === totalBloques) {
                            resolve();
                        }
                    }, 300);
                }, i * 500);
            });
        });
    }

    function reconstruirSubformularios() {
        return new Promise((resolve) => {
            let subformsProcesados = 0;
            const totalSubforms = oldData.reduce((total, exp) => total + (exp.subformularios ? exp.subformularios.length - 1 : 0), 0);

            // Si no hay subformularios adicionales, resolver inmediatamente
            if (totalSubforms === 0) {
                resolve();
                return;
            }

            oldData.forEach((exp, bloqueIndex) => {
                if (exp.subformularios && exp.subformularios.length > 1) {
                    // Crear subformularios adicionales para este bloque
                    for (let j = 1; j < exp.subformularios.length; j++) {
                        setTimeout(() => {
                            const bloque = document.querySelectorAll('.experiencia-item-1')[bloqueIndex];
                            if (bloque) {
                                const extraFields = bloque.querySelector('.extra-fields');
                                if (extraFields) {
                                    const subforms = extraFields.querySelectorAll('.experiencia-item');
                                    const ultimoSubform = subforms[subforms.length - 1];
                                    
                                    if (ultimoSubform) {
                                        const addBtn = ultimoSubform.querySelector('.add-formulario');
                                        if (addBtn) {
                                            addBtn.click();
                                        }
                                    }
                                }
                            }

                            subformsProcesados++;
                            if (subformsProcesados === totalSubforms) {
                                // Esperar un poco más para que se creen todos los subformularios
                                setTimeout(() => {
                                    resolve();
                                }, 500);
                            }
                        }, (bloqueIndex * 300) + (j * 200));
                    }
                }
            });
        });
    }

   function aplicarValidaciones() {
    setTimeout(() => {
        // PRIMERO: Llenar TODOS los datos de TODOS los campos
        oldData.forEach((exp, bloqueIndex) => {
            if (exp.subformularios) {
                exp.subformularios.forEach((sub, subIndex) => {
                    Object.keys(sub).forEach(campo => {
                        const valor = sub[campo];
                        if (valor !== null && valor !== undefined) {
                            const input = document.querySelector(
                                `[name="experiencia[${bloqueIndex}][subformularios][${subIndex}][${campo}]"]`
                            );
                            if (input) input.value = valor;
                        }
                    });
                });
            }
        });

        // SEGUNDO: Aplicar errores solo a los campos que los tengan
        Object.keys(errores).forEach(key => {
            const match = key.match(/experiencia\.(\d+)\.subformularios\.(\d+)\.(.+)/);
            if (match) {
                const bloqueIndex = match[1];
                const subIndex = match[2];
                const campo = match[3];
                
                const input = document.querySelector(
                    `[name="experiencia[${bloqueIndex}][subformularios][${subIndex}][${campo}]"]`
                );
                
                if (input) {
                    input.classList.add('is-invalid');
                    
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.textContent = errores[key][0];
                    input.parentNode.appendChild(feedback);
                }
            }
        });
    }, 1000);
}
});
</script>
@endif

