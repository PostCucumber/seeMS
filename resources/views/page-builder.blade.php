@extends('layouts.page')
@section('content')
    <page-builder
        v-bind:elements= "[
            @foreach($elements as $element)
                '{{ $element->name }}',
            @endforeach
        ]"
    >
    </page-builder>
@endsection