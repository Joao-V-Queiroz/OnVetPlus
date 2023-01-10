@extends('layouts/contentLayoutMaster')

@section('title', 'Usuários')

@section('content')
    <form id="formUserData" class="form" enctype="multipart/form-data" action="{{ url('data/security/user/save') }}"
        target="uploadImagem" method="post">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Cadastro de Usuários</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{ $user->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label" for="btnDestaque">
                                        Imagem de Destaque
                                        <img src="{{ isset($user->imagem) ? asset($user->imagem) : '' }}" class="img-fluid"
                                            id="imagePreview" />
                                    </label>
                                    <button type="button" id="btnDestaque" class="btn btn-outline-secondary btn-block"
                                        onclick="$('#imagem').click();">
                                        <i data-feather='upload'></i>
                                        Escolher Foto
                                    </button>
                                    <input type="file" id="imagem" name="imagem" style="display: none;"
                                        accept="image/*" onchange="loadFile(event)" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Digite o Nome" required value="{{ $user->name ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Função</label>
                                    <input type="text" name="jobtitle" class="form-control" id="jobtitle"
                                        placeholder="Digite a Função" value="{{ $user->jobtitle ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nível de Acesso</label>
                                    <select name="role_id" id="role_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $role->id == $user->role_id ? 'selected="selected"' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Página Inicial</label>
                                    <select name="home_id" id="home_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                                {{ $permission->url == '' ? 'disabled="disabled"' : '' }}>
                                                {{ __('locale.' . $permission->name) }}
                                            </option>
                                            @foreach ($permission->permissions as $filho)
                                                <option value="{{ $filho->id }}"
                                                    {{ $filho->url == '' ? 'disabled="disabled"' : '' }}
                                                    {{ $filho->id == $user->home_id ? 'selected="selected"' : '' }}>
                                                    &nbsp;&nbsp; ->
                                                    {{ __('locale.' . $filho->name) }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Digite o E-mail" required value="{{ $user->email ?? '' }}" />
                                    <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                                </div>
                            </div>
                            @isset($user->id)
                                @if ($user->role->id != 6 && $user->role->id != 8)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="nome">Senha</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Digite a Senha" minlength="8"/>
                                            <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="nome">Senha</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Digite a Senha" minlength="8" required />
                                        <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                                    </div>
                                </div>
                            @endisset
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Telefone</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Digite o Telefone" value="{{ $user->phone ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Celular</label>
                                    <input type="text" name="cellphone" class="form-control" id="cellphone"
                                        placeholder="Digite o Celular" value="{{ $user->cellphone ?? '' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="custom-control-primary custom-switch">
                                        <input type="checkbox" name="ativo" class="custom-control-input"
                                            id="ativo" value="1"
                                            {{ !isset($user->active) || (isset($user->active) && $user->active == 1) ? 'checked="checked"' : '' }}>
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
                                <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <iframe id="uploadImagem" name="uploadImagem" style="display:none;"></iframe>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#formUserData').on('submit', function() {
                $('#divLoading').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                setTimeout(function() {
                    $('#divLoading').modal('hide');
                }, 10000);
            });
        });
        var loadFile = function(event) {
            var output = document.getElementById('imagePreview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
        new Cleave('#phone', {
            numericOnly: true,
            blocks: [0, 2, 0, 4, 4],
            delimiters: ["(", ")", " ", "-"]
        });

        new Cleave('#cellphone', {
            numericOnly: true,
            blocks: [0, 2, 5, 4],
            delimiters: ["(", ") ", "-"]
        });
    </script>
@endsection
