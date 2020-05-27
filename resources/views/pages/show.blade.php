@extends('layouts.app')
@section('content')
    <section class="mx-20">
        @foreach($pages as $page)
            <div>
                <h2>{{ $page->title }}</h2>
                <p>{{ $page->content }}</p>
            </div>    
        @endforeach
    </section>
@endsection