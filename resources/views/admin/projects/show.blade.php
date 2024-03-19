@extends('layouts.app')

@section('content')
<section class="container">
    <div class="card mt-5">
        <div class="card-title text-center p-2 mb-0">
            <h2 class="mb-0">{{$project->title}}</h2>
        </div>
        <div class="card-body">
            <p>{{$project->description}}</p>
        </div>
    </div>
</section>
@endsection