@extends('myLayout.layout')

@section('main-section')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Quiz Details Question: {{ $quizz->question }} <a class="btn btn-primary float-end"
                    href="{{ route('quizz.index') }}">Back
                    <i class="bi bi-box-arrow-in-left"></i></a></h5>
                    <ul class="list-group list-group-flush">
                        @if ($quizz->image)
                            <img src="{{ asset("quizz/$quizz->image") }}" class="img-fluid" alt="" width="300">
                        @endif
                        <li class="list-group-item mt-5">Right Answer: {{ $quizz->right_answer }}</li>
                        <hr />
                        <li class="list-group-item">Answer 1: {{ $quizz->a1 }}</li>
                        <hr />
                        <li class="list-group-item">Answer 2: {{ $quizz->a2 }}</li>
                        <hr />
                        <li class="list-group-item">Answer 3: {{ $quizz->a3 }}</li>
                        <hr />
                        <li class="list-group-item">Answer 4: {{ $quizz->a4 }}</li>
                        <hr />
                        <li class="list-group-item">Created At: {{ $quizz->created_at }}</li>
                        <hr />
                        <li class="list-group-item">Updated At: {{ $quizz->updated_at }}</li>
                        <hr />

                    </ul>
        </div>
    </div>
@endsection
