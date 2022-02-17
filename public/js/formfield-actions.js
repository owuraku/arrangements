function showFormField(url) {
    const fieldDiv = document.getElementById('formfield_edit');
    axios.get(url, { responseType: 'html'}).then(function(response){
        fieldDiv.innerHTML = response.data;

        var codes = fieldDiv.getElementsByTagName("script");
        for(var i=0;i<codes.length;i++)
        {
            eval(codes[i].text);
        }
    });
}

function deleteFormField(url){
    const confirmAnswer = confirm('Are you sure you want to delete field?');
  if(confirmAnswer){
     axios.delete(url).then(function(response){
        if(response.data.success){
            window.location.href = window.location.href
        }
    });
  }

}

    function showMinAndMaxInput(){
        const minMaxDiv = document.getElementById('min-max-input');
        minMaxDiv.style.display = 'block';
        minMaxDiv.setAttribute('disabled', false)

    }

    function hideMinAndMaxInput(){
        const minMaxDiv = document.getElementById('min-max-input');
        minMaxDiv.style.display = 'none';
         minMaxDiv.setAttribute('disabled', true)
    }

    function showOptionsInput(){
        const optionsDiv = document.getElementById('select-options');
        console.log(optionsDiv);
        optionsDiv.style.display = 'block';
        optionsDiv.setAttribute('disabled', false)

    }

    function hideOptionsInput(){
        const optionsDiv = document.getElementById('select-options');
        optionsDiv.style.display = 'none';
         optionsDiv.setAttribute('disabled', true)
    }


      function showIsANumberQuery(){
        const isANumberDiv = document.getElementById('input-is-text-or-number');
        isANumberDiv.style.display = 'block';
        isANumberDiv.setAttribute('disabled', false)
    }

    function hideIsANumberQuery(){
        const isANumberDiv = document.getElementById('input-is-text-or-number');
        isANumberDiv.style.display = 'none';
         isANumberDiv.setAttribute('disabled', true)
    }

    function handleInputTypeChanges(){
        const inputType = document.querySelector('[name=input_type]');

         if(inputType.value == "1"){ // input
                showIsANumberQuery();
                hideOptionsInput();
            } else if (inputType.value == "3") { //select
                showOptionsInput();
                hideIsANumberQuery();
            } else {
                hideOptionsInput();
                hideIsANumberQuery();
            }

        inputType.addEventListener('change', function(e){
            if(inputType.value == "1"){ // input
                showIsANumberQuery();
                hideOptionsInput();
            } else if (inputType.value == "3") { //select
                showOptionsInput();
                hideIsANumberQuery();
            } else {
                hideOptionsInput();
                hideIsANumberQuery();
            }
        })
    }

    function handleInputTextOrNumberChanges(){
         const inputType = document.querySelector('[name=is_input_text]');

         if(inputType.value == "false"){ // input
                showMinAndMaxInput();
            } else {
                hideMinAndMaxInput();
            }

        inputType.addEventListener('change', function(e){
            if(e.target.value == "false"){ // input
                showMinAndMaxInput();
            } else {
                hideMinAndMaxInput();
            }
        })
    }
