<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.addEventListener('load', function() {
        const notification = @json($notification);

        if (notification && notification.message) {

            const storageKey = 'notification_shown_' + notification.id;

            if (!localStorage.getItem(storageKey)) {
                Swal.fire({
                    icon: 'info',
                    title: 'Chúng tôi xin thông báo',
                    html: notification.message,
                    confirmButtonText: 'Tôi đã hiểu',
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.setItem(storageKey, 'true');
                    }
                });
            }
        }
    });
</script>
