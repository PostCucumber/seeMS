@extends('layouts.app')
@section('content')

    <page-builder
        elements="{{ $elements }}"
    >
        @foreach($elements as $element)
            {{ $element->name }}
        @endforeach
    </page-builder>
@endsection