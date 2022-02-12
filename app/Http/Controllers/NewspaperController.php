<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use App\Http\Requests\StoreNewspaperRequest;
use App\Http\Requests\UpdateNewspaperRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class NewspaperController extends Controller
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
            $newspaper = Newspaper::all();
            return DataTables::of($newspaper)->make(true);
        }
        return view('admin.newspapers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newspapers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewspaperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewspaperRequest $request)
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

            $pdf = Storage::putFileAs(
                'public/storage/pdfs', $request->file('pdf'), $request->file('pdf')->getClientOriginalName()
            );

            Newspaper::create(['titulo'=>$request->titulo,'pdf'=>$pdf,'resumo'=>$request->resumo
            ,'foto'=>  (isset($foto) ) ? $foto :  'foto.jpg',]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            Storage::delete($pdf);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','newspaper criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function show(Newspaper $newspaper)
    {
        //

        return view('admin.newspapers.show',compact('newspaper'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function download(Newspaper $newspaper)
    {
        //

        return Storage::download($newspaper->pdf);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Newspaper $newspaper)
    {
        //
        return view('admin.newspapers.update',compact('newspaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewspaperRequest  $request
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewspaperRequest $request, Newspaper $newspaper)
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
            $pdf = Storage::putFileAs(
                'public/storage/pdfs', $request->file('pdf'), $request->file('pdf')->getClientOriginalName()
            );


            $newspaper->update(['titulo'=>$request->titulo,'pdf'=>(isset($pdf))  ? $pdf : $newspaper->pdf,'resumo'=>$request->resumo
            ,'foto'=>  (isset($foto) ) ? $foto :  'foto.jpg',]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Storage::delete($foto);
            Storage::delete($pdf);
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','newspaper actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newspaper $newspaper)
    {
        //
        Storage::delete($newspaper->foto);
        Storage::delete($newspaper->pdf);
        if (!$found = $newspaper->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar esta blog'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'Newspaper eliminda com sucesso',

       ],200);
    }
}
