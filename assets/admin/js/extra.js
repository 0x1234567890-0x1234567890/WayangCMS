/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#cpassword").keyup(function(){
   var cp=$("#cpassword").val();
   var np=$("#npassword").val();
   
   if(np!=cp)
   {
       $("#error").html("Confirm Password not match!");
       document.getElementById("submit").setAttribute("disabled","disabled");
   }
   else
   {
       $("#error").html("");
       document.getElementById("submit").removeAttribute("disabled","disabled");
   }
});