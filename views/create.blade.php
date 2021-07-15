@extends ('layouts.main')
@section('content')

<div class="container">
  <h1>Create Page</h1>
  <br>
  <form action="{{ route('store') }}" method="POST">

  @if($errors->any())

  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>
  @endforeach

  @endif

  {{ csrf_field()}}
  <!--without this you cannot insert all the data-->

  <h3>Add student</h3>
  <br><br>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="firstname"/>
        <label class="form-label" for="form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" class="form-control" name="lastname"/>
        <label class="form-label" for="form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form6Example5" class="form-control" name="email"/>
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="number" id="form6Example6" class="form-control" name="phone"/>
    <label class="form-label" for="form6Example6">Phone</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Add data</button>
</form>

</div>
@endsection
