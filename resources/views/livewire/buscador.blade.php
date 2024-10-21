<div class="p-4">
    <!-- Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" 
        wire:ignore.self>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso de Objetivo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            La presente publicación se hace en cumplimiento a la Ley General de Protección de Datos Personales y la Ley De Protección de Datos Personales en Posesión de los Sujetos Obligados del Estado de Zacatecas con la finalidad de privilegiar el derecho de las víctimas a ser regresados a su familia
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        // Escuchar cuando la página esté completamente cargada
        document.addEventListener('DOMContentLoaded', function() {
            const modalTimestampKey = 'modalShownTime';  // Clave para guardar el timestamp
            const modalKey = 'modalShown';  // Clave para indicar que el modal fue mostrado
            const thirtyMinutes = 30 * 60 * 1000;  // 30 minutos en milisegundos
    
            // Obtener el tiempo actual
            const currentTime = new Date().getTime();
            
            // Verificar si el modal fue mostrado y cuándo
            const storedTime = localStorage.getItem(modalTimestampKey);
    
            // Si el modal no ha sido mostrado o han pasado más de 30 minutos
            if (!storedTime || (currentTime - storedTime) > thirtyMinutes) {
                // Mostrar el modal
                var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                welcomeModal.show();
    
                // Guardar el timestamp actual en el localStorage y marcar que fue mostrado
                localStorage.setItem(modalTimestampKey, currentTime);
                localStorage.setItem(modalKey, 'true');
            }
        });
    </script>

<div style="
width: 100%;                /* Cambiar a 100% para ajustarse al contenedor */
max-width: 600px;          /* Limitar el ancho máximo para pantallas grandes */
background-color: #f0f0f0; /* Color de fondo del rectángulo */
border-radius: 15px;       /* Bordes redondeados */
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
margin: 50px auto;         /* Centra el div horizontalmente */
padding: 20px;             /* Espaciado interior */
text-align: center;        /* Alineación de texto */
">
<!-- Contenido dentro del rectángulo -->
    <form wire:submit.prevent="buscar" class="px-4 pt-4">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <input wire:model="nombre" class="mb-4 form-control input-login" type="text" placeholder="Nombre">
        
        <input wire:model="estado" class="mb-4 form-control input-login" type="text" placeholder="Estado">
        
        <input wire:model="municipio" class="mb-4 form-control input-login" type="text" placeholder="Municipio">
        
        <div class="mb-4">
            <label class="me-2">
                <input wire:model="sexo" type="radio" value="H"> Masculino
            </label>
            <label>
                <input wire:model="sexo" type="radio" value="M"> Femenino
            </label>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" wire:click="limpiar" class="btn btn-outline-danger me-2 p-2">Limpiar</button>
            <button class="btn btn-outline-success p-2" type="submit">Buscar</button>
        </div>
    </form>

    <div class="py-4">
        <a class="btn btn-outline-primary" href="/listado">Visualizar todas las cedulas</a>
    </div>
</div>

</div>
