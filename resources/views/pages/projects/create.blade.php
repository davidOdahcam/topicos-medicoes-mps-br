@extends('layouts.main')

@push('title')
	Cadastro de Projetos
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="text-center mt-4">
                        <h1 class="h2 mb-3">Cadastro de Projetos</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Campo genérico</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                    placeholder="Campo genérico" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="index.html" class="btn btn-lg btn-primary">Cadastrar</a>
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
