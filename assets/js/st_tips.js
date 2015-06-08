 /**
 * TIPS
 */ 
var st_tips = (function()
{

  var reloadMasonry = function(idContainer){
    setTimeout(function(){$('#'+idContainer).masonry('reload');}, 200);
  };
   
  //On load active masonry
  $(window).load(function(){
    $('#search_tip_cont').masonry({
      itemSelector : '.item_tip'
    });
    $('#tab_search_title').on("click", function(){
      st_project.reloadMasonry('search_tip_cont');
    });
    
    $('#backpack_tip_cont').masonry({
      itemSelector : '.item_tip'
    });
    $('#tab_backpack_title').on("click", function(){
      st_project.reloadMasonry('backpack_tip_cont');
    });
  });
  
  return {
     reloadMasonry : reloadMasonry
     
  };
  
}());