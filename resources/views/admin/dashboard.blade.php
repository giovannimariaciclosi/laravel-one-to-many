@extends('layouts/admin')

@section('content')

<div class="container">
  <h1 class="mt-5">Il tuo porfolio</h1>

  <hr>
  <div class="container d-flex justify-content-around align-items-center mt-4">
    <a href="{{route('admin.projects.index')}}" type="button" class="btn btn-primary">Vedi i tuoi progetti</a>
    <a href="{{route('admin.projects.create')}}" class="btn btn-success" type="button">Aggiungi un nuovo progetto</a>
  </div>
</div>

    
@endsection