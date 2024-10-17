{{$Modo == 'crear' ? 'Agregar Deudor' : 'Modificar Deudor'}}

<h1 class="text-center">{{ $Modo == 'crear' ? 'Registrar Deudor' : 'Modificar Deudor' }}</h1>

<!-- Estilos personalizados para un diseño más llamativo -->
<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #4a90e2;
        font-family: 'Arial Black', sans-serif;
        margin-bottom: 30px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
        font-family: 'Verdana', sans-serif;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #4a90e2;
        padding: 10px;
        font-size: 16px;
        color: #333;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #f39c12;
        box-shadow: 0 0 8px rgba(243, 156, 18, 0.5);
    }

    .btn-primary {
        background-color: #4a90e2;
        border-color: #4a90e2;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        font-family: 'Verdana', sans-serif;
    }

    .btn-primary:hover {
        background-color: #f39c12;
        border-color: #f39c12;
        box-shadow: 0px 4px 10px rgba(243, 156, 18, 0.4);
    }

    .btn-secondary {
        background-color: #ddd;
        border-color: #ccc;
        color: #333;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 8px;
        margin-left: 10px;
        font-family: 'Verdana', sans-serif;
    }

    .btn-secondary:hover {
        background-color: #bbb;
        border-color: #aaa;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
</style>

<!-- Formulario -->
<div class="form-container">
    <form method="POST" action="{{ $Modo == 'crear' ? url('/deudores') : url('/deudores/'.$deudor->id) }}">
        {{ csrf_field() }}
        @if($Modo == 'modificar')
            {{ method_field('PATCH') }}
        @endif

        <!-- Nombre del deudor -->
        <div class="form-group">
            <label for="Nombre">{{ 'Nombre del Deudor' }}</label>
            <input type="text" class="form-control" name="Nombre_deudor" id="Nombre" 
                   value="{{ isset($deudor->Nombre_deudor) ? $deudor->Nombre_deudor : '' }}" 
                   required>
        </div>

        <!-- Monto de la deuda -->
        <div class="form-group">
            <label for="deuda">{{ 'Monto de la Deuda' }}</label>
            <input type="number" class="form-control" name="Monto_deuda" id="deuda" 
                   value="{{ isset($deudor->Monto_deuda) ? $deudor->Monto_deuda : '' }}" 
                   required>
        </div>

        <!-- Botones -->
        <button type="submit" class="btn btn-primary">
            {{ $Modo == 'crear' ? 'Agregar' : 'Modificar' }}
        </button>

        <a href="{{ url('deudores') }}" class="btn btn-secondary">Regresar</a>
    </form>
</div>
