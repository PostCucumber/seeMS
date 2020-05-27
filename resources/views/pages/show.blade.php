@extends('layouts.app')
@section('content')
    <section class="mx-20 mt-10">
       <page
           v-bind:components= "[
               'columns',
               'search-box'
           ]"
       >
       </page> 
    </section>
@endsection