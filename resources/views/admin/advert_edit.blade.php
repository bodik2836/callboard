@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-2">Редагувати пост</h2>
        <hr>
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ $advert->title }}">
            </div>
            <div class="form-group">
                <label for="name">Опис</label>
                <textarea class="form-control" id="description" name="description">{{ $advert->description }}</textarea>
            </div>
            <input class="btn btn-success" type="submit" value="Додати">
        </form>
    </div>
@endsection
