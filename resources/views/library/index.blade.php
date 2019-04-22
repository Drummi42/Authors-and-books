@extends('layouts.app')

@section('header')

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>Библиотека</h1>
                        <a href="{{ route('admin.library') }}" class="btn btn-primary">Админка</a>
                    </div>
                    <div class="card-body justify-content-center">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Автор</th>
                                <th>Книги</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->name }} {{ $author->surname}}</td>
                                    <td>
                                        @foreach($author->books as $book)
                                            "{{$book->title}}",&nbsp;
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $authors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

