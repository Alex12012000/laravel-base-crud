<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all_comics = Comic::all();

        $data = [
            'comics' => $all_comics
        ];


        return view('comics.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate($this->validationRules());   

        $form_data = $request->all();

        // creo l'istanza
        $new_comic = new Comic();
        // popolo l'istanza
        $new_comic->fill($form_data);
        // salvo l'istanza
        $new_comic->save();

        return redirect()->route('comics.show', ['comic' => $new_comic->id]);
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

        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.edit', $data);
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
        $request->validate($this->validationRules()); 

        $form_data = $request->all();

        $comic_update = Comic::findOrFail($id);
        $comic_update->update($form_data);

        return redirect()->route('comics.show', ['comic' => $comic_update->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic_delete = Comic::findOrFail($id);
        $comic_delete->delete();

        return redirect()->route('comics.index');
    }


    protected function validationRules() {
        return [
            'title' => 'required|max:50',
            'description' => 'required|max:60000',
            'thumb' => 'required|max:60000',
            'price' => 'required|max:10',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:50',
        ];
    }


}
