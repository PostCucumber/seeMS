@extends('layouts.app')
@section('content')

    <page-builder
        {{-- elements="{{ $elements }}" --}}
        v-bind:elements= "[
            @foreach($elements as $element)
                '{{ $element->name }}',
            @endforeach
        ]"
        {{-- elements="
            @foreach($elements as $element)
                {{ $element->name }}
            @endforeach
        " --}}
    >
        {{-- @foreach($elements as $element)
            {{ $element->name }}
        @endforeach --}}
    </page-builder>
@endsection