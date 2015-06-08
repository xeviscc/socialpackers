//WAYPOINT

var st_waypoint = (function() 
{
  var x = document.getElementById("demo");
  var coords = { latitude:0, longitude:0}; 
  
  var getLocation = function()
  {
    if (navigator.geolocation)
      {
      navigator.geolocation.getCurrentPosition(showPosition,showError);
      }
    else{x.innerHTML="Geolocation is not supported by this browser.";}
  };
  
  //http://maps.googleapis.com/maps/api/staticmap?size=1000x800&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Ccolor:red%7Clabel:C%7C40.718217,-73.998284&sensor=true
  
  var showPosition = function(position)
  {
    coords.latitude = position.coords.latitude;
    coords.longitude = position.coords.longitude;
    var latlon=position.coords.latitude+","+position.coords.longitude;
  
    var img_url="http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=11&size=200x200&sensor=false";
    document.getElementById("mapholder").innerHTML="<img style='border-radius:20px;' src='"+img_url+"'>";
  };
  
  var showError = function(error)
  {
    switch(error.code) 
      {
      case error.PERMISSION_DENIED:
        x.innerHTML="User denied the request for Geolocation."
        break;
      case error.POSITION_UNAVAILABLE:
        x.innerHTML="Location information is unavailable."
        break;
      case error.TIMEOUT:
        x.innerHTML="The request to get user location timed out."
        break;
      case error.UNKNOWN_ERROR:
        x.innerHTML="An unknown error occurred."
        break;
      }
  };
    
  var show_map = function(){
    //document.getElementById("mapholder").style
    getLocation();
  };
  
  var hide_map = function(){
    document.getElementById("mapholder").style.display = "none";
  }
  
  var savePosition = function(){
    $.ajax({
      url: "/ajax/waypoint/save",
      type: 'POST',
      data: { "coords": JSON.stringify( coords ) },
      dataType: 'json',
      success: function(output) {
        //Position saved.
      }
    });
    hide_map();
  };


  return {
     getLocation : getLocation,
     showPosition : showPosition,
     showError : showError,
     show_map : show_map,
     savePosition : savePosition      
  };
  
}());
