<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Http\Requests\StoreCandidatoRequest;
use App\Http\Requests\UpdateCandidatoRequest;
use App\Models\Formacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class CandidatoController extends Controller
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
            $candidatos = Candidato::all();
             return DataTables::of($candidatos)->make(true);
        }
        return view('admin.candidatos.index');
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
     * @param  \App\Http\Requests\StoreCandidatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidatoRequest $request)
    {
        //

        DB::beginTransaction();
        try {
            $roles_list = [];
            $funcoes = Role::where('name','formando')->get();
            foreach ($funcoes as $funco) {
                # code...
                array_push($roles_list,$funco->id);
            }

            $user = User::create([
                'email'    => $request->email,
                'name' => $request->nome,
                'password' =>Hash::make($request->password)
                ]);

                $user->candidato()->create($request->except(['passoword']));
                $user->assignRole($roles_list);

        } catch (\Exception $e) {
           DB::rollBack();
        return redirect()->back()->with('sweet-error', $e->getMessage());
        }

        DB::Commit();
        Auth::attempt($request->only('email', 'password'));
        return redirect('/dashboard')->with('sweet-success', 'conta criada  com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidatoRequest  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidatoRequest $request, Candidato $candidato)
    {
        //
        DB::beginTransaction();
        try {
           /* $user = User::create([
                'email'    => $request->email,
                'name' => $request->nome,
                'password' =>Hash::make($request->password)
                ]);*/

                $candidato->update($request->except(['passoword']));

              //  $user->assignRole($request->roles_list);

        } catch (\Exception $e) {
           DB::rollBack();
        return redirect()->back()->with('sweet-error', $e->getMessage());
        }
        DB::Commit();
        return redirect()->back()->with('sweet-success', 'conta criada  com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
        if (!$found = $candidato->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar este candidato'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'candidato eliminda com sucesso',

       ],200);
    }

    public function realizarCandidatura(Formacao $formacao, Candidato $candidato)
    {
        # code...

        try {
            //code...
        $formacao->candidatos()->attach($candidato->id, ['estado' => 0]);
        } catch (\Throwable $th) {
            //throw $th;
            return response(['success'=>false,
            'message'=>'não foi possivel realizar candidatura para esta formacão'.$th->getMessage()],422);
        }

        return response(['success'=>true,
        'data'=>$formacao->nome,
        'message'=>'Canditura feita com sucesso com sucesso',

       ],200);
    }

    public function formacao(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            $formacoes = Formacao::all();
            return DataTables::of($formacoes)->make(true);
        }
          return view('admin.candidatos.formacoes');
    }

    public function meusCorsus(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            $formacoes  = Formacao::join('formacaoscandidatos','formacaos.id','=','formacaoscandidatos.formacao_id')
                                 ->join('candidatos', 'candidatos.id','=','formacaoscandidatos.candidato_id')
                                 ->where('candidatos.user_id',Auth::user()->id)->select('formacaos.*','formacaoscandidatos.estado as estado');
          //  $formacoes  = Auth::user()->candidato->formacoes;
            return DataTables::of($formacoes)->make(true);
        }
          return view('admin.candidatos.minhasformacoes');
    }
}
