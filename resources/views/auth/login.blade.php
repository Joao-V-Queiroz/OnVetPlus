@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Controle de Acesso')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v2">
    <div class="auth-inner row m-0">
        <!-- Brand logo-->
        <a href="/" class="d-none d-lg-block d-md-none brand-logo" href="javascript:void(0);">
            <img src="{{ asset('images/logo/on_vet_transp_2.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" />
        </a>
        <!-- /Brand logo-->
        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{asset('img\vacaLeitera.png')}}" alt="" style="width: 40%;" />
            </div>
        </div>
        <!-- /Left Text-->
        <!-- Login-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <h1>
                    Bem vindo 
                    <span style="color: blue;">On</span>Vet
                </h1>
                </div>
                <p class="card-text mb-2">Informe seus dados de acesso</p>
                <form class="auth-login-form mt-2" action="" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="login-email">E-mail</label>
                        <input class="form-control" id="login-email" type="text" 
                            name="email" placeholder="joao@onvet.com.br"
                            autofocus="" tabindex="1"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="login-password">Senha</label>
                            <a href="{{url("/forgot-password")}}">
                                <small>Esqueceu a Senha?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="login-password" type="password" name="password"
                                placeholder="············" aria-describedby="login-password" tabindex="2" />
                            <div class="input-group-append">
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    @include('shared.alerts')
                    <button class="btn btn-primary btn-block" tabindex="4">Entrar</button>
                </form>
            </div>
        </div>
        
        <!-- /Login-->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-auth-login.js'))}}"></script>
@endsection