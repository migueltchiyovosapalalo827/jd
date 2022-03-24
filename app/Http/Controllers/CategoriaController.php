<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoriaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...

            return DataTables::of(Categoria::latest()->get())->make(true);

        }


        return view('admin.categoria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categoria.create');
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
            'nome'       => 'required|min:4|max:255',
            'descricao'       => 'required|min:10|max:255',

            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }

         DB::beginTransaction();
         try {
             //code...

            Categoria::create(['nome'=>$request->nome,'descricao'=>$request->descricao]);

         } catch (\Exception $e) {
         DB::rollBack();

         return redirect()->back()->with('sweet-error', $e->getMessage());
         }
         DB::commit();
         return redirect()->back()->with('sweet-success', 'Categoria criada com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Categoria $categorium)
    {
        //
        if ($request->ajax()) {
            return response()->json($categorium->SubCategoria);
        }

        $categoria = $categorium;
        return view('admin.categoria.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categorium)
    {
        //
        $categoria = $categorium;
        return view('admin.categoria.update',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categorium)
    {
        //

        $validationRules =  [
            'nome'       => 'required|min:4|max:255',
            'descricao'       => 'required|min:10|max:255',

            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }

         DB::beginTransaction();
         try {
             //code...

             $categorium->update(['nome'=>$request->nome,'descricao'=>$request->descricao]);

         } catch (\Exception $e) {
         DB::rollBack();

         return redirect()->back()->with('sweet-error', $e->getMessage());
         }
         DB::commit();
         return redirect()->back()->with('sweet-success', ' A Categoria foi actualizada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categorium)
    {
        //
        if (!$found = $categorium->delete()) {
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar esta categoria'],422);

        }

        return response(['success'=>true,
        'data'=>$found,
        'message'=>'categoria eliminda com sucesso',

       ],200);
    }
}
