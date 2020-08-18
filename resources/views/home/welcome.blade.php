@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-3 sidebar">
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="advert/{{$category->id}}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-9 offset-3">
                <button type="button" class="btn btn-outline-success btn-lg btn-block">Додати оголошення</button>
            </div>
        </div>
    </div>
@endsection
