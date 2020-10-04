<?php

namespace App\Http\Controllers;

use App\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        try{

            $books= Book::all()->sortBy('title');
            $categories= Book::select('category')->distinct()->orderBy('category')->get();
            $publishedYears= Book::select('publishedYear')->distinct()->orderBy('publishedYear')->get();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        if( $request->is('/') )
            return view('frontend.home', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );

        else if( $request->is('dashboard') )
            return view('pages.dashboard', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );
    }

    public function indexBookByCategory(Request $request, $category)
    {
        try{

            $books= Book::where('category', $category)->get()->sortBy('title');
            $categories= Book::select('category')->distinct()->orderBy('category')->get();
            $publishedYears= Book::select('publishedYear')->distinct()->orderBy('publishedYear')->get();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        if( $request->is('book/*') )
            return view('frontend.home', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );

        else if( $request->is('dashboard/*') )
            return view('pages.dashboard', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );
    }

    public function indexBookByPublishedYear(Request $request, $publishedyear)
    {
        try{

            $books= Book::where('publishedYear', $publishedyear)->get()->sortBy('title');
            $categories= Book::select('category')->distinct()->orderBy('category')->get();
            $publishedYears= Book::select('publishedYear')->distinct()->orderBy('publishedYear')->get();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        if( $request->is('book/*') )
            return view('frontend.home', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );

        else if( $request->is('dashboard/*') )
            return view('pages.dashboard', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );
    } 

    public static function indexCategory()
    {
        $categories= Book::select('category')->distinct()->orderBy('category')->get();

        return $categories;
    }

    public static function indexPublishedYear()
    {
        $publishedYear= Book::select('publishedYear')->distinct()->orderBy('publishedYear')->get();

        return $publishedYear;
    }

    public function search(Request $request){

        try{

            $books= Book::where('title', 'like', '%'.$request->title.'%')->get()->sortBy('title');
            $categories= Book::select('category')->distinct()->orderBy('category')->get();
            $publishedYears= Book::select('publishedYear')->distinct()->orderBy('publishedYear')->get();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        if( $request->is('search*') )
            return view('frontend.home', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );

        else if( $request->is('dashboard') )
            return view('pages.dashboard', ['books' => $books, 'categories' => $categories, 'publishedYears' => $publishedYears] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book= $request->all();

        if($book['category'] == Null)
            $book['category']= "Other";

        if($book['publishedYear'] == Null)
            $book['publishedYear']= "Other";

        try {

            Book::create($book);

        } catch (Exception $e) {
            
            return back()->with(['error' => $e->getMessage()]);
        }

        return redirect('/dashboard')->with(['success' => 'Book created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{

            $book= Book::findOrFail($id);

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return view('pages.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data= $request->all();
        $book= Book::where('id', $data['id'] )->first();
        $book->fill($data);
        $book->save();
        return redirect('/dashboard')->with(['success' => 'Book edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $book= Book::findOrFail($id);
            $book->delete();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return redirect('/dashboard')->with(['success' => 'Book deleted']);
    }
}
