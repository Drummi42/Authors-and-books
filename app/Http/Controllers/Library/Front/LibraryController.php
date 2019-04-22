<?php

namespace App\Http\Controllers\Library\Front;

use App\Http\Controllers\Library\BaseController;
use App\Models\Library\Author;
use Illuminate\Http\Request;

class LibraryController extends BaseController
{
    //отображение авторов с их книгами
    public function index()
    {
        $authors = (new Author)->getAllAuthorsWithBooks();

        return view('library.index', compact('authors'));
    }
}
