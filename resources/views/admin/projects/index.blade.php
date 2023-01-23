@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Elenco dei progetti</h1>

        <a href="{{ route('admin.projects.create') }}" class="btn btn-success mt-3">Aggiungi un nuovo progetto</a>

        <div class="row">
            <div class="col mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Nome cliente</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td width="15%">{{ $project->name }} <span
                                        class="badge text-bg-info ms-3">{{ $project->category->name }}</span></td>
                                <td>{{ $project->client_name }}</td>
                                <td>{{ $project->summary }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary mx-1"
                                        title="show"><i class="fa-regular fa-eye"></i></a>
                                    <a class="btn btn-warning mx-1" href="{{ route('admin.projects.edit', $project) }}"
                                        title="edit"><i class="fa-solid fa-pencil"></i></a>
                                    <form onsubmit="return confirm('Vuoi davvero eliminare {{ $project['name'] }}?')"
                                        class="d-inline" action=" {{ route('admin.projects.destroy', $project) }} "
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $projects->links() }}
    </div>
@endsection
