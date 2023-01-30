<?php

namespace App\Http\Controllers;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", ["comics" => $comics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /* assegno i valori presi dall form nell nuovo elemento */
    public function store(Request $request){
        $data = $request->all();

        $comic = new Comic();

        $comic->title = $data["title"];

        $comic->description = $data["description"];

        $comic->thumb = $data["thumb"];

        $comic->price = (float) $data["price"];

        $comic->series = $data["series"];

        $comic->sale_date = $data["sale_date"];

        $comic->type = $data["type"]; 

        $comic->save(); 



        return redirect()->route("comic.show", $comic->id);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $comic = Comic::findOrFail($id);

        if (!$comic) {
            // faccio un altra ricerca o lancio un errore.
        }

        // dd($product);
        return view("comic.show", [
            "comic" => $comic
        ]);
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
    }
}
