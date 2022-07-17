@extends('layouts.toppage')

@section('content')
<div>
    @foreach($categorys as $category)
    <p>{{ $category->comment }}</p>
    @endforeach
</div>
@endsection