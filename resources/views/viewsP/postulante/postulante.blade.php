{{--autocomplete="off"--}}
<form method="POST" action="{{ route('postulante.guardar') }}"> 
    @csrf
    <div class="tab-pane fade show active" id="personales" role="tabpanel">
        <div class="datos-personales p-3 mb-3 rounded">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Nombres</label>
                    <input type="text" placeholder="Ej: Jose Manuel" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}" required />
                    @error('nombres')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Apellidos</label>
                    <input type="text" placeholder="Ej: Perez Pardo" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}" required />
                    @error('apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">C.I. / Pasaporte</label>
                    <input type="text" placeholder="Ej: 101011100 ó BA221001423" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ old('ci') }}" required />
                    @error('ci')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ciudad de residencia</label>
                    <input type="text" placeholder="Ej: La Paz, Rosario, Lima" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" required />
                    @error('ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label class="form-label">Dirección</label>
                    <input type="text" placeholder="Ej: Zona Elises, Av. Palacio entre Calle Carraco N°1300" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" />
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nacionalidad</label>
                    <input type="text" placeholder="Ej: Boliviano, Chileno, Peruano" name="nacionalidad" class="form-control @error('nacionalidad') is-invalid @enderror" value="{{ old('nacionalidad') }}" />
                    @error('nacionalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Teléfono móvil</label>
                    <input type="text" placeholder="Ej: 70607000 ó 9-12345678" name="telefono_movil" class="form-control @error('telefono_movil') is-invalid @enderror" value="{{ old('telefono_movil') }}" />
                    @error('telefono_movil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Teléfono fijo</label>
                    <input type="text" placeholder="Ej: 22105010 ó 3-3210580" name="telefono_fijo" class="form-control @error('telefono_fijo') is-invalid @enderror" value="{{ old('telefono_fijo') }}" />
                    @error('telefono_fijo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" placeholder="Ej: JosePé12@gmail.com"name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" required />
                    @error('correo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">NIT</label>
                    <input type="text" placeholder="Ej: 100221100 ó AB4400102" name="nit" class="form-control @error('nit') is-invalid @enderror" value="{{ old('nit') }}" required />
                    @error('nit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Registro SIGEP</label>
                    <input type="text" placeholder="Ej: 111002210 ó 440ZX0102" name="sigep" class="form-control @error('sigep') is-invalid @enderror" value="{{ old('sigep') }}" required />
                    @error('sigep')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Matrícula de comercio</label>
                    <input type="text" placeholder="Ej: 570012300 ó 9900102AS" name="matricula_comercio" class="form-control @error('matricula_comercio') is-invalid @enderror" value="{{ old('matricula_comercio') }}" required />
                    @error('matricula_comercio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Seguro salud</label>
                    <input type="text" placeholder="Ej: 11020034 SUS ó 542200011 CNS" name="seguro_salud" class="form-control @error('seguro_salud') is-invalid @enderror" value="{{ old('seguro_salud') }}" required />
                    @error('seguro_salud')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Seguro riesgo accidentes</label>
                    <input type="text" placeholder="Ej: 0123456789 ó RP-0001234567"name="seguro_riesgo" class="form-control @error('seguro_riesgo') is-invalid @enderror" value="{{ old('seguro_riesgo') }}" required />
                    @error('seguro_riesgo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">
                <ion-icon name="save-outline"></ion-icon> Guardar Datos Personales
            </button>
        </div>
        
    </div>
</form>