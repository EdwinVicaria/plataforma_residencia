<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convocatoria;
use Illuminate\Support\Str;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $convocatorias=Convocatoria::all();
        return view('convocatorias.index',compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('convocatorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'titulo'=>'required|min:2|max:50',
            'descripcionCorta'=>'required|min:2|max:1000',
            'descripcionLarga'=>'required|max:2000',
            'fechalimite'=>'required',
            'imagen'=>'required',
        ]);

        $convocatorias=new Convocatoria();
        $convocatorias->titulo=$request->titulo;
        $convocatorias->descripcionCorta=$request->descripcionCorta;
        $convocatorias->descripcionLarga=$request->descripcionLarga;
        $convocatorias->fechalimite=$request->fechalimite;
        $convocatorias->user_id=Auth()->User()->id;
        if($request->hasFile("imagen")){
            $imagen=$request->file("imagen");
            $nombreimagen=Str::slug($request->titulo).".".$imagen->guessExtension();
            $ruta=public_path("img/");
            $imagen->move($ruta,$nombreimagen);

            $convocatorias->imagen=$nombreimagen;
        }
        $convocatorias->save();

        return redirect()->route('convocatorias.index')->with('mensaje','¡¡¡¡Nueva convocatoria registrada con exito!!!!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $convocatorias=Convocatoria::where('id','=',$id)->first();
        return view('convocatorias.show',['convocatorias'=>$convocatorias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $convocatorias=Convocatoria::findOrFail($id);
        return view('convocatorias.edit',['convocatorias'=>$convocatorias]);
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
        //
        $convocatorias=Convocatoria::findOrFail($id);
        $convocatorias->titulo=$request->titulo;
        $convocatorias->descripcionCorta=$request->descripcionCorta;
        $convocatorias->descripcionLarga=$request->descripcionLarga;
        $convocatorias->fechalimite=$request->fechalimite;
        $convocatorias->user_id=Auth()->User()->id;
        if($request->hasFile("imagen")){
            $imagen=$request->file("imagen");
            $nombreimagen=Str::slug($request->titulo).".".$imagen->guessExtension();
            $ruta=public_path("img/");
            $imagen->move($ruta,$nombreimagen);

            $convocatorias->imagen=$nombreimagen;
        }
        $convocatorias->save();
        return redirect()->route('convocatorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $convocatorias=Convocatoria::find($id);
        $convocatorias->delete();
        return redirect()->route('convocatorias.index');
    }
}
