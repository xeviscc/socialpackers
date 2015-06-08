
var st_comments = (function() 
{

  var files = new Array();
  
  var saveTextComment = function(idItem, idcomment){
  
    var comment = document.getElementById(idcomment).value;
    var obj = { idItem: 0, comment: 0 };
    if(comment){
      obj.comment = comment;
      obj.idItem = idItem;
    
      $.ajax({
        url: "/ajax/comments/saveText",
        type: 'POST',
        data: { "obj" : JSON.stringify(obj) },
        dataType: 'json',
        success: function(output) {
          document.getElementById(idcomment).value = "";
        }
      });
    }
  };
  
  var saveReplyComment = function(idItem, idcomment, idDestinyDiv, type){
  
    var comment = document.getElementById(idcomment).value;
    
    var obj = { idItem: 0, comment: 0, type: '' };
    if(comment){
      obj.comment = comment;
      obj.idItem = idItem;
      obj.type = type;
    
      $.ajax({
        url: "/ajax/comments/saveReply",
        type: 'POST',
        data: { "obj" : JSON.stringify(obj) },
        dataType: 'json',
        success: function(output) {
          //Delete text in input.
          document.getElementById(idcomment).value = '';
          //create the div.
          var divReply = document.createElement("div");
          //Insert the text and stuff.
          var html = [ 
            '<div>',
            '<img src="',output.picture,'" style="height:30px;width:30px;"/>',
              '&nbsp;<a href="',output.url,'">@',output.username,'</a>',
              '&nbsp;',output.comment,
            '</div>'                                 
          ].join('');
          
          divReply.innerHTML = html;
          
          //Add to tips
          var divDesiny = document.getElementById(idDestinyDiv);
          divDesiny.appendChild(divReply);
        }
      });
    }
  };
  
  
  var uploadFiles = function(event, idItem) {
  
    var data = new FormData();
  
    for (var i=0, len=files.length; i < len; i++) {
      data.append("File" + i, files[i]);
    }
    data.append("idItem", idItem);
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/ajax/comments/uploadFiles", true);
    xhr.onload = function() {
      switch(this.status) {
        case 200: // request complete and successful
          console.log("Files uploaded"); //debug purposes
          break;
              
        default: // request complete but with unexpected response
          console.log("Files not uploaded"); //debug purposes
       }
    };
  
    xhr.onprogress = function(event) {
      var percentage = event.loaded / event.total * 100;
  
      // update progressbar width
      var element = document.getElementById("progress");
      progress.style.width = percentage + "%";
    };
  
    xhr.send(data);
    
    $('#thumbs_id').removeClass('thumbs_style');
    $('#thumbs').empty();    
    files = new Array();
  
  };
  
  var imagesSelected = function(myFiles) {
    for (var i = 0, f; f = myFiles[i]; i++) {
      var imageReader = new FileReader();
      imageReader.onload = (function(aFile) {
        return function(event) {
          var span = document.createElement('span');
          var id = aFile.name.substring(0,aFile.name.indexOf('.'));
          span.id=id;
          span.innerHTML = ['<div class="over_image"><img class="images" src="', event.target.result,'" title="', aFile.name, '"/>',
                            '<div class="_cont"> <div class="close_pic" onclick="st_comments.deleteFile(\'', aFile.name, '\');">x</div></div></div>',
                          ].join('');
          $('#thumbs').append(span);
        };
      })(f);
      imageReader.readAsDataURL(f);
    }
    changeToDropHereBack();
    $('#thumbs_id').removeClass('thumbs_style_drop_here');
    $('#thumbs_id').addClass('thumbs_style');
  };  

  var dragging = 0;
  var dropFilesIn = function(event) {
    dragging=0;
    $('#__text').hide();
    
    event.stopPropagation();  
    event.preventDefault();   
    imagesSelected(event.dataTransfer.files);
    
    for (var i = 0, f; f = event.dataTransfer.files[i]; i++) {
      files.push(event.dataTransfer.files[i]);  
    }
     
  };

  var deleteFile = function(name){
    var aux = new Array();
    var j = 0;//new counter
    for (var i = 0, f; f = files[i]; i++) {
      if(f.name!=name){
        aux[j] = f;
        j++;  
      } else {
        var id = f.name.substring(0,f.name.indexOf('.'));
        $('#'+id).remove();
      }  
    }
    files = aux;
  };
  
  var changeToDropHere = function(){
    dragging++;
    $('#thumbs_id').addClass('thumbs_style_drop_here');
    $('#__text').show();
    
  };
  
  var changeToDropHereBack = function(){
    dragging--;
    if(dragging===0){
      $('#thumbs_id').removeClass('thumbs_style_drop_here');
      $('#__text').hide();
    }
  };

  return {
     saveTextComment : saveTextComment,
     dropFilesIn : dropFilesIn,
     changeToDropHere : changeToDropHere,
     changeToDropHereBack : changeToDropHereBack,
     uploadFiles : uploadFiles,
     deleteFile : deleteFile,
     saveReplyComment : saveReplyComment     
  };
  
}());
