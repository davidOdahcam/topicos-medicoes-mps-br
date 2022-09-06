@extends('layouts.main')

@push('title')
    Lista de Usuários
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="text-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Usuários</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="filter_project_id" class="form-label">Projeto</label>
                                        <select class="form-control" name="filter_project_id" id="filter_project_id">
                                            <option value="">Selecione</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ ($project->id == $filter_project_id) ? 'selected' : '' }}>{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Propósito</label>
                                        <input class="form-control" type="text" name="filter_name"
                                            placeholder="Propósito"
                                            value="{{ $filter_name ?? '' }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Data ínicio</label>
                                        <input class="form-control" type="date" name="filter_from" value="{{ $filter_from ?? '' }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Data fim</label>
                                        <input class="form-control" type="date" name="filter_to" value="{{ $filter_to ?? '' }}" />
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <button class="btn btn-primary mt-auto">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="m-sm-4 table-responsive">
                                <table id="myTable" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Projeto</th>
                                            <th>Porpósito</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($purposes as $purpose)
                                            <tr>
                                                <td>{{ $purpose->project->name }}</td>
                                                <td>{{ $purpose->name }}</td>
                                                <td>{{ $purpose->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <form action="{{ route('purposes.destroy', $purpose->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr colspan="4">
                                                <td>Nenhum resultado encontrado</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($purposes->hasPages())
                            <div class="card-footer">
                                {{ $purposes->appends(request()->input())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
