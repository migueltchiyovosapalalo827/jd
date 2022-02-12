<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentarioRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $blog = Blog::find($request->blog_id);
            $blog->comentarios()->create(['leitor'=>$request->leitor, 'texto'=>$request->texto, 'data'=>now()]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','comentario publicado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
        return view('comentarios.show',compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
        return view('comentarios.update',compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentarioRequest  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
        DB::beginTransaction();
        try {
            //code...

            $comentario->update(['leitor'=>$request->leitor, 'texto'=>$request->texto, 'data'=>$request->data]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('erro',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sucesso','comentario editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //

        if (!$found = $comentario->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar esta comentario'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'comentario eliminda com sucesso',

       ],200);
    }
}
