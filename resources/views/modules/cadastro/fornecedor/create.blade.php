@extends('layouts/contentLayoutMaster')

@section('title', 'Fornecedores')

@section('content')
    <form id="formFornecedorData" action="{{ url('data/cadastros/fornecedores/save') }}" class="form">
        <input type="hidden" name="id" id="id" value="{{ $fornecedor->id ?? '0' }}" />
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
                                        placeholder="Digite o Nome do Funcionário" value="{{ $fornecedor->nome ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">CPF</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf"
                                        placeholder="Digite o CPF" value="{{ $fornecedor->cpf ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">Tipo fornecedor</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($fornecedor->getTipos() as $value => $label)
                                            <option
                                                {{ isset($fornecedor->tipo) && $fornecedor->tipo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">CNPJ</label>
                                    <input type="text" name="cnpj" class="form-control" id="cnpj"
                                        placeholder="Digite o CNPJ" value="{{ $fornecedor->cnpj ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Telefone Principal</label>
                                    <input type="text" name="telefone" class="form-control" id="telefone"
                                        placeholder="Digite o Telefone" value="{{ $fornecedor->telefone ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Razão Social</label>
                                    <input type="text" name="razao" class="form-control" id="razao"
                                        placeholder="Digite a razão social do seu fornecedor"
                                        value="{{ $fornecedor->razao ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Digite o e-mail do seu fornecedor"
                                        value="{{ $fornecedor->email ?? '' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Endereço</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label class="form-label col-12" for="btnCep">&nbsp;</label>
                                <div class="input-group mb-2">
                                    <input type="text" id="cep" name="cep"
                                        value="{{ $fornecedor->cep ?? '' }}" class="form-control"
                                        placeholder="Digite o CEP..." aria-label="Digite o CEP..." aria-describedby="btnCep"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="btnCep" onclick="searchPostalCode();">
                                            <i data-feather="search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="endereco">Endereço</label>
                                    <input name="endereco" type="text" id="endereco" class="form-control"
                                        placeholder="Digite o nome da Rua" autocomplete="off"
                                        aria-label="Digite o nome da Rua" value="{{ $fornecedor->endereco ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label class="form-label" for="numero">Número</label>
                                    <input name="numero" type="text" id="numero" class="form-control"
                                        placeholder="Digite numero da empresa" autocomplete="off"
                                        aria-label="numero da empresa" value="{{ $fornecedor->numero ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label class="form-label" for="complemento">Complemento</label>
                                    <input name="complemento" type="text" id="complemento" class="form-control"
                                        placeholder="Bloco, andar, etc..." autocomplete="off"
                                        aria-label="Bloco, andar, etc..." value="{{ $fornecedor->complemento ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="bairro">Bairro</label>
                                    <input name="bairro" type="text" id="bairro" placeholder="Digite o Bairro"
                                        class="form-control" autocomplete="off" value="{{ $fornecedor->bairro ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="cidade">Cidade</label>
                                    <input name="cidade" type="text" id="cidade" placeholder="Digite a Cidade"
                                        class="form-control" autocomplete="off" value="{{ $fornecedor->cidade ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="uf">UF</label>
                                    <select name="uf" id="uf" class="form-control" required>
                                        <option value=""></option>
                                        <option value="AC" {{ $fornecedor->uf == 'AC' ? 'selected="selected"' : '' }}>
                                            AC</option>
                                        <option value="AL" {{ $fornecedor->uf == 'AL' ? 'selected="selected"' : '' }}>
                                            AL</option>
                                        <option value="AP" {{ $fornecedor->uf == 'AP' ? 'selected="selected"' : '' }}>
                                            AP</option>
                                        <option value="AM" {{ $fornecedor->uf == 'AM' ? 'selected="selected"' : '' }}>
                                            AM</option>
                                        <option value="BA" {{ $fornecedor->uf == 'BA' ? 'selected="selected"' : '' }}>
                                            BA</option>
                                        <option value="CE" {{ $fornecedor->uf == 'CE' ? 'selected="selected"' : '' }}>
                                            CE</option>
                                        <option value="DF" {{ $fornecedor->uf == 'DF' ? 'selected="selected"' : '' }}>
                                            DF</option>
                                        <option value="ES" {{ $fornecedor->uf == 'ES' ? 'selected="selected"' : '' }}>
                                            ES</option>
                                        <option value="GO" {{ $fornecedor->uf == 'GO' ? 'selected="selected"' : '' }}>
                                            GO</option>
                                        <option value="MA" {{ $fornecedor->uf == 'MA' ? 'selected="selected"' : '' }}>
                                            MA</option>
                                        <option value="MT" {{ $fornecedor->uf == 'MT' ? 'selected="selected"' : '' }}>
                                            MT</option>
                                        <option value="MS" {{ $fornecedor->uf == 'MS' ? 'selected="selected"' : '' }}>
                                            MS</option>
                                        <option value="MG" {{ $fornecedor->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            MG</option>
                                        <option value="PA" {{ $fornecedor->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            PA</option>
                                        <option value="PB" {{ $fornecedor->uf == 'PB' ? 'selected="selected"' : '' }}>
                                            PB</option>
                                        <option value="PR" {{ $fornecedor->uf == 'PR' ? 'selected="selected"' : '' }}>
                                            PR</option>
                                        <option value="PE" {{ $fornecedor->uf == 'PE' ? 'selected="selected"' : '' }}>
                                            PE</option>
                                        <option value="PI" {{ $fornecedor->uf == 'PI' ? 'selected="selected"' : '' }}>
                                            PI</option>
                                        <option value="RJ" {{ $fornecedor->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            RJ</option>
                                        <option value="RN" {{ $fornecedor->uf == 'RN' ? 'selected="selected"' : '' }}>
                                            RN</option>
                                        <option value="RS" {{ $fornecedor->uf == 'RS' ? 'selected="selected"' : '' }}>
                                            RS</option>
                                        <option value="RO" {{ $fornecedor->uf == 'RO' ? 'selected="selected"' : '' }}>
                                            RO</option>
                                        <option value="RR" {{ $fornecedor->uf == 'RR' ? 'selected="selected"' : '' }}>
                                            RR</option>
                                        <option value="SC" {{ $fornecedor->uf == 'SC' ? 'selected="selected"' : '' }}>
                                            SC</option>
                                        <option value="SP" {{ $fornecedor->uf == 'SP' ? 'selected="selected"' : '' }}>
                                            SP</option>
                                        <option value="SE" {{ $fornecedor->uf == 'SE' ? 'selected="selected"' : '' }}>
                                            SE</option>
                                        <option value="TO" {{ $fornecedor->uf == 'TO' ? 'selected="selected"' : '' }}>
                                            TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="repeater">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Contatos</h3>
                            <div class="col-md-2 col-12" style="float:right">
                                <div class="form-group">
                                    <label class="form-label" for="btnContato">&nbsp;</label>
                                    <button type="button" id="btnContato"
                                        class="btn btn-outline-secondary mr-1 form-control" data-repeater-create>
                                        <i data-feather='plus'></i>
                                        <span>Incluir</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-repeater-list="contatos">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="contato_nome">Contato</label>
                                                <input type="text" name="contato_nome" id="contato_nome"
                                                    placeholder="Pessoa de contato" class="form-control"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="contato_telefone">Telefone</label>
                                                <input type="text" name="contato_telefone" id="contato_telefone"
                                                    placeholder="Digite o telefone" class="form-control telefone"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="contato_email">E-mail</label>
                                                <input type="email" name="contato_email" id="contato_email"
                                                    placeholder="Digite o email" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label class="form-label " for="btnRemover">&nbsp;</label>
                                                <button type="button" id="btnRemover"
                                                    class="btn btn-outline-danger text-nowrap px-1 waves-effect form-control"
                                                    data-repeater-delete>
                                                    <i data-feather='trash-2'></i>
                                                    <span>Remover</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="custom-control-primary custom-switch">
                                        <input type="checkbox" name="ativo" class="custom-control-input"
                                            id="ativo" value="1"
                                            {{ !isset($fornecedor->ativo) || (isset($fornecedor->ativo) && $fornecedor->ativo == 1) ? 'checked="checked"' : '' }}>
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
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <button type="submit" class="btn btn-primary data-submit mr-1">
                                    <i data-feather='save'></i>
                                    Salvar
                                </button>
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
            $("#uf").select2();

            $('#formFornecedorData').on('submit', function() {
                postData('formFornecedorData', '{{ url('cadastros/fornecedores') }}');
                return false;
            });
            new Cleave('#numero', {
                numericOnly: true,
                blocks: [5],
            });

            new Cleave('#cep', {
                numericOnly: true,
                blocks: [5, 3],
                delimiters: ["-"]
            });

            new Cleave('#telefone', {
                numericOnly: true,
                blocks: [0, 2, 5, 4],
                delimiters: ["(", ") ", "-"]
            });

            new Cleave('#cpf', {
                numericOnly: true,
                blocks: [3, 3, 3, 2],
                delimiters: [".", ".", "-"]
            });

            new Cleave('#cnpj', {
                numericOnly: true,
                blocks: [2, 3, 3, 4, 2],
                delimiters: [".", ".", "/", "-"]
            });

            var qtd = 1;
            var $repeater = $('.repeater').repeater({
                show: function() {
                    $(this).slideDown();
                    // Feather Icons
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                    $(this).show(function() {
                        qtd++;
                        $(this).find('.telefone').addClass('telefone_' + qtd);
                        new Cleave('.telefone_' + qtd, {
                            numericOnly: true,
                            blocks: [0, 2, 5, 4],
                            delimiters: ["(", ") ", "-"]
                        });
                    });
                },
                hide: function(deleteElement) {
                    if (confirm('Tem certeza que deseja excluir esse Contato?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $repeater.setList([
                @foreach ($fornecedor->contatos as $contato)
                    {
                        'contato_nome': '{{ $contato->nome }}',
                        'contato_telefone': '{{ $contato->telefone }}',
                        'contato_email': '{{ $contato->email }}',
                    },
                @endforeach
            ]);
        });

        function searchPostalCode() {
            $.getJSON('https://api.postmon.com.br/v1/cep/' + $('#cep').val().replace('-', '')).done(function(data2) {
                if (!data2) {
                    notify('error', 'CEP não encontrado!');
                } else {
                    $('#endereco').val(data2.logradouro);
                    $('#bairro').val(data2.bairro);
                    $('#cidade').val(data2.cidade);
                    $('#uf').val(data2.estado);
                    $("#uf").select2();
                }
            });
        }
    </script>
@endsection
