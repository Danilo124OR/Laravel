@if(Session::has('Mensaje'))
    <div class="alert alert-success">
        {{ Session::get('Mensaje') }}
    </div>
@endif

<!-- Estilos personalizados -->
<style>
    a{
        display: inline-block;
        padding: 8px 16px;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        color: #fff;
        margin: 5px;
        background-color: #28a745;

    }

    .enlace:hover{
        background-color: blue;
    }

    .btn {
        margin: 5px;
        border-radius: 4px;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    table {
        margin-top: 20px;
    }

    table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }

    table tbody td {
        vertical-align: middle;
    }

    table tbody tr:hover {
        background-color: #f1f1f1;
    }

    table tbody form {
        display: inline;
    }

    .btn-delete {
        background-color: #dc3545;
        border: none;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    /* Estilos para los botones */
    button[type="submit"] {
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        border: none;
    }

    /* Estilos para el alert de mensaje */
    .alert {
        margin-top: 20px;
    }
</style>

<!-- Enlaces de botones -->
<a href="{{url('deudores/create')}}" class="btn enlace">Agregar Deudor</a>
<a href="{{route('deudores.pdf')}}" class="btn enlace" target="_blank">PDF</a>

<br/>  
<br/>  

<!-- Tabla de deudores -->
<table class="table table-light table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre del deudor</th>
            <th>Monto de la Deuda</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($deudores as $deudor)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$deudor->Nombre_deudor}}</td>
            <td>{{$deudor->Monto_deuda}}</td>
            <td>
                <a href="{{url('/deudores/'.$deudor->id.'/edit')}}" class="btn enlace">Editar</a>
                <a href="{{url('/deudores/'.$deudor->id.'/pdfuno')}}" class="btn enlace" target="_blank">PDF</a>
                
                <!-- Formulario para eliminar -->
                <form method="post" action="{{url('/deudores/'.$deudor->id)}}" onsubmit="return confirm('¿Borrar?');">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-delete">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
