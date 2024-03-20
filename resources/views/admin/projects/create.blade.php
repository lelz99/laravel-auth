@extends('layouts.app')

@section('content')
<section class="container">
    <form action="{{route('admin.projects.store')}}" method="POST" class="row">
        @csrf
        <div class="col-6 mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class=" col-6 mb-3">
            {{-- Da gestire --}}
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" disabled>
        </div>
        <div class="col-2 mb-3">
            <label for="end_date" class="form-label">Data fine progetto</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <div class="col-8 mb-3">
            <label for="preview_project" class="form-label">Anteprima Progetto</label>
            <input type="url" class="form-control" id="preview_project" name="preview_project">
        </div>
        <div class="col-2">
            {{-- Gestire preview --}}
        </div>
        <div class="mb-3 col-12">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="10" name="description"></textarea>
        </div>
        <div class="col d-flex justify-content-between">
            <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna Indietro</a>
            <div class="d-flex align-items-center gap-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Pubblica</label>
                </div>
                <button class="btn btn-secondary" type="reset">Svuota</button>
                <button class="btn btn-success" type="submit">Salva</button>
            </div>
        </div>
    </form>
</section>
@endsection