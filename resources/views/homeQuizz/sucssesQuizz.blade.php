<!DOCTYPE html>
<html lang="en">
@include('pages.headQuizz')

<body>
    @include("homeQuizz.navbar")

    <main>
        <section class="h-100">
            <header class="container h-100">
              <div class="d-flex align-items-center justify-content-center h-100">
                <div class="d-flex flex-column">
                    <img class="img-fluid" src="{{ asset("quizz/success.gif") }}" alt="">
                  <h1 class="text text-success align-self-center p-2">مبروك لقد اجتزت الاختبار بنجاح </h1>
                  <a class="btn btn-primary btn-" href="{{ route("homeQuizz","clear=true") }}">اعادة الاختبار</a>
                </div>
              </div>
            </header>
          </section>
          @include("homeQuizz.allQuizz")
    </main>
    @include('pages.script')
</body>

</html>
