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
                <img src="{{ asset('images/logo/on_vet_transp_2.png') }}" alt="{{ config('app.name') }}"
                    title="{{ config('app.name') }}" />
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid" src="{{ asset('img\vacaLeitera.png') }}" alt="" style="width: 40%;" />
                </div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    
                        <h2 style="text-align:center">
                            Redefinir Senha
                        </h2>
                    
                    <x-auth-card>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email:')" />

                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)"
                                    required autofocus />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Nova senha:')" />

                                <x-input id="password" class="form-control" type="password" name="password" required />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirme a nova senha:')" />

                                <x-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button class="btn btn-primary btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </x-auth-card>
                </div>
            </div>

            <!-- /Login-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/page-auth-reset-password.js')) }}"></script>
@endsection
