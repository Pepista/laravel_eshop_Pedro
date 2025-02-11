@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto">
        <div class="h-20"></div>
        <h1 class="text-3xl font-semibold text-center text-white ">Contact us</h1>

        <!-- Inline Style pro Grid -->
        <style>
          
        </style>
        <div class="position-absolute bottom-0">
        @include('components.contact-form')
        </div>
    </div>
@endsection