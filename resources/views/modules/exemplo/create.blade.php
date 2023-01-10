<div class="modal modal-slide-in fade" id="modalUser">
    <div class="modal-dialog sidebar-sm">
        <form id="formUserData" action="{{ url('data/exemplo/save') }}" class="add-new-record modal-content pt-0">
            <input type="hidden" name="id" id="formUserData-id" value="" />
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h3 class="modal-title" id="exampleModalLabel">Cadastro de Usuário</h3>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="formUserData-name">Nome</label>
                    <input type="text" name="name" class="form-control dt-name" id="formUserData-name"
                        required placeholder="John Doe" aria-label="John Doe" value="" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="formUserData-role_id">Nível de Acesso</label>
                    <select id="formUserData-role_id" name="role_id" class="form-control dt-role" required>
                        <option value=""></option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="formUserData-email">Email</label>
                    <input name="email" type="text" id="formUserData-email" class="form-control dt-email" required
                        value="" placeholder="john.doe@exemplo.com" autocomplete="off"
                        aria-label="john.doe@exemplo.com" />
                    <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                </div>
                <div class="form-group">
                    <label class="form-label" for="formUserData-password">Senha</label>
                    <input id="formUserData-password" name="password" type="password" autocomplete="off" class="form-control" />
                    <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                </div>
                <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@section('page-script')
@parent
<script>
    $(document).ready(function(){
        $('#formUserData').on('submit', function () {
            $.post( this.action, $(this).serialize())
                .done(function(data) {
                    Swal.fire({
                        title: 'Parabéns!',
                        text: data.message,
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                    $('.modal').modal('hide');
                })
                .fail(function(data) {
                    Swal.fire({
                        title: 'Oops!',
                        text: data.responseJSON.message,
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                })
            ;
            return false;
        });
    });

    function editUserData(id) {
        $.getJSON("{{ url('data/exemplo') }}/" + id, function( data ) {
            $('#formUserData-id').val(data.id);
            $('#formUserData-name').val(data.name);
            $('#formUserData-email').val(data.email);
            $('#formUserData-role_id').val(data.role_id);
        });
    }
</script>
@endsection