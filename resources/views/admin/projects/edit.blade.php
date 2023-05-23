@extends('layouts.admin')

@section('content')

<main>
  <div class="container mb-3 mt-3">
    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
      @csrf

      @method('PUT')
  
      <div class="mb-3">
        <label for="title">Titolo</label>
        {{-- utilizzo le classi di bootstrap per gestire gli errori --}}
        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $project->title}}">
        @error('title')
          {{-- se c'è un errore visualizzo il messaggio di errore del campo specificato --}}
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="description">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
        @error('description')
          {{-- se c'è un errore visualizzo il messaggio di errore del campo specificato --}}
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="slug">Slug</label>
        <input class="form-control @error('slug') is-invalid @enderror" type="text" id="slug" name="slug" value="{{old('title') ?? $project->title}}" placeholder="Deve essere uguale al campo Titolo">
        @error('slug')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="github_repository">Link Repository Github</label>
        <input class="form-control @error('github_repository') is-invalid @enderror" type="text" id="github_repository" name="github_repository" value="{{old('github_repository') ?? $project->github_repository}}">
        @error('github_repository')
          {{-- se c'è un errore visualizzo il messaggio di errore del campo specificato --}}
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>

      <button class="btn btn-success" type="submit">Salva modifiche</button>
    </form>
  </div>
</main>
@endsection