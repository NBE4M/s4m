   
@extends('layouts.app')
@section('title')
  {!! $posts[0]->meta_title !!}
@stop
@section('desc')
{!! $posts[0]->meta_description !!}
@stop
@section('keyword')
{!! $posts[0]->meta_keyword !!}
@stop
@section('content')


    {!! $posts[0]->full_story !!}
<!-- #intro --> 
@endsection