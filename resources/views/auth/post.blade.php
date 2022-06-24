@extends('auth.loginpage')

@section('content')
<h2>Post</h2>

<form action="" method="POST">
{{ csrf_field() }}

    <div>
        <label for="dest">Destination</label>
        <input type="text" name="dest">
    </div>
    <div>
        <label for="date">date</label>
        <input type="text" name="date">
    </div>
    <div>
        <div>
            <label for=""></label>
            <input type="text" name="">
        </div>
        <div>
            <label for="comment">comment</label>
            <input type="text" name="comment">
        </div>
        <div>
            <label for="category">category</label>
            <input type="text" name="category">
        </div>
    </div>
    <input type="button" value="post">

</form>
@endsection