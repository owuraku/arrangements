@extends('layout.master')

@section('page_title', 'Add An Arrangement')

@section('content')
<form action="{{route('arrangements.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
