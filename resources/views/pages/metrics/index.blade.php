@extends('layouts.main')

@push('title')
    Lista de Métricas
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="text-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Métricas</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4 table-responsive">
                                <table id="myTable" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Termo</th>
                                            <th>Noção</th>
                                            <th>Impacto</th>
                                            <th>Sinônimo</th>
                                            <th>Fonte</th>
                                            <th>Tipo</th>
                                            <th>Formato</th>
                                            <th>Indicador</th>
                                            <th>Como calcular</th>
                                            <th>Como analisar</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($metrics as $metric)
                                            <tr>
                                                <td>{{ $metric->term }}</td>
                                                <td>{{ $metric->notion }}</td>
                                                <td>{{ $metric->impact }}</td>
                                                <td>{{ optional($metric->synonymin)->term ?? 'Não informado' }}</td>
                                                <td>{{ $metric->source }}</td>
                                                <td>{{ $metric->type }}</td>
                                                <td>{{ $metric->format }}</td>
                                                <td>{{ $metric->indicator_type }}</td>
                                                <td>{{ $metric->how_to_calculate }}</td>
                                                <td>{{ $metric->how_to_analyze }}</td>
                                                <td>{{ $metric->created_at->format('d/m/Y') }}</td>
                                                <td width="180px" data-name="{{ $metric->name }}" data-id="{{ $metric->id }}">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success btn-modal-view">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-primary btn-modal-edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-modal-delete">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr colspan="12">
                                                <td>Nenhum resultado encontrado</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($metrics->hasPages())
                            <div class="card-footer">
                                {{ $metrics->appends(request()->input())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
