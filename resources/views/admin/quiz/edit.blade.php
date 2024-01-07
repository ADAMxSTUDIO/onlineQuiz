<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Quiz - Edit</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/layouts/adminPanel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/crud.css') }}">
</head>

<body>
</body>
@include('layouts.nav')
@include('layouts.adminPanel')

<section class="container mb-5">
    <h1 class="text-success text-center m-5">Quiz - Edit</h1>

    <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label text-success">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $quiz->title }}" autofocus>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label text-success">Duration</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $quiz->duration }}">
        </div>
        <div class="mb-3">
            <label for="professor_name" class="form-label text-success">Professor</label>
            <input type="text" class="form-control" id="professor_name" name="professor_name"
                value="{{ $quiz->professor_name }}">
        </div>
        <div class="mb-3">
            <label for="module_name" class="form-label text-success">Module</label>
            <input type="text" class="form-control" id="module_name" name="module_name"
                value="{{ $quiz->module_name }}">
        </div>
        <input type="submit" class="btn btn-success w-100" value="Update">
    </form>
</section>

</html>
