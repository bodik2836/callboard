@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-3 sidebar">
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="/advert/{{$category->id}}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-9 offset-3">
                <button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" >Додати оголошення</button>
                <div class="text-center mt-3">Недавно додані</div>
                <div class="row">
                    @foreach($adverts as $advert)
                        <div class="col-xl-4 col-md-6">
                            <div class="card mt-3" style="width: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $advert->title }}</h5>
                                    <p class="card-text">{{ $advert->description }}</p>
                                    <div class="row">
                                        <h6 class="card-subtitle text-muted col-6">{{ $advert->updated_at->format('d.m.Y') }}</h6>
                                        <h6 class="card-subtitle text-muted text-right col-6">{{ $advert->updated_at->format('H:i') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
