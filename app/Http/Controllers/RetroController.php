<?php

namespace App\Http\Controllers;

use App\Retro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retros = DB::table('retros')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('retro.index', ['retros' => $retros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
            ],
            'owner_id' => [
                'required',
            ],
            'participants' => [
                'required'
            ],
            'status' => [
                'required',
                'in:draft,publish,archive',
            ],
        ]);

        $retro = new Retro;
        $retro->name = $request->name;
        $retro->owner_id = (int)$request->owner_id;
        $retro->participants = $request->participants;
        $retro->status = $request->status;
        $retro->save();

        $request->session()->flash('success', 'Your retrospective was saved.');
        return redirect()->route('retro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retro  $retro
     * @return \Illuminate\Http\Response
     */
    public function show(Retro $retro)
    {
        return view('retro.show', ['retro' => $retro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retro  $retro
     * @return \Illuminate\Http\Response
     */
    public function edit(Retro $retro)
    {
        return view('retro.edit', ['retro' => $retro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retro  $retro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retro $retro)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
            ],
            'status' => [
                'required',
                'in:draft,publish,archive',
            ],
        ]);

        $retro->name = $request->name;
        $retro->status = $request->status;
        $retro->save();

        // Session::flash('message', 'Successfully updated');
        return redirect()->route('retro.edit', ['retro' => $retro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retro  $retro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retro $retro)
    {
        if( $retro->delete() ) {
            session()->flash('success', 'Retro ' . $retro->name . ' was permanently deleted.');
            return redirect()->route('retro.index');
        }
        
    }

    static function getStatusDisplayText(Retro $retro) {
        $status = [
            'draft' => 'Draft',
            'publish' => 'Published',
            'archive' => 'Archived',
        ];

        return $status[$retro->status];
    }
}