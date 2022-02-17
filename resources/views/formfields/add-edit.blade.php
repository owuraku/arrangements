
<form action="{{route('formfields.save')}}" method="POST" enctype="multipart/form-data" >
    @if(!$edit)
     <input type="hidden" name="arrangement_id" value="{{$arrangement_id}}">
    @endif

    @csrf
    @if($edit)
    <input type="hidden" name="id" value="{{$formfield->id}}">
    @method('PUT')
    @endif
    {{-- name --}}
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" required
    class="form-control"
    name="name"
    value="{{ $formfield->name}}" >
  </div>


   {{-- description --}}
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text"
    class="form-control"
    name="description"
    value="{{ $formfield->description}}" >
  </div>

  {{-- placeholder --}}
  <div class="mb-3">
    <label for="description" class="form-label">Placeholder</label>
    <input type="text"
    class="form-control"
    name="placeholder"
    value="{{ $formfield->placeholder}}" >
  </div>

  {{-- classes --}}
  <div class="mb-3">
    <label for="description" class="form-label">Additional Classes</label>
    <input type="text"
    class="form-control"
    name="class"
    value="{{ $formfield->class}}" >
  </div>

  {{-- Form Input Type --}}
  <div class="mb-3">
    <label for="input_type" class="form-label">Input Type</label>
    <select name="input_type" class="form-select" required aria-label="Select input">
        @foreach ($formtypes as $formtype)
             <option class="text-uppercase" value="{{$formtype->id}}"   @if($formfield->field_type->id == $formtype->id) selected @endif>
            {{$formtype->name}}
            </option>
        @endforeach
</select>
  </div>

   {{-- Form Input Type --}}
  <div class="mb-3" id="select-options" style="display:none">
    <label for="input_type" class="form-label">Type options (each option on a new line)</label>
    <textarea name="options" id="" class="form-control" cols="30" rows="5">@isset($formfield->options) @foreach ($formfield->options as $option){{$option}}
    @endforeach @endisset
    </textarea>
  </div>

  <span id="input-is-text-or-number" style="display:none">
       <div class="mb-3">
    <label for="is_input_text" class="form-label">Is Input A Text</label>
    <select name="is_input_text" class="form-select" required aria-label="Select input">
             <option class="text-uppercase" value="true"   @if($formfield->is_input_text) selected @endif>
           Yes, it is a text
            </option>
             <option class="text-uppercase" value="false"   @if(!$formfield->is_input_text) selected @endif>
           No, it is a number
            </option>

    </select>
       </div>

        <div class="mb-3 row">
    <div id="min-max-input" style="display:none">
    <label for="min" class="form-label">Min</label>
    <input type="number"
    class="form-control"
    name="min"
    value="{{ $formfield->min}}" >

     <div>
    <label for="min" class="form-label">Max</label>
    <input type="number"
    class="form-control"
    name="max"
    value="{{ $formfield->max}}" >
  </div>

  </div>

        </div>
  </span>

{{-- Image --}}
  <div class="mb-3">

    @if($formfield->imagelink)
    <img src="{{asset($formfield->imagelink)}}" alt="Image" style="height: 150px">
    @endif

    <label for="picture" class="form-label">Image</label>
    <input type="file"
    class="form-control"
    name="image">
  </div>

   {{-- video link --}}
  <div class="mb-3">
    <label for="videolink" class="form-label">Video Link</label>
    <input type="text"
    class="form-control"
    name="videolink"
    value="{{ $formfield->videolink}}" >
  </div>

  <button type="submit" class="btn btn-primary ">Submit</button>
</form>

<script>
    handleInputTypeChanges();
    handleInputTextOrNumberChanges();
</script>
