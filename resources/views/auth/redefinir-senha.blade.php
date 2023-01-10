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
        <a class="d-none d-lg-block d-md-none brand-logo" href="javascript:void(0);">
            <img src="{{ asset('images/logo/favicon.ico') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" />
        </a>
        <!-- /Brand logo-->
        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="{{asset('images/pages/login.png')}}" alt="" />
            </div>
        </div>
        <!-- /Left Text-->
        <!-- Login-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <div class="col-12 text-center">
                    <img class="img-fluid" src="{{ asset('images/logo/favicon.ico') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" />
                    <br><br>
                </div>
                <h2 class="card-title font-weight-bold mb-1">Redefinir Senha 🔒</h2>
                <p class="card-text mb-2"> Olá <b>{{$user->name}}</b>. Para sua segurança, você deve alterar sua senha no primeiro acesso</p>
                <form class="auth-reset-password-form mt-2" action="/redefinir-senha" method="POST">
                    <input type="hidden" name="id" value="{{ $user->id}}">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-new">Nova Senha</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="resetPasswordNew" type="password" name="resetPasswordNew" placeholder="············" aria-describedby="reset-password-new" autofocus="" tabindex="1" />
                            <div class="input-group-append">
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-confirm">Confirmar Senha</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="resetPasswordConfirm" type="password" name="resetPasswordConfirm" placeholder="············" aria-describedby="reset-password-confirm" tabindex="2" />
                            <div class="input-group-append">
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" tabindex="3">Alterar Senha</button>
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
<script src="{{asset(mix('js/scripts/pages/page-auth-reset-password.js'))}}"></script>
@endsection