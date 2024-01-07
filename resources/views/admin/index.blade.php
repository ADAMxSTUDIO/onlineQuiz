<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/adminPanel.css') }}">
</head>

<body>
    @include('layouts.nav')
    @include('layouts.adminPanel')

    <section class="container">
        <h1 class="text-center bg-light"><b>ADMIN DASHBOARD</b></h1>

        @include('layouts.alerts')

        <div class="quiz">
            <h3 class="text-center text-success">Quiz Dashboard</h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Module</th>
                        <th scope="col">Creation date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $quiz->title }}</th>
                        <td>{{ $quiz->duration }}</td>
                        <td>{{ $quiz->professor_name }}</td>
                        <td>{{ $quiz->module_name }}</td>
                        <td>{{ $quiz->created_at }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.quiz.edit', $quiz->id) }}">
                                <i class="fa-solid fa-pen"></i>
                                <strong>Edit</strong>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><br>


        <div class="question">
            <h3 class="text-center text-success">Questions Dashboard
                <a id="new-question" class="btn btn-success" href="{{ route('admin.question.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    <strong>New</strong>
                </a>
            </h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Content</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Correct Answers</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quiz->questions as $question)
                        <tr>
                            <th scope="row">{{ $question->id }}</th>
                            <td class="wrap-content">{{ $question->content }}</td>
                            <td>{{ $question->grade }}</td>
                            <td>{{ $question->correct_answers }}</td>
                            <td>
                                <a class="btn btn-dark"
                                    href="{{ route('admin.answers', ['questionId' => $question->id]) }}">
                                    <i class="fa-solid fa-caret-down"></i>
                                    <strong>Answers</strong>
                                </a>
                                <a class="btn btn-success" href="{{ route('admin.question.edit', $question->id) }}">
                                    <i class="fa-solid fa-pen"></i>
                                    <strong>Edit</strong>
                                </a>
                                <a class="btn btn-danger" href="{{ route('admin.question.destroy', $question->id) }}">
                                    <i class="fa-solid fa-trash"></i>
                                    <strong>Delete</strong>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <b>No question is inserted yet, create new questions now!</b>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div><br>

        <div class="answer" id="answer">
            <h3 class="text-center text-success">Answers Dashboard
                <a id="new-answer" class="btn btn-success" href="{{ route('admin.answer.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    <strong>New</strong>
                </a>
            </h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Content</th>
                        <th scope="col">Correct/ Not correct</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (session('answers') ?? [] as $answer)
                        <tr>
                            <th scope="row">{{ $answer->id }}</th>
                            <td class="wrap-content">{{ $answer->content }}</td>
                            <td>{{ $answer->is_correct ? 'Correct' : 'Not correct' }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.answer.edit', $answer->id) }}">
                                    <i class="fa-solid fa-pen"></i>
                                    <strong>Edit</strong>
                                </a>
                                <a class="btn btn-danger" href="{{ route('admin.answer.destroy', $answer->id) }}">
                                    <i class="fa-solid fa-trash"></i>
                                    <strong>Delete</strong>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <b>Select the question you want to display its answers, use
                                    <a class="btn btn-dark" href="">
                                        <i class="fa-solid fa-caret-down"></i>
                                        <strong>Answers</strong>
                                    </a>
                                    on the desired question!</b>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </section>

</body>

</html>
