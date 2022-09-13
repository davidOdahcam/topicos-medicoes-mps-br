@extends('layouts.main')

@push('title')
    Lista de Diretrizes
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Diretrizes</h1>
                        <a href="{{ route('directives.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Diretriz</label>
                                        <input class="form-control" type="text" name="filter_name" placeholder="Diretriz"
                                            value="{{ $filter_name ?? '' }}" />
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
                                            <th>Nome</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($directives as $directive)
                                            <tr>
                                                <td>{{ $directive->name }}</td>
                                                <td>{{ $directive->created_at->format('d/m/Y') }}</td>
                                                <td width="180px" data-name="{{ $directive->name }}"
                                                    data-id="{{ $directive->id }}">
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
                        @if ($directives->hasPages())
                            <div class="card-footer">
                                {{ $directives->appends(request()->input())->links() }}
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nome da diretriz</label>
                                <input class="form-control" type="text" name="name" placeholder="Nome da diretriz"
                                    readonly maxlength="191" />
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
                                    <label class="form-label">Nome da diretriz</label>
                                    <input class="form-control" type="text" name="name"
                                        placeholder="Nome da diretriz" required maxlength="191" />
                                    @error('name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Selecione o propósito</label>
                                    <select name="purpose_id" class="form-select" required>
                                        <option value="">Selecione um propósito</option>
                                    </select>
                                    @error('purpose_id')
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
                    <p>Tem certeza que deseja remover a diretriz <strong id="projectDeleteModalName"></strong>?</p>
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

                $.ajax({
                    url: `/api/directives/${id}`,
                    method: 'GET',
                    success: function(data) {
                        $('#viewModalTitle').text(data.data.name);
                        $('#viewModal input[name="name"]').val(data.data.name);
                        $('#viewModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });

            $('.btn-modal-edit').on('click', function() {
                const id = $(this).closest('td').data('id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('directives.update', '_id') }}";
                $('#editModal').find('form').attr('action', action.replace('_id', id));
                $('#editModalTitle').html('Editar diretriz ' + name);
                $('#editModal').find('input[name="name"]').val(name);
                $.ajax({
                    url: `/api/purposes`,
                    method: 'GET',
                    success: function(data) {
                        const purposes = data.data;
                        const select = $('#editModal').find('select[name="purpose_id"]');
                        select.empty();
                        select.append('<option value="">Selecione um propósito</option>');
                        purposes.forEach(purpose => {
                            select.append(
                                `<option value="${purpose.id}">${purpose.name}</option>`
                                );
                        });
                        $('#editModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
                $('#editModal').modal('show');
            });

            $('.btn-modal-delete').on('click', function() {
                const id = $(this).closest('td').attr('data-id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('directives.destroy', '_id') }}";
                $('#deleteModal').find('form').attr('action', action.replace('_id', id));
                $('#projectDeleteModalName').html(name);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endpush
