<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'surname',
        'slug'
    ];
    //

    public function getAllAuthorsWithBooks($withPaginate = false, $currentPage = null, $perPage = 10)
    {
        $data = self::orderBy('created_at', 'desc')->paginate($perPage);
        $data->map(function($author) {
            return $author->books;
        });

        return $data;
    }

    /**
     * Связь авторов с книгами Многие ко многим
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Library\Book');
    }
}
