@extends('layouts.app')
@section('content')
    @foreach($pages as $page)
        <div>
            <h2>{{ $page->title }}</h2>
            <p>{{ $page->content }}</p>
        </div>    
    @endforeach
@endsection