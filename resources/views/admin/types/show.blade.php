@extends('layouts/admin')

@section('content')

<div class="container">
  <h1>Tutti i porgetti {{$type->name}}</h1>

  @if( count($type->projects) > 0)
  <table class="mt-5 table table-striped">
    <thead>
      <th>Titolo</th>
      <th>Slug</th>
      <th></th>
    </thead>

    <tbody>
      @foreach ($type->projects as $project)
        <tr>
          <td>{{$project->title}}</td>
          <td>{{$project->slug}}</td>
          <td><a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @else
    <em>Nessun progetto di questo tipo.</em>
  @endif  

</div>

<div class="container mt-5 mb-5 d-flex justify-content-start">
  <a href="{{route('admin.types.index')}}"><button class="btn btn-primary">Torna indietro</button></a>
</div>

@endsection