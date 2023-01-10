@extends('layouts/contentLayoutMaster')

@section('title', 'Sêmens')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Sêmens
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formSemenData" action="{{ url('data/rebanho/semens/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $semen->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Sêmen" value="{{ $semen->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="registro">Registro</label>
                                    <input type="text" name="registro" class="form-control" id="registro"
                                        placeholder="Digite o registro do sêmen" value="{{ $semen->registro ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="central">Central</label>
                                    <input type="text" name="central" class="form-control" id="abv"
                                        placeholder="Digite a central" value="{{ $semen->central ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="raca">Raça</label>
                                    <select name="raca" id="raca" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($semen->getRacas() as $value => $label)
                                            <option
                                                {{ isset($semen->raca) && $semen->raca == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Tipos de Sêmen</label>
                                    <div class="input-group mb-2">
                                        <select multiple id="tipos" name="tipos[]" class="form-control" required>
                                            <option value=""></option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Convencional', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Convencional">
                                                Convencional
                                            </option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Sexado Macho', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Sexado Macho">
                                                Sexado Macho
                                            </option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Sexado Fêmea', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Sexado Fêmea">
                                                Sexado Fêmea
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Mais opções</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="sangue">Grau de Sangue</label>
                                                    <select name="sangue" id="sangue" class="form-control" required>
                                                        <option value=""></option>
                                                        @foreach ($semen->getSangues() as $value => $label)
                                                            <option
                                                                {{ isset($semen->sangue) && $semen->sangue == $value ? 'selected="selected"' : '' }}
                                                                value="{{ $value }}">
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="raca">Raça 2</label>
                                                    <select name="raca_2" id="raca_2" class="form-control" required>
                                                        <option value=""></option>
                                                        @foreach ($semen->getRacas2() as $value => $label)
                                                            <option
                                                                {{ isset($semen->raca_2) && $semen->raca_2 == $value ? 'selected="selected"' : '' }}
                                                                value="{{ $value }}">
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="animais_id">Pai</label>
                                                    <select name="animais_id" id="animais_id" class="form-control" required>
                                                        <option value="">Selecione:</option>
                                                        @foreach ($animais as $animal)
                                                            <option value="{{ $animal->id }}"
                                                                {{ $animal->id == $semen->animais_id ? 'selected="selected"' : '' }}>
                                                                {{ $animal->nome }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="animal_id">Mãe</label>
                                                    <select name="animal_id" id="animal_id" class="form-control"
                                                        required>
                                                        <option value="">Selecione:</option>
                                                        @foreach ($animais2 as $animal)
                                                            <option value="{{ $animal->id }}"
                                                                {{ $animal->id == $semen->animal_id ? 'selected="selected"' : '' }}>
                                                                {{ $animal->nome }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tec">Técnico</label>
                                                    <input type="text" name="tec" class="form-control"
                                                        id="tec" placeholder="Digite o nome do técnico responsável" required
                                                        value="{{ $semen->tec ?? '' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="partida">Partida</label>
                                                    <input type="text" name="partida" class="form-control"
                                                        id="partida" placeholder="Digite a partida"
                                                        required value="{{ $semen->partida ?? '' }}" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="observacao">Observação</label>
                                                    <textarea class="form-control" name="observacao" id="observacao" rows="5"
                                                        placeholder="Digite uma observação sobre o sêmen">{{ $semen->observacao ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            $('#formSemenData').on('submit', function() {
                postData('formSemenData', '{{ url('rebanho/semens') }}');
                return false;
            });
            new Cleave('#registro', {
                numericOnly: true,
                blocks: [7],
            });

            $('#tipos').select2({
                closeOnSelect: false
            });
        });
    </script>
@endsection
