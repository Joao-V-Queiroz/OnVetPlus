@extends('layouts/contentLayoutMaster')

@section('title', 'Embriões')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Embriões
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formEmbriaoData" action="{{ url('data/rebanho/embrioes/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $embriao->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Sêmen" value="{{ $embriao->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($embriao->getTipos() as $value => $label)
                                            <option
                                                {{ isset($embriao->tipo) && $embriao->tipo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="congelamento">Módulo de Congelamento</label>
                                    <select name="congelamento" id="congelamento" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($embriao->getCongelamentos() as $value => $label)
                                            <option
                                                {{ isset($embriao->congelamento) && $embriao->congelamento == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="grau">Grau de Desenvolvimento</label>
                                    <select name="grau" id="grau" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($embriao->getGraus() as $value => $label)
                                            <option
                                                {{ isset($embriao->grau) && $embriao->grau == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="animais_id">Pai</label>
                                    <select name="animais_id" id="animais_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($animais as $animal)
                                            <option value="{{ $animal->id }}"
                                                {{ $animal->id == $embriao->animais_id ? 'selected="selected"' : '' }}>
                                                {{ $animal->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="animal_id">Mãe</label>
                                    <select name="animal_id" id="animal_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($animais2 as $animal)
                                            <option value="{{ $animal->id }}"
                                                {{ $animal->id == $embriao->animal_id ? 'selected="selected"' : '' }}>
                                                {{ $animal->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="observacao">Observação</label>
                                    <textarea class="form-control" name="observacao" id="observacao" rows="5"
                                        placeholder="Digite uma observação sobre o embrião">{{ $embriao->observacao ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#formEmbriaoData').on('submit', function() {
                postData('formEmbriaoData', '{{ url('rebanho/embrioes') }}');
                return false;
            });
        });
    </script>
@endsection
