@extends('layouts.app')

@section('content')
<section class="container">
    <h2 class="text-center my-5 h1">Project</h2>
    <div class="card">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">{{$project->title}}</h3>
                <a href="{{$project->link_project}}" class="align-self-center h3">{{$project->link_project}}</a>
            </div>
          <h5 class="card-subtitle mb-2 text-body-secondary">{{$project->date}}</h5>
          <p class="card-text">{{$project->description}}</p>
          <div class="d-flex justify-content-between">
              <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Torna Indietro</a>
              <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Elimina</button>
            </form>
          </div>
        </div>
      </div>
</section>
@endsection