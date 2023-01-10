<script type="text/javascript">
    window.top.Swal.fire({
        title: '{{ $notification['title'] }}',
        html: "{!! $notification['message'] !!}",
        icon: '{{ $notification['icon'] }}',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
    @if(isset($notification['returnUrl']))
        setTimeout(function () {
            window.top.location = '{{ $notification['returnUrl'] }}';
        }, 3000);
    @endif
</script>