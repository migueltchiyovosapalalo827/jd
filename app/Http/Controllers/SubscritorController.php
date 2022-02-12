<?php

namespace App\Http\Controllers;

use App\Models\subscritor;
use App\Http\Requests\StoresubscritorRequest;
use App\Http\Requests\UpdatesubscritorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SubscritorController extends Controller
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
            $subscritors = subscritor::all();
           return DataTables::of($subscritors)->of();
        }
        return view('admin.sucritor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sucritor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresubscritorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubscritorRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            subscritor::create($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
         DB::commit();
        return redirect()->back()->with('sweet-success','subscrição feita com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subscritor  $subscritor
     * @return \Illuminate\Http\Response
     */
    public function show(subscritor $subscritor)
    {
        //
        return view('admin.subcritor.show',compact('subcritor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscritor  $subscritor
     * @return \Illuminate\Http\Response
     */
    public function edit(subscritor $subscritor)
    {
        //
        return view('admin.subcritor.update',compact('subcritor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubscritorRequest  $request
     * @param  \App\Models\subscritor  $subscritor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubscritorRequest $request, subscritor $subscritor)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $subscritor->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('sweet-error',$th->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('sweet-success','subriscrição actaualiado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscritor  $subscritor
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscritor $subscritor)
    {
        //

        if (!$found = $subscritor->delete()) {
            # code...
            return response(['success'=>false,
            'message'=>'não foi possivel eliminar este subcritor'],422);
        }
        return response(['success'=>true,
        'data'=>$found,
        'message'=>'subcritor eliminda com sucesso',

       ],200);
    }
}
