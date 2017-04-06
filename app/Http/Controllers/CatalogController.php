<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Movie;
use Notification;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $movies = DB::table('movies')->get();
        $result = json_decode($movies, true);
        return view('catalog.index', ['arrayPeliculas' => $result]);
    }
    
    public function getShow($id)
    {
        $movie = Movie::findOrFail($id);
        $result = json_decode($movie, true);
        return view('catalog.show', ['Pelicula' => $result]);
    }
    
    public function save(Request $request)
    {
        $p = new Movie;
        $p->title = $request->get('title');
        $p->year = $request->get('year');
        $p->director = $request->get('director');
        $p->poster = $request->get('poster');
        $p->synopsis = $request->get('synopsis');
        $p->rented = 0;

        $p->save();
        return self::getIndex();
    }
    
    public function update(Request $request)
    {
        DB::table('movies')
            ->where('id', $request->get('id'))
            ->update( 
                       array( 
                             "title" => $request->get('title'),
                             "year" => $request->get('year'),
                             "director" => $request->get('director'),
                             "poster" => $request->get('poster'),
                             "synopsis" => $request->get('synopsis')
                             )
                       );
        
        return self::getIndex();
    }
    
    public function getCreate()
    {	
        return view('catalog.create');

    }
    
    public function getEdit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('catalog.edit', ['movie' => $movie]);
    }
    
    public function putRent($id)
    {	
        DB::table('movies')
            ->where('id', $id)
            ->update( 
                       array( 
                             "rented" => 1
                             )
                       );
        return self::getShow($id);

    }
    
    public function putReturn($id)
    {	
        DB::table('movies')
            ->where('id', $id)
            ->update( 
                       array( 
                             "rented" => 0
                             )
                       );
        return self::getShow($id);
    }
    
    public function deleteMovie($id)
    {	
         Movie::destroy($id);
        return self::getIndex();

    }
}
