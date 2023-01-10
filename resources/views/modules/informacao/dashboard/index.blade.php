@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">


@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="col-xl-12 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Estatísticas</h4>
                </div>
                <div class="card-body statistics-body ">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="gitlab" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_animal->ativos + $resume_animal->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Animais</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_user->actives + $resume_user->inactives }}
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">Usuários</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_funcionario->ativos + $resume_funcionario->inativos }}
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">Funcionários</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="sunset" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_pastagem->ativos + $resume_pastagem->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Pastagens</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="slack" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0"> {{ $resume_area->ativos + $resume_area->inativos }}
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">Áreas</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="feather" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_cultura->ativos + $resume_cultura->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Culturas</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="thermometer" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_tanque->ativos + $resume_tanque->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Tanques</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="truck" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_fornecedor->ativos + $resume_fornecedor->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Fornecedores</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="grid" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ $resume_lote->ativos + $resume_lote->inativos }}</h4>
                                    <p class="card-text font-small-3 mb-0">Lotes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                var analytics = <?php echo $raca; ?>

                google.charts.load('current', {
                    'packages': ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable(analytics);
                    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                    chart.draw(data);
                }
            </script>

            {{-- Grafico de pastagens por tipo --}}
            <script type="text/javascript">
                var analytics_pastagem = <?php echo $tipo; ?>

                google.charts.load('current', {
                    'packages': ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable(analytics_pastagem);
                    var chart = new google.visualization.PieChart(document.getElementById('pie_chart_pastagem'));
                    chart.draw(data);
                }
            </script>

            </script>

            {{-- Grafico de embriões por grau --}}
            <script type="text/javascript">
                var analytics_embrioes = <?php echo $grau; ?>

                google.charts.load('current', {
                    'packages': ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable(analytics_embrioes);
                    var chart = new google.visualization.PieChart(document.getElementById('pie_chart_embrioes'));
                    chart.draw(data);
                }
            </script>

            {{-- Grafico de lotes por fase --}}
            <script type="text/javascript">
                var analytics_lotes = <?php echo $fase; ?>

                google.charts.load('current', {
                    'packages': ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable(analytics_lotes);
                    var chart = new google.visualization.PieChart(document.getElementById('pie_chart_lotes'));
                    chart.draw(data);
                }
            </script>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-statistics">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body" align="center">
                            <div class="card-header">
                                <h4 class="card-title">Total de animais por raça</h4>
                            </div>
                            <div id="pie_chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-statistics">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body" align="center">
                            <div class="card-header">
                                <h4 class="card-title">Total de pastagens por tipo</h4>
                            </div>
                            <div id="pie_chart_pastagem">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-statistics">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body" align="center">
                                <div class="card-header">
                                    <h4 class="card-title">Total de embriões por grau de desenvolvimento</h4>
                                </div>
                                <div id="pie_chart_embrioes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-statistics">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body" align="center">
                                <div class="card-header">
                                    <h4 class="card-title">Total de lotes por fase</h4>
                                </div>
                                <div id="pie_chart_lotes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Ecommerce ends -->
    @endsection
    @section('vendor-script')
        {{-- vendor files --}}
        <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

    @endsection
    @section('page-script')
        {{-- Page js files --}}
        <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @endsection
