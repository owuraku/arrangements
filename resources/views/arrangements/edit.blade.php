@extends('layout.master')

@section('page_title', 'Edit Arrangement Form')

@section('content')
<link rel="stylesheet" href="{{asset('css/draggable.css')}}">
<h3 class="text-center">
    {{$arrangement->name}}
</h3>

<div class="row justify-content-between mb-3">
    <div class="col flex justify-content-between">
        <button class="btn btn-success mr-2" onclick="updatePositions()" type="submit">Save Changes To Position</button>
         <button class="btn btn-primary ml-2" onclick="showFormField('{{route('formfields.new',[$arrangement->id])}}')" type="button">Create New Form Field</button>
          <a class="btn btn-warning ml-2" href="{{route('arrangements.view',[$arrangement->id])}}" type="button">Preview Form</a>
    </div>
</div>



<div class="row" id="formfield_list">
    <div class="col-6">
        @foreach ($arrangement->formfields as $formfield)
                <div class="draggable accordion-item col p-3 mb-3 border-1" data-formfield-id="{{$formfield->id}}">
                    {{$formfield->name}} [ {{$formfield->field_type->name}}  -> {{$formfield->description}} ]
                    <span class="not-draggable">
                        <button data-formfield-id="{{$formfield->id}}" onclick="deleteFormField('{{route('formfields.delete',[$formfield->id])}}')" class="btn btn-danger" type="button">Delete</button>
                        <button data-formfield-id="{{$formfield->id}}"  onclick="showFormField('{{route('formfields.show',[$formfield->id])}}')" class="btn btn-primary" type="button">View</button>
                    </span>
                </div>
        @endforeach

    </div>
    <div class="col-6" id="formfield_edit">

    </div>
</div>

@endsection


@section('scripts')
<script src="{{asset('js/draggable.js')}}"></script>
<script src="{{asset('js/formfield-actions.js')}}"></script>
<script>
    function updatePositions(){
        const formfields = document.querySelectorAll('.draggable');
        let newPositions = {};
        formfields.forEach(function(field, index){
            newPositions[field.getAttribute('data-formfield-id')] = index + 1;
        });

        axios.post('{{route('formfields.updatePositions')}}', {
            data: newPositions
        }).then(function(response){
            alert(response.data.message);
        });

    }


</script>

@endsection
