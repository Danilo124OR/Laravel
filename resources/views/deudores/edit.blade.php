

<form action="{{url('/deudores/' .$deudor->id)}}" method="post" enctype="multipart/form-data">
@csrf

 @method('PUT')
 {{--para compartir el contenido --}}
@include('deudores.form',['Modo'=>'editar'])

</form>