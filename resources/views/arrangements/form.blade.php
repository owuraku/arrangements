@extends('layout.master')

@section('page_title', 'Arrangement Form')

@section('content')
<h2 class="text-center text-uppercase"> {{$arrangement->name}} </h2>

@foreach ($arrangement->formfields as $field)
    <x-form-field-component :field="$field" />
@endforeach
<button type="submit" class=" p-2 mt-3 btn btn-primary btn-lg">Submit</button>
@endsection


@section('scripts')

@endsection
