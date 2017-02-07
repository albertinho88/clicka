/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$( document ).ready(function() {
  // Handler for .ready() called.  
  $('p-datepicker').children('input').puiinputtext();    
  $("input:text").puiinputtext(); 
  //$("input:email").puiinputtext();
  $("input:password").puipassword();
  $("textarea").puiinputtextarea();    
    
  $("input").addClass( "ui-inputfield" );
  $("textarea").addClass("ui-inputfield ui-inputtextarea");
  
  $('#default').puibreadcrumb();    
  
  $('#images').puigalleria();
  
  $('fieldset').puifieldset({
      toggleable: true,
      collapsed: false
  });
  
  $(':checkbox').puicheckbox();
  
  
  
  
});
