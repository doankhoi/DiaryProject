$(function(){
   var current_name;
   //Thay đổi tên người dùng
   $("#bt_username").click(function(){
       //Lấy lại tên người dùng hiện tại
       current_name = $("#username").text();
       $("#username").empty();
       var input_username = $("<input id=edit_username></input>").val(current_name.trim());
       $("#username").html(input_username);     
   });
   
   $("#edit_username").blur(function(){
       
       if(!$(this).val()){
           $("#edit_username").val(current_name);
       }
   });
});
