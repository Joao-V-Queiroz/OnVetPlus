<script>
$('#{{ $deleteComponent['element'] }}').on('click', function () {
    if(confirm('Você tem certeza que deseja APAGAR este item?')) {
        let delete_id = {{ $deleteComponent['id'] }};
        $.post( '{{ url($deleteComponent['endpoint']) }}', { id: delete_id })
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
                @if(isset($deleteComponent['url']) && $deleteComponent['url'] != "")
                setTimeout(function() {
                    window.location="{{ url($deleteComponent['url']) }}";
                }, 2000);
                @endif
            })
            .fail(function(data) {
                console.log(data.responseJSON.message);
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
    }
});
</script>