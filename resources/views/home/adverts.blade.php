@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-3 sidebar">
                <div class="list-group">
                    @foreach($categories as $category)
                        @if($category->id == $active_id)
                            <a href="/advert/{{$category->id}}" class="list-group-item list-group-item-action list-group-item-success">{{ $category->name }}</a>
                        @else
                            <a href="/advert/{{$category->id}}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-9 offset-3">
                <button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Додати оголошення</button>
                <div class="row">
                    @foreach($adverts as $advert)
                    <div class="col-xl-4 col-md-6">
                        <div class="card mt-3" style="width: auto;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $advert->title }}</h5>
                                <p class="card-text">{{ $advert->description }}</p>
                                <a href="#" class="card-link">Card link</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
