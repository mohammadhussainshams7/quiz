<!DOCTYPE html>
<html lang="en">
@include('pages.headQuizz')

<main >
    @include("homeQuizz.navbar")

    <section class="h-100">
        <header class="container h-100">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="d-flex flex-column">
                <img class="img-fluid w-75" src="{{ asset("quizz/piffle-error.gif") }}" alt="">

              <h1 class="text text-danger align-self-center p-2"> اجابة خاطئة </h1>
              <h4 class="text text-success">لقد اجبت اجابة صحيحة  عدد {{ $currentPages }}  <span class="text text-danger">من عدد {{ $allPage }}</span></h4>

              <a class="btn btn-primary btn-" href="{{ route("homeQuizz","clear=true") }}">اعادة الاختبار</a>
            </div>
          </div>
        </header>
      </section>
      @include("homeQuizz.allQuizz")
 {{--    <div class="row">
            <a class="btn btn-primary" href="{{ route("homeQuizz") }}">اضغط هنا</a>

    </div> --}}

</main>
@include('pages.script')
</body>

</html>
