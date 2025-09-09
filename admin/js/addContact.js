$(function() {
  $("form[name='addContactForm']").validate({
   
    rules: {         
      address         : "required",
      phoneContact    : "required",
      whatsAppContact : "required",
      email           : "required"
    },

    messages: {         
      address         : "Please Enter address",
      phoneContact    : "Please Enter Phone Contact",
      whatsAppContact : "Please Enter Whatsapp Contact",
      email           : "Please Enter Email"
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addContactForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
      $.ajax({
        type: "POST",
        url: "actions/contact",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Contact Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageContact";
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