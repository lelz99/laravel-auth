@extends('layouts.app')

@section('content')
<section class="container mt-5">
    @session('message')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$value}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endsession
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Data</th>
            <th scope="col">Link</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)                
            <tr>
              <th scope="row">{{$project->id}}</th>
              <td>{{$project->title}}</td>
              <td>{{$project->date}}</td>
              <td>
                <a href="{{$project->link_project}}">{{$project->link_project}}</a>
            </td>
              <td class="d-flex gap-1">
                <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary"><i class="fa-regular fa-eye"></i></a>                
                <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>  
                <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>            
            </td>
            </tr>
            @empty
            <td colspan="5" class="text-center">
                <h2>Non ci sono progetti</h2>
            </td>
            @endforelse
        </tbody>
      </table>
</section>
@endsection