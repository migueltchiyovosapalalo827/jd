<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private  function validateRole($request){
        $rules =  [
            "name"=>"required|unique:roles,name"

        ];

        return Validator::make($request,$rules);
    }
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $funcao = Role::with('permissions')->get();
            return  DataTables::of($funcao)->make(true);
        }
        return view('admin.funcao.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('admin.funcao.create',compact('permissions'));
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
            $validator = $this->validateRole($request->all());
            if ($validator->fails()) {
                # code...
                return redirect()->back()->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
        try {
            //code...
            $role = Role::create(['name'=>$request->name]);
            $role->permissions()->sync($request->permissions_list);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
      DB::commit();
      return redirect()->back()->with('sweet-success','permissão criado com sucesso');

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
        $funcao = Role::with('permissions')->findOrFail($id);
        return view('admin.funcao.show', compact('funcao'));
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
        $permissions = Permission::all();
        $funcao = Role::with('permissions')->findOrFail($id);
        return view('admin.funcao.update', compact('funcao','permissions'));

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
        $rules =[
            "name"=>"required|unique:roles,name,".$id,

        ];

      $validator =  Validator::make($request->all(),$rules);
      if($validator->fails()){

        return redirect()->back()->withErrors($validator)->withInput();
    }
        DB::beginTransaction();
        try {
            //code...
            $record = Role::findOrFail($id);
            $record->update($request->except(['permissions_list']));
            $record->permissions()->sync($request->permissions_list);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','a função foi actualizada com sucesso');
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
             $record = Role::findOrFail($id);
             $record->delete();
         } catch (\Throwable $th) {
             DB::rollBack();
             return response(['success'=>false,
             'message'=>'não foi possivel eliminar esta funcao'],422);
         }

         DB::commit();

         return response(['success'=>true,
         'data'=>$record,
         'message'=>'funcao eliminda com sucesso',

        ],200);
    }
}
