@extends('layouts/contentLayoutMaster')

@section('title', ' Cadastrar protocolo TE')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastrar protocolo TE
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formTeData" action="{{ url('data/protocolos/tes/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $te->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o nome" value="{{ $te->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Descrição</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="5" placeholder="Digite a descrição" required>{{ $te->desc ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="animais_id">Pai</label>
                                    <select name="animais_id" id="animais_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($animais as $animal)
                                            <option value="{{ $animal->id }}"
                                                {{ $animal->id == $te->animais_id ? 'selected="selected"' : '' }}>
                                                {{ $animal->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="animal_id">Mãe</label>
                                    <select name="animal_id" id="animal_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($animais2 as $animal)
                                            <option value="{{ $animal->id }}"
                                                {{ $animal->id == $te->animal_id ? 'selected="selected"' : '' }}>
                                                {{ $animal->nome }} </option>
                                        @endforeach
                                    </select>
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
            $('#formTeData').on('submit', function() {
                postData('formTeData', '{{ url('protocolos/tes') }}');
                return false;
            });
        });
    </script>
@endsection
