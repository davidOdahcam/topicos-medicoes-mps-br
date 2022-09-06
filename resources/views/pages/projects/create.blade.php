@extends('layouts.main')

@push('title')
    Cadastro de Projeto
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="h2 mb-3">Cadastro de Projeto</h1>
                        <a href="{{route('projects.index')}}" class="btn btn-primary">Listagem</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="{{ route('projects.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nome do projeto</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Nome do projeto" value="{{old('name')}}" required maxlength="191" />
                                                @error('name')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button name="submit_type" value="return"
                                            class="btn btn-lg btn-primary">Cadastrar</button>
                                        <button name="submit_type" value="next" class="btn btn-lg btn-primary">Cadastrar e
                                            avançar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
