@extends('layouts/contentLayoutMaster')

@section('title', 'LOTE')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Lotes
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formLoteData" action="{{ url('data/rebanho/lotes/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $lote->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do lote" value="{{ $lote->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="desc">Descrição</label>
                                    <input type="text" name="desc" class="form-control" id="desc"
                                        placeholder="Digite a descrição do lote" value="{{ $lote->desc ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="abv">Abreviação</label>
                                    <input type="text" name="abv" class="form-control" id="abv"
                                        placeholder="Digite a abreviação do nome" value="{{ $lote->abv ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($lote->getSexos() as $value => $label)
                                            <option
                                                {{ isset($lote->sexo) && $lote->sexo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="fase">Fase</label>
                                    <select name="fase" id="fase" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($lote->getFases() as $value => $label)
                                            <option
                                                {{ isset($lote->fase) && $lote->fase == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="observacao">Observação</label>
                                    <textarea class="form-control" name="observacao" id="observacao" rows="5"
                                        placeholder="Digite uma observação sobre o lote" required>{{ $lote->observacao ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo"
                                        value="1"
                                        {{ !isset($lote->ativo) || (isset($lote->ativo) && $lote->ativo == 1) ? 'checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="ativo">
                                        <span class="switch-icon-left">
                                            <i data-feather="check"></i>
                                        </span>
                                        <span class="switch-icon-right">
                                            <i data-feather="x"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
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
            $('#formLoteData').on('submit', function() {
                postData('formLoteData', '{{ url('rebanho/lotes') }}');
                return false;
            });
        });
    </script>
@endsection
