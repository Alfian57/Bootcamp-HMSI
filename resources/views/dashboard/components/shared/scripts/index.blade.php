<script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script data-navigate-once src="{{ asset('assets/compiled/js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmation(event, text, confirmButtonText = "Yes, delete it", cancelButtonText = "Cancel") {
        event.preventDefault();
        Swal.fire({
            icon: 'question',
            title: text,
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
            customClass: {
                cancelButton: 'order-1',
                confirmButton: 'order-2',
            },
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit();
            }
        })
    };
</script>

@stack('scripts')
