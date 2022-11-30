<?php

namespace App\Http\Controllers;

use App\Models\Formacao;
use App\Http\Requests\StoreFormacaoRequest;
use App\Http\Requests\UpdateFormacaoRequest;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FormacaoController extends Controller
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
            $formacoes = Formacao::all();
            return DataTables::of($formacoes)->make(true);
        }
        return view('admin.formacoes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.formacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormacaoRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            if ($request->hasFile('foto')) {
                # code...
                $foto = '/storage/' . $request->file('foto')->storeAs(
                    'fotos',
                    $request->titulo . $request->file('foto')->getClientOriginalName(),
                    'public'
                );
            }

            Formacao::create([
                'nome' => $request->nome, 'formador' => $request->formador, 'data' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data))),
                'descricao' => $request->descricao, 'custo' => $request->custo, 'foto' => $foto
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            Storage::delete($foto);
            DB::rollBack();
            return redirect()->back()->with('sweet-error', $th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success', 'formação criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $formacao = Formacao::find($id);
        return view('admin.formacoes.show', compact('formacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $formacao = Formacao::find($id);
        return view('admin.formacoes.update', compact('formacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormacaoRequest  $request
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormacaoRequest $request, $id)
    {
        //

        DB::beginTransaction();
        try {
            //code...
            $formacao = Formacao::find($id);
            if ($request->hasFile('foto')) {
                # code...
                $foto = '/storage/' . $request->file('foto')->storeAs(
                    'fotos',
                    $request->titulo . $request->file('foto')->getClientOriginalName(),
                    'public'
                );
            }
            $formacao->update([
                'nome' => $request->nome, 'formador' => $request->formador,
                'descricao' => $request->descricao, 'custo' => $request->custo, 'data' =>  date('Y-m-d', strtotime(str_replace('/', '-', $request->data))),
                'foto' => (isset($foto)) ? $foto :  $formacao->foto
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error', $th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success', 'formação criada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $formacao = Formacao::find($id);
        Storage::delete($formacao->foto);
        if (!$found = $formacao->delete()) {
            # code...
            return response([
                'success' => false,
                'message' => 'não foi possivel eliminar esta formacão'
            ], 422);
        }
        return response([
            'success' => true,
            'data' => $found,
            'message' => 'formacão eliminda com sucesso',

        ], 200);
    }

    public function aceitarCandidatura(Formacao $formacao, Candidato $candidato)
    {
        # code...

        try {
            //code...
            $formacao->candidatos()->updateExistingPivot($candidato->id, ['estado' => 1]);
        } catch (\Throwable $th) {
            //throw $th;

            return response([
                'success' => false,
                'message' => 'não foi possivel acitar candidatura esta formacão'
            ], 422);
        }

        return response([
            'success' => true,
            'data' => $formacao->nome,
            'message' => 'Canditura acieta com sucesso com sucesso',

        ], 200);
    }

    public function rejeitarCandidatura(Formacao $formacao, Candidato $candidato)
    {
        # code...

        try {
            //code...
            $formacao->candidatos()->updateExistingPivot($candidato->id, ['estado' => 0]);
        } catch (\Throwable $th) {
            //throw $th;

            return response([
                'success' => false,
                'message' => 'não foi possivel rejeitar esta candidatura esta formacão'
            ], 422);
        }

        return response([
            'success' => true,
            'data' => $formacao->nome,
            'message' => 'Canditura rejeitada com sucesso com sucesso',

        ], 200);
    }

    public function listarCandidatos(Formacao $formacao)
    {
        # code...paginate(15)
        /*  $formacao = Formacao::find($request->formacao_id);
        if ($request->ajax()) {
            # code...
            return DataTables::of($formacao->candidatos)->make(true);
        }*/
        $candidatos = $formacao->candidatos()->paginate(9);
        return view('admin.formacoes.candidatos', compact('formacao', 'candidatos'));
    }
}
