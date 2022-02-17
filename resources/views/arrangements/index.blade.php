@extends('layout.master')

@section('page_title', 'List of arrangements')

@section('content')
<div>
    <a class="btn btn-primary" href="{{route('arrangements.new')}}">Add New Arrangement</a>
</div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($arrangements as $arrangement)
      <tr>
        <th scope="row">{{$arrangement->name}}</th>
        <td>
            <td>
            <a type="button"
            href="{{route('arrangements.edit', ['id' => $arrangement->id])}}"
            class="btn btn-primary">Edit</a>
            <a type="button"
            href="{{route('arrangements.view', ['id' => $arrangement->id])}}"
            class="btn btn-secondary">View Form</a>

            {{-- <button type="button"
            onclick="openModal('{{$student->firstname}}', '{{$student->id}}')"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteCourseModal">Delete</button> --}}
        </td>
        </td>
      </tr>

      @endforeach
  </tbody>
</table>

{{$arrangements->links()}}
@endsection


@section('scripts')

@endsection
