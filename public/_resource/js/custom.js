/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {  
    initComponents();                                 
});

initComponents = function() {
    
    PrimeFaces.cw("Poseidon", "me", {id: "pm"});    
    
    //$("input:text").puiinputtext();
    $("input:password").puipassword();    
    $("textarea").puiinputtextarea();
    $('p-datepicker').children('input').puiinputtext();
    $(':checkbox').puicheckbox();
    $(':radio').puiradiobutton();
    $('.breadcrumb').puibreadcrumb();    
    $('.menubar').puimenubar();
    $('fieldset').puifieldset({
        toggleable: true,
        collapsed: false
    });    
        
    $('select').puidropdown();
    
    $("input").addClass( "ui-inputfield" );
    $("textarea").addClass("ui-inputfield ui-inputtextarea");    
        
    /*$('.ui-dropdown').addClass("ui-selectonemenu");
    $('.ui-dropdown-item').addClass("ui-selectonemenu-item ui-selectonemenu-list-item");
    $('.ui-dropdown-item').hover(function(){
        $(this).addClass('ui-state-hover');
    });*/
    
    $('#growlel').puigrowl({sticky: true});
    
    initSubmitAjaxForms();
    initAjaxLinks();
};

addMessage = function(msg) {
    $('#growlel').puigrowl('show', msg);
};

addLoadingMessage = function() {
    addMessage([{severity: 'warn', summary: '', detail: '<i class="fa fa-spinner fa-spin MarRight10"></i> Cargando...'}]);
};

clearMessage = function() {
    $('#growlel').puigrowl('clear');
};

setHtmlContent = function (divId, htmlContent) {
    $('#' + divId).hide();
    $('#' + divId).html(htmlContent);
    $('#' + divId).show(200);
};

initSubmitAjaxForms = function() {
    $('.ajaxJsonForm').submit(function(e){                        
        var a = $(this).attr("action");        
        $(".ui-state-error").removeClass('ui-state-error');
        $(".help-block").html("").animate({ height: 'hide' });

        $.ajax({
            url: a,
            method: "POST",
            data: $(this).serialize(),
            dataType: "html",            
            beforeSend: function( xhr ) {
                addLoadingMessage();
            }
          })
          .fail(function (errorResponse){
                var errors = JSON.parse(errorResponse.responseText);                                                                        
                if (errors) {                    
                    $.each(errors, function(index, value) {                            
                        $('#'+index).addClass('ui-state-error');
                        $('#'+index+'_help_block').html('<strong>' + value + '</strong>').animate( { height: 'show' });
                    });

                    addMessage([{ severity: 'error', summary: '', detail: "Revise la información ingresada y vuelva a intentarlo." }]);
                } else {
                    addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
                }
          })
          .done(function(htmlResponse){         
              setHtmlContent('formAjax',htmlResponse);
              addMessage([{ severity: 'info', summary: '', detail: 'Información enviada y almacenada exitosamente.' }]);                                  
              initComponents();
          })            
          .always(function() {
              // always executed..                 
          });

        e.preventDefault();  
    });
};

initAjaxLinks = function() {
    $('.ajaxLink').click(function(e){                        
        $.ajax({
            url: $(this).attr("href"),
            method: "GET",            
            dataType: "html",
            beforeSend: function (xhr) {                
                addLoadingMessage();
            }
            }).done(function( htmlResponse ) {
                setHtmlContent('formAjax',htmlResponse);            
                initComponents();            
                clearMessage();
            })
            .fail(function() {
                addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
            });
        
        e.preventDefault();
    });
};