@extends ('layouts.main')
@section('content')

<div class="container">
  <h1>Home Page</h1>
  <br>
  <br>

  @if (session('successMsg'))

  <div class="alert alert-success" role="alert">
    {{ session('successMsg')}}
  </div>

  @endif

  <div class="container">
    <table class="table table-hover">
      <thead class="black white-text">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{ $student->id }}</th>
          <td>{{ $student->first_name }}</td>
          <td>{{ $student->last_name }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->phone }}</td>
          <td><a href="{{ route('edit', $student->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:black"></i></a>

            <form id="delete-form-{{ $student->id }}" method="POST" action="{{ route('delete', $student->id) }}" style="display:none;">>
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>

            <button onclick="if(confirm('Are you sure to delete this data?')) {
              event.preventDefault();
              document.getElementById('delete-form-{{ $student->id }}').submit();
            }else{
              event.preventDefault();
            }" class="btn btn-danger btn-sm">
            <i class="fa fa-trash" aria-hidden="true" style="color:white"></i>

            </td>
            </button>


        </tr>

        @endforeach
      </tbody>
    </table>



  </div>

  {{ $students->links() }}
</div>


@endsection
