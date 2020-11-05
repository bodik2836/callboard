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
                <button type="button" class="btn btn-outline-success btn-lg btn-block mb-3" data-toggle="modal" data-target="#exampleModal" >Додати оголошення</button>
                @if(session()->has('status'))
                    @if(session('status')['type'] == 'success')
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('status')['msg'] }}
                        </div>
                    @elseif(session('status')['type'] == 'error')
                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('status')['msg'] }}
                        </div>
                    @endif
                @endif
                <div class="text-center">Недавно додані</div>
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
