<?php

namespace App\Http\Controllers;

use App\Models\jornai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class JornaiController extends Controller
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
             $jornais = jornai::all();
             return DataTables::of($jornais)->make(true);

        }

         return view('admin.jornais.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.jornais.create');
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
            'tipo'       => 'required|min:4|max:255',
            'ano'         => 'required',
            'nome'     => 'required|min:4|max:100',
            'url'         =>  'max:500',
            'paginas'      => 'required|min:1|max:20 ',
            'documento' =>    'mimes:jpeg,bmp,png,gif,svg,pdf',
            ];
         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
         }
        DB::beginTransaction();

        try {
            //code...
            if ($request->hasFile('documento')) {
                # code...
                $url = '/storage/'.$request->file('documento')->storeAs('fotos',
                $request->file('documento')->getClientOriginalName(),'public');
            }

               # code...

            jornai::create( [
                'titulo'       => $request->titulo,
                'ano'         =>  $request->ano,
                'nome'     =>  $request->nome,
                'url'         =>  isset($url) ? $url : $request->url,
                'tipo'      =>  $request->tipo,
                'paginas' =>     $request->paginas,
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            if (isset($url)) {
                # code...
                Storage::delete($url);
            }
            return  redirect()->back()->with('sweet-error',$th->getMessage());
        }

        DB::commit();
        return  redirect()->back()->with('sweet-success', 'jornais publicado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jornai  $jornai
     * @return \Illuminate\Http\Response
     */
    public function show(jornai $jornai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jornai  $jornai
     * @return \Illuminate\Http\Response
     */
    public function edit(jornai $jornai)
    {
        //
        return view('admin.jornais.update',compact('jornai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jornai  $jornai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jornai $jornai)
    {
        //
        $validationRules =  [
            'titulo'       => 'required|min:4|max:255',
            'tipo'       => 'required|min:4|max:255',
            'ano'         => 'required',
            'nome'     => 'required|min:4|max:100',
            'url'         =>  'max:500',
            'paginas'      => 'required|min:1|max:20 ',
            ];

         $validator =  Validator::make($request->all(),$validationRules);

         if($validator->fails()){
             return redirect()->back()->withErrors($validator)->withInput();
         }

        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('documento')) {
                # code...
                Storage::delete($jornai->url);
                $url = '/storage/'.$request->file('documento')->storeAs('fotos',
                $request->file('documento')->getClientOriginalName(),'public');
            }


            $jornai->update( [
                'titulo'       => $request->titulo,
                'ano'         =>  $request->ano,
                'nome'     =>  $request->nome,
                'url'         =>  isset($url) ? $request->url : $jornai->url,
                'tipo'      =>  $request->tipo,
                'paginas' =>     $request->paginas,
                ]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            if (isset($url)) {
                # code...
                Storage::delete($url);
            }
            dd($th->getMessage());
            //return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','jornal actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jornai  $jornai
     * @return \Illuminate\Http\Response
     */
    public function destroy(jornai $jornai)
    {
        //
        if (isset($jornai->url)) {
            # code...
            Storage::delete($jornai->url);
        }

        if (!$found = $jornai->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar este jornal'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'jornal eliminda com sucesso',

       ],200);
    }
}
