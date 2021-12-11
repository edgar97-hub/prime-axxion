$(document).ready(function () {
    $('#Autor_Impersonated').on('keyup',function() {
        var query = $(this).val();

        //$('#Autor').val("w");
        $.ajax({
    
        url:"/searchSection/"+query,
        type:"GET",
        success:function (data) {

           // var index = data.indexOf("#");
            //var res = data.substring(0, index); 

            $('#vendor_list_2').html(data);

            }

        })
    });
 
         $(document).on('click', 'li', function(){
            //alert('Handler for .keyup() called.'+this.id); 
            
              var value = $(this).text();
              id = $(this).data("id")
              //alert(id);

              $('#Autor_Impersonated').val(value);
              $('#nosotros_id').val(id);
              $('#vendor_list_2').html("");
              
           
         });     
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