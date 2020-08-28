<?php

namespace App\Http\Controllers;

use App\Retro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RetroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $retros = DB::table('retros')
        ->where('owner_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('retro.index', [
            'retros' => $retros,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retro.create', [
            'user' => Auth::user()
        ]);
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
            'title' => [
                'required',
                'max:255',
            ],
            'status' => [
                'required',
                'in:draft,publish,archive',
            ],
        ]);

        $retro = new Retro;
        $retro->title = $request->title;
        $retro->description = $request->description;
        $retro->owner_id = Auth::id();
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
        return view('retro.show', [
            'retro' => $retro,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retro  $retro
     * @return \Illuminate\Http\Response
     */
    public function edit(Retro $retro)
    {
        return view('retro.edit', [
            'retro' => $retro,
            'user' => Auth::user(),
        ]);
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
            'title' => [
                'required',
                'max:255',
            ],
            'status' => [
                'required',
                'in:draft,publish,archive',
            ],
        ]);

        $retro->owner_id = Auth::id();
        $retro->title = $request->title;
        $retro->description = $request->description;
        $retro->status = $request->status;
        $retro->save();

        Session::flash('success', 'Successfully updated');
        return redirect()->route('retro.index');
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