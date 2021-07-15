@extends ('layouts.main')
@section('content')

@if($errors->any())

@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  {{ $error }}
</div>
@endforeach

@endif

<div class="container">
  <h1>Create Page</h1>
  <br>
  <form action="{{ route('update', $student->id) }}" method="POST">
  {{ csrf_field()}}
  <!--without this you cannot insert all the data-->

  <h3>Edit student info</h3>
  <br><br>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="firstname" value="{{ $student->first_name }}" placeholder="First Name"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" class="form-control" name="lastname" value="{{ $student->last_name }}" placeholder="Last Name"/>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form6Example5" class="form-control" name="email" value="{{ $student->email }}" placeholder="Email"/>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="number" id="form6Example6" class="form-control" name="phone" value="{{ $student->phone }}" placeholder="Phone Number"/>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Edit data</button>
</form>

</div>
@endsection
