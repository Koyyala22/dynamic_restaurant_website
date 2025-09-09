function validation() {
  let username = $('#username').val();
  let password = $('#password').val();
  
  // Email validation regex
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

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
  } else {
    return true;
  }
}

function loginval() {
  if (validation()) {
    let username = $('#username').val();
    let password = $('#password').val();
    
    $.ajax({
      url: 'actions/login',
      type: 'POST',
      data: {'action': 'login', 'username': username, 'password': password},
      success: function(data) {         
        if (data == "true") {
          toastr.success("Login Successfully...!");
          setTimeout(function() {
            window.location.href = "home";
          }, 1000);
        } else {
          toastr.error('Invalid Login');
        }
      }
    });
  }
}
