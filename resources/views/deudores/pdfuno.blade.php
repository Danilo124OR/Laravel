<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
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
      
    <table class="table table-light">

        {{--//nombres de las columnas//--}}
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                     <th>Nombre del deudor</th>
                      <th>Monto de la Deuda</th>
                       
                </tr>
            </thead>
        
            
            {{--//contenido de los registros//--}}
            <tbody>
            
                <tr>
                    <td>{{$deudor->id}}</td>
                    <td>{{$deudor->Nombre_deudor}}</td>
                    <td>{{$deudor->Monto_deuda}}</td>

                    
                </tr>
           
            </tbody>
        </table>
   
  </body>
</html>