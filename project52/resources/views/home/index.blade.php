@extends('layouts.home.main')

@section('title', 'Hotel Management')
@section('description')
     The world's most trusted hotel finder site
@endsection

@section('content')
    @include('home._header')
    @include('home._hero')
    @include('home._aboutus')
    @include('home._service')
    @include('home._homeroom')
    @include('home._testimonial')
    @include('home._blog')
@endsection

