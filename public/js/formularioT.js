const addExperienciaBtn = document.getElementById("addExperienciaBtn");
const experienciaWrapper = document.getElementById("experienciaWrapper");

let formCount = 1;

// Array para rastrear opciones usadas en otros formularios
const opcionesUsadasEnOtrosForms = [];


// Genera campos dinámicos según la selección
function generateExtraFields(selectValue, bloqueIndex = 0, subIndex = 0) {
  const wrapper = document.createElement("div");
  wrapper.className = "generated-fields";
  
  const templates = {
    ETISO_17025en: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Ensayo</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][ensayo]"  class="form-control" placeholder="Ej: Ensayo fisicoquímico, ensayo microbiológico "/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Técnica</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tecnica]" class="form-control" placeholder="Ej: Volumetría, gravimetría, espectrofotometría" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Norma / Documentación</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_doc]" class="form-control" placeholder="Ej:Standard Methods for the examination of water and waste water." ></textarea>
              
            </div>
            <div class="col-md-6">
              <label class="form-label">Item de ensayo / Matriz</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_ensayo]" class="form-control" placeholder="Ej:Agua de consumo humano, agua residual, Suelo" ></textarea>
            </div>
            <div class="col-md-3">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17025cal: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Magnitud</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][magnitud]" class="form-control" placeholder="Ej: Masa Temperatura Presión" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Ítem en calibración</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_calibracion]" class="form-control" placeholder="Ej: Manómetro, pesas clase E1"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Norma / Documentación</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_doc_cal]" class="form-control" placeholder="Ej: DKD"/>
            </div>
            <div class="col-md-4">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_cal]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_15189: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Área / Campo</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][area_campo]" class="form-control" placeholder="Ej: Hematología, Bioquímica, Clínica, microbiología clínica "/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Análisis/Ensayo/Examen</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][analisis_examen]" class="form-control" placeholder="Ej: Colesterol total, Creatinina"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Técnica</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tecnica_cli]" class="form-control" placeholder="Ej: Colorimetría"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Muestra/Matriz</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][muestra_matriz]" class="form-control" placeholder="Ej: Suero"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_clinico]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17043est: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nombre del EA o CIL</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][nombre_ea_cil]" class="form-control" placeholder="Ej: Ensayo de aptitud-Determinación de Parámetros Físico-Mecánicos y Químicos en Cemento"/></div>
            <div class="col-md-6">
              <label class="form-label">Empresa/Organización</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][empresa_contratante]" class="form-control" placeholder="Ej: Ibmetro" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Software utilizado</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][software_utilizado]" class="form-control" placeholder="Ej: Python, R, Excel"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Normas aplicadas</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_aplicada]" class="form-control" rows="3" placeholder="Ej: ISO 13528:2022 Métodos estadísticos para su uso en pruebas de competencia mediante comparación Inter laboratorio "></textarea>
              
            </div>
            <div class="col-md-6">
              <label class="form-label">Tiempo de desarrollo del EA o CIL (Meses)</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_desarrollo_meses]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>          
          </div>
        </div>
      </div>`,
    ETISO_17043tec: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Ensayo o Magnitud</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][ensayo_magnitud]" class="form-control" placeholder="Ej: Ensayo fisicoquímico, ensayo microbiológico"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Técnica</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tecnica_tec]" class="form-control" placeholder="Ej: Volumetría, gravimetría, espectrofotometría de absorción"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Norma / Documento</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_documento_tecnico]" class="form-control" placeholder="Ej: Standard Methods for the examination of water and waste water."/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ítem ensayo/muestra</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_muestra]" class="form-control" placeholder="Ej:Agua de consumo humano, agua residual, Suelo, Vino"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_tecnico]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17020: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Campo o Sector</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][campo_sector]" class="form-control" placeholder="Ej: Industrial, Petrolero, Ambiental"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Sub sector</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][sub_sector]" class="form-control" placeholder="Ej: Equipos de izaje, Elementos y accesorios de Izaje"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ítem inspeccionado</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_inspeccionado]" class="form-control" rows="2" placeholder="Ej: Puente grúa, Grúas móviles, Eslingas"></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Método / Documento</label>
              
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][metodo_doc_normativo]" class="form-control" rows="2" placeholder="Ej: ANSI/ASME B30.5"></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                <button type="button" onclick="this.nextElementSibling.stepDown()">
                    <ion-icon name="remove-circle-outline"></ion-icon>
                </button>
                <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_inspeccion]" class="form-control"
                    min="0" max="99" value="" readonly autocomplete="off" />
                <button type="button" onclick="this.previousElementSibling.stepUp()">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17065: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tipo de certificación</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tipo_certificacion]" class="form-control" placeholder="Ej: Producto" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Producto / Proceso / Servicio</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][producto_servicio]" class="form-control" placeholder="Ej: Cemento " />
            </div>
            <div class="col-md-6">
              <label class="form-label">Documento normativo</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][documento_normativo]" class="form-control" placeholder="Ej: Reglamento" />
            </div>
            <div class="col-md-6">
              <label class="form-label">División NACE</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][division_nace]" class="form-control" placeholder="" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Código CPA</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][codigo_cpa]" class="form-control" placeholder="" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_producto]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17021_1: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Sistema de gestión</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][sistema_gestion]" class="form-control" placeholder="Ej: Sistemas de gestión de la calidad" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Norma</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma]" class="form-control" placeholder="Ej: NB 9001" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Código IAF-Sector</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][codigo_iaf_sector]" class="form-control" placeholder="Ej: 25" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Nombre del sector</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][nombre_sector]" class="form-control" placeholder="Ej: Suministro de electricidad" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_sg]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>            
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17024: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Sector ó Campo</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][sector_campo]" class="form-control" placeholder="Ej: Medio ambiente, Empresa pública " />
            </div>
            <div class="col-md-6">
              <label class="form-label">Actividad específica</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][actividad_especifica]" class="form-control" placeholder="Ej: Muestreo, Planificación de empresas desconcentradas" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Ítem / Matriz</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_matriz]" class="form-control" rows="2" placeholder="Ej: Agua potable, agua residual, etc, no aplica"></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Normas utilizadas</label>
              <textarea name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_documento_pers]" class="form-control" rows="2" placeholder="Ej: NB 496:2005 Agua potable – Toma de muestras, Decreto Supremo N.º 2889 (Reglamentación de la Ley 777)"></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_pers]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div> 
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`,
    ETISO_17034: `
      <div class="row g-3">
        <div class="experiencia-item p-3 mb-3 rounded">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Ensayo</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][ensayo_mat]" class="form-control" placeholder="Ej: Ensayo fisicoquímico, ensayo microbiológico" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Técnica</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tecnica_mat]" class="form-control" placeholder="Ej: Volumetría, gravimetría, espectrofotometría de absorción"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Norma / Documento</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][norma_documento_mat]" class="form-control" placeholder="Ej: Standard Methods for the examination of water and waste water"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Ítem ensayo/muestra</label>
              <input type="text" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][item_ensayo_muestra]" class="form-control" placeholder="Ej: Agua de consumo humano, agua residual, Suelo, Vino"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Años de Experiencia</label>
              <div class="contador">
                  <button type="button" onclick="this.nextElementSibling.stepDown()">
                      <ion-icon name="remove-circle-outline"></ion-icon>
                  </button>
                  <input type="number" name="experiencia[${bloqueIndex}][subformularios][${subIndex}][tiempo_exp_mat]" class="form-control"
                      min="0" max="99" value="" readonly autocomplete="off" />
                  <button type="button" onclick="this.previousElementSibling.stepUp()">
                      <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button type="button" class="btn-personalizado add-formulario me-2">Añadir Formulario</button>
              <button type="button" class="btn-personalizado eliminar eliminar-formulario">Eliminar Formulario</button>
            </div>
          </div>
        </div>
      </div>`  
  };
  
  wrapper.innerHTML = templates[selectValue] || "";
  return wrapper;
}
// Función para actualizar el contador de texto
function actualizarContador(textarea) {
  const max = 500;
  const remaining = max - textarea.value.length;
  const counter = textarea.parentElement.querySelector(".contador");
  if (counter) counter.textContent = remaining;
}

// Función para manejar los selects
function attachSelectListener(form) {
  const select = form.querySelector("select");
  const extra = form.querySelector(".extra-fields");

  function actualizarOpciones() {
    const options = select.querySelectorAll("option");
    options.forEach(option => {
      option.disabled = opcionesUsadasEnOtrosForms.includes(option.value) && option.value !== select.value;
    });
  }

  select.addEventListener("change", () => {
    const valorAnterior = select.dataset.prevValue;
    extra.innerHTML = "";

    if (valorAnterior) {
      const estaEnUso = Array.from(document.querySelectorAll('.experiencia-item-1 select'))
        .some(s => s !== select && s.value === valorAnterior);

      if (!estaEnUso) {
        const index = opcionesUsadasEnOtrosForms.indexOf(valorAnterior);
        if (index !== -1) {
          opcionesUsadasEnOtrosForms.splice(index, 1);
          document.querySelectorAll('.experiencia-item-1 select').forEach(s => {
            const option = s.querySelector(`option[value="${valorAnterior}"]`);
            if (option) option.disabled = false;
          });
        }
      }
    }

    if (select.value) {
      const bloques = document.querySelectorAll('.experiencia-item-1');
      const bloqueIndex = Array.from(bloques).indexOf(form);
      const subIndex = 0;

      if (!opcionesUsadasEnOtrosForms.includes(select.value)) {
        opcionesUsadasEnOtrosForms.push(select.value);
      }

      const fields = generateExtraFields(select.value, bloqueIndex, subIndex);
      extra.appendChild(fields);

      document.querySelectorAll('.experiencia-item-1 select').forEach(otherSelect => {
        if (otherSelect !== select) {
          const option = otherSelect.querySelector(`option[value="${select.value}"]`);
          if (option) option.disabled = true;
        }
      });

      actualizarBotones();
    }

    select.dataset.prevValue = select.value;
  });

  actualizarOpciones();
}

// Función para actualizar nombres de campos
function actualizarNames() {
  const bloques = experienciaWrapper.querySelectorAll('.experiencia-item-1');

  bloques.forEach((bloque, bloqueIndex) => {
    // Actualizar el name del select
    const select = bloque.querySelector('select');
    if (select) {
      select.name = `experiencia[${bloqueIndex}][area]`;
    }

    const subformularios = bloque.querySelectorAll('.experiencia-item');
    subformularios.forEach((subformulario, subIndex) => {
      const inputs = subformulario.querySelectorAll('input, textarea, select');
      inputs.forEach(input => {
        const originalName = input.getAttribute('data-name-original') || input.getAttribute('name').split('[').pop().replace(']', '');
        // Actualizar el name del input
        if (originalName) {
          input.name = `experiencia[${bloqueIndex}][subformularios][${subIndex}][${originalName}]`;
          input.setAttribute('data-name-original', originalName);
        }
      });
    });
  });
}

// Función para actualizar botones
function actualizarBotones() {
  const todosLosBloques = experienciaWrapper.querySelectorAll('.experiencia-item-1');

  todosLosBloques.forEach(bloque => {
    const formularios = bloque.querySelectorAll('.experiencia-item');

    formularios.forEach((formulario, index) => {
      const btnAgregar = formulario.querySelector('.add-formulario');
      const btnEliminar = formulario.querySelector('.eliminar-formulario');

      if (formularios.length === 1) {
        if (btnAgregar) btnAgregar.style.display = 'inline-block';
        if (btnEliminar) btnEliminar.style.display = 'none';
      } else {
        if (btnAgregar) btnAgregar.style.display = (index === formularios.length - 1) ? 'inline-block' : 'none';
        if (btnEliminar) btnEliminar.style.display = 'inline-block';
      }
    });
  });
  
  actualizarNumeracionBloques();
  actualizarNames();
}

// Función para actualizar numeración
function actualizarNumeracionBloques() {
  const bloques = experienciaWrapper.querySelectorAll('.experiencia-item-1');
  bloques.forEach((bloque, index) => {
    const label = bloque.querySelector("label");
    if (label) {
      label.textContent = `Área ISO/IEC con Experiencia Técnica ${index + 1}`;
    }
  });
}

// Evento para añadir bloques
addExperienciaBtn.addEventListener("click", () => {
  const first = experienciaWrapper.firstElementChild;
  const clone = first.cloneNode(true);
  clone.classList.add("experiencia-item-1");

  const newSelect = clone.querySelector("select");
  newSelect.value = "";
  newSelect.disabled = false;
  clone.querySelector(".extra-fields").innerHTML = "";

  const removeBtn = clone.querySelector(".removeExperienciaBtn");
  removeBtn.addEventListener("click", () => {
    const bloques = experienciaWrapper.querySelectorAll('.experiencia-item-1');
    if (bloques.length > 1) {
      if (newSelect.value) {
        const index = opcionesUsadasEnOtrosForms.indexOf(newSelect.value);
        if (index !== -1) {
          opcionesUsadasEnOtrosForms.splice(index, 1);
          document.querySelectorAll('.experiencia-item-1 select').forEach(s => {
            const option = s.querySelector(`option[value="${newSelect.value}"]`);
            if (option) option.disabled = false;
          });
        }
      }
      experienciaWrapper.removeChild(clone);
      actualizarBotones();
    } else {
      newSelect.value = "";
      clone.querySelector(".extra-fields").innerHTML = "";
    }
  });

  experienciaWrapper.appendChild(clone);
  attachSelectListener(clone);
  actualizarBotones();
  actualizarNames();
});

// Evento para añadir subformularios
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('add-formulario')) {
    const experienciaItem = e.target.closest('.experiencia-item');
    const parentWrapper = experienciaItem.closest('.extra-fields');
    const bloque = experienciaItem.closest('.experiencia-item-1');
    
    if (parentWrapper) {
      const bloqueIndex = Array.from(experienciaWrapper.children).indexOf(bloque);
      const subIndex = parentWrapper.querySelectorAll('.experiencia-item').length;
      
      const primerFormulario = parentWrapper.querySelector('.experiencia-item');
      const clone = primerFormulario.cloneNode(true);
      
      clone.querySelectorAll('[name]').forEach(input => {
        const name = input.getAttribute('name');
        if (name) {
          const matches = name.match(/\[([^\]]+)\]$/);
          if (matches && matches[1]) {
            const campo = matches[1];
            input.name = `experiencia[${bloqueIndex}][subformularios][${subIndex}][${campo}]`;
          }
        }
      });
      
      clone.querySelectorAll('input, textarea').forEach(input => {
        input.value = '';
      });
      
      parentWrapper.appendChild(clone);
      actualizarBotones();
      actualizarNames();
    }
  }
});

// Evento para eliminar subformularios
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('eliminar-formulario')) {
    const experienciaItem = e.target.closest('.experiencia-item');
    const bloque = e.target.closest('.experiencia-item-1');
    const itemsEnBloque = bloque.querySelectorAll('.experiencia-item');

    if (itemsEnBloque.length > 1) {
      const itemsArray = Array.from(itemsEnBloque);
      const index = itemsArray.indexOf(experienciaItem);

      experienciaItem.remove();
      actualizarBotones();
      actualizarNames();

      const nuevosItems = bloque.querySelectorAll('.experiencia-item');
      const focoItem = nuevosItems[Math.max(0, index - 1)];
      if (focoItem) {
        const inputParaFoco = focoItem.querySelector('input');
        if (inputParaFoco) {
          inputParaFoco.focus();
          focoItem.scrollIntoView({ behavior: "smooth", block: "center" });
        }
      }
    } else {
      alert('Debe haber al menos un formulario de experiencia');
    }
  }
});

// INICIALIZACIÓN PRINCIPAL
document.addEventListener('DOMContentLoaded', () => {
  // Configurar data-name-original para campos existentes
  document.querySelectorAll('.experiencia-item-1').forEach((bloque, bloqueIndex) => {
    const select = bloque.querySelector('select[name="area"]');
    if (select) {
      select.name = `experiencia[${bloqueIndex}][area]`;
    }

    bloque.querySelectorAll('[name]').forEach(input => {
      const name = input.getAttribute('name');
      if (name && !input.hasAttribute('data-name-original')) {
        const campo = name.split('[').pop().replace(']', '');
        input.setAttribute('data-name-original', campo);
      }
    });
  });

  // Iniciar primer formulario
  const primerBloque = experienciaWrapper.firstElementChild;
  if (primerBloque) {
    const removeBtn = primerBloque.querySelector(".removeExperienciaBtn");
    if (removeBtn) {
      removeBtn.addEventListener("click", (e) => {
        const bloque = e.target.closest(".experiencia-item-1");
        const select = bloque.querySelector("select");
        const totalBloques = experienciaWrapper.children.length;
        
        if (totalBloques > 1) {
          if (select.value) {
            const index = opcionesUsadasEnOtrosForms.indexOf(select.value);
            if (index !== -1) {
              opcionesUsadasEnOtrosForms.splice(index, 1);
              document.querySelectorAll('.experiencia-item-1 select').forEach(s => {
                const option = s.querySelector(`option[value="${select.value}"]`);
                if (option) option.disabled = false;
              });
            }
          }
          experienciaWrapper.removeChild(bloque);
        } else {
          select.value = "";
          bloque.querySelector(".extra-fields").innerHTML = "";
        }
        actualizarBotones();
      });
    }

    attachSelectListener(primerBloque);
    actualizarBotones();
  }
});