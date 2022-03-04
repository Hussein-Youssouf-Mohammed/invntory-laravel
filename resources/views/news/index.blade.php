@extends('layouts.app')

@section('content')

@foreach ($news as $new)

  <img src="{{ $new['urlToImage'] }}" alt="">
  <p>{{ $new['description'] }}</p>
@endforeach

@endsection
