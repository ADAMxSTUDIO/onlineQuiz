<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Answer - Edit</title>
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
    <h1 class="text-success text-center m-5">Answer - Edit</h1>

    <form action="{{ route('admin.answer.update', $answer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label text-success">Content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{ $answer->content }}"
                autofocus>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label text-success">Correct answer?</label><br>
            <input class="form-check-input" type="radio" name="is_correct" id="Yes" value="1"
                @if ($answer->is_correct) checked @endif>
            <label class="form-check-label" for="Yes">Yes
                <input class="form-check-input" type="radio" name="is_correct" id="No" value="0"
                    @if (!$answer->is_correct) checked @endif>
                <label class="form-check-label" for="No">No
        </div>
        <div class="mb-3">
            <label for="question_id" class="form-label text-success">Question</label>
            <select class="form-select" aria-label="Default select example" name="question_id">
                @forelse ($questions as $question)
                    @if ($question->id === $answer->question->id)
                        <option selected value="{{ $question->id }}">{{ $question->id }} - {{ $question->content }}
                        </option>
                    @else
                        <option value="{{ $question->id }}">{{ $question->id }} - {{ $question->content }}</option>
                    @endif
                @empty
                    <option>No question is inserted yet!</option>
                @endforelse
            </select>
        </div>

        <input type="submit" class="btn btn-success w-100" value="Update">
    </form>
</section>

</html>
