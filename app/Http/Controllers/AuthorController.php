<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$authors = Author::all(); //musu visi duomenys, masyvas
        //sort() - naudojama tik tada kai gauname sumaisyta masyva tiesiai is duomenu bazes,
        //sortBy() - pasirinkti stulpeli, Z->A(DESC) arba A->Z(ASC) tvarkos,uz veiksma atsakingas serveris
        //orderBy() - uz veiksma atsakingas duombazes algoritmas 
        //true - DESC
        //falce - ASC
        //orderBy

        //$authors = Author::all()->sortBy('name', SORT_REGULAR, false);
        //$authors = Author::orderBy('name', 'DESC')->get();
       
        $sortCollumn = $request-> sortCollumn;
        $sortOrder = $request->sortOrder;
      
        if(empty($sortCollumn) || empty($sortOrder)) {
           $authors = Author::all();
       }else {
           $authors = Author::orderBy($sortCollumn,$sortOrder)->get ();
       }

        $select_array = array_keys($authors->first()->getAttributes());



       //paimma viena vieninteli autoriu
        // $autorius = $authors->first();
        // $autorius = (array) $autorius;
        // $autorius = array_keys($autorius);


        return view('author.index', ['authors' => $authors, 'sortCollumn'=>$sortCollumn, 'sortOrder'=>$sortOrder, 'select_array'=>$select_array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
    public function search(Request $request) {
       // $authors = Author::all();

       $search_key = $request->search_key;

       $authors = Author::where('description', 'like','%'.$search_key.'%') 
       ->orWhere('name','like','%'.$search_key.'%')
       ->orWhere('surname','like','%'.$search_key.'%')
       ->orWhere('username','like','%'.$search_key.'%')
       ->orWhere('id','like','%'.$search_key.'%')
       ->get();
       
       
       //%-iesko teksto kuris turi ta irasa
       //where () - 3 parametrai: 1 stulpelio pavadinimas, 2 reiksme operacijos veiksmas(=,<,>,like ir t.t.), 3 reiksme. jei naudojame 2, tai 1 ir 3
        
       
       return view('author.search',['authors'=>$authors]);
    }

}
