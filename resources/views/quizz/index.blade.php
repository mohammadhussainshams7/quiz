@extends('myLayout.layout')

@section("main-section")

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Quizz <a class="btn btn-primary float-end" href="{{ route("quizz.create") }}">New  <i class="bi bi-plus"></i></a></h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Answer 1</th>
            <th scope="col">Answer 2</th>
            <th scope="col">Answer 3</th>
            <th scope="col">Answer 4</th>
            <th scope="col">image</th>
            <th colspan="3">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($quizz as $item)
            <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>{{ $item->question }}</td>
                <td>{{ $item->right_answer }}</td>
                <td>{{ $item->a1 }}</td>
                <td>{{ $item->a2 }}</td>
                <td>{{ $item->a3 }}</td>
                <td>{{ $item->a4 }}</td>
                <td>{{ $item->image }}</td>
                <td><a href="{{ route("quizz.show" , $item->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                <td><a href="{{ route("quizz.edit" , $item->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>
                <td><a href="{{ route("quizz.destroy" ,$item->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>


@endsection
