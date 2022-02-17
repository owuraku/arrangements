<div class="accordion" id="accordionExample">
     @foreach ($measurements as $measurement)
     <div class="accordion-item">
         @php
             $loopAccordionName = 'collapse'.$loop->index;
             $loopAccordionHeaderName = 'heading'.$loop->index;

         @endphp
         <h2 class="accordion-header" id="{{$loopAccordionHeaderName}}">
             <button class="accordion-button" type="button"
                     data-bs-toggle="collapse"
                     data-bs-target="#{{$loopAccordionName}}"
                     aria-expanded="true"
                     aria-controls="{{ $loopAccordionName}}">
                        {{$measurement->name}}
             </button>
         </h2>
             <div id="{{ $loopAccordionName}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                 <div class="accordion-body">
                     {{$measurement}}
                 </div>
             </div>
     </div>
     @endforeach
</div>
