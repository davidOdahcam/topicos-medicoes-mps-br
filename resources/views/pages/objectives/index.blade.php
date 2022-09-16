@extends('layouts.main')

@push('title')
    Lista de Objetivos
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Objetivos</h1>
                        <a href="{{route('objectives.create')}}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Objetivo</label>
                                        <input class="form-control" type="text" name="filter_name"
                                            placeholder="Objetivo"
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
                                            <th>Nome</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($objectives as $objective)
                                            <tr>
                                                <td>{{ $objective->name }}</td>
                                                <td>{{ $objective->created_at->format('d/m/Y') }}</td>
                                                <td width="180px" data-name="{{ $objective->name }}" data-id="{{ $objective->id }}">
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
                                            <tr colspan="3">
                                                <td>Nenhum resultado encontrado</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($objectives->hasPages())
                            <div class="card-footer">
                                {{ $objectives->appends(request()->input())->links() }}
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
                    <h5 class="modal-title" id="viewModalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nome do objetivo</label>
                            <input class="form-control" type="text" name="name" placeholder="Nome do objetivo" readonly maxlength="191" />
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
                                    <label class="form-label">Nome do objetivo</label>
                                    <input class="form-control" type="text" name="name" placeholder="Nome do objetivo"
                                        required maxlength="191" />
                                    @error('name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 d-none">
                                <div class="mb-3">
                                    <label class="form-label">Selecione as diretrizes</label>
                                    <select name="directive_id[]" class="form-select form-select-lg" multiple required>
                                    </select>
                                    @error('directive_id')
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
                    <p>Tem certeza que deseja remover o objetivo <strong id="projectDeleteModalName"></strong>?</p>
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
                $('#viewModalTitle').html('Visualizar objetivo');
                $.ajax({
                    url: '/api/objectives/' + id,
                    type: 'GET',
                    success: function(data){
                        $('input[name="name"]').val(data.data.name);
                        $('#viewModal').modal('show');
                    }
                });
            });

            $('.btn-modal-edit').on('click', function() {
                const id = $(this).closest('td').data('id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('objectives.update', '_id') }}";
                $('#editModal').find('form').attr('action', action.replace('_id', id));
                $('#editModalTitle').html('Editar objetivo ' + name);
                $('#editModal').find('input[name="name"]').val(name);
                $('#editModal').find('select[name="directive_id[]"]').html('');
                $.ajax({
                    url: '/api/directives/',
                    type: 'GET',
                    success: function(data){
                        data.data.forEach(element => {
                            $('#editModal').find('select[name="directive_id[]"]').append('<option value="' + element.id + '">' + element.name + '</option>');
                        });
                        $('#editModal').modal('show');
                    }
                });
                $('#editModal').modal('show');
            });

            $('.btn-modal-delete').on('click', function() {
                const id = $(this).closest('td').attr('data-id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('objectives.destroy', '_id') }}";
                $('#deleteModal').find('form').attr('action', action.replace('_id', id));
                $('#projectDeleteModalName').html(name);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endpush

