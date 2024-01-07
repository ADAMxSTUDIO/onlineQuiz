<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>

<body>
    <section class="container-fluid p-4">
        <img id="logo" class="w-50" src="{{ asset('img/logo-emsi.png') }}" alt="EMSI Logo">
        @if (session()->has('hasPassed'))
            <div class="alert alert-danger" role="alert" style="margin-top: 30px">
                <i class="fa-solid fa-circle-exclamation"></i>
                Error, {{ session('hasPassed') }}
            </div>
        @elseif(session()->has('submitted'))
            <div class="alert alert-success" role="alert" style="margin-top: 30px">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('submitted') }}
            </div>
        @elseif (session()->has('isAdmin'))
            <div class="alert alert-danger" role="alert" style="margin-top: 30px">
                <i class="fa-solid fa-circle-exclamation"></i>
                Error, {{ session('isAdmin') }}
            </div>
        @endif

        <h1 class="text-success">LOGIN</h1><br>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">EMSI address*</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" autocomplete="email" autofocus required name="email" type="email"
                    aria-describedby="emailHelp" placeholder="NomPrenom@edu-emsi.ma" />

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password*</label>
                <div class="input-group">
                    <input id="password" name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="current-password" />
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>

                @error('password')
                    <span class="invalid-feedback d-flex" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <strong id="emailHelp" class="form-text text-success">!important: All fields with * are
                required</strong>
            <input name="submit" type="submit" class="btn btn-success w-100 mt-4" value="Login" />
        </form>
    </section>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.querySelector('#togglePassword i.fa-solid');

        togglePassword.addEventListener('click', function() {
            // Toggle the password field visibility
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Change the eye icon based on password field visibility
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>

</body>

</html>
