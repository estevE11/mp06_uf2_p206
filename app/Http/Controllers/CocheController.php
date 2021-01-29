<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = Coche::all();
        return view('listcoche')->with('coches', $coches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editcoche');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $coche = Coche::create($request->all());
            return \redirect("/coche/$coche->id");
        }
        catch(\Exception $e) {
            return \redirect("/coche/create")->with("errorCreating", true);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coche = Coche::find($id);
        return view('showcoche')->with('coche', $coche);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coche = Coche::find($id);
        return view('editcoche')->with('coche', $coche);
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

        $updated = true;
        $coche;

        try {
            $coche = Coche::find($id);
            $coche->update($request->all());
        }
        catch(\Exception $e) {
            $updated = false;
            return view("showcoche", ['updated'=> $updated, 'err' => $e->getMessage()])->with('coche', $coche);
        }

        return view("showcoche", ['updated'=> $updated])->with('coche', $coche);//->with("updated", $updated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {                
        try {
            $coche = Coche::find($id);
            $coche->delete();
        }
        catch(\Exception $e) {
            return redirect('/coche')->with('deleted', false);
        }

        return redirect('/coche')->with('deleted', true);
    }
}
