@extends('layouts/contentLayoutMaster')

@section('title', 'Áreas')

@section('content')
    <form id="formAreaData" action="{{ url('data/cadastros/areas/save') }}" class="form">
        <input type="hidden" name="id" id="id" value="{{ $area->id ?? '0' }}" />
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dados Gerais</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome ou Descrição da Área" value="{{ $area->nome ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($area->getTipos() as $value => $label)
                                            <option
                                                {{ isset($area->tipo) && $area->tipo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Início</label>
                                    <input type="date" name="dt_ini" class="form-control" id="dt_ini"
                                        value="{{ $area->dt_ini ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Finalizada</label>
                                    <input type="date" name="dt_fim" class="form-control" id="dt_fim"
                                        value="{{ $area->dt_fim ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Área (ha)</label>
                                    <input type="text" name="ha" class="form-control" id="ha"
                                        placeholder="Digite o tamanho da área" value="{{ $area->ha ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Vida útil(Anos)</label>
                                    <input type="text" name="util" class="form-control" id="util"
                                        value="{{ $area->util ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="observacao">Observação</label>
                                    <textarea class="form-control" name="observacao" id="observacao" rows="5"
                                        placeholder="Digite uma observação sobre a área" required>{{ $area->observacao ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo"
                                        value="1"
                                        {{ !isset($area->ativo) || (isset($area->ativo) && $area->ativo == 1) ? 'checked="checked"' : '' }}>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#formAreaData').on('submit', function() {
                postData('formAreaData', '{{ url('cadastros/areas') }}');
                return false;
            });
        });
        new Cleave('#ha', {
            numericOnly: true,
            blocks: [8],
        });
        new Cleave('#util', {
            numericOnly: true,
            blocks: [3],
        });
    </script>
@endsection
