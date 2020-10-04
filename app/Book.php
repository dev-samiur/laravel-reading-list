<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['googleBooksId', 'kind', 'publishedDate', 'isbn10Identifier', 'isbn13Identifier', 'publisher', 'infoLink', 'title', 'author', 'description', 'pageCount', 'thumbnailSmall', 'thumbnail', 'coverSmall', 'coverMedium', 'coverLarge', 'coverExtralarge', 'slug', 'publishedYear', 'category', 'amazonLink', 'tier', 'public'];
}
