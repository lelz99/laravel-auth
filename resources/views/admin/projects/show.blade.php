@extends('layouts.app')

@section('content')
<section class="container">
  <h1 class="my-5">Project</h1>
  <div class="card mb-3">
    <div class="row g-0">
      <div class="card-header">
        <h2 class="card-title">{{$project->title}}</h2>
      </div>
      <div class="col-md-4">
        <img src="{{$project->preview_project}}" class="img-fluid w-100 h-100" alt="{{$project->title}}">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">{{$project->description}}</p>
          <p class="card-text mb-0"><strong>Data fine Progetto:</strong> {{$project->end_date}}</p>
          <p class="card-text"><strong>Pubblicato:</strong> {{$project->is_published ? 'Si' : 'No'}}</p>
        </div>
        <div class="d-flex justify-content-between p-3">
          <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Torna Indietro</a>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Elimina</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</section>
@endsection