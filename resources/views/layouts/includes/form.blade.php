@if($project->exists)
    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <div class="row">    
        <div class="col-6 mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title)}}">
        </div>
        <div class=" col-6 mb-3">
            {{-- Da gestire --}}
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" value="{{ old('slug', $project->slug)}}" disabled>
        </div>
        <div class="col-3 mb-3">
            <label for="end_date" class="form-label">Data fine progetto</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date)}}">
        </div>
        <div class="col-8 mb-3">
            <label for="preview_project" class="form-label">Anteprima Progetto</label>
            <input type="file" class="form-control" id="preview_project" name="preview_project" value="{{ old('preview_project', $project->preview_project)}}">
        </div>
        <div class="col-1 align-self-center">
            <img class="img-fluid" id="preview" src="{{old('preview_project', $project->preview_project)
             ? asset('storage/' . old('preview_project', $project->preview_project))
             : 'https://marcolanci.it/boolean/assets/placeholder.png' }}" alt="">
        </div>
        <div class="mb-3 col-12">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="10" name="description">{{ old('description', $project->description)}}</textarea>
        </div>
        <div class="col d-flex justify-content-between">
            <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna Indietro</a>
            <div class="d-flex align-items-center gap-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" @if(old('is_published', '')) @endif>
                    <label class="form-check-label" for="is_published">Pubblico</label>
                </div>
                <button class="btn btn-secondary" type="reset">Svuota</button>
                <button class="btn btn-success" type="submit">Salva</button>
            </div>
        </div>
    </div>
</form>