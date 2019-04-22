@extends('layouts.app')

@section('header')

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                        <router-view name="libraryIndex"></router-view>
                        <router-view></router-view>
            </div>
        </div>
    </div>
@endsection

