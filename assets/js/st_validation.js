/**
 * Form validation
 */ 
var st_validation = (function()
{
  var validatePass = function(p1, p2) {
    p1 = document.getElementById('p1');
    p2 = document.getElementById('p2');
    message = document.getElementById('message_psw');
    if (p1.value != p2.value || p1.value == '' || p2.value == '') {
      message.innerHTML = '<font color=red>Password does not match!</font>';
    } else {
      message.innerHTML ='';
    }
  };
  
  return{
    validatePass : validatePass
  };
  
}());