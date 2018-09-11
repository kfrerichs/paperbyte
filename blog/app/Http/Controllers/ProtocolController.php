<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Protocol;

class ProtocolController extends Controller
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
        $protocols = Protocol::orderBy('created_at','asc') /*->paginate(10)*/;        //Paginate sinnvoll? -> Seite soll ja immer zum aktuellen scrollen aber lädt schneller
        return view('home.protocol.index')->with('protocols', $protocols);   
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

        // Create new Protocol-Post
        $protocol = new Protocol;
        $protocol->title = $request->input('title');                //liest den eingegebenen Titel aus
        $protocol->body = $request->input('body');                //liest den eingegebenen Inhalt aus
        $protocol->user_id = auth()->user()->id;

        $protocol->save();

        return redirect('/home')->with('success', 'Eintrag erstellt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $protocol = Protocol::find($id);
    //     return view('home.protocol.show')->with('protocol', $protocol);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $protocol = Protocol::find($id);
        // Check for correct user
        /*if(auth()->user()->id !==$protocol->user_id){
            return redirect('/protocol');
        }*/
        return view('home.protocol.edit')->with('protocol', $protocol);
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
        $protocol = Protocol::find($id);
        $protocol->title = $request->input('title');
        $protocol->body = $request->input('body');
    
        $protocol->save();
        return redirect('/home')->with('success', 'Eintrag geändert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protocol = Protocol::find($id);
        $protocol->delete();

        return redirect('/home')->with('success', 'Eintrag gelöscht');
    }
}
