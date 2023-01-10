@extends('layouts/contentLayoutMaster')

@section('title', 'Usuários')

@section('content')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listagem de Usuários</h4>
                            <div style="float: right;">
                                <a href="{{ url('security/users/create/0') }}" class="btn btn-outline-primary waves-effect">
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
                                            <input type="text" class="form-control" placeholder="Busca Livre..."
                                                id="search" name="search" value="{{ $request->search ?? '' }}">
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
                                            <button
                                                class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                                type="submit" name="export" value="XLS">
                                                <i data-feather='download'></i>
                                                <span>Excel</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                            <button
                                                class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
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
                                        <th>#</th>
                                        <th style="width: 140px;">Imagem</th>
                                        <th>Nome</th>
                                        <th>E-Mail</th>
                                        <th>Telefone</th>
                                        <th>Celular</th>
                                        <th>Função</th>
                                        <th>Nível de Acesso</th>
                                        <th>Página Inicial</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 5%;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                @if (isset($user->imagem))
                                                    <img src="{{ asset($user->imagem) }}" class="img-fluid" />
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->cellphone }}</td>
                                            <td>{{ $user->jobtitle }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ isset($user->home->name) ? __('locale.' . $user->home->name) : '' }}
                                            </td>
                                            <td>
                                                {!! Helper::getAtivoInativo($user->active) !!}
                                            </td>
                                            <td nowrap>
                                                <a href="{{ url('security/users/create') }}/{{ $user->id }}"
                                                    class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                                    <i data-feather="edit-2"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-icon btn-outline-warning waves-effect" alt="Apagar"
                                                    title="Apagar" {{-- @if ($role->users_count > 0)
                                onclick="notification('warning', 'Não Permitido', 'Você não pode apagar porque há usuários com este Nivel de Acesso');" 
                                @else --}}
                                                    onclick="deleteItem('{{ url('security/users/delete') }}/{{ $user->id }}');"
                                                    {{-- @endif --}}>
                                                    <i data-feather="trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('shared.paginate', ['form' => 'formSearch', 'itens' => $users ?? null])
                    </div>
                </div>
            </div>
        @endsection
