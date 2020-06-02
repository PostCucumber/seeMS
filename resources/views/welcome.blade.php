@extends('layouts.page')
@section('content')
    <main>
        <div class="flex items-center justify-end h-screen w-full text-white bg-no-repeat bg-cover bg-top" style="background-image:url('/images/eye.jpg')">
            <div class="flex flex-wrap w-1/3">
                <h1 class="w-full leading-none text-shadow">seeMS<br></h1>
                <a href="/builder/1">
                    <h3 class="w-full hover:font-bold leading-none text-shadow">
                        start building
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right inline"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </h3>
                </a>
            </div>
        </div>
    </main>
@endsection