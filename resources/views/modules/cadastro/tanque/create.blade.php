@extends('layouts/contentLayoutMaster')

@section('title', 'Tanques')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Tanques
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formTanqueData" action="{{ url('data/cadastros/tanques/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $tanque->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o nome" value="{{ $tanque->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="litros">Capacidade (L)</label>
                                    <input type="text" name="litros" class="form-control" id="litros"
                                        placeholder="Digite a quantidade em litros" value="{{ $tanque->litros ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="observacao">Observação</label>
                                    <textarea class="form-control" name="observacao" id="observacao" rows="5" placeholder="Digite uma observação sobre o tanque" required>{{ $tanque->observacao ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo"
                                        value="1"
                                        {{ !isset($tanque->ativo) || (isset($tanque->ativo) && $tanque->ativo == 1) ? 'checked="checked"' : '' }}>
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
            $('#formTanqueData').on('submit', function() {
                postData('formTanqueData', '{{ url('cadastros/tanques') }}');
                return false;
            });
            new Cleave('#litros', {
                numericOnly: true,
                blocks: [5],
            });

        });
    </script>
@endsection
