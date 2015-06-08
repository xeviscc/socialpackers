 /**
 * TIPS
 */ 
var st_tips = (function()
{

  var setReplyComment = function($idTip, idTextBox, idDestinyDiv){
    st_comments.saveReplyComment(<?=$tip->getId()?>, 'id_tip_comment_<?=$tip->getId()?>');
    
  };
  
  return {
     setReplyComment : setReplyComment
     
  };
  
}());



