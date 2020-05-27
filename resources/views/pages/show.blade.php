@extends('layouts.app')
@section('content')
    <section class="mx-20 mt-10">
        @foreach($pages as $page)
            <div class="my-4">
                <h2>{{ $page->title }}</h2>
                <p>{{ $page->content }}</p>
            </div>    
        @endforeach
    </section>
@endsection