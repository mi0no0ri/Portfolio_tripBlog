@extends('layouts.toppage')

@section('content')

<h2 id="gallery_title" class="profile_title">{{ config("tag.tag_area.$area->area_id") }}</h2>
<div class="gallery_wrap">
    @foreach($galleries as $gallery)
    <div class="gallery_contents">
        <a href="/gallery/{{$gallery->user_id}}/{{$gallery->pref}}" class="gallery_link"></a>
            @if($gallery->image == null)
                <a href="/profile/{{$gallery->user_id}}" class="gallery_image_link"><i class="fa-solid fa-user fa-8x fa_gallery"></i></a>
            @else
                <a href="/profile/{{$gallery->user_id}}" class="gallery_image_link"><img src="/image/{{$gallery->image}}" class="gallery_image"></a>
            @endif
            <table>
            <tr class="gallery_section">
                <td class="">Name：{{$gallery->username}}</td>
                @if($gallery->pref == 0)
                @else
                <td class="">Prefecture：{{config("tag.tag_pref.$gallery->pref")}}</td>
                @endif
                <td class="">Date：{{$gallery->date}}</->
            </tr>
            </table>
    </div>
    @endforeach
</div>


@endsection