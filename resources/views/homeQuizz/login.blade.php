
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Quizz</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{  asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                      {{--   <div >{{ __('تسجيل الاسم') }}</div> --}}
                        <h3 class="card-header">Sign In Quiz</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loginUser') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="g-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                            </div>
                            <a href="{{ route("adminLogins") }}">Go To Admin Panal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

