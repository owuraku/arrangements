<div>
    <div class="mb-3 p-2">
         <label for="{{$field->name}}" class="form-label">{{$field->name}}</label>

        @if ($field->formfield_type_id == 1)
            <input
            type="{{ $isNumberField() ? 'number' : 'text'}}"
            placeholder="{{$field->placeholder}}"
            min="{{$field->min}}"
            min="{{$field->max}}"
            {{ $attributes->merge(['class' => 'form-control '.$field->class]) }}
            >
        @endif

          @if ($field->formfield_type_id == 2)
            <textarea type="text"  placeholder="{{$field->placeholder}}"  {{ $attributes->merge(['class' => 'form-control '.$field->class]) }}></textarea>
        @endif

          @if ($field->formfield_type_id == 3)
            <select  {{ $attributes->merge(['class' => 'form-control '.$field->class]) }}>
                <option>{{$field->placeholder}}</option>
                @foreach ($field->options as $option)
                    <option value="{{$option}}">
                        {{$option}}
                    </option>
                @endforeach
            </select>
        @endif

         @if ($field->formfield_type_id == 4)
            <input type="file" {{ $attributes->merge(['class' => 'form-control '.$field->class]) }}>
        @endif
            <div class="form-text">{{ $field->description}}
            @if($field->videolink)
            <span class="ml-3">
                 <a class="mr-3 link-primary" target="_blank" href="{{$field->videolink}}">Click here to watch a video on this field</a>
            </span>
            @endif
             @if($field->imagelink)
            <span class="ml-3">
                 <a class="mr-3 btn btn-secondary" onclick="toggleImage(this)">Click here to reveal image</a>
            </span>
            <img src="{{asset($field->imagelink)}}" class="rounded mx-auto d-block d-none" height="150px">
            @endif
            </div>
    </div>
</div>

<script>
    function toggleImage(element){
        console.log(element.parentNode);
        element.parentNode.nextElementSibling.classList.toggle('d-none')
    }
</script>
