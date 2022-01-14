var title = "";
var Card  = "";
var Edit  = false;
$(document).ready(function () {
    
   if (document.contains($('#Edit')[0])) {
    Edit = true;

  }
  var user_id = $('#user_field_2').val();
  $('#user').val(user_id);
  var category_id = $('#category_field_2').val();
  $('#category').val(category_id);
});
 

$("#treeview .menus").click(function (e) {
  e.stopPropagation();
  $(this).find(">ul").toggle("slow");
  if ($(this).hasClass("close"))
      $(this).removeClass("close");
  else
      $(this).addClass("close");
});
 

  $(function(){

    $('#menu li a').click(function(event){
        var elem = $(this).next();
        if(elem.is('ul')){
            event.preventDefault();
            $('#menu ul:visible').not(elem).slideUp();
            elem.slideToggle();
            
        }
        return null;
    });
});

 

function isEmptyOrSpaces(str){
  return str === null || str.match(/^ *$/) !== null;
}


$("#saveTitle").click(function() {

  title = $('#title').val();
  if(isEmptyOrSpaces(title)){
    document.getElementById("message").innerHTML = "El campo de título es obligatorio";

    return false;
  }
  return true;
});

$("#saveCard").click(function() {

  Card = $('#titulolight').val();
  if(isEmptyOrSpaces(Card)){
    document.getElementById("message").innerHTML = "El campo de título ligero es obligatorio";

    return false;
  }
  return true;
}); 

$("#saveSeccionAzul").click(function() {

  title = $('#title').val();
  if(isEmptyOrSpaces(title)){
    document.getElementById("message").innerHTML = "El campo de título ligero es obligatorio";

    return false;
  }
  return true;
}); 


$("#saveImg").click(function() {
  
  if(!Edit)
  {
    //alert("Edit: "+$('#img').get(0).files.length);
    if ($('#img').get(0).files.length === 0) 
    {
      document.getElementById("message").innerHTML = "El campo de img es obligatorio";
    
      return false;
    }
  }
  return true;
}); 
$("#saveSeccionPhotoInstitutional").click(function() {

  textitle = $('#textitle').val();
  if(isEmptyOrSpaces(textitle)){
    document.getElementById("message").innerHTML = "El campo de título es obligatorio";

    return false;
  }
  return true;
});

//$('#LiteraryGenre').val("w");

//$('#category_field_2').on('change', function() {
  //alert( this.value );
//});