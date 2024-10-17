<?php

namespace App\Http\Controllers;

use App\Models\deudores;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf; 
class DeudoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Verificar permiso
        //se vera registros de 5 en 5 
        $datos['deudores']=deudores::paginate(5);
        
        return view('deudores.index', $datos);
    }

    public function pdf(){
        $deudores=deudores::all();
        $pdf = Pdf::loadView('deudores.pdf', compact('deudores')); //compact para recuperar todos los datos
        return $pdf->stream();//para visualizar el pdf 
    }

    public function pdfuno($id){
        $deudor=deudores::findOrFail($id);
        $pdf = Pdf::loadView('deudores.pdfuno', compact('deudor')); //compact para recuperar todos los datos
        return $pdf->stream();//para visualizar el pdf 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('deudores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //le indicamos que se almacene en datosdeudores
        //$datosDeudores=request()->all();
        //quiero que coincida con la tabla para poder insertar la información
        $datosDeudores=request()->except('_token');
        deudores::insert($datosDeudores);
        //return response()->json($datosDeudores);
//nos manda un mensaje de deudor agregado
        return redirect('deudores')->with('Mensaje', 'Deudor Agregado'); //redireccionamos la vista a deudores
    }

    /**
     * Display the specified resource.
     */
    public function show(deudores $deudores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //nos regresar los datos que corresponden al id
        $deudor=deudores::findOrFail($id);
        return view('deudores.edit', compact('deudor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosDeudores=request()->except(['_token', '_method']);
        //busca el id solicitado y hace un update
        deudores::where('id','=', $id)->update($datosDeudores);

        //$deudor=deudores::findOrFail($id);
        //return view('deudores.edit', compact('deudor'));
        return redirect('deudores')->with('Mensaje', 'Deudor Modificado');

    }

    /**
     * Remove the specified resource from storage.
     * 
     * recibimos solo el dato que vamos a eliminar
     */
    public function destroy($id)
    {
        //
  

        deudores::destroy($id); //le pasamos un parametro que es el id
        //return redirect('deudores'); //redireccionamos la vista a deudores
        //para redireccionar a la lista de deudores
        return redirect('deudores')->with('Mensaje', 'Deudor Eliminado');

    }
    
    
}
