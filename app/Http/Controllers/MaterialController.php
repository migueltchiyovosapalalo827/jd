<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Formacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MaterialController extends Controller
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
          $materials = Material::where('formacao_id',$request->formacao_id)->get();
        return DataTables::of($materials)->make(true);
      }
      $formacao_id = $request->formacao_id;
      return view('admin.materias.index',compact('formacao_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Formacao $formacao)
    {
        //
        return view('admin.materias.create',compact('formacao'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('documento')) {
                # code...

                $documento = Storage::putFileAs('public/storage/pdfs',$request->file('documento'),
                $request->file('documento')->getClientOriginalName());
            }
            $formacao = Formacao::findOrfail($request->formacao_id);
            $formacao->materias()->create(['nome'=>$request->nome,'descricao'=> $request->descricao,'documento' => $documento]);
        } catch (\Throwable $th) {
            //throw $th;
            Storage::delete($documento);
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','material publicado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
        if (file_exists($material->documento)) {
            return Storage::download($material->documento);
           } else {
             return redirect()->back()->with('sweet-error', "O arquivo solicitado n«ªo existe");
           }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
        return view('admin.materias.update',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialRequest  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('documento')) {
                # code...
                Storage::delete($material->documento);
                $documento = Storage::putFileAs('public/storage/pdfs',$request->file('documento'),
                $request->file('documento')->getClientOriginalName());
            }

          $material->update(['nome'=>$request->nome,'descricao'=> $request->descricao,'documento' => $documento]);
        } catch (\Throwable $th) {
            //throw $th;
            if (isset($documento)) {
                # code...
                Storage::delete($documento);
            }

            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','material actualiado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
        Storage::delete($material->documento);
        if (!$found = $material->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'n«ªo foi possivel eliminar este material'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'material eliminda com sucesso',

       ],200);
    }
}
