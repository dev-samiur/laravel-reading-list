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

        $index= -1;

        try{

            $book= Http::get('https://www.googleapis.com/books/v1/volumes?q='. $id)->body();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        $book= json_decode($book, true);

        for($i=0; $i<count( $book['items'] ); $i++) 
        {
            if( $book['items'][$i]['id'] == $id )
            {
                $index= $i;
                break;
            }
        }
        //dd($index);

        if($index == -1)
        {
            return view('pages.create', ['error' => 'Book not found']);
        }

        $book['items'][$index]['slug']= Str::slug( $book['items'][$index]['volumeInfo']['title'], '-');

        if( isset( $book['items'][$index]['volumeInfo']['publishedDate'] ) )
            $book['items'][$index]['publishedYear']= substr( $book['items'][$index]['volumeInfo']['publishedDate'], 0, 4);

        if( isset( $book['items'][$index]['volumeInfo']['industryIdentifiers'][0]['identifier'] ) )
            if( $book['items'][$index]['volumeInfo']['industryIdentifiers'][0]['type'] == 'ISBN_13')
                $book= $this->setCovers($book, $index);

        else if( isset( $book['items'][$index]['volumeInfo']['industryIdentifiers'][1]['identifier'] ) )
            if( $book['items'][$index]['volumeInfo']['industryIdentifiers'][1]['type'] == 'ISBN_13' )
                $book= $this->setCovers($book, $index);

        return view('pages.create', ['bookDetails' => $book, 'index' => $index]);
    }

    private function setCovers($book, $index){

        $isbn13=  $book['items'][$index]['volumeInfo']['industryIdentifiers'][0]['type']  == 'ISBN_13' ? $book['items'][$index]['volumeInfo']['industryIdentifiers'][0]['identifier'] : $book['items'][$index]['volumeInfo']['industryIdentifiers'][1]['identifier'];
        
        $book['items'][$index]['volumeInfo']['imageLinks']['coverSmall']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-S.jpg';
        $book['items'][$index]['volumeInfo']['imageLinks']['coverMedium']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-M.jpg';
        $book['items'][$index]['volumeInfo']['imageLinks']['coverLarge']= 'http://covers.openlibrary.org/b/ISBN/'. $isbn13 .'-L.jpg';

        return $book;
    }
}
