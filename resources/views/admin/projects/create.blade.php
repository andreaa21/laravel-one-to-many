@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 class="my-3">CREA UN NUOVO PROGETTO</h5>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nome Progetto">
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Nome Cliente</label>
                <input type="text" class="form-control" id="client_name" name="client_name"
                    value="{{ old('client_name') }}" placeholder="Nome Cliente">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">immagine</label>
                <input type="file" class="form-control" id="cover_umage" name="cover_image"
                    value="{{ old('cover_image'), $project->cover_image }}" placeholder="immagine">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Descrizione</label>
                <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>

        </form>
    </div>
@endsection
