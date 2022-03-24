<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Http\Requests\StoreArtigoRequest;
use App\Http\Requests\UpdateArtigoRequest;
use App\Models\Categoria;
use App\Models\subscritor;
use App\Notifications\NewsLatters;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(HttpRequest $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $artigos = Artigo::all();
            return DataTables::of($artigos)->make(true);

        }
        return view('admin.artigos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $categorias = Categoria::all();
          return view('admin.artigos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtigoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtigoRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...

                # code...
            if ($request->hasFile('foto')) {
                # code...
                $foto = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->file('foto')->getClientOriginalName(),'public');
            }

            $categoria = Categoria::findOrfail($request->categoria);

            $artigo = $categoria->artigos()->create(['titulo'=>$request->titulo,'autor'=>$request->autor,'resumo'=>$request->resumo
            ,'conteudo'=>$request->conteudo,'foto'=>  (isset($foto) ) ? $foto :  'foto.jpg','data'=> now(),
            'tipo'=>$request->tipo]);


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        if($request->tipo === "mensal")
        {
            $subscritors = subscritor::all();
            Notification::send($subscritors,new NewsLatters($artigo));
        }

        return redirect()->back()->with('sweet-success','artigo criado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function show(Artigo $artigo)
    {
        //
        return view('admin.artigos.show',compact('artigo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function edit(Artigo $artigo)
    {
        //
        $categorias = Categoria::all();
        return view('admin.artigos.update',compact('artigo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtigoRequest  $request
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtigoRequest $request, Artigo $artigo)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                Storage::delete($artigo->foto);
                $foto = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->file('foto')->getClientOriginalName(),'public');
            }

            $artigo->update(['categoria_id'=>$request->categoria,'titulo'=>$request->titulo,'autor'=>$request->autor,'resumo'=>$request->resumo
            ,'conteudo'=>$request->conteudo,'foto'=>  (isset($foto) ) ? $foto :  $artigo->foto,'tipo'=>$request->tipo]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','artigo actualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artigo $artigo)
    {
        //
        Storage::delete($artigo->foto);
        if (!$found = $artigo->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar esta artigo'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'artigo eliminda com sucesso',

       ],200);
    }



}
