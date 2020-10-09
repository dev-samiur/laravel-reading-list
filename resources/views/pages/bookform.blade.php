
    
    <form action="{{ $operation == 'create' ? url('/book/create') : url('/book/edit/'. $book['id']) }}" method="POST" style="margin: 50px 0px;">
        @csrf

        @if ($operation == 'edit')
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $book['id'] }}"/>
        @endif

        <div class="form-group">
            <label for="category" >Category:</label>
            <input type="text" class="form-control" id="category" placeholder="Enter category" name="category" value="{{ isset($book['category']) ? $book['category'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="amazonLink" >Amazon Link:</label>
            <input type="text" class="form-control" id="amazonLink" placeholder="Enter amazon link" name="amazonLink" value="{{ isset($book['amazonLink']) ? $book['amazonLink'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="tier" >Tier:</label>
            <input type="text" class="form-control" id="tier" placeholder="Enter tier" name="tier" value="{{ isset($book['tier']) ? $book['tier'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="public" >Public:</label>
            <input type="text" class="form-control" id="public" placeholder="Enter public" name="public" value="{{ isset($book['public']) ? $book['public'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="slug" >Slug:</label>
            <input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug" value="{{ isset($book['slug']) ? $book['slug'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="publishedYear" >Published Year:</label>
            <input type="text" class="form-control" id="publishedYear" placeholder="Enter published year" name="publishedYear" value="{{ isset($book['publishedYear']) ? $book['publishedYear'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="googleBooksId" >Google Books Id:</label>
            <input type="text" class="form-control" id="googleBooksId" placeholder="Enter google books id" name="googleBooksId" value="{{ isset($book['googleBooksId']) ? $book['googleBooksId'] : ( isset($book['id']) ? $book['id'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="kind" >Kind:</label>
            <input type="text" class="form-control" id="kind" placeholder="Enter kind" name="kind" value="{{ isset($book['kind']) ? $book['kind'] : '' }}" />
        </div>
        <div class="form-group">
            <label for="publishedDate" >Published Date:</label>
            <input type="text" class="form-control" id="publishedDate" placeholder="Enter published date" name="publishedDate" value="{{ isset($book['publishedDate']) ? $book['publishedDate'] : ( isset($book['volumeInfo']['publishedDate']) ? $book['volumeInfo']['publishedDate'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="isbn10Identifier" >isbn 10 Identifier:</label>
            <input type="text" class="form-control" id="isbn10Identifier" placeholder="Enter isbn 10 identifier" name="isbn10Identifier" value=
                "{{ isset($book['isbn10Identifier']) ? $book['isbn10Identifier'] : 
                    ( 
                        ( ( isset( $book['volumeInfo']['industryIdentifiers'][0]['identifier'] ) || isset( $book['volumeInfo']['industryIdentifiers'][1]['identifier'] ) ) && $book['volumeInfo']['industryIdentifiers'][0]['type'] != 'OTHER' ) ? 
                        (
                            $book['volumeInfo']['industryIdentifiers'][0]['type']  == 'ISBN_10' ?
                                $book['volumeInfo']['industryIdentifiers'][0]['identifier']  : 
                            (
                                $book['volumeInfo']['industryIdentifiers'][1]['type'] == 'ISBN_10' ?
                                    $book['volumeInfo']['industryIdentifiers'][1]['identifier']  : ''
                            )
                        ) : ''   
                    ) 
                }}" 
            />
        </div>
        <div class="form-group">
            <label for="isbn13Identifier" >isbn 13 Identifier:</label>
            <input type="text" class="form-control" id="isbn13Identifier" placeholder="Enter isbn 13 identifier" name="isbn13Identifier" value=
                "{{ isset($book['isbn13Identifier']) ? $book['isbn13Identifier'] : 
                        ( 
                            ( ( isset( $book['volumeInfo']['industryIdentifiers'][0]['identifier'] ) || isset( $book['volumeInfo']['industryIdentifiers'][1]['identifier'] ) ) && $book['volumeInfo']['industryIdentifiers'][0]['type'] != 'OTHER' ) ? 
                            (
                                $book['volumeInfo']['industryIdentifiers'][0]['type'] == 'ISBN_13' ?
                                    $book['volumeInfo']['industryIdentifiers'][0]['identifier']  : 
                                (
                                    $book['volumeInfo']['industryIdentifiers'][1]['type'] == 'ISBN_13' ?
                                        $book['volumeInfo']['industryIdentifiers'][1]['identifier']  : ''
                                )
                            ) : ''   
                        ) 
                }}"
            />
        </div>
        <div class="form-group">
            <label for="publisher" >Publisher:</label>
            <input type="text" class="form-control" id="publisher" placeholder="Enter publisher" name="publisher" value="{{ isset($book['publisher']) ? $book['publisher'] : ( isset($book['volumeInfo']['publisher']) ? $book['volumeInfo']['publisher'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="infoLink" >Info Link:</label>
            <input type="text" class="form-control" id="infoLink" placeholder="Enter info link" name="infoLink" value="{{ isset($book['infoLink']) ? $book['infoLink'] : ( isset($book['volumeInfo']['infoLink']) ? $book['volumeInfo']['infoLink'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="title" >Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ isset($book['title']) ? $book['title'] : ( isset($book['volumeInfo']['title']) ? $book['volumeInfo']['title'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="author" >Author:</label>
            <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="{{ isset($book['author']) ? $book['author'] : ( isset($book['volumeInfo']['authors']) ? $book['volumeInfo']['authors'][0] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="description" >Description:</label>
            <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ isset($book['description']) ? $book['description'] : ( isset($book['volumeInfo']['description']) ? $book['volumeInfo']['description'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="pageCount" >Page Count:</label>
            <input type="text" class="form-control" id="pageCount" placeholder="Enter page count" name="pageCount" value="{{ isset($book['pageCount']) ? $book['pageCount'] : ( isset($book['volumeInfo']['pageCount']) ? $book['volumeInfo']['pageCount'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="thumbnailSmall" >Thumbnail Small:</label>
            <input type="text" class="form-control" id="thumbnailSmall" placeholder="Enter thumbnail small link" name="thumbnailSmall" value="{{ isset($book['thumbnailSmall']) ? $book['thumbnailSmall'] : ( isset($book['volumeInfo']['imageLinks']['thumbnailSmall']) ? $book['volumeInfo']['imageLinks']['thumbnailSmall'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="thumbnail" >Thumbnail:</label>
            <input type="text" class="form-control" id="thumbnail" placeholder="Enter thumbnail link" name="thumbnail" value="{{ isset($book['thumbnail']) ? $book['thumbnail'] : ( isset($book['volumeInfo']['imageLinks']['thumbnail']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="coverSmall" >Cover Small:</label>
            <input type="text" class="form-control" id="coverSmall" placeholder="Enter cover small link" name="coverSmall" value="{{ isset($book['coverSmall']) ? $book['coverSmall'] : ( isset($book['volumeInfo']['imageLinks']['coverSmall']) ? $book['volumeInfo']['imageLinks']['coverSmall'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="coverMedium" >Cover Medium:</label>
            <input type="text" class="form-control" id="coverMedium" placeholder="Enter cover medium link" name="coverMedium" value="{{ isset($book['coverMedium']) ? $book['coverMedium'] : ( isset($book['volumeInfo']['imageLinks']['coverMedium']) ? $book['volumeInfo']['imageLinks']['coverMedium'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="coverLarge" >Cover Large:</label>
            <input type="text" class="form-control" id="coverLarge" placeholder="Enter cover large link" name="coverLarge" value="{{ isset($book['coverLarge']) ? $book['coverLarge'] : ( isset($book['volumeInfo']['imageLinks']['coverLarge']) ? $book['volumeInfo']['imageLinks']['coverLarge'] : '' ) }}" />
        </div>
        <div class="form-group">
            <label for="coverExtralarge" >Cover Extra Large:</label>
            <input type="text" class="form-control" id="coverExtralarge" placeholder="Enter cover extra large link" name="coverExtralarge" value="{{ isset($book['coverExtralarge']) ? $book['coverExtralarge'] : ( isset($book['volumeInfo']['imageLinks']['coverExtralarge']) ? $book['volumeInfo']['imageLinks']['coverExtralarge'] : '' ) }}" />
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>