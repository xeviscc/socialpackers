// Additional JS functions here
window.fbAsyncInit = function() {
  FB.init({
    appId      : '449585278462733', // App ID
    channelUrl : '/assets/js/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true, // parse XFBML
    oauth      : true
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any auth related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      
      /***
       *
       *CUSTOM
       *
       */                                  
      
      // have logged in to the app.
      //alert('https://graph.facebook.com/me?access_token='+response.authResponse.accessToken);
      /*
      FB.api('/me', function(response) {
        alert('Your name is ' + response.name + " and you live in " + response.location.name);
      });
      */
      //Pciture large
      //http://graph.facebook.com/'+response.username+'/picture?type=large
      
      /*
      // save image
      $img = file_get_contents('https://graph.facebook.com/'.$fid.'/picture?type=large');
      $file = dirname(__file__).'/avatar/'.$fid.'.jpg';
      file_put_contents($file, $img);
      */
      //call_to_register();
      
      /***
       *
       *CUSTOM
       *
       */
            
      //testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct user interaction (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.

      //FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.

      //FB.login();
    }
  });
  };

// Load the SDK asynchronously
(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
 }(document));

function Facebook_Login(){
  FB.getLoginStatus(function(response) {
      // alert("response: " + response.session);
      if (response.status === 'connected') {
          // alert("response of getlogin status, permissions:  " + response.perms);
          login();
          //console.log('status login');
      }
      else{
          //document.getElementById('loginStatus').innerHTML = "Login and Grant Permission";
          //console.log('status log me in');
          logMeIn();
      }
  });
}

function logMeIn(){
    FB.login(function(response) {
        // alert("login!");
      if (response.status === 'connected') {
            // alert("Granted permissions: " + response.perms);
            login();
            //console.log('login login');
        } else {
            // alert("not logged in");
            //console.log('not logged in');
      }
    //}, {perms:'read_stream,publish_stream,offline_access,friends_birthday,email'});
    }, {scope:'email'});
}
/*
function login(){    
    FB.api('/me', function(response) {
        document.getElementById('login').innerHTML="Welcome " + response.name;
    });
    getFriendsData();
}
      
function Facebook_Login(){
  FB.login(function(response){
    if (response.status === 'connected') {
      call_to_register();
    } else if (response.status === 'not_authorized') {
      alert("Ask for permisisons");
    } else {
      alert("Login failed!!");
      //alert(response);
      //FB.login();
    }  
  },{scope: 'email'});
}            */

function login(){
  FB.api('/me', function(response) {
    //console.log('api: ' +  JSON.stringify(response));
    //TODO Change it to AJAX call with JSON.

    $.ajax({
      url: "/ajax/register/submit_f",
      type: 'POST',
      data: { "response" : JSON.stringify(response) },
      dataType: 'json',
      success: function(output) {
        //Output
        //alert(output);
        if(output == 'OK'){
          window.location = '/main';
        }
      },
      error: function(x,h,i){
        //alert('error: '+ x);
      }
    });
    
    //OLD NOT WORKING ON FF and IE
    /*
    $('<form name="registration_form" method="post" action="/register/submit_f" enctype="multipart/form-data">' +
        '<input type="hidden" name="id" value="' + response.id + '">' +
        '<input type="hidden" name="name" value="' + response.first_name + '">' +
        '<input type="hidden" name="middle_name" value="' + response.middle_name + '">' +
        '<input type="hidden" name="last_name" value="' + response.last_name + '">' +
        '<input type="hidden" name="email" value="' + response.email + '">' +
        '<input type="hidden" name="birth" value="' + response.birthday + '">' +
        '<input type="hidden" name="description" value="">' +
        '<input type="hidden" name="what" value="">' +
        '<input type="hidden" name="sex" value="' + response.gender + '">' +
        '<input type="hidden" name="termsncondition" value="true">' +
    '</form>').submit();
    */
          //password, no password;
          //NEW ITEM LOCALE
          //locale=response.locale;
          //location=location.name;
  });
}
function Logout(){
  FB.logout();
}