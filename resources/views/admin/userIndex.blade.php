@extends('myLayout.layout')

@section("main-section")


<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Users </h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email </th>
            <th scope="col">Type User </th>

          </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>

                <th scope="row">{{ $loop->iteration  }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->types  }}</td>


              </tr>

            @endforeach


        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection
