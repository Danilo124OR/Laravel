<!DOCTYPE html>
<html lang="en">
<head>
   <style>
    h1{
        text-align: center;

    }

    table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }

   </style>
</head>
<body>
    <h1 class="">DEUDORES</h1><br>
    <table class="table" style="text-align: center; font-size:20px;">

        {{--//nombres de las columnas//--}}
            <thead class="cabecera">
                <tr>
                    <th>ID</th>
                     <th>Nombre del deudor</th>
                      <th>Monto de la Deuda</th>

                       
                </tr>
            </thead>

            {{--//contenido de los registros//--}}
            <tbody>
            @foreach($deudores as $deudor)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$deudor->Nombre_deudor}}</td>
                    <td>{{$deudor->Monto_deuda}}</td>

                    
                </tr>
            @endforeach
            </tbody>
        </table>
</body>
</html>

