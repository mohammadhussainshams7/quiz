@extends('myLayout.layout')

@section('main-section')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Question <a class="btn btn-primary float-end" href="{{ route('quizz.index') }}">Back
                    <i class="bi bi-box-arrow-in-left"></i></a></h5>

            @if (Session::has('massage'))
                <div class="alert alert-success">
                    {{ Session::get('massage') }}
                </div>
            @endif
            <!-- Profile Edit Form -->
            <form method='post' action="{{ route('quizz.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="question" class="col-md-4 col-lg-3 col-form-label">Question</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="question" id="question">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="right_answer" class="col-md-4 col-lg-3 col-form-label">Right Answer</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="right_answer" id="right_answer">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="a1" class="col-md-4 col-lg-3 col-form-label">Answer 1</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="a1" id="a1">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="a2" class="col-md-4 col-lg-3 col-form-label">Answer 2</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="a2" id="a2">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="a3" class="col-md-4 col-lg-3 col-form-label">Answer 3</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="a3" id="a3">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="a4" class="col-md-4 col-lg-3 col-form-label">Answer 4</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="text" class="form-control" name="a4" id="a4">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-lg-3 col-form-label">image</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                </div>








                <div class="text-center">
                    <button type="submit" name="change" class="btn btn-primary" value="change">Save
                        Changes</button>
                </div>
            </form><!-- End Profile Edit Form -->

        </div>

    </div>
    </div>
@endsection
