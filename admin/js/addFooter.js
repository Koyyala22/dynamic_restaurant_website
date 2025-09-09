$(function() {
  $("form[name='addFooterForm']").validate({
   
    rules: {         
      facebook         : "required",
       insta         : "required",
        twitter      : "required",
         google      : "required",
    },

    messages: {         
      facebook        : "Please Enter facebook",
      insta  : "Please Enter insta",
      twitter       : "Please Enter twitter",
       google      : "Please Enter google",
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addFooterForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');     
     
      $.ajax({
        type: "POST",
        url: "actions/footer",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Footer Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageFooter";
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