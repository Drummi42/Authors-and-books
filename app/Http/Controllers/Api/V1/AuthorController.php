<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\AuthorRequest;
use App\Models\Library\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /** @var Author $model  */
    private $model;


    function __construct()
    {
        $this->model = new Author;
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

        return $this->model->getAllAuthorsWithBooks(true, $request->page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $this->model->name = $request->name;
        $this->model->surname = $request->surname;
        $this->model->slug = Str::slug($request->name.' '.$request->surname);
        $res = $this->model->save();

        $this->model->books()->sync($request->books);

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
        $author = Author::findOrFail($id);
        $author->books;

        return $author;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        $author->books()->sync($request->books);

        return $author;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Author::destroy($id)) ? response('true', 200) : response('false', 422);
    }
}
