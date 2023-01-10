@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Controle de Acesso')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">

    <!-- Boostrap 5.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection

@section('content')     
            <!-- ====== Login Start ====== -->
            <section class="vh-100">
                <div class="container-fluid h-custom loginN">
                    <div class="row d-flex justify-content-center align-items-center h-100" style="padding-top: 25px">
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                            <form class="auth-login-form mt-2" action="" method="POST">
                                <div
                                    class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                    <div id="esp">
                                        <h1>
                                            Bem vindo <br>
                                            <span id="azul">On</span>Vet
                                        </h1>
                                    </div>

                                </div>


                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">E-mail</label>
                                    <input class="form-control" id="login-email" typejoao="text" 
                                    name="email" placeholder="email@exemplo.com"
                                    aria-describedby="email" autofocus="" tabindex="1"
                                    value="{{ old('email') }}" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example4">Senha</label>
                                    <input class="form-control form-control-merge" id="login-password" type="password" name="password"
                                 aria-describedby="login-password" tabindex="2" />
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-0">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3" />
                                        <label class="form-check-label" for="form2Example3">
                                            Lembrar-me
                                        </label>
                                    </div>
                                    <a href="#!" class="text-body">Esqueceu a senha?</a>
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    @include('shared.alerts')
                                    <button class="btn btn-primary btn-block" tabindex="4">Entrar</button>
                                </div>
                                <div class="final">

                                </div>

                            </form>
                        </div>
                        <div class="col-md-9 col-lg-6 col-xl-4">
                            <img src="images\fundo\fundo.svg" class="img-fluid" alt="Logo" style="width: 100%">
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/page-auth-login.js')) }}"></script>
@endsection
