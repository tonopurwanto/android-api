<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return array_map(function($book) {
            return [
                'id' => $book['id'],
                'title' => $book['title'],
                'author' => $book['author'],
                'bookUrl' => $book['book_url'],
                'imageUrl' => $book['image_url'],
                'displayDate' => (new Carbon($book['display_date'], 'Asia/Jakarta'))->format('F d, Y'),
                'numberOfPages' => $book['number_of_pages']
            ];
        }, Book::latest('id')->get()->toArray());
    }

    public function show(Book $book)
    {
        return [
            'id' => $book->id,
            'title' => $book->title,
            'author' => $book->author,
            'bookUrl' => $book->book_url,
            'imageUrl' => $book->image_url,
            'displayDate' => (new Carbon($book->display_date, 'Asia/Jakarta'))->format('F d, Y'),
            'numberOfPages' => $book->number_of_pages
        ];
    }
}
