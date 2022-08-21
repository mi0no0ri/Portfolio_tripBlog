@extends('layouts.toppage')

@section('content')
<div class="category_page">
    <h3>{{ $cateTitle }}</h3>
    <div class="category_wrap">
        @foreach($categories as $category)
            <li>
                <a href="" data-target="modal1" class="modal_open">
                    <img src="/storage/posts/{{$category->image}}" class="pic map_pic">
                </a>
            </li>
        @endforeach
    </div>
</div>
@endsection