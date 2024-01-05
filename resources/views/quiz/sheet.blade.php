<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Quiz</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/quiz/sheet.css') }}">
</head>

<body>
    @include('layouts.nav')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <section id="quiz">
                    <h1>{{ $quiz->title }}</h1>
                    <div class="info">
                        <div class="info-1">
                            <strong>
                                <i class="fa-solid fa-chalkboard-user"></i> {{ $quiz->professor_name }}
                            </strong>
                            <strong>
                                <i class="fa-solid fa-book"></i> {{ $quiz->module_name }}
                            </strong>
                        </div>
                        <div class="info-1">
                            <strong>
                                <i class="fa-solid fa-clock"></i> {{ $quiz->duration }} min
                            </strong>
                        </div>

                    </div>

                    <form id="quiz-form" method="POST" action="{{ route('quiz.completion') }}">
                        @csrf

                        @foreach ($quiz->questions as $question)
                            <div class="question">
                                <div class="question-header">
                                    <p class="text-success">{{ $question->id }}. {{ $question->content }}</p>
                                    {{-- {{ $question->correct_answers }} --}}
                                    <span>
                                        <span id="id="q-grade"">0</span>/{{ $question->grade }}
                                    </span>
                                </div>

                                @foreach ($question->answers as $answer)
                                    <label for="{{ $answer->id }}">
                                        @if ($question->correct_answers > 1)
                                            <input type="checkbox" 
                                                    id="{{ $answer->id }}"
                                                    name="q{{ $question->id }}[]" 
                                                    value="{{ $answer->is_correct }}">
                                            {{ $answer->content }}
                                        @else
                                            <input type="radio" 
                                                    id="{{ $answer->id }}" 
                                                    name="q{{ $question->id }}"
                                                    value="{{ $answer->is_correct }}">
                                            {{ $answer->content }}
                                        @endif
                                    </label><br>
                                @endforeach
                            </div>
                        @endforeach

                        <input type="submit" value="SUBMIT IT NOW!" class="btn btn-success w-100">
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
