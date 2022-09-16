@extends('layouts.main')

@push('title')
    Lista de Projetos
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="h2 mb-3">Listagem de Projetos</h1>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Nome do projeto</label>
                                        <input class="form-control" type="text" name="filter_name"
                                            placeholder="Nome do projeto" value="{{ old('filter_name') }}" required
                                            maxlength="191" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Data ínicio</label>
                                        <input class="form-control" type="date" name="filter_from" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Data fim</label>
                                        <input class="form-control" type="date" name="filter_to" />
                                    </div>
                                    <div class="col-md-3 d-flex">
                                        <button class="btn btn-primary mt-auto">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Criado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                            <tr>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                                <td width="180px" data-name="{{ $project->name }}"
                                                    data-id="{{ $project->id }}">
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
                        @if ($projects->hasPages())
                            <div class="card-footer">
                                {{ $projects->appends(request()->input())->links() }}
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
                    <div class="accordion" id="accordionContainer">

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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Nome do projeto</label>
                                    <input class="form-control" type="text" name="name" placeholder="Nome do projeto"
                                        required maxlength="191" />
                                    @error('name')
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
                    <p>Tem certeza que deseja remover o projeto <strong id="projectDeleteModalName"></strong>?</p>
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
                const name = $(this).closest('td').data('name');
                $('#viewModalTitle').text(name);
                $.ajax({
                    url: '/api/purposes?filter_project_id=' + id,
                    method: 'GET',
                    async: false,
                    success: function(response) {
                        const data = response.data;
                        let html = '';
                        data.forEach(function(purpose) {
                            html += `
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading${purpose.id}">
                                        <button class="accordion-button get-all-info close-accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${purpose.id}" aria-expanded-x="false" aria-controls="collapse-${purpose.id}">
                                            <strong class="pe-1">Propósito: </strong> ${purpose.name}
                                        </button>
                                    </h2>
                                    <div id="collapse-${purpose.id}" class="accordion-collapse collapse" aria-labelledby="heading${purpose.id}" >
                                        <div class="accordion-body">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#accordionContainer').html(html);
                        $('#viewModal').modal('show');
                    }
                });
                $('.get-all-info').on('click', function() {
                    const id = $(this).attr('data-bs-target').replace('#collapse-', '');
                    getAllInfo(id);

                });
                $('.close-accordion').on('click', function() {
                    const expanded = $(this).attr('aria-expanded-x');
                    if (expanded == 'false') {
                        $(this).attr('aria-expanded-x', 'true')
                    } else {
                        $(this).attr('aria-expanded-x', 'false')
                        setTimeout(() => {
                            $(this).parent().next().collapse('hide');
                        }, 400);
                    }
                });
            });

            $('.btn-modal-edit').on('click', function() {
                const id = $(this).closest('td').data('id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('projects.update', '_id') }}";
                $('#editModal').find('form').attr('action', action.replace('_id', id));
                $('#editModalTitle').html('Editar projeto ' + name);
                $('#editModal').find('input[name="name"]').val(name);
                $('#editModal').modal('show');
            });

            $('.btn-modal-delete').on('click', function() {
                const id = $(this).closest('td').attr('data-id');
                const name = $(this).closest('td').attr('data-name');
                const action = "{{ route('projects.destroy', '_id') }}";
                $('#deleteModal').find('form').attr('action', action.replace('_id', id));
                $('#projectDeleteModalName').html(name);
                $('#deleteModal').modal('show');
            });

            const getAllInfo = id => {
                $.ajax({
                    url: '/api/purposes/' + id,
                    method: 'GET',
                    success: function(response) {
                        const data = response.data;
                        let html = '';
                        if (data.directives.length > 0) {
                            data.directives.map(directive => {
                                //random number 6 digits
                                const newId = Math.floor(100000 + Math.random() * 900000);
                                html += `
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingdirective-${newId}">
                                        <button class="accordion-button close-accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-directive-${newId}" aria-expanded-x="false" aria-controls="collapse-directive-${newId}">
                                            <strong class="pe-1">Diretriz: </strong> ${directive.name}
                                        </button>
                                    </h2>
                                    <div id="collapse-directive-${newId}" class="accordion-collapse collapse" aria-labelledby="headingdirective-${newId}" directive>
                                        <div class="accordion-body">
                                            ${addObjectives(directive.objectives)}
                                        </div>
                                    </div>
                                </div>
                            `;
                            });
                        } else {
                            html =
                                '<p class="text-center my-3">Não há diretrizes cadastradas para este propósito.</p>';
                        }

                        $(`#collapse-${id}`).children(0).html(html);
                        $('.close-accordion').on('click', function() {
                            const expanded = $(this).attr('aria-expanded-x');
                            if (expanded == 'false') {
                                $(this).attr('aria-expanded-x', 'true')
                            } else {
                                $(this).attr('aria-expanded-x', 'false')
                                setTimeout(() => {
                                    $(this).parent().next().collapse('hide');
                                }, 400);
                            }
                        });
                    }
                });
            };

            const addObjectives = objectives => {
                let html = '';
                if (objectives.length > 0) {
                    objectives.map(objective => {
                        const newId = Math.floor(100000 + Math.random() * 900000);
                        html += `
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingobjective${newId}">
                                <button class="accordion-button close-accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-objective${newId}" aria-expanded-x="false" aria-controls="collapse-objective${newId}">
                                    <strong class="pe-1">Objetivo: </strong> ${objective.name}
                                </button>
                            </h2>
                            <div id="collapse-objective${newId}" class="accordion-collapse collapse" aria-labelledby="headingobjective${newId}" >
                                <div class="accordion-body">
                                    ${addMetrics(objective.metrics)}
                                </div>
                            </div>
                        </div>
                    `;
                    });
                } else {
                    html = '<p class="text-center my-3">Não há objetivos cadastrados para esta diretriz.</p>';
                }

                return html;
            }

            const addMetrics = metrics => {
                let html = '';
                if (metrics.length > 0) {
                    metrics.map(metric => {

                        html += `
                        <div class="mb-3">
                            <h5 class="mb-2">${metric.term}</h5>
                            <ul>
                                <li>Termo: ${metric.term}</li>
                                <li>Noção: ${metric.notion}</li>
                                <li>Impacto: ${metric.impact}</li>
                                <li>Fonte: ${metric.source}</li>
                                <li>Tipo: ${metric.type}</li>
                                <li>Formato: ${metric.format}</li>
                                <li>Indicador: ${metric.indicator_type}</li>
                                <li>Como calcular: ${metric.how_to_calculate}</li>
                            </ul>
                        </div>
                    `;
                    });
                } else {
                    html = '<p class="text-center my-3">Não há métricas cadastradas para este objetivo.</p>';
                }

                return html;
            }
        });
    </script>
@endpush
