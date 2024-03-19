@extends('layouts.app')

@section('content')
<section class="container mt-5">
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
              <td>
                <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary"><i class="fa-regular fa-eye"></i></a>                
                <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>  
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>                
            </td>
            </tr>
            @empty
                {{-- Inserire --}}
            @endforelse
        </tbody>
      </table>
</section>
@endsection