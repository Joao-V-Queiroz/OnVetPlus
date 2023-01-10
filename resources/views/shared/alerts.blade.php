@if(Session::has('flash_message'))
<div class="col-12 alert alert-success" role="alert">
    <h4 class="alert-heading">Sucesso</h4>
    <div class="alert-body">
        {!! Session::get('flash_message') !!}
    </div>
</div>
@endif
@if(Session::has('error_message'))
<div class="col-12 alert alert-danger" role="alert">
    <h4 class="alert-heading">Erro</h4>
    <div class="alert-body">
        <h3>
            {!! Session::get('error_message') !!}
        </h3>
    </div>
</div>
@endif
@if (count($errors) > 0)
<div class="col-12 alert alert-danger" role="alert">
    <h4 class="alert-heading">Erros</h4>
    <div class="alert-body">
        <h3>
            @foreach ($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </h3>
    </div>
</div>
@endif