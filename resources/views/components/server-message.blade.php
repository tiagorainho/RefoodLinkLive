<script>
    window.addEventListener('server-notification', event => {
        showNotification(event.detail.mode, event.detail.message)
    })

    function showNotification(mode, message) {
        switch(mode) {
            case 'success':
                Notiflix.Notify.Success(message)
                break;
            case 'warning':
                Notiflix.Notify.Warning(message)
                break;
            case 'info':
                Notiflix.Notify.Info(message)
                break;
            case 'error':
                Notiflix.Notify.Failure(message)
                break;
        }
    }
    @if(session()->has('server-notification'))
        showNotification(`{{ session('server-notification')['mode'] }}`,`{{ session('server-notification')['message'] }}`)
    @endif
</script>