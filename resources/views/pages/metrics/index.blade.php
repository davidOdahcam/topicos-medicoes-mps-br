@extends('layouts.main')

@push('title')
    Lista de Métricas
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Métricas</h1>
                        <a href="{{ route('metrics.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Métrica</label>
                                        <input class="form-control" type="text" name="filter_term" placeholder="Métrica"
                                            value="{{ $filter_term ?? '' }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Data ínicio</label>
                                        <input class="form-control" type="date" name="filter_from"
                                            value="{{ $filter_from ?? '' }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Data fim</label>
                                        <input class="form-control" type="date" name="filter_to"
                                            value="{{ $filter_to ?? '' }}" />
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
                                            <th>Termo</th>
                                            <th>Fonte</th>
                                            <th>Tipo</th>
                                            <th>Formato</th>
                                            <th>Indicador</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($metrics as $metric)
                                            <tr>
                                                <td>{{ $metric->term }}</td>
                                                <td>{{ $metric->source }}</td>
                                                <td>{{ $metric->type }}</td>
                                                <td>{{ $metric->format }}</td>
                                                <td>{{ $metric->indicator_type }}</td>
                                                <td>{{ $metric->created_at->format('d/m/Y') }}</td>
                                                <td width="180px" data-term="{{ $metric->term }}"
                                                    data-id="{{ $metric->id }}">
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
                                            <tr colspan="7">
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


@push('modal')
    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Termo</label>
                                <input class="form-control" type="text" name="modal_view_term" placeholder="Termo"
                                    readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Noção</label>
                                <input class="form-control" type="text" name="modal_view_notion" placeholder="Noção"
                                    readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Impacto</label>
                                <input class="form-control" type="text" name="modal_view_impact" placeholder="Impacto"
                                    readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Sinônimo</label>
                                <input class="form-control" type="text" name="modal_view_synonymous"
                                    placeholder="Sinônimo" readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Fonte</label>
                                <input class="form-control" type="text" name="modal_view_source" placeholder="Fonte"
                                    readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <input class="form-control" type="text" name="modal_view_type" placeholder="Tipo"
                                    readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Formato</label>
                                <input class="form-control" type="text" name="modal_view_format"
                                    placeholder="Formato" readonly value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Indicador</label>
                                <input class="form-control" type="text" name="modal_view_indicator_type" readonly
                                    value="{{ old('indicator_type') }}" placeholder="Indicador" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Como calcular</label>
                                <input class="form-control" type="text" name="modal_view_how_to_calculate" readonly
                                    value="" placeholder="Como calcular" />

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Como analisar</label>
                                <input class="form-control" type="text" name="modal_view_how_to_analyze" readonly
                                    value="" placeholder="Como analisar" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editModalForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Termo</label>
                                    <input class="form-control" type="text" name="term" placeholder="Termo"
                                        required value="{{ old('term') }}" />
                                    @error('term')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Objetivo</label>
                                    <select name="objective_id" class="form-select " required>
                                        <option value="">Selecione um objetivo</option>
                                    </select>
                                    @error('objective_id')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Noção</label>
                                    <input class="form-control" type="text" name="notion" placeholder="Noção"
                                        required value="{{ old('notion') }}" />
                                    @error('notion')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Impacto</label>
                                    <input class="form-control" type="text" name="impact" placeholder="Impacto"
                                        required value="{{ old('impact') }}" />
                                    @error('impact')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Sinônimo</label>
                                    <select name="synonymous" class="form-select ">
                                        <option value="">Selecione um sinônimo</option>
                                    </select>
                                    @error('synonymous')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Fonte</label>
                                    <input class="form-control" type="text" name="source" placeholder="Fonte"
                                        required value="{{ old('source') }}" />
                                    @error('source')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <input class="form-control" type="text" name="type" placeholder="Tipo"
                                        required value="{{ old('type') }}" />
                                    @error('type')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Formato</label>
                                    <input class="form-control" type="text" name="format" placeholder="Formato"
                                        required value="{{ old('format') }}" />
                                    @error('format')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Indicador</label>
                                    <input class="form-control" type="text" name="indicator_type" required
                                        value="{{ old('indicator_type') }}" placeholder="Indicador" />
                                    @error('indicator_type')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Como calcular</label>
                                    <input class="form-control" type="text" name="how_to_calculate" required
                                        value="{{ old('how_to_calculate') }}" placeholder="Como calcular" />
                                    @error('how_to_calculate')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Como analisar</label>
                                    <input class="form-control" type="text" name="how_to_analyze" required
                                        value="{{ old('how_to_analyze') }}" placeholder="Como analisar" />
                                    @error('how_to_analyze')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" form="editModalForm" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalTitle">Remover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteModalForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Tem certeza que deseja remover a métrica <strong id="projectDeleteModalName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button class="btn btn-danger" form="deleteModalForm">Remover</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script>
        $(function() {
            $('.btn-modal-view').on('click', function() {
                const id = $(this).closest('td').data('id');
                const term = $(this).closest('td').data('term');
                $('#viewModalTitle').html(term);
                $('#viewModal').modal('show');
                $.ajax({
                    url: '/api/metrics/' + id,
                    type: 'GET',
                    success: function(data) {
                        Object.keys(data.data).forEach((item) => {
                            if (item === 'synonymous') {
                                $(`input[name=modal_view_${item}]`).val(data.data.synonymin.term);
                            } else {
                                $(`input[name=modal_view_${item}]`).val(data.data[item]);
                            }
                        });
                    }
                });
            });

            $('.btn-modal-edit').on('click', function() {
                const id = $(this).closest('td').data('id');
                const term = $(this).closest('td').data('term');
                const action = "{{ route('metrics.update', '_id') }}";
                $('#editModal').find('form').attr('action', action.replace('_id', id));
                $('#editModalTitle').html('Editar métrica ' + term);
                $('#editModal').modal('show');
                $.ajax({
                    url: '/api/metrics/' + id,
                    type: 'GET',
                    success: function(data) {
                        Object.keys(data.data).forEach((item) => {
                            $(`input[name=${item}]`).val(data.data[item]);
                        });
                    }
                });
                $.ajax({
                    url: '/api/objectives',
                    type: 'GET',
                    success: function(data) {
                        const select = $('#editModal').find('select[name=objective_id]');
                        select.html('');
                        data.data.forEach((item) => {
                            select.append(`<option value="${item.id}">${item.name}</option>`);
                        });
                    }
                })
            });

            $('.btn-modal-delete').on('click', function() {
                const id = $(this).closest('td').attr('data-id');
                const term = $(this).closest('td').data('term');
                const action = "{{ route('metrics.destroy', '_id') }}";
                $('#deleteModal').find('form').attr('action', action.replace('_id', id));
                $('#projectDeleteModalName').html(term);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endpush
