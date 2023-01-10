@extends('layouts/contentLayoutMaster')

@section('title', 'Nível de Acesso')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-body">
                <form id="formUserData" action="{{ url('data/security/role/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $role->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="name" class="form-control" id="nome" required
                                    placeholder="Ex: Financeiro" aria-label="Ex: Financeiro"
                                    value="{{ $role->name ?? '' }}" />
                            </div>
                        </div>
                    </div>

                    @foreach($permissions as $permission)
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive border rounded mt-1">
                                <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="permissions[]"
                                            class="custom-control-input"
                                            value="{{ $permission->id }}" id="ck-{{ $permission->id }}"
                                            {{ $role->perms->search($permission->id) !== false ? "checked" : "" }} />
                                        <label class="custom-control-label" for="ck-{{ $permission->id }}">
                                        </label>
                                        <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                        <span class="align-middle">{{ __('locale.'.$permission->name) }}</span>
                                    </div>
                                </h6>
                                @foreach($permission->permissions as $child)
                                <hr />
                                <table class="table table-striped table-borderless">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="{{ $child->permissions->count() + 1 }}"
                                                style="vertical-align: middle">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" class="custom-control-input"
                                                        value="{{ $child->id }}" id="ck-{{ $child->id }}"
                                                        {{ $role->perms->search($child->id) !== false ? "checked" : "" }}
                                                    />
                                                    <label class="custom-control-label" for="ck-{{ $child->id }}">
                                                        {{ __('locale.' . $child->name) }}
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($child->permissions as $item)
                                            <td nowrap>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]"
                                                        class="custom-control-input"
                                                        id="ck-{{ $item->id }}" value="{{ $item->id }}"
                                                        {{ $role->perms->search($item->id) !== false ? "checked" : "" }}
                                                    />
                                                    <label class="custom-control-label" for="ck-{{ $item->id }}">
                                                        {{ __('locale.' . $item->name) }}</label>
                                                </div>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                @endForeach
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    @endforeach

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
    $(document).ready(function(){
        $('#formUserData').on('submit', function () {
            postData('formUserData', '{{ url("security/role") }}');
            return false;
        });
    });
</script>
@endsection