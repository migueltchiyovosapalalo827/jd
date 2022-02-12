<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private  function validatePermission($request){
        $rules =  [
            "name"=>"required|unique:permissions,name",
        ];

        return Validator::make($request,$rules);
    }
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $prermissoes = Permission::all();
            return DataTables::of($prermissoes)->make(true);
        }

        return view('admin.permissao.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permissao.create');
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
        $validator = $this->validatePermission($request->all());

        if ($validator->fails()) {
             # code...
             return redirect()->back()->withErrors($validator)->withInput();
         }

         DB::beginTransaction();
         try {
          Permission::create(['name' => $request->name]);
         } catch (\Throwable $th) {
             //throw $th;
             DB::rollBack();

             return redirect()->back()->with('sweet-error', $th->getMessage());
         }

        DB::commit();
        return  redirect()->back()->with('sweet-success','Permissão gravado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $permissao = Permission::with('roles')->findOrFail($id);

        return view('admin.permissao.show', compact('permissao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permissao = Permission::findOrFail($id);

        return view('admin.permissao.update', compact('permissao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = $this->validatePermission($request->all());

        if ($validator->fails()) {
             # code...
             return redirect()->back()->withErrors($validator)->withInput();
         }

         DB::beginTransaction();
         try {
            $permission = Permission::findOrFail($id);
            $permission->update($request->all());

         } catch (\Throwable $th) {
             //throw $th;
             DB::rollBack();

             return redirect()->back()->with('sweet-error', $th->getMessage());
         }
         DB::commit();
         return  redirect()->back()->with('sweet-success','Permissão actualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try {
             //code...
             $record = Permission::findOrFail($id);
             $record->delete();
         } catch (\Throwable $th) {
             DB::rollBack();
             return response(['success'=>false,
             'message'=>'não foi possivel eliminar esta permissao'],422);
         }

         DB::commit();

         return response(['success'=>true,
         'data'=>$record,
         'message'=>'permissão eliminda com sucesso',

        ],200);
    }
}
