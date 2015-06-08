/*
  ROADMAP
*/
var st_roadmap = (function()
{
  
  var RM = function(){
    this.bugdet = 0;
    this.total= 0;
    this.idDB = null;
    this.total = null;
    this.countries = JSON.parse('{}');
    
    this.create = function(external){
      var data = JSON.parse(external);
      this.budget = data.budget;
      this.total = data.total;
      this.idDB = data.idDB;
      this.countries = data.countries;
    };
        
    this.setBudget = function(value){
      this.budget = value;
    };
    this.getBudget = function(){
      return this.budget;
    };
    
    this.setIdDB = function(idDB){
      this.idDB = idDB;
    };
    
    this.setTotal = function(total){
      this.total = total;
    };
    this.getTotal = function(){
      return this.total;
    };
    
    this.getCountries = function(){
      return this.countries;      
    };
    
    //FROM COUNTRY
    this.deleteCountry = function(divId){
      if(this.countries[divId]) { this.countries[divId].erased = 'true'; }
    };
    this.setCountryId = function(divId, counter){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].id = counter;
    };
    this.setCountryName = function(divId, name){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].name = name;
    };
    this.setCountryCode = function(divId, code){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].code = code;
    };
    this.setCountryBudget = function(divId, budget){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].budget = budget;
    };
    this.setCountryIdDB = function(divId, idDB){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].idDB = idDB;
    };
    this.setCountryStartDate = function(divId, startDate){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].startDate = startDate;
    };
    this.setCountryEndDate = function(divId, endDate){
      if(!this.countries[divId]){ this.countries[divId] = {}; }
      this.countries[divId].endDate = endDate;
    };
       

    this.getCountryStartDate = function(divId){
      if(this.countries[divId].startDate) { return this.countries[divId].startDate; } 
      else { return ''; }
    };
    this.getCountryEndDate = function(divId){
      if(this.countries[divId].endDate) { return this.countries[divId].endDate; } 
      else { return ''; }
    };
    this.getCountryBudget = function(divId){
      if(this.countries[divId].budget) { return this.countries[divId].budget; } 
      else { return ''; }
    };
    this.getCountryId = function(divId){
      if(this.countries[divId].id) { return this.countries[divId].id; } 
      else { return ''; }
    };
    this.getCountryName = function(divId){
      if(this.countries[divId].name) { return this.countries[divId].name; } 
      else { return ''; }
    };
    this.getCountryCode = function(divId){
      if(this.countries[divId].name) { return this.countries[divId].name; } 
      else { return ''; }
    };
  };
  
  var roadmap = new RM();
  var counter = 0;
  var recalculating = false;
  var modified = false;
  
  var deleteCountry = function(divId){
    //Delete row
    var divToDelete = document.getElementById(divId);
    divToDelete.parentNode.removeChild(divToDelete);
    
    //Delete from budget bar.
    var divBudgetBarToDelete = document.getElementById(divId+'_bar_budget');
    divBudgetBarToDelete.parentNode.removeChild(divBudgetBarToDelete);
    
    //Delete from time bar.
    var divTimeBarToDelete = document.getElementById(divId+'_bar_time');
    divTimeBarToDelete.parentNode.removeChild(divTimeBarToDelete);
    
    /* OBJECT MAINTENANCE */
    roadmap.deleteCountry(divId);
    modified=true;
    /* OBJECT MAINTENANCE */
    
    //Recalculate bars.
    if(!recalculating){
      recalculateBars();
    }

  };
  
  var addCountry = function(divId){
    
    var country = '';
    //Add the last end date as a start date for the following country
    var antDate = '';
    if(divId) { 
      antDate = roadmap.getCountryStartDate(divId);
    } else {
      if(counter!=0){
        var index = counter-1;              
        antDate = roadmap.getCountryEndDate("country-"+index);
      }
      divId = "country-"+counter;
    }
    
    /* OBJECT MAINTENANCE */
    roadmap.setCountryId(divId, counter);
    /* OBJECT MAINTENANCE */
    
    /* HTML CREATION */
    var countriesDiv = document.getElementById("countries");
    
    if(counter==0){
      var divTitles = document.createElement("div");
      divTitles.id = "titles";
      var htmlTitle = [ 
        '<ul class="unstyled">',
        '<li class="span2">',
          '<label class="pull-thirty">Country:</label>',
        '</li>',                                 
        '<li class="span3">',
          '<label>Start date:</label>',
        '</li>',
        '<li class="span3">',
          '<label>End date:</label>',
        '</li>',
        '<li class="span1">',
          '<label>Budget:</label>',
        '</li></ul>'
        ].join('');
      divTitles.innerHTML = htmlTitle;
      countriesDiv.appendChild(divTitles);
    }
  
    var html = [ 
      '<ul class="unstyled">',
      '<li class="span2">',
        '<button id=',divId,'_button type="button" class="btn btn-blue btn-status" title="Delete Country"><i class="icon-remove"></i></button>',
        '<input type=hidden id="',divId,'_code" name="',divId,'_code" value=',roadmap.getCountryCode(divId),'>',
        '<input class="input-small" type="text" name="',divId,'_name" id="',divId,'_name" value="',roadmap.getCountryName(divId),'">',
      '</li>',                                 
      '<li class="span3">'
    ].join('');
//        '<input type="text" class="input-small" list="countries_dl" name="',divId,'_name" id="',divId,'_name" value="',roadmap.getCountryName(divId),'">',      
    //if(Modernizr.inputtypes.date){
      html = html.concat('<input type="date" name="',divId,'_start-date" id="',divId,'_start-date" placeholder="dd/MM/yyyy" value=',antDate,'>');
    //} else {
      //html = html.concat('<input type="text" name="',divId,'_start-date" id="',divId,'_start-date" placeholder="yyyy-mm-dd" value=',antDate,'>');
    //}
        
    html = html.concat(
      '</li>',
      '<li class="span3">'
    );
    
    //if(Modernizr.inputtypes.date){
      html = html.concat('<input type="date" name="',divId,'_end-date" id="',divId,'_end-date" placeholder="dd/MM/yyyy" value=',roadmap.getCountryEndDate(divId),'>');
    //} else {
      //html = html.concat('<input type="text" name="',divId,'_end-date" id="',divId,'_end-date" placeholder="yyyy-mm-dd" value=',roadmap.getCountryEndDate(divId),'>');
    //}
    
    html = html.concat(
      '</li>',
      '<li class="span1">',
        '<input type="number" class="input-small" name="',divId,'_budget" id="',divId,'_budget" value=',roadmap.getCountryBudget(divId),'>',
      '</li></ul>'
      );
      
    //Create the div with the new country, if not exists
    var divCountry = document.createElement("div");
    divCountry.id = divId;
    //divCountry.className = 'country';
    divCountry.innerHTML = html;
    
    //Add the div to countries
    var countriesDiv = document.getElementById("countries");
    countriesDiv.appendChild(divCountry);
    /* HTML CREATION */
    
    /* BINDING FUNCTIONS  */
    $('#'+divId+'_name').on("change", function(){
       //st_utils.getCountryCodeTo(divId+'_name', divId+'_code');
       addCountryOnBars(divId);
       //validateCountry(this);                       
    });
    $('#'+divId+'_button').on("click", function(){
        st_roadmap.deleteCountry(divId);
    });
    $('#'+divId+'_start-date').on("change", function(){
      st_roadmap.updateTimeRoadmap(divId);
      st_roadmap.updateTimeBar(divId);
    });
    $('#'+divId+'_end-date').on("change", function(){
      st_roadmap.updateTimeRoadmap(divId);
      st_roadmap.updateTimeBar(divId);
    });
    $('#'+divId+'_budget').on("change", function(){
      st_roadmap.updateBudgetRoadmap(divId);
      st_roadmap.updateBudgetBar(divId);
    });
    //Datepicker for non HMTL5 compatible browsers
    if(!Modernizr.inputtypes.date){
      $('#'+divId+'_end-date').attr("placeholder", "yyyy-mm-dd");
      $('#'+divId+'_end-date').datepicker({dateFormat: "yy-mm-dd" });
      $('#'+divId+'_start-date').attr("placeholder", "yyyy-mm-dd"); 
      $('#'+divId+'_start-date').datepicker({dateFormat: "yy-mm-dd" });
    }
    //Country select init
    st_utils.autocompleteCountry(divId+'_name', divId+'_code', list);
    /* BINDING FUNCTIONS */
    
    
    //Recalculate bars.
    if(!recalculating){
      recalculateBars();
    }
    
    counter++;
  };
  
  /*
  var validateCountry = function(This) {
    var optionFound = false;
    datalist = This.list;
    // Determine whether an option exists with the current value of the input.
    for (var j = 0; j < datalist.options.length; j++) {
        if (This.value == datalist.options[j].value) {
            optionFound = true;
            break;
        }
    }
    // use the setCustomValidity function of the Validation API
    // to provide an user feedback if the value does not exist in the datalist
    if (optionFound) {
      This.setCustomValidity('');
    } else {
      This.setCustomValidity('Please select a valid value.');
    }
  };*/

  var updateBudgetLabel = function(value){
    /* OBJECT MAINTENANCE */
    roadmap.setBudget(value);
    modified = true;
    /* OBJECT MAINTENANCE */
    
    document.getElementById("budget_label").innerHTML = value;
     
    //Recalculate bars.
    if(!recalculating){
      recalculateBars();
    }
    
  };
  
  var addCountryOnBars = function(divId){
    //Create country in budget bar
    addCountryToBar(divId, "budget");
    //Create country in budget bar
    addCountryToBar(divId, "time");

    return true;    
  };
  
  var addCountryToBar = function(divId, type){
    if(document.getElementById(divId+'_name')){
      roadmap.setCountryName(divId, document.getElementById(divId+'_name').value);
      modified = true;
    }
    if(document.getElementById(divId+'_code')){
      roadmap.setCountryCode(divId, document.getElementById(divId+'_code').value);
      modified = true;
    }
    
    //Create country in bar
    var divBar = document.getElementById(divId+'_bar_'+type);
    if(!divBar){
      divBar = document.createElement('div');
      divBar.id = divId+'_bar_'+type;
      divBar.className = 'bar bar-success';
      divBar.style.width = '5%';
      //
      document.getElementById(type+"_bar").appendChild(divBar);
    }
    divBar.title = 'Detail '+roadmap.getCountryName(divId);
    divBar.innerText = roadmap.getCountryName(divId);
    
    /* BINDING FUNCTIONS  */
    $('#'+divBar.id).on("click", function(){
         alert('Check '+type+' bar '+ roadmap.getCountryName(divId));
    });
    /* BINDING FUNCTIONS  */
  };
  
  var updateBudgetRoadmap = function(divId){
    if(document.getElementById(divId+'_budget')){
      roadmap.setCountryBudget(divId, document.getElementById(divId+'_budget').value);
      modified = true;
    }
  }
    
  var updateBudgetBar = function(divId){
    var calculation = (roadmap.getCountryBudget(divId) * 100) / roadmap.getBudget();
    if(document.getElementById(divId+'_bar_budget')){
      document.getElementById(divId+'_bar_budget').style.width = calculation+'%';
    } 
  };
  
  var updateTimeRoadmap = function(divId){
    if(document.getElementById(divId+'_start-date')){
      roadmap.setCountryStartDate(divId, document.getElementById(divId+'_start-date').value);
      modified = true;
    }
    if(document.getElementById(divId+'_end-date')){
      roadmap.setCountryEndDate(divId, document.getElementById(divId+'_end-date').value);
      modified = true;
    }
  }
  
  var updateTimeBar = function(divId){
    if(roadmap.getCountryStartDate(divId) && roadmap.getCountryEndDate(divId)){
      var days = diffDates(roadmap.getCountryStartDate(divId), roadmap.getCountryEndDate(divId));
    
      //Update total
      updateTotal();
      
      //Do the calculation
      var calculation = (days * 100) / roadmap.getTotal();
      if(document.getElementById(divId+'_bar_time')){
        document.getElementById(divId+'_bar_time').style.width = calculation+'%';
      }
      
      //Recalculate bars.
      if(!recalculating){
        recalculateBars();
      } 
    }
  };
  
  var recalculateBars = function(){
    recalculating = true;
    
    for (c in roadmap.getCountries()){
      updateBudgetBar(c);
      updateTimeBar(c);
    }

    recalculating = false;  
  };
  
  var updateTotal = function(){ 
    var minDate;
    var maxDate;
    
    for (c in roadmap.getCountries()){
      var actMin = Math.abs(new Date(roadmap.getCountryStartDate(c)).getTime());
      if(!minDate || minDate > actMin){
        minDate = actMin;
      }
      var actMax = Math.abs(new Date(roadmap.getCountryEndDate(c)).getTime());
      if(!maxDate || maxDate < actMax){
        maxDate = actMax;
      }
    }
    var timeDiff = Math.abs(maxDate - minDate);
    /* OBJECT MAINTENANCE */
    roadmap.setTotal(Math.ceil(timeDiff / (1000 * 3600 * 24)));
    modified = true;
    /* OBJECT MAINTENANCE */  
  };
  
  var diffDates = function(date1, date2){
    var dateOne = new Date(date1);
    var dateTwo = new Date(date2);
    var timeDiff = Math.abs(dateTwo.getTime() - dateOne.getTime());
    return Math.ceil(timeDiff / (1000 * 3600 * 24)); 
  };
      
  // Wrap this function in a closure so we don't pollute the namespace
  var saveRoadmapAjax = function() {
    //If there are no modifications do not call the server!!
    if(modified){
      modified = false;
      $.ajax({
        url: "/ajax/roadmap/create",
        type: 'POST',
        data: {"roadmap": JSON.stringify( roadmap ) },
        dataType: 'json',
        success: function(output) {
          //Update the idDB because updates insted of insert.
          roadmap.setIdDB(output.idDB);
          for(c in output.countries){
            roadmap.setCountryIdDB(c, output.countries[c].idDB);        
          }
        },
        error: function(a, b, c) {
          //alert(a+b+c); //sometimes enters here. TODO: check it out.
        },
        complete: function() {
          // Schedule the next request when the current one's complete
          //setTimeout(saveRoadmapAjax, 15000);
        }
      });
    } else {
      // Schedule the next request when there are no modifications.
      //setTimeout(saveRoadmapAjax, 15000);
    }
  };
  
  var saveRoadmap = function(){
    modified = true;
    saveRoadmapAjax();
  }
  
  var init = function(external){
    if(external){
      roadmap.create(external);
      //Create divs.
      for(c in roadmap.getCountries()){
        addCountryOnBars(c);
        addCountry(c);
      }
      
      $('#budget').val(roadmap.getBudget());
      updateBudgetLabel(roadmap.getBudget());
      
      //Recalculate bars.
      if(!recalculating){
        recalculateBars();
      }
    }
  };
  
  var initView = function(external){
    if(external){
      roadmap.create(external);
      //Create divs.
      for(c in roadmap.getCountries()){
        addCountryOnBars(c);
      }

      recalculateBars();
    }
  };
  
  var showCountriesDetails = function(){
    if(document.getElementById('countriesDetails').style.display == 'none'){
      document.getElementById('countriesDetails').style.display = 'block';            
    } else {
      document.getElementById('countriesDetails').style.display = 'none';
    }
  };
    
  /**
  * We have to assign the public functions to a var 
  * and return it to make the functions visible.
  */
  return {
     deleteCountry : deleteCountry,
     addCountry : addCountry,
     updateBudgetLabel : updateBudgetLabel,
     addCountryOnBars : addCountryOnBars,
     updateTimeRoadmap : updateTimeRoadmap, 
     updateTimeBar : updateTimeBar,
     updateBudgetRoadmap : updateBudgetRoadmap,
     updateBudgetBar : updateBudgetBar,
     showCountriesDetails : showCountriesDetails,
     saveRoadmap: saveRoadmap,
     init : init,
     initView : initView                                                   
  };
  
}());