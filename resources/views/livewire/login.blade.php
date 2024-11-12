<div>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%; margin: 0 auto; margin-top:20px;">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" wire:submit="login">
                    <div class="login__field">
                            @error('user')
                                <small>{{ $message }}</small>
                            @enderror
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Usuario" wire:model="user">
                    </div>
                    <div class="login__field">
                            @error('pass')
                                <small>{{ $message }}</small>
                            @enderror
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Contraseña" wire:model="pass">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Acceder</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</div>