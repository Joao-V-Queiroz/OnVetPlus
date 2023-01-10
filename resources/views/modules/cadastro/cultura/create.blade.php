@extends('layouts/contentLayoutMaster')

@section('title', 'Culturas')

@section('content')
    <form id="formCulturaData" action="{{ url('data/cadastros/culturas/save') }}" class="form">
        <input type="hidden" name="id" id="id" value="{{ $cultura->id ?? '0' }}" />
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
                                    <label class="form-label" for="nome">Nome/Descrição</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome ou Descrição da cultura"
                                        value="{{ $cultura->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($cultura->getTipos() as $value => $label)
                                            <option
                                                {{ isset($cultura->tipo) && $cultura->tipo == $value ? 'selected="selected"' : '' }}
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
                                        value="{{ $cultura->dt_ini ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Finalizada</label>
                                    <input type="date" name="dt_fim" class="form-control" id="dt_fim"
                                        value="{{ $cultura->dt_fim ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="area">Área (ha)</label>
                                    <input type="text" name="ha" class="form-control" id="ha"
                                        onblur="calcular();" placeholder="Digite o tamanho da cultura"
                                        value="{{ $cultura->ha ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="custo">Custo de Formação(R$/ha)</label>
                                    <input type="text" name="custo" class="form-control" id="custo"
                                        onblur="calcular();" value="{{ $cultura->custo ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="total">Custo de Formação Total</label>
                                    <input type="text" name="total" class="form-control" id="total"
                                        value="{{ $cultura->total ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="observacao">Observação</label>
                                    <textarea class="form-control" name="observacao" id="observacao" rows="5"
                                        placeholder="Digite uma observação sobre a cultura" required>{{ $tanque->observacao ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo"
                                        value="1"
                                        {{ !isset($cultura->ativo) || (isset($cultura->ativo) && $cultura->ativo == 1) ? 'checked="checked"' : '' }}>
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
            $('#formCulturaData').on('submit', function() {
                postData('formCulturaData', '{{ url('cadastros/culturas') }}');
                return false;
            });
        });
    </script>
    <script>
        new Cleave('#ha', {
            numericOnly: true,
            blocks: [10],
        });

        new Cleave('#custo', {
            numericOnly: true,
            blocks: [7],
        });

        new Cleave('#total', {
            numericOnly: true,
            blocks: [10],
        });

        function calcular() {
            var ha = Number(document.getElementById("ha").value);
            var custo = Number(document.getElementById("custo").value);
            var total = document.getElementById("total");

            total.setAttribute('value', (ha * custo));
        }
    </script>
@endsection
