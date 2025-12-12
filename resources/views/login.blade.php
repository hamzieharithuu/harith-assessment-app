<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Astro v5.13.2" />
    <title>2Q Alliance Assessment</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="{{ asset('sign-in.css') }}" rel="stylesheet" />
    @livewireStyles()
    {!! ToastMagic::styles() !!}
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    @livewire('auth.login')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm">
    </script>
    {!! ToastMagic::scripts() !!}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('toast'))
                Livewire.dispatch('toastMagic', {
                    status: "{{ session('toast.status') }}",
                    title: "{{ session('toast.title') }}",
                    message: "{{ session('toast.message') }}",
                    options: {
                        showCloseBtn: true
                    }
                });
            @endif
        });
    </script>
    @livewireScripts()
</body>

</html>
