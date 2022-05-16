<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Validator;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.index')->with('vehiculos',$vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombreconduc' => 'required|max:10',
            'documentoconduc' => '|required|numeric',
            'modelo' => 'required|string',
            'año' => 'required|numeric',
            'matricula' => 'required|string',
            'placa' => 'required|numeric',
            'tecnomecanica' => 'required',
            'soat' => 'required|' ,//image|mimes:jpg,jpeg,gif,svg|max:2048',
            'tarjetapropiedad' => 'required',
            'fechavencimiento' => 'required',
        ]);

        if ($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'llenar todos los campos')
            ->withErrors($validator);
        }
        if($request->hasFile('tecnomecanica')) {
            $image = $request->file('tecnomecanica');
           //  print_r($image);
            $image_name = time().'.'.$image->getClientOriginalExtension();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('img\vehiculo\tecnomecanica');
            $image->move($destinationPath, $image_name);
        }
        if($request->hasFile('soat')) {
            $image = $request->file('soat');
           //  print_r($image);
            $image_name = time().'.'.$image->getClientOriginalExtension();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('img\vehiculo\soat');
            $image->move($destinationPath, $image_name);
        }
        if($request->hasFile('tarjetapropiedad')) {
            $image = $request->file('tarjetapropiedad');
           //  print_r($image);
            $image_name = time().'.'.$image->getClientOriginalExtension();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('img\vehiculo\tarjetapropiedad');
            $image->move($destinationPath, $image_name);

            $vehiculos =  new Vehiculo();
            $vehiculos->nombreconduc = $request->nombreconduc;
            $vehiculos->documentoconduc = $request->documentoconduc;
            $vehiculos->modelo = $request->modelo;
            $vehiculos->año = $request->año;
            $vehiculos->matricula = $request->matricula;
            $vehiculos->placa = $request->placa;
            $vehiculos->tecnomecanica = $request->tecnomecanica;
            $vehiculos->soat = $request->soat;
            $vehiculos->tarjetapropiedad = $request->tarjetapropiedad;
            $vehiculos->fechavencimiento = $request->fechavencimiento;
            $vehiculos->save();

            return redirect('/vehiculos');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.show')->with('vehiculo', $vehiculo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.edit')->with('vehiculo', $vehiculo );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculos = Vehiculo::find($id);
        $vehiculos = new Vehiculo();

        $vehiculos->modelo = $request->get('modelo');
        $vehiculos->matricula = $request->get('matricula');
        $vehiculos->nombreconduc = $request->get('nombreconduc');        
        $vehiculos->año = $request->get('año');
        $vehiculos->tecnomecanica = $request->get('tecnomecanica');
        $vehiculos->soat = $request->get('soat');
        $vehiculos->tarjetapropiedad = $request->get('tarjetapropiedad');
        $vehiculos->placa = $request->get('placa');
        $vehiculos->documentoconduc = $request->get('documentoconduc');
        $vehiculos->fechavencimiento = $request->get('fechavencimiento');

        $vehiculos->save();

        return redirect('/vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return redirect('vehiculos');
    }
}
