document.getElementById("title").addEventListener("keypress", function(event) {
    if (event.keyCode >= 48 && event.keyCode <= 57) {
        event.preventDefault();
    }
});

document.getElementById("image").addEventListener("change", function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewImg");
    const errorMessage = document.getElementById("error-message");

    if (file) {
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (validImageTypes.includes(file.type)) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
            errorMessage.style.display = 'none';
        } else {
            event.target.value = '';
            preview.style.display = 'none';
            errorMessage.style.display = 'block';
        }
    }
});

$(function() {
  $("form[name='addHomeForm']").validate({
   
    rules: {  
      image         : "required",       
      title         : "required",
      subtitle      : "required",
      buttonText    : "required"
    },

    messages: {  
      image         : "Please Choose Home Image",       
      title         : "Please Enter Title",
      subtitle      : "Please Enter Subtitle",
      buttonText    : "Please Enter Button text"
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addHomeForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
      let image = $('#image')[0].files;

      if (image.length > 0){
        formdata.append('image', image[0]);
      }   
      $.ajax({
        type: "POST",
        url: "actions/home",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Home Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageHome";
            },1000);
          }
          else{
            toastr.error('Data not Saved. Please Try Later');
          }
        }
      });
    }
  });
});