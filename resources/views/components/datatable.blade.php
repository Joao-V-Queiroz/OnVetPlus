<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table{{ $datatable['element'] }} table">
                    <thead>
                        <tr>
                            <th></th>
                            @foreach($datatable['tableFields'] as $field)
                            <th>{{ $field['name'] }}</th>
                            @endforeach
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>