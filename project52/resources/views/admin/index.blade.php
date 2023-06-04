@extends('layouts.admin.main')

@section('title', 'Admin Panel Home Page')


@section('content')
      @include('admin._header')
      @include('admin._sidebar')
      @include('admin._content')
@endsection