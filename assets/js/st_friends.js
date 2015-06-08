
var st_friends = (function() 
{

  var requestFriendship = function(idUser){
    $.ajax({
      url: "/ajax/friends/request",
      type: 'POST',
      data: { "idUser" : idUser },
      dataType: 'json',
      success: function(output) {
        //Position saved.
      }
    });
  };
  
  var acceptFriendship = function(idUser){
    $.ajax({
      url: "/ajax/friends/accept",
      type: 'POST',
      data: { "idUser" : idUser },
      dataType: 'json',
      success: function(output) {
        if($('#li_'+idUser).parent().length==1){
          $('#li_'+idUser).parent().parent().remove();
        } else {
          $('#li_'+idUser).remove();
        }
        var text = $('#number_requests').text();
        $('#number_requests').text(text-1);
      }
    });
  };
  
  var declineFriendship = function(idUser){
    $.ajax({
      url: "/ajax/friends/decline",
      type: 'POST',
      data: { "idUser" : idUser },
      dataType: 'json',
      success: function(output) {
        if($('#li_'+idUser).parent().length==1){
          $('#li_'+idUser).parent().parent().remove();
        } else {
          $('#li_'+idUser).remove();
        }
        var text = $('#number_requests').text();
        $('#number_requests').text(text-1);

      }
    });
  };


  return {
     requestFriendship : requestFriendship,
     acceptFriendship : acceptFriendship,
     declineFriendship : declineFriendship      
  };
  
}());
