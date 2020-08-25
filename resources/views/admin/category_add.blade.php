@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-2">Додати категорію</h2>
        <hr>
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Назва категорії</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <input class="btn btn-primary" type="submit" value="Додати">
        </form>
    </div>
@endsection
