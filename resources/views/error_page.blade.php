@extends('layouts.app')

@section('content')
    <img src="{{ asset('img/evan-dennis-i--IN3cvEjg-unsplash.jpg') }}" alt="" srcset="" class="img-fluid">
    <h1 style="left:32%;top:65%;position:absolute;font-size:80px">
        <p class="text-white bg-dark font-italic">Are You Lost?</p>
    </h1>
    <h5 style="left:32%;top:80%;position:absolute;">
        <p class="text-white bg-dark font-italic">Maybe you should ask more questions...</p>
    </h5>
    <a href="/" class="btn btn-outline-light btn-lg " role="button" aria-disabled="true" style="left:42%;top:86%;position:absolute">Lead Me to the Right Way</a>
@endsection