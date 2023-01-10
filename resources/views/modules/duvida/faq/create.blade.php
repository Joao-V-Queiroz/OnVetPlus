@extends('layouts/contentLayoutMaster')

@section('title', 'FAQ')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastro de FAQs
                    <br />
                    <small>(Perguntas e Respostas Frequentes)</small>
                </h3>
            </div>
            <div class="card-body">
                <form id="formFaqData" action="{{ url('data/duvida/faqs/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $faq->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Pergunta</label>
                                <input type="text" name="pergunta" class="form-control" id="pergunta"
                                    placeholder="Digite a Pergunta" value="{{ $faq->pergunta ?? '' }}" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Resposta</label>
                                <textarea class="form-control" name="resposta" id="resposta" rows="5"
                                    placeholder="Digite a Resposta" required>{{ $faq->resposta ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo" value="1"                                       
                                    {{ !isset($faq->ativo) || ( isset($faq->ativo) && $faq->ativo == 1 ) ? 'checked="checked"' : '' }}> 
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $('#formFaqData').on('submit', function () {
            postData('formFaqData', '{{ url("duvida/faqs") }}');
            return false;
        });
    });
</script>
@endsection