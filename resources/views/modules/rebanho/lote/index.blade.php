@extends('layouts/contentLayoutMaster')

@section('title', 'Lotes')

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Lotes
                    </h4>
                    <div style="float: right;">
                        <a href="{{ url('rebanho/lotes/create/0') }}" class="btn btn-outline-primary waves-effect">
                            <i data-feather="plus-circle" class="mr-50"></i>
                            <span>Novo</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include('shared.alerts')
                    <form class="form-horizontal form-label-left" id="formSearch" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="page" id="page" value="{{ $request->page or ' ' }}" />
                        <div class="row d-flex">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Busca Livre..." id="search"
                                        name="search" value="{{ $request->search ?? '' }}">
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
                                <th>Descrição</th>
                                <th>Abreviação</th>
                                <th>Sexo</th>
                                <th>Fase</th>
                                <th>Observação</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 5%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lotes as $lote)
                                <tr>
                                    <td>
                                        {{ $lote->nome }}
                                    </td>
                                    <td>
                                        {{ $lote->desc }}
                                    </td>
                                    <td>
                                        {{ $lote->abv }}
                                    </td>
                                    <td>
                                        {{ $lote->getSexo() }}
                                    </td>
                                    <td>
                                        {{ $lote->getFase() }}
                                    </td>
                                    <td>
                                        {{ $lote->observacao }}
                                    </td>
                                    <td>
                                        {!! Helper::getAtivoInativo($lote->ativo) !!}
                                    </td>
                                    <td nowrap>
                                        <a href="{{ url('rebanho/lotes/create') }}/{{ $lote->id ?? null }}"
                                            class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                            <i data-feather="edit-2"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-warning waves-effect"
                                            alt="Apagar" title="Apagar"
                                            onclick="deleteItem('{{ url('rebanho/lotes/delete') }}/{{ $lote->id ?? null }}');">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('shared.paginate', ['form' => 'formSearch', 'itens' => $lotes ?? null])
            </div>
        </div>
    </div>
@endsection
