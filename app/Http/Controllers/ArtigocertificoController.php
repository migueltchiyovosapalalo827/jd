<?php

namespace App\Http\Controllers;

use App\Models\Artigocertifico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ArtigocertificoController extends Controller
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
                 $artigocertifico = Artigocertifico::all();
                 return DataTables::of($artigocertifico)->make(true);
             }

             return view('admin.artigocertico.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.artigocertico.create');
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
            'Autores'       => 'required|min:10|max:255',
            'ano'         => 'required',
            'editora'     => 'required|min:4|max:100',
            'url'         =>  'required |min:4|max:255',
            'volume'      => 'required |min:1|max:20 '
            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }
        DB::beginTransaction();

        try {
            //code...
            Artigocertifico::create($request->all());

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return  redirect()->back()->with('sweet-error',$th->getMessage());
        }

        DB::commit();
        return  redirect()->back()->with('sweet-success', 'artigo publicado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artigocertifico  $artigocertifico
     * @return \Illuminate\Http\Response
     */
    public function show(Artigocertifico $artigoscientico)
    {
        //
        return view('admin.artigocertico.create',compact('artigoscientico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artigocertifico  $artigocertifico
     * @return \Illuminate\Http\Response
     */
    public function edit(Artigocertifico $artigoscientico)
    {
        //

        return view('admin.artigocertico.update',compact('artigoscientico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artigocertifico  $artigocertifico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artigocertifico $artigoscientico)
    {
        //
        $validationRules =  [
            'titulo'       => 'required|min:4|max:255',
            'Autores'       => 'required|min:10|max:255',
            'ano'         => 'required',
            'editora'     => 'required|min:4|max:100',
            'url'         =>  'required |min:4|max:255',
            'volume'      => 'required |min:1|max:20 '
            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }
        DB::beginTransaction();

        try {
            //code...
           $artigoscientico->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return  redirect()->back()->with('sweet-error',$th->getMessage());
        }

        DB::commit();
        return  redirect()->back()->with('sweet-success', 'artigo actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artigocertifico  $artigocertifico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artigocertifico $artigoscientico)
    {
        //
        if (!$found = $artigoscientico->delete()) {
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar este artigo'],422);

        }

        return response(['success'=>true,
        'data'=>$found,
        'message'=>'artigo elimindo com sucesso',

       ],200);
    }
}
