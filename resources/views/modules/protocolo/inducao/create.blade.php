@extends('layouts/contentLayoutMaster')

@section('title', ' Cadastrar protocolos indução')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastrar protocolos indução
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formInducaoData" action="{{ url('data/protocolos/inducoes/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $inducao->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o nome" value="{{ $inducao->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Descrição</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="5" placeholder="Digite a descrição" required>{{ $inducao->desc ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="animal_id">Animal</label>
                                    <select name="animal_id" id="animal_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($animais as $animal)
                                            <option value="{{ $animal->id }}"
                                                {{ $animal->id == $inducao->animal_id ? 'selected="selected"' : '' }}>
                                                {{ $animal->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group" id="dt_prt">
                                    <label class="form-label" for="nome">Data do protocolo</label>
                                    <input type="date" name="dt_prt" class="form-control" id="dt_prt"
                                        value="{{ $inducao->dt_prt ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="dias_lactacao">Dia em Lactação</label>
                                    <input type="text" name="dias_lactacao" class="form-control" id="dias_lactacao"
                                        value="{{ $inducao->dias_lactacao ?? '' }}" required />
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
        $(document).ready(function() {
            $('#formInducaoData').on('submit', function() {
                postData('formInducaoData', '{{ url('protocolos/inducoes') }}');
                return false;
            });

            new Cleave('#dias_lactacao', {
                numericOnly: true,
                blocks: [4],
            });
        });
    </script>
@endsection
