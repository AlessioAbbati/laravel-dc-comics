<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    
    public function index()
    {
        $comics = Comic::paginate(3); 


        return view('comics.index', compact('comics'));
    }

    
    public function create()
    {
        return view('comics.create');
    }

    
    public function store(Request $request)
    {
        // validare i dati
        $request->validate([
            'title'           => 'required|string|min:5|max:100',
            'thumb'           => 'string|max:200',
            'type'            => 'required|string|max:20',
            'series'          => 'required|string|min:5|max:255',
            'price'           => 'required|integer|min:100|max:2000',
            'sale_date'       => 'required|date',
            'description'     => 'string',
        ]);

        $data = $request->all();

        // salvare i dati nel database
        $newComic = new Comic();

        $newComic->title          = $data['title'];
        $newComic->thumb          = $data['thumb'];
        $newComic->type           = $data['type'];
        $newComic->series         = $data['series'];
        $newComic->price          = $data['price'];
        $newComic->sale_date      = $data['sale_date'];
        $newComic->description    = $data['description'];

        $newComic->save();

        
		return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    
    public function edit(Comic $comic)
    {
        //
    }

    
    public function update(Request $request, Comic $comic)
    {
        //
    }

    
    public function destroy(Comic $comic)
    {
        //
    }
}
