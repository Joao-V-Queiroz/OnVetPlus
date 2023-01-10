@extends('layouts/contentLayoutMaster')

@section('title', 'Funcionários')

@section('content')
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Funcionários</h4>
                <div style="float: right;">
                    <a href="{{ url('cadastros/funcionarios/create/0') }}" class="btn btn-outline-primary waves-effect">
                        <i data-feather="plus-circle" class="mr-50"></i>
                        <span>Novo</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @include('shared.alerts')
                <form class="form-horizontal form-label-left" id="formSearch" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="page" id="page" value="{{ $request->page or " " }}" />
                    <div class="row d-flex">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Busca Livre..." id="search"
                                    name="search" value="{{ $request->search ?? "" }}">
                            </div>
                        </div>

                        <div class="col-md-3 col-12 mb-50">
                            <div class="form-group">
                                <button class="btn btn-outline-success btn-block text-nowrap px-1 waves-effect"
                                    type="submit">
                                    <i data-feather='search'></i>
                                    <span>Pesquisar</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 mb-50">
                            <div class="form-group">
                                <button class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                    type="submit" name="export" value="XLS">
                                    <i data-feather='download'></i>
                                    <span>Excel</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 mb-50">
                            <div class="form-group">
                                <button class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                    type="submit" name="export" value="PDF">
                                    <i data-feather='download'></i>
                                    <span>PDF</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Telefone</th>
                            <th>Bairro</th>
                            <th>Cidade / UF</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 5%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>
                                {{ $funcionario->nome }}
                            </td>
                            <td>
                                {{ $funcionario->getSexo() }}
                            </td>
                            <td>
                                {{ $funcionario->telefone }}
                            </td>
                            <td>
                                {{ $funcionario->bairro }}
                            </td>
                            <td>
                                {{ $funcionario->cidade }} - {{ $funcionario->uf }}
                            </td>
                            <td>
                                {!! Helper::getAtivoInativo($funcionario->ativo) !!}
                            </td>
                            <td nowrap>
                                <a href="{{ url('cadastros/funcionarios/create') }}/{{ $funcionario->id ?? null }}"
                                    class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                    <i data-feather="edit-2"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-warning waves-effect"
                                    alt="Apagar" title="Apagar"
                                    onclick="deleteItem('{{ url('cadastros/funcionarios/delete') }}/{{ $funcionario->id ?? null }}');">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('shared.paginate', ['form' => 'formSearch', 'itens' => $funcionarios ?? null])
        </div>
    </div>
</div>
@endsection