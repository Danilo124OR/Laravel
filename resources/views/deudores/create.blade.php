
<form action="{{url('/deudores')}}" type="text" method="post" class="">
 @csrf
@include('deudores.form',['Modo'=>'crear'])

</form>