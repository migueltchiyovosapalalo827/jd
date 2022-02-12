<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
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
            $blogs = Blog::all();
            return DataTables::of($blogs)->make(true);
        }
        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                $foto = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->titulo.$request->file('foto')->getClientOriginalName(),'public');
            }

            Blog::create(['titulo'=>$request->titulo,'autor'=>$request->autor,'resumo'=>$request->resumo
            ,'conteudo'=>$request->conteudo,'foto'=>  (isset($foto) ) ? $foto :  'foto.jpg',
            'tipo'=>$request->tipo]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','blog criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        return view('admin.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view('admin.blogs.update',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                Storage::delete($blog->foto);
                $foto = '/storage/'.$request->file('foto')->storeAs('fotos',
                $request->titulo.$request->file('foto')->getClientOriginalName(),'public');
            }

            $blog->update(['titulo'=>$request->titulo,'autor'=>$request->autor,'resumo'=>$request->resumo
            ,'conteudo'=>$request->conteudo,'foto'=>  (isset($foto) ) ? $foto :  $blog->foto, 'tipo'=>$request->tipo]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','blog actualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        Storage::delete($blog->foto);
        if (!$found = $blog->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar esta blog'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'blog eliminda com sucesso',

       ],200);
    }
}
