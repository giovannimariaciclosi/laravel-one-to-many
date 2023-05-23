@extends('layouts/admin')

@section('content')

<div class="container">
  <h1>Tutti i Tipi</h1>

  <table class="mt-5 table table-striped">
    <thead>
      <th>Nome</th>
      <th>Descrizione</th>
      <th>Slug</th>
      <th></th>
    </thead>

    <tbody>
      @foreach ($types as $type)
        <tr>
          <td>{{$type->name}}</td>
          <td>{{$type->description}}</td>
          <td>{{$type->slug}}</td>
          <td><a href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection