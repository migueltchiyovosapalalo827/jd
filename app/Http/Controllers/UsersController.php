<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $resquest)
    {
        //
        if ($resquest->ajax()) {
            $user = User::with('roles')->latest()->get();
            return  DataTables::of($user)->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "roles_list" => "required"
            ];


        $validator = Validator::make($request->all(),$validationRules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('sweet-error',"Ops...há algo de errado! Verifique se os campos obrigatórios foram inseridos corretamente." );
        }


        DB::beginTransaction();
        try {
            $user = User::create([
                'email'    => $request->email,
                'name' => $request->name,
                'password' =>Hash::make($request->password)
                ]);

                $user->assignRole($request->roles_list);

        } catch (\Exception $e) {
           DB::rollBack();
        return redirect()->back()->with('sweet-error', $e->getMessage());
        }
        DB::Commit();
        return redirect()->back()->with('sweet-success', 'usuarios criado com sucesso');
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
        $user = User::find($id);

    return view('admin.users.profile',compact('user'));
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
        $user = User::find($id);
        return view('admin.users.update',compact('user'));
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

        $validationRules =  [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
            ];

            $validator = Validator::make($request->all(),$validationRules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('sweet-error',"Ops...há algo de errado! Verifique se os campos obrigatórios foram inseridos corretamente." );
            }


            DB::beginTransaction();
            try {


                 $user= User::find($id);
                 $user->syncRoles($request->roles_list);
                 $user->update([
                    'email'    => $request->email,
                    'name' => $request->name,
                    'password' =>Hash::make($request->password)
                    ]);



            } catch (\Exception $e) {
               DB::rollBack();

               return redirect()->back()->with('sweet-error', $e->getMessage());
            }

            DB::Commit();
            return redirect()->back()->with('sweet-success', 'usuarios actulizado com sucesso');

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

             $user = User::find($id);

       if ( $found = $user->delete()) {
           # code...

           DB::Commit();
           return response(['success'=>true,
           'data'=>$found,
           'message'=>'usuario elimindo com sucesso',

          ],200);
       }else{
        DB::rollBack();
        return response(['success'=>false,
        'message'=>'não foi possivel eliminar este usuario'],422);

       }
    }
}
