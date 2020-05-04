@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@endsection

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Upload Media</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store', 'class' => 'dropzone']) !!}

    {!! Form::close() !!}
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection