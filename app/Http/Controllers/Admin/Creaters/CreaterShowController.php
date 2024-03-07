<?php

namespace App\Http\Controllers\Admin\Creaters;
use App\Http\Controllers\Controller;
use App\Models\Creater;
use Illuminate\Http\Request;

class CreaterShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCreater()
    {
        $Creaters = Creater::all();
        return view ('admin.creater-management.createrlist',compact('Creaters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Creater $creater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Creater $creater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Creater $creater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Creater $creater)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        $user = Creater::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
