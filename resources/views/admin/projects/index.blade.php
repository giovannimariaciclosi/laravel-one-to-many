@extends('layouts/admin')

@section('content')

<div class="container">
  <h1>Tutti i progetti</h1>

  <table class="mt-5 table table-striped">
    <thead>
      <th>Titolo</th>
      <th>Descrizione</th>
      <th>Slug</th>
      <th>Github Repository</th>
      <th>Comandi</th>
    </thead>
  
    <tbody>
      @foreach($projects as $project)
      <tr >
        <td>{{$project->title}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->slug}}</td>
        <td><a href="{{$project->github_repository}}" target="_blank">{{$project->github_repository}}</a></td>
        <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="container">
  <a href="{{route('admin.projects.create')}}" class="btn btn-success mb-5 mt-2" type="button">Aggiungi nuovo progetto</a>
</div>
@endsection