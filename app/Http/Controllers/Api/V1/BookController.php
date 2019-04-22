<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\BookRequest;
use App\Models\Library\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BookController extends Controller
{
    private $model;


    function __construct()
    {
        $this->model = new Book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request->page))
            $request->page = 1;

        return $this->model->getAllBooksWithAuthors($request->page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $this->model->title = $request->title;
        $this->model->description = $request->description;
        $this->model->slug = Str::slug($request->title);
        $res = $this->model->save();

        return ($res)? response('true',200): response('false', 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $book->authors;

        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Book::destroy($id)) ? response('true',200) : response('false', 422);
    }

    /**
     * Список книг json
     *
     * @return Book[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getList()
    {
        return $this->model->getListforApi();
    }
}
