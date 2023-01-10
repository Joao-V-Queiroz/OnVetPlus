@if(!is_null($itens))
<div class="paging_simple_numbers" style="padding: 20px;">
    <ul class="pagination" style="float: left;">
        <li class="paginate_button page-item disabled">
            <a href="javascript:void(0);" class="page-link" style="font-size: 0.8rem;">
                &nbsp;&nbsp;
                Total de Registros:
                {{$itens->total()}}
                &nbsp;&nbsp;
            </a>
        </li>
    </ul>

    <ul class="pagination" style="float: right;">
        @if($itens->currentPage()>1)
        <li class="paginate_button page-item" onclick="paginate( '{{ $form }}', 1)">
            <a href="javascript:void(0);" class="page-link">
                <i data-feather="chevrons-left" class="mr-50"></i>
            </a>
        </li>

        <li class="paginate_button page-item" onclick="paginate( '{{ $form }}', {{ ($itens->currentPage()-1) }} )">
            <a href="javascript:void(0);" class="page-link">
                <i data-feather="chevron-left" class="mr-50"></i>
            </a>
        </li>
        @endif
        <li class="paginate_button page-item disabled">
            <a href="javascript:void(0);" class="page-link" style="font-size: 0.8rem;">
                Página {{ $itens->currentPage() }}
                de
                {{ $itens->lastPage() }}
            </a>
        </li>
        @if($itens->currentPage()<$itens->lastPage())
        <li class="paginate_button page-item" onclick="paginate( '{{ $form }}', {{ ($itens->currentPage()+1) }} )">
            <a href="javascript:void(0);" class="page-link">
                <i data-feather="chevron-right" class="mr-50"></i>
            </a>
        </li>
        <li class="paginate_button page-item" onclick="paginate( '{{ $form }}', {{ $itens->lastPage() }})">
            <a href="javascript:void(0);" class="page-link">
                <i data-feather="chevrons-right" class="mr-50"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif