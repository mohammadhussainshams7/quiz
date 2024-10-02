<!DOCTYPE html>
<html lang="en">
@include('pages.headQuizz')


<body>
    @include('homeQuizz.navbar')
  {{--   <main>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach ($quizz as $item)
                        <div class="card text-center">
                            <h3 class="card-header">{{ $item->question }}</h3>
                            <div class="card-body">
                                <form
                                    action="{{ route('checkQuizz', ['id_question' => $item->id, 'currentPage' => $quizz->currentPage(), 'allPages' => $quizz->total()]) }}"
                                    method="get">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_answer" id="one"
                                            value="{{ $item->a1 }}">
                                        <label class="form-check-label" for="one">
                                            {{ $item->a1 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_answer" id="two"
                                            value="{{ $item->a2 }}">
                                        <label class="form-check-label" for="two">
                                            {{ $item->a2 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_answer" id="three"
                                            value="{{ $item->a3 }}">
                                        <label class="form-check-label" for="three">
                                            {{ $item->a3 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_answer" id="four"
                                            value="{{ $item->a4 }}">
                                        <label class="form-check-label" for="four">
                                            {{ $item->a4 }}
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center"> <button type="submit"
                                                class="btn btn-primary px-4 py-2 fw-bold">
                                                استمر

                                            </button> </div>
                                </form>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>


    </main> --}}

     <!-- Start Main -->
     <main class="main">
        <div class="container">
            <section class="question">
                <div class="card">
                    @foreach ($quizz as $item)
                    <div class="card-body">

                        <p class="text-muted">Question {{  $quizz->currentPage() }} of {{ $quizz->total() }}</p>
                        <h5 class="card-title">{{ $item->question }}</h5>
                    </div>
                </div>
            </section>
            <section class="ansser">
                <div class="card">
                    <div class="card-body">
                        <form
                        action="{{ route('checkQuizz', ['id_question' => $item->id, 'currentPage' => $quizz->currentPage(), 'allPages' => $quizz->total()]) }}"
                        method="get">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_answer"  value="{{ $item->a1 }}" id="Ansser1">
                            <label class="form-check-label" for="Ansser1">
                              {{ $item->a1 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_answer" value="{{ $item->a2 }}"  id="Ansser2">
                            <label class="form-check-label" for="Ansser2">
                                {{ $item->a2 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_answer" value="{{ $item->a3 }}"  id="Ansser3">
                            <label class="form-check-label" for="Ansser3">
                                {{ $item->a3 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_answer" value="{{ $item->a4 }}"  id="Ansser4">
                            <label class="form-check-label" for="Ansser4">
                                {{ $item->a4 }}
                            </label>
                          </div>
                     <!-- Start Footer -->
      <footer >
        <div class="container footer">
            <div class="container">
                <button  type="submit"     class="form-control btn btn-success">Next</button>

            </div>
        </div>
      </footer>
     <!-- End Footer -->

                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
    <!-- End Main -->


    @include('pages.script')
</body>

</html>
