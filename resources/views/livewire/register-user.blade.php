<div class="container mt-5">
    <form wire:submit.prevent="register" class="card p-4 shadow-sm">
        <h4 class="mb-4">Registrar Usuario</h4>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" wire:model.debounce.500ms="name" id="name"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select wire:model.debounce.500ms="type" id="type"
                class="form-select @error('type') is-invalid @enderror">
                <option value="">Seleccione una opción</option>
                <option value="1">Administrador</option>
                <option value="2">General</option>
                <!-- Agrega más opciones según lo que uses -->
            </select>
            @error('type')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" wire:model.debounce.500ms="email" id="email"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" wire:model.debounce.500ms="password" id="password"
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" wire:model.debounce.500ms="password_confirmation" id="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        @if ($password && $password_confirmation)
            @if ($password === $password_confirmation)
                <div class="text-success">✔️ Las contraseñas coinciden</div>
            @else
                <div class="text-danger">❌ Las contraseñas no coinciden</div>
            @endif
        @endif


        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
