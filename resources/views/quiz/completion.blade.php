<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Quiz Completed</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('./css/quiz/completion.css') }}">
</head>

<body>
    <div class="alert alert-success" role="alert">
        <img src="{{ asset('./img/logo-emsi.png') }}" alt="">
        <div class="main">
            <h4 class="alert-heading">Well done
                <span class="text-success">{{ Auth::user()->name }}</span>!
            </h4>
            <p>You've completed the quiz successfully!</p>
            <hr>
            <strong class="grade">Your grade is
                <span class="text-{{ $score >= 50 ? 'success' : 'danger' }}">{{ $score }}%</span>
            </strong><br>   
        </div>

        <a class="btn btn-success btn-lg mt-3 w-100" href="{{ route('logout') }}">Checked!</a>
    </div>
</body>

</html>
