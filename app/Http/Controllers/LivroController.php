<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        //

        if($request->ajax())
        {
             $livros = Livro::all();
             return DataTables::of($livros)->make(true);

        }

         return view('admin.livros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.livros.create');
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
        $validationRules =  [
            'titulo'       => 'required|min:4|max:255',
            'Autores'       => 'required|min:6|max:255',
            'resumo'       => 'required|min:30|max:255',
            'ano'         => 'required',
            'editora'     => 'required|min:4|max:100',
            'url'         =>  'required|min:4|max:500',
            'volume'      => 'required|min:1|max:20 ',
            'foto' =>    'required|mimes:jpeg,bmp,png,gif,svg',
            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }
        DB::beginTransaction();

        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                $capa = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->file('foto')->getClientOriginalName(),'public');
            }
            $request->merge(['capa'=>$capa]);

            Livro::create( [
                'titulo'       => $request->titulo,
                'Autores'       =>  $request->Autores,
                'resumo'       => ltrim($request->resumo),
                'ano'         =>  $request->ano,
                'editora'     =>  $request->editora,
                'url'         =>   $request->url,
                'volume'      =>  $request->volume,
                'capa' =>     $request->capa,
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
          return  redirect()->back()->with('sweet-error',$th->getMessage());
        }

        DB::commit();
        return  redirect()->back()->with('sweet-success', 'livro publicado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        //
        return view('admin.livros.update',compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        //

        $validationRules =  [
            'titulo'       => 'required|min:4|max:255',
            'Autores'       => 'required|min:6|max:255',
            'resumo'       => 'required|min:30|max:500',
            'ano'         => 'required',
            'editora'     => 'required|min:4|max:100',
            'url'         =>  'required|min:4|max:255',
            'volume'      => 'required|min:1|max:20 '
            ];

         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }

        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                Storage::delete($livro->foto);
                $capa = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->file('foto')->getClientOriginalName(),'public');
            }

            $request->merge(['capa'=> isset($capa) ? $request->capa : $livro->capa]);
            $livro->update( [
                'titulo'       => $request->titulo,
                'Autores'       =>  $request->Autores,
                'resumo'       => $request->resumo,
                'ano'         =>  $request->ano,
                'editora'     =>  $request->editora,
                'url'         =>   $request->url,
                'volume'      =>  $request->volume,
                'capa' =>     $request->capa
                ]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            if (isset($capa)) {
                # code...
                Storage::delete($capa);
            }

            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','livro actualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        //
        Storage::delete($livro->capa);
        if (!$found = $livro->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar este livro'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'Livro eliminda com sucesso',

       ],200);
    }
}
