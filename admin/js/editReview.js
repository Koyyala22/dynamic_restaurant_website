
    document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('previewImg');
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

$(function() {
  $("form[name='editReviewForm']").validate({
   
    rules: {         
      name        : "required",
      count    : "required",
      review : "required",
      alt    : "required",
       
    },

    messages: {         
      name     : "Please Enter name",
      count    : "Please Enter star count",
      review : "Please Enter review",
     alt      :"Please Enter alternate name"
    },



    
    submitHandler: function(form) {
      
      let formdata = new FormData();
      let x = $('#editReviewForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'update');  

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
            toastr.success('Updated Successfully...!');
            setTimeout(function (){
              location.href = "manageReview";
            },1000);
          }
          else{
            toastr.error('Data not Updated..!');
          }
        }
      });
    }
  });
});