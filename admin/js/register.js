function validation() {
  let username = $('#username').val();
  let password = $('#password').val();

  // Email validation regex
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Password validation regex (at least one special char, one number, one uppercase, and one lowercase)
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;

  if (username == '') {
    toastr.error("Enter Email...");
    $('#username').focus();
    return false;
  } else if (!emailPattern.test(username)) {
    toastr.error("Enter a valid Email...");
    $('#username').focus();
    return false;
  } else if (password == '') {
    toastr.error("Enter Password...");
    $('#password').focus();
    return false;
  } else if (password.length < 6) {
    toastr.error("Password must be at least 6 characters long.");
    $('#password').focus();
    return false;
  } else if (!passwordPattern.test(password)) {
    toastr.error("Password must have at least 1 special character, 1 number, 1 uppercase, and 1 lowercase letter.");
    $('#password').focus();
    return false;
  } else {
    return true;
  }
}


function loginval(){
  if(validation()){
    let username = $('#username').val();
    let password = $('#password').val();
  
    $.ajax({
      url : 'actions/register',
      type : 'POST',
      data : {'action' : 'register','username' : username, 'password' : password},
      success : function(data){         
        if (data == "Registration successful!") {
          toastr.success("Registration Successfully...!");
          setTimeout(function(){
            window.location.href = "index";
          },1000);
        } else {
          toastr.error(data);
        }
      }
    });
  }
}