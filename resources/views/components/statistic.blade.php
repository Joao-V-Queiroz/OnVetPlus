<div class="card card-statistics">
    <div class="card-header">
        <h4 class="card-title">{{ $title ?? "" }}</h4>
        <div class="d-flex align-items-center">
            <p class="card-text mr-25 mb-0">{{ $observation ?? "" }}</p>
        </div>
    </div>
    <div class="card-body statistics-body">
        <div class="row">
            @if(isset($items) && count($items) > 0)
            @foreach($items as $item)
            <div class="col-md-{{ floor(12/count($items)) >= 1 ? floor(12/count($items)) : 1 }} col-sm-6 col-12 mb-2 mb-md-0">
                <div class="media">
                    <div class="avatar bg-light-primary mr-2">
                        <div class="avatar-content">
                            <i data-feather="{{ $item['icone'] }}" class="avatar-icon"></i>
                        </div>
                    </div>
                    <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0">{{ $item['valor'] }}</h4>
                        <p class="card-text font-small-3 mb-0">{{ $item['nome'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    <div class="alert-body">
                    Não há itens para serem exibidos.
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>