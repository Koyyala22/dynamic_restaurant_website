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

document.getElementById("image2").addEventListener("change", function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewImg2");
    const errorMessage = document.getElementById("error-message2");

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
  $("form[name='addAboutusForm']").validate({
   
    rules: { 
      image        : "required",
      altName      : "required",    
      Para1Img1    : "required",
      Para2Img1    : "required",
      image2       : "required",
      altName2      : "required",   
      Para1Img2    : "required",
      Para2Img2    : "required"
    },

    messages: { 
      image        : "Please Choose Image",            
      altName      : "Please Enter text",            
      Para1Img1    : "Please Enter text",
      Para2Img1    : "Please Enter text",
      image2        : "Please Choose Image2",
      altName2      : "Please Enter text",
      Para1Img2    : "Please Enter text",
      Para2Img2    : "Please Enter text"
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addAboutusForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
      let image = $('#image')[0].files;

      if (image.length > 0){
        formdata.append('image', image[0]);
      }

      let image2 = $('#image2')[0].files;

      if (image2.length > 0){
        formdata.append('image2', image2[0]);
      }

      $.ajax({
        type: "POST",
        url: "actions/aboutus",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageAboutus";
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