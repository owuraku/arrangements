@extends('layout.master')

@section('page_title', 'List of Dresses')

@section('content')

<div class="col-12 row">
    <div class="col-3">
        DRESS
        @dump($dress->arrangements)
    </div>
     <div class="col-4" id="arrangementId">
        Arrangements
        <ul class="list-group">
            @foreach ($dress->arrangements as $arrangement)
            <button
            class="list-group-item"
            onclick="loadMeasurements('{{route('arrangements.show.measurements', ['id' => $arrangement->id])}}')"
            data-arrangement-id="{{$arrangement->id}}" >
                {{$arrangement->name}}
            </button>
            @endforeach
        </ul>
    </div>
     <div class="col-5">
        <div class="row">
            <div>
                Measurements
            </div>
           <div class="dropdown">
        <button
        class="btn btn-primary dropdown-toggle"
        type="button"
        id="dropdownMenuButton1"
        data-bs-toggle="dropdown"
        aria-expanded="false">
            Add New
        </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Input</a></li>
    <li><a class="dropdown-item" href="#">Textbox</a></li>
    <li><a class="dropdown-item" href="#">Select</a></li>
    <li><a class="dropdown-item" href="#">Image</a></li>
  </ul>
</div>
        </div>
        <div id="measurementDiv">

        </div>

    </div>
</div>


@endsection


@section('scripts')
<script>
    function loadMeasurements(arrangementIdUrl){
        axios.get(arrangementIdUrl,{responseType: 'html'}).then(function (response){
            replaceMeasurementView(response.data)
        });
    }

    function replaceMeasurementView(newHTML){
        const measurementDiv = document.getElementById('measurementDiv');
        console.log(newHTML)
        measurementDiv.innerHTML = newHTML;
    }
</script>
@endsection
