@extends('layouts/contentLayoutMaster')
@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<section class="app-user-view">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card user-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                            <div class="user-avatar-section">
                                <div class="d-flex justify-content-start">
                                    <img class="img-fluid rounded" src="{{ asset("images/avatars/{$data->user->id}.png") }}"
                                        height="104" width="104" alt="{{ $data->user->name }}" />
                                    <div class="d-flex flex-column ml-1">
                                        <div class="user-info mb-1">
                                            <h4 class="mb-0">{{ $data->user->name }}</h4>
                                            <span class="card-text">{{ $data->user->email }}</span>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <a href="javascipt;" onclick="editUserData({{ $data->user->id }});"
                                                data-toggle="modal" data-target="#modalUser"
                                                class="btn btn-primary">Editar</a>
                                            <button class="btn btn-outline-danger ml-1" id="deleteUser">Apagar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center user-total-numbers">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="color-box bg-light-primary">
                                        <i data-feather="dollar-sign" class="text-primary"></i>
                                    </div>
                                    <div class="ml-1">
                                        <h5 class="mb-0">23.3k</h5>
                                        <small>Monthly Sales</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="color-box bg-light-success">
                                        <i data-feather="trending-up" class="text-success"></i>
                                    </div>
                                    <div class="ml-1">
                                        <h5 class="mb-0">$99.87K</h5>
                                        <small>Annual Profit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                            <div class="user-info-wrapper">
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="star" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Perfil</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $data->user->role->name }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="flag" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Country</span>
                                    </div>
                                    <p class="card-text mb-0">England</p>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="user-info-title">
                                        <i data-feather="phone" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                                    </div>
                                    <p class="card-text mb-0">(123) 456-7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modules.exemplo.create', ['modelUserData' => $data->user, 'roles' => $data->roles])

</section>
@include('components.datatable', ['datatable' => $data->datatable])
@endsection

@section('page-script')
@php
    $data->datatable['columnDefs'][] = <<<'EOT'
        {
            targets: 4,
            responsivePriority: 4,
            render: function (data, type, full, meta) {
                console.log(JSON.stringify(JSON.parse(convertHtml(full.old_values)), null, '\t'));
                var $row_output =
                    '<small class="text-muted"><pre>' +
                        JSON.stringify(JSON.parse(convertHtml(full.old_values)), null, '\t')
                    +
                    '</pre></small>';
                return $row_output;
            }
        },
        {
            targets: 5,
            responsivePriority: 5,
            render: function (data, type, full, meta) {
                console.log(JSON.stringify(JSON.parse(convertHtml(full.new_values)), null, '\t'));
                var $row_output =
                    '<small class="text-muted"><pre>' +
                        JSON.stringify(JSON.parse(convertHtml(full.new_values)), null, '\t')
                    +
                    '</pre></small>';
                return $row_output;
            }
        }
        ,
        {
            targets: 6,
            responsivePriority: 6,
            render: function (data, type, full, meta) {
                var $row_output = moment(full.created_at).format('DD/MM/YYYY hh:mm:ss');
                return $row_output;
            }
        }
        ,
        {
            targets: -1,
            responsivePriority: 6,
            visible: false
        }
EOT;
@endphp
@include('components/datatableJS', ['datatable' => $data->datatable])
@include('components.delete', ['deleteComponent' => $data->deleteComponent]);
@endsection
@section('vendor-script')
<script src="{{asset(mix('vendors/js/extensions/moment.min.js'))}}"></script>
@endsection
