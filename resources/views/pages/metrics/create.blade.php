@extends('layouts.main')

@push('title')
    Cadastro de Métricas
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center flex-column">
                    <div class="text-center mt-4">
                        <h1 class="h2 mb-3">Cadastro de Métricas</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="{{ route('metrics.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Objetivo</label>
                                                <select name="objective_id" class="form-select form-select-lg" required>
                                                    <option value="">Selecione um objetivo</option>
                                                    @foreach ($objectives as $objective)
                                                        <option value="{{ $objective->id }}"
                                                            {{ $objective->id == (old('objective_id') ?? $objective_id) ? 'selected' : '' }}>
                                                            {{ $objective->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('objective_id')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Termo</label>
                                                <input class="form-control form-control-lg" type="text" name="term"
                                                    placeholder="Termo" required value="{{ old('term') }}" />
                                                @error('term')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Noção</label>
                                                <input class="form-control form-control-lg" type="text" name="notion"
                                                    placeholder="Noção" required value="{{ old('notion') }}" />
                                                @error('notion')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Impacto</label>
                                                <input class="form-control form-control-lg" type="text" name="impact"
                                                    placeholder="Impacto" required value="{{ old('impact') }}" />
                                                @error('impact')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sinônimo</label>
                                                <select name="synonymous" class="form-select form-select-lg">
                                                    <option value="">Selecione um sinônimo</option>
                                                    @foreach ($metrics as $metric)
                                                        <option value="{{ $metric->id }}"
                                                            {{ $metric->id == old('synonymous') ? 'selected' : '' }}>
                                                            {{ $metric->term }}</option>
                                                    @endforeach
                                                </select>
                                                @error('synonymous')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fonte</label>
                                                <input class="form-control form-control-lg" type="text" name="source"
                                                    placeholder="Fonte" required value="{{ old('source') }}" />
                                                @error('source')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tipo</label>
                                                <input class="form-control form-control-lg" type="text" name="type"
                                                    placeholder="Tipo" required value="{{ old('type') }}" />
                                                @error('type')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Formato</label>
                                                <input class="form-control form-control-lg" type="text" name="format"
                                                    placeholder="Formato" required value="{{ old('format') }}" />
                                                @error('format')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Indicador</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="indicator_type" required value="{{ old('indicator_type') }}" placeholder="Indicador" />
                                                @error('indicator_type')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Como calcular</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="how_to_calculate" required value="{{ old('how_to_calculate') }}" placeholder="Como calcular" />
                                                @error('how_to_calculate')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Como analisar</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="how_to_analyze" required value="{{ old('how_to_analyze') }}" placeholder="Como analisar" />
                                                @error('how_to_analyze')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button name="submit_type" value="return"
                                            class="btn btn-lg btn-primary">Cadastrar</button>
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
