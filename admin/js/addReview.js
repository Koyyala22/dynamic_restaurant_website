document.getElementById("alt").addEventListener("keypress", function(event) {
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
  $("form[name='addReviewForm']").validate({
   
    rules: {         
      name    : "required",
      count   : "required",
      review  : "required",
      image   : "required",
      alt     :  "required",

    },

    messages: {         
      name     : "Please Enter name",
      count    : "Please Enter count",
     review    : "Please Enter review",
      image    : "Please Enter image",
      alt      :"Please Enter altername",
    },


    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addReviewForm').serializeArray();
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
        url: "actions/review",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageReview";
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