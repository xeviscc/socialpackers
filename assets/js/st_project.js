/*
  PROJECT / TASKs
*/
var st_project = (function()
{
  
  var counter = 0;
  
  var changeHidden = function(value, idDiv){
    document.getElementById(idDiv+"_hidden_name").innerHTML = "<strong>Task: </strong>"+value;  
  };
  
  var deleteTask = function(divTask){
    var divToDelete = document.getElementById(divTask);
    var divToDeleteH = document.getElementById(divTask+'_hidden');
    divToDelete.parentNode.removeChild(divToDelete);
    divToDeleteH.parentNode.removeChild(divToDeleteH);
  };
  
  var hideTask = function(divTask){
    var idHidden = divTask+'_hidden';
    $('#'+divTask).removeClass('task');
    $('#'+divTask).addClass('taskHidden');
    $('#'+idHidden).removeClass('taskHidden');
    $('#'+idHidden).addClass('taskMinimized');
  };
  
  var showTask = function(divTask){
    var idHidden = divTask+'_hidden';
    $('#'+divTask).removeClass('taskHidden');
    $('#'+divTask).addClass('task');
    $('#'+idHidden).removeClass('taskMinimized');
    $('#'+idHidden).addClass('taskHidden');
  };
  
  var addTask = function(where){
    var tasksDiv = document.getElementById("tasks");
    if(where){
      tasksDiv = document.getElementById(where);    
    } 
    counter = counter+1;
    var task = "task-"+counter;
    var divTask = document.createElement("div");
    divTask.id = task;
    divTask.className = 'row task';
  
    var html = [ 
      '<ul class="unstyled">',
      '<li>',
        '<button type="button" class="close" title="Delete Task" onclick="st_project.deleteTask(\'',task,'\')"><i class="icon-remove"></i></button>',
        '<button type="button" class="close andor" title="Hide Task" onclick="st_project.hideTask(\'',task,'\')"><i class="icon-chevron-up"></i></button>',
      '</li>',
      '<li class="span3">',
        '<label for="',task,'_name">Task Name:</label>',
        '<input type="text" class="input-large" name="',task,'_name" oninput="st_project.changeHidden(this.value,',task,');">',
      '</li>',    
      '<li class="span2">',
        '<label for="',task,'_start_date">Start date:</label>',
        '<input type="date" class="input-medium" name="',task,'_start-date" placeholder="dd/MM/yyyy">',
      '</li>',
      '<li class="span2">',
        '<label for="',task,'_end_date">End date:</label>',
        '<input type="date" class="input-medium" name="',task,'_end-date" placeholder="dd/MM/yyyy">',
      '</li>',
      '<li class="span3">',
        '<label for="',task,'_schedule">Schedule:</label>',
        '<input type="time" class="input-small" name="',task,'_start-schedule" placeholder="">',
        '<input type="time" class="input-small" name="',task,'_end-schedule" placeholder="">',
      '</li>',
      '<li class="span2">',
        '<label for="',task,'_num_users_needed">Num Users Needed:</label>',
        '<input type="number" class="input-small" name="',task,'_num-users-needed" min=1 required>',
      '</li>',
      '<li class="span6">',
        '<label for="',task,'_description">Description:</label>',
        '<textarea class="span6" name="',task,'_description" cols="80" rows="4" placeholder="This will be the first step to build..."></textarea>',
      '</li>',
      '<li class="span3">',
        '<label for="',task,'_reward">Reward:</label>',
        '<textarea class="span3" name="',task,'_reward" cols="80" rows="4" placeholder="We will offer a place to sleep..."></textarea>',
      '</li>',
      '<li class="span3">',
        '<label for="',task,'_requeriments">Requeriments:</label>',
        '<textarea class="span3" name="',task,'_requeriments" cols="80" rows="4" placeholder="Lang: SPANIGH; Skill: Engineer;"></textarea>',
      '</li>',
      '</ul>'
      ].join('');
    divTask.innerHTML = html;
    
    //To show when task is minimized.
    var divHiddenTask = document.createElement("div");
    divHiddenTask.id = task+'_hidden';
    divHiddenTask.className = 'taskHidden';
    
    var html = [
      '<ul class="unstyled">',
      '<li>',
        '<button type="button" class="close" title="Delete Task" onclick="st_project.deleteTask(\'',task,'\')"><i class="icon-remove"></i></button>',
        '<button type="button" class="close andor" title="Show Task" onclick="st_project.showTask(\'',task,'\')"><i class="icon-chevron-down"></i></button>',
      '</li>',
      '<li>',
        '<label id="',task,'_hidden_name"><strong>Task:</strong> Undefined Name</label>',
      '</li>',
      '</ul>'          
    ].join('');
    divHiddenTask.innerHTML = html;
    
    tasksDiv.appendChild(divHiddenTask);
    tasksDiv.appendChild(divTask);
  };
  


  var acceptRequest = function(idRequest){
    if(idRequest){
   
      $.ajax({
        url: "/ajax/project/acceptRequest",
        type: 'POST',
        data: idRequest,
        success: function(output) {
          $('#request_'+idRequest).remove();
        }
      });
    }
  
  };
  
  var declineRequest = function(idRequest){
    if(idRequest){
   
      $.ajax({
        url: "/ajax/project/declineRequest",
        type: 'POST',
        data: idRequest, 
        success: function(output) {
          $('#request_'+idRequest).remove();
        }
      });
    }
  };

  var reloadMasonry = function(idContainer){
    setTimeout(function(){$('#'+idContainer).masonry('reload');}, 200);
  };
   
  //On load active masonry
  $(window).load(function(){
    $('#search_proj_cont').masonry({
      itemSelector : '.item_proj'
    });
    $('#tab_search_title').on("click", function(){
      st_project.reloadMasonry('search_proj_cont');
    });
    
    $('#subs_proj_cont').masonry({
      itemSelector : '.item_proj'
    });
    $('#tab_subscribed_title').on("click", function(){
      st_project.reloadMasonry('subs_proj_cont');
    });
  });
  
  /**
  * We have to assign the public functions to a var 
  * and return it to make the functions visible.
  */
  return {
     changeHidden : changeHidden,
     deleteTask : deleteTask,
     hideTask : hideTask,
     showTask : showTask,
     addTask : addTask,
     reloadMasonry : reloadMasonry,
     acceptRequest : acceptRequest,
     declineRequest : declineRequest
  };
  
}());