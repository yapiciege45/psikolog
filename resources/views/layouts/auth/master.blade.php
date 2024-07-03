<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Psikolog')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    @yield('css')
</head>
<body>

    <div class="auth-container">
        <div class="container">
            <form action="@yield('action')" method="POST" class="auth-box">
                @csrf

                <h4>@yield('form-title')</h4>
                <div class="form-inputs">
                    @yield('content')
                </div>
                <button type="submit" class="submit-button">@yield('submit-title')</button>
            </form>
        </div>
        
    </div>

    @yield('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

        @if(session('message'))
            <script>
                Swal.fire({
                    text: "{{ session('message') }}",
                    icon: "{{ session('status') }}",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            </script>
        @endif

    @yield('js')
</body>
</html>