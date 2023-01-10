@extends('layouts/contentLayoutMaster')

@section('title', 'Exemplo de Layout Inicial')

@section('content')
<div class="row">
    <div class="col-12">
        <p>Se quiser colocar algum texto explicativo ou algum CARD de Resumo pode aproveitar esta linha</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-12">
        @include('components.statistic', $data->statistics)
    </div>
</div>

@include('components.datatable', ['datatable' => $data->datatable])

@include('modules.exemplo.create', ['roles' => $data->roles])

@endsection

@section('page-script')

@php
    $data->datatable['columnDefs'][] = <<<'EOT'
        {
            targets: 2,
            responsivePriority: 1,
            render: function (data, type, full, meta) {
                var $user_img = full['avatar'],
                    $name = full['name'],
                    $role = full['role']['name'];
                if ($user_img) {
                    // For Avatar image
                    var $output =
                        '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                } else {
                    // For Avatar badge
                    var stateNum = full['status'];
                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                    var $state = states[stateNum],
                        $name = full['name'],
                        $initials = $name.match(/\b\w/g) || [];
                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                    $output = '<span class="avatar-content">' + $initials + '</span>';
                }

                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                // Creates full output for row
                var $row_output =
                    '<div class="d-flex justify-content-left align-items-center">' +
                    '<div class="avatar ' +
                    colorClass +
                    ' mr-1">' +
                    $output +
                    '</div>' +
                    '<div class="d-flex flex-column">' +
                    '<span class="emp_name text-truncate font-weight-bold">' +
                    $name +
                    '</span>' +
                    '<small class="emp_post text-truncate text-muted">' +
                    $role +
                    '</small>' +
                    '</div>' +
                    '</div>';
                return $row_output;
            }
        }
EOT;

$data->datatable['columnDefs'][] = Helper::buttonsCrudDatatable('modalUser');

@endphp
@include('components/datatableJS', ['datatable' => $data->datatable])

@endsection