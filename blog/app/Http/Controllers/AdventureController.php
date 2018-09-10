<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Adventure;
use Auth;

class AdventureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('master'))
        {
            $adventures = Adventure::orderBy('created_at','asc') ->paginate(10);        //Paginate sinnvoll? -> Seite soll ja immer zum aktuellen scrollen aber lädt schneller
            return view('home.adventure.index')->with('adventures', $adventures);   
        }
        else
        {
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        return view('home.protocol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create new Adventure-Post
        $adventure = new Adventure;
        $adventure->title = $request->input('title');                //liest den eingegebenen Titel aus
        $adventure->body = $request->input('body');                //liest den eingegebenen Inhalt aus
        $adventure->user_id = auth()->user()->id;

        $adventure->save();

        return redirect('/home/adventure')->with('success', 'Eintrag erstellt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $adventure = Adventure::find($id);
    //     return view('home.adventure.show')->with('adventure', $adventure);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adventure = Adventure::find($id);
        // Check for correct user
        /*if(auth()->user()->id !==$protocol->user_id){
            return redirect('/protocol');
        }*/
        return view('home.adventure.edit')->with('adventure', $adventure);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create new Post
        $adventure = Adventure::find($id);
        $adventure->title = $request->input('title');
        $adventure->body = $request->input('body');
    
        $adventure->save();
        return redirect('/home/adventure')->with('success', 'Eintrag geändert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adventure = Adventure::find($id);
        $adventure->delete();

        return redirect('/home/adventure')->with('success', 'Eintrag gelöscht');
    }
}
