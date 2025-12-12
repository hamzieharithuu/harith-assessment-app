<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Astro v5.13.2" />
    <title>2Q Alliance Assessment</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9" />
    <link href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.4/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet" />
    {!! ToastMagic::styles() !!}
    @livewireStyles()
</head>

<body>
    @include('layouts.header')
    <main class="container">
        <div class="row">
            {{ $slot }}
        </div>
    </main>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.5/datatables.min.js"
        integrity="sha384-nhDlWXAURrLQOkCo8hXDhpFWZjzFzX/udlaGLd8PDMKvv67k6YMfex2pZjLU6o2U" crossorigin="anonymous">
    </script>
    <script src="
                        https://cdn.jsdelivr.net/npm/sweetalert2@11.26.4/dist/sweetalert2.all.min.js
                        "></script>
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
    @yield('script')
    @livewireScripts()
</body>

</html>
