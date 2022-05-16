<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombrempresa' => 'required',
            'kit' => 'required',
            'direccion' => 'required',
            'personacontacto' => 'required',
            'telefonocontacto' => 'required|numeric',
            'logo' => 'required|image|mimes:jgp,jpeg,png,svg|max:2048|',
            'correo' => 'required',
            'contraseña' => 'required',


        ]);

        if ($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'llenar todos los campos')
            ->withErrors($validator);
        }

        if($request->hasFile('logo')) {
            $image = $request->file('logo');
           //  print_r($image);
            $image_name = time().'.'.$image->getClientOriginalExtension();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('img\empresa');
            $image->move($destinationPath, $image_name);
            $empresas =  new Empresa();
            $empresas->nombrempresa = $request->nombrempresa;
            $empresas->kit = $request->kit;
            $empresas->direccion = $request->direccion;
            $empresas->personacontacto = $request->personacontacto;
            $empresas->telefonocontacto = $request->telefonocontacto;
            $empresas->logo = $request->logo;
            $empresas->correo = $request->correo;
            $empresas->contraseña = $request->contraseña;

            $empresas->save();
            return redirect('/empresas');

    };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view('empresa.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect('empresas');
    }
}
