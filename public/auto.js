var title = "";
var card  = "";
var edit  = false;
var editCategory  = false;
var editCards  = false;


$(document).ready(function () {
    
   if (document.contains($('#Edit')[0])) {
    edit = true;
  }

  if (document.contains($('#Editar_category')[0])) {
    editCategory = true;
  }

  if (document.contains($('#editCards')[0])) {
    editCards = true;
  }

  //var user_id = $('#user_field_2').val();
  //$('#user').val(user_id);
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
    var x = document.getElementById("allMessage");
    x.style.display = "block";
    document.getElementById("message").innerHTML = "El campo título es obligatorio";

    return false;
  }
  return true;
});




$("#saveCard").click(function() {

  titulolight = $('#titulolight').val();
  titulonegrita = $('#titulonegrita').val();
  document.getElementById("message_titulolight").innerHTML = "";
  document.getElementById("message_titulonegrita").innerHTML = "";
  document.getElementById("message_img").innerHTML = "";
  

  if(!editCards)
  {
    var x = document.getElementById("allMessage");
    x.style.display = "block";

    if(isEmptyOrSpaces(titulolight)){
      document.getElementById("message_titulolight").innerHTML = "El campo título ligero es obligatorio";
    }
    if(isEmptyOrSpaces(titulonegrita)){
      document.getElementById("message_titulonegrita").innerHTML = "El campo título en negrita es obligatorio";
    }
    if ($('#img').get(0).files.length === 0) 
      {
        document.getElementById("message_img").innerHTML = "El campo img es obligatorio";
    }
    if(isEmptyOrSpaces(titulolight) || isEmptyOrSpaces(titulonegrita) || ($('#img').get(0).files.length === 0)){
  
      return false;
    }
  }
  else
  {
    var x = document.getElementById("allMessage");
    x.style.display = "block";
    
    if(isEmptyOrSpaces(titulolight)){
      document.getElementById("message_titulolight").innerHTML = "El campo título ligero es obligatorio";
    }
    if(isEmptyOrSpaces(titulonegrita)){
      document.getElementById("message_titulonegrita").innerHTML = "El campo título en negrita es obligatorio";
    }
    if(isEmptyOrSpaces(titulolight) || isEmptyOrSpaces(titulonegrita)){
  
      return false;
    }
  }
  return true;
}); 

//$("#saveSeccionAzul").click(function() {

  //title = $('#title').val();
  //if(isEmptyOrSpaces(title)){
    //document.getElementById("message").innerHTML = "El campo título ligero es obligatorio";

    //return false;
  //}
  //return true;
//}); 

$("#saveImg").click(function() {
  
  if(!edit)
  {
    var x = document.getElementById("allMessage");
    x.style.display = "block";
    
    //alert("Edit: "+$('#img').get(0).files.length);
    if ($('#img').get(0).files.length === 0) 
    {
      document.getElementById("message_img").innerHTML = "El campo img es obligatorio";
    
      return false;
    }
  }
  return true;
}); 

$("#saveSeccionPhotoInstitutional").click(function() {

  document.getElementById("message_title").innerHTML = "";
  document.getElementById("message_img").innerHTML = "";

  if(!edit)
  {
    var x = document.getElementById("allMessage");
    x.style.display = "block";

    title = $('#textitle').val();
    if(isEmptyOrSpaces(title))
    {
      document.getElementById("message_title").innerHTML = "El campo título es obligatorio";
    }
    if ($('#img').get(0).files.length === 0) 
    {
      document.getElementById("message_img").innerHTML = "El campo img es obligatorio";
    }
    if(isEmptyOrSpaces(title) || ($('#img').get(0).files.length === 0)){

      return false;
    }
    return true;
  }
  else
  {
    var x = document.getElementById("allMessage");
    x.style.display = "block";

    title = $('#textitle').val();
    if(isEmptyOrSpaces(title))
    {
      document.getElementById("message_title").innerHTML = "El campo título es obligatorio";
      return false;
    }
  }
  return true;
});

//$("#save_category").click(function() {

  //document.getElementById("message_nameCategory").innerHTML = "";
  //document.getElementById("message_img").innerHTML = "";

  //if(!editCategory)
  //{
    //title = $('#nameCategory').val();
    //if(isEmptyOrSpaces(title))
    //{
      //document.getElementById("message_nameCategory").innerHTML = "El campo título es obligatorio";
    //}

    //if ($('#img').get(0).files.length === 0) 
    //{
      //document.getElementById("message_img").innerHTML = "El campo img es obligatorio";
    //}

    //if(isEmptyOrSpaces(title) || ($('#img').get(0).files.length === 0))
    //{
      //return false;
    //}
    //return true;
  //}
  //return true;
//}); 





