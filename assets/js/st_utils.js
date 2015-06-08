 /**
 * UTILS
 */ 
var st_utils = (function()
{
  var getCountryCodeTo = function(_country, _country_code) {
      var val = $('#'+_country).val();
      var text = $('#countries_dl option').filter(function() {
          return this.value == val;
      }).text();
      
      $('#'+_country_code).val(text);
  };
  
  var getCountryName = function(_country_code) {
      var val = $('#countries_dl option').filter(function() {
          return this.text == _country_code;
      }).val();
      
      return val;
  };
  
  var setPosRelativeToBox = function(id_origin, id_destiny){
    var position = $("#"+id_origin).position();
    $("#"+id_destiny).css({
         "position":"absolute", 
         "top": position.top + 30 + "px",
         "left": position.left + "px"
    });
  };
  
  /**
   * idAutocomplete : <input type="text" />
   * sourceList : List with the following form [ {label: "", value: ""}, {...} ]
   */     
  var autocompleteCountry = function(idAutocomplete, idHidden, sourceList){
    $('#'+idAutocomplete).autocomplete({
        minLength: 1,
        source: sourceList,
        delay: 0,
        focus: function( event, ui ) {
            $(this).val( ui.item.label );
            $('#'+idHidden).val( ui.item.value );
            return false;
        },
        select: function( event, ui ) {
            $(this).blur();
            $(this).val( ui.item.label );
            $('#'+idHidden).val( ui.item.value );
            return false;
        },
        change: function (event, ui) {
            //if the value of the textbox does not match a suggestion, clear its value
            if ($('.ui-autocomplete li:textEquals("' + $(this).val() + '")').size() == 0) {
                $(this).val('');
                $('#'+idHidden).val('');
            }
            //simultae onchange in case the item had one
            $(this).change();
            return true;
        },
        close: function(event, ui) {
            $(this).blur();
            return false;
        }
    })
    .focus(function(){
        $(this).autocomplete('search','');
    })
    .data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
    }; 
  };
  
  var searchElement = function(element, list){
    for(a in list){
      if(list[a].value==element){
        return list[a].label;
      }
    }
  }
  
                      
  return{
    getCountryCodeTo : getCountryCodeTo,
    getCountryName : getCountryName,
    setPosRelativeToBox : setPosRelativeToBox,
    autocompleteCountry : autocompleteCountry,
    searchElement : searchElement 
  };
  
}());
//Extension for jQuery;
$.expr[':'].textEquals = function(a, i, m) {
    return $(a).text() === m[3];
};
