<div class="container my-5 box-shadow-rounded">
    @if (session('Ok'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%; margin: 0 auto; margin-bottom:20px;">
        {{ session('Ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form wire:submit.prevent='guardar' enctype="multipart/form-data">
        <div class="row g-3">
            <!-- CNI/CI y Estado Identificación -->
            <div class="col-md-6">
                <label for="cni_ci" class="form-label">CNI/CI</label>
                <input type="text" class="form-control" id="cni_ci" wire:model="cni_ci" >
                @error('cni_ci')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Nombre y Clave Electoral -->
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" wire:model="nombre" >
                @error('nombre')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="clave_elec" class="form-label">Clave Electoral</label>
                <input type="text" class="form-control" id="clave_elec" wire:model="clave_elec" >
                @error('clave_elec')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Fecha de Ingreso y Fecha de Nacimiento -->
            {{-- <div class="col-md-6">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" wire:model="fecha_ingreso">
            </div> --}}
            <div class="col-md-6">
                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nac" wire:model="fecha_nac">
                @error('fecha_nac')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Tatuajes, Señas y Vestimenta -->
            <div class="col-12">
                <label for="tatuajes" class="form-label">Tatuajes</label>
                <textarea class="form-control" id="tatuajes" wire:model="tatuajes" rows="3"></textarea>
                @error('tatuajes')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <label for="señas" class="form-label">Señas</label>
                <textarea class="form-control" id="señas" wire:model="señas" rows="3"></textarea>
                @error('señas')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <label for="vestimenta" class="form-label">Vestimenta</label>
                <textarea class="form-control" id="vestimenta" wire:model="vestimenta" rows="3"></textarea>
                @error('vestimenta')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="col-md-4">
                <label for="d_calle" class="form-label">Calle</label>
                <input type="text" class="form-control" id="d_calle" wire:model="d_calle" >
                @error('d_calle')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="d_num" class="form-label">Número</label>
                <input type="text" class="form-control" id="d_num" wire:model="d_num" >
                @error('d_num')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="d_col" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="d_col" wire:model="d_col" >
                @error('d_col')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="d_cp" class="form-label">Código Postal</label>
                <input type="number" class="form-control" id="d_cp" wire:model="d_cp">
                @error('d_cp')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Estado, Municipio, Localidad -->
            <div class="col-md-4">
                <label for="d_est" class="form-label">Estado</label>
                <input type="text" class="form-control" id="d_est" wire:model="d_est" >
                @error('d_est')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="d_muni" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="d_muni" wire:model="d_muni" >
                @error('d_muni')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="d_localidad" class="form-label">Localidad</label>
                <input type="text" class="form-control" id="d_localidad" wire:model="d_localidad" >
                @error('d_localidad')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Foto -->
            <div class="col-12">
                <label for="foto" class="form-label">Cargar Foto</label>
                <input type="file" class="form-control" id="foto" accept="image" wire:model="foto" required>
                @error('foto')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-success">Guardar Registro</button>
            </div>
        </div>
    </form>
</div>