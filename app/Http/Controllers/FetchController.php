<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;

class FetchController extends Controller
{
    public function index(Request $request){

        try{

            $books= Http::get('https://www.googleapis.com/books/v1/volumes?q='.$request->search)->body();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return view('pages.create', ['books' => json_decode($books, true)]);
    }

    public function show($id){

        try{

            $book= Http::get('https://www.googleapis.com/books/v1/volumes?q='. $id)->body();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        $book= json_decode($book, true);

        $book['items'][0]['slug']= Str::slug( $book['items'][0]['volumeInfo']['title'], '-');

        if( isset( $book['items'][0]['volumeInfo']['publishedDate'] ) )
            $book['items'][0]['publishedYear']= substr( $book['items'][0]['volumeInfo']['publishedDate'], 0, 4);

        if( isset( $book['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier'] ) )
            if( $book['items'][0]['volumeInfo']['industryIdentifiers'][0]['type'] == 'ISBN_13')
                $book= $this->setCovers($book);

        else if( isset( $book['items'][0]['volumeInfo']['industryIdentifiers'][1]['identifier'] ) )
            if( $book['items'][0]['volumeInfo']['industryIdentifiers'][1]['type'] == 'ISBN_13' )
                $book= $this->setCovers($book);

        return view('pages.create', ['bookDetails' => $book]);
    }

    private function setCovers($book){

        $isbn13=  $book['items'][0]['volumeInfo']['industryIdentifiers'][0]['type']  == 'ISBN_13' ? $book['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier'] : $book['items'][0]['volumeInfo']['industryIdentifiers'][1]['identifier'];
        
        $book['items'][0]['volumeInfo']['imageLinks']['coverSmall']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-S.jpg';
        $book['items'][0]['volumeInfo']['imageLinks']['coverMedium']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-M.jpg';
        $book['items'][0]['volumeInfo']['imageLinks']['coverLarge']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-L.jpg';

        return $book;
    }
}
