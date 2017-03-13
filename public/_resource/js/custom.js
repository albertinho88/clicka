/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {  
    initUiComponents();
    initSubmitAjaxForms();
    initAjaxLinks();
});

initUiComponents = function() {

    $("input:text").puiinputtext();
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
    

    $("input").addClass( "ui-inputfield" );
    $("textarea").addClass("ui-inputfield ui-inputtextarea");    
    
    //SelectOneMenu
    $('.selectOneMenu').puidropdown();
    $('.ui-dropdown').addClass("ui-selectonemenu");
    $('.ui-dropdown-trigger').addClass("ui-selectonemenu-trigger");
    $('.ui-dropdown-panel').addClass("ui-selectonemenu-panel");
    $('.ui-dropdown-items-wrapper').addClass("ui-selectonemenu-items-wrapper");
    $('.ui-dropdown-items').addClass("ui-selectonemenu-items");
    $('.ui-dropdown-list').addClass("ui-selectonemenu-list");
    $('.ui-dropdown-item').addClass("ui-selectonemenu-item ui-selectonemenu-list-item");
    
    $.each($('.selectList'),function(){                        
        $(this).puilistbox();
        
        if ($(this)[0].selectedIndex) {            
            $(this).puilistbox('selectItem',$(this)[0].selectedIndex);            
        } else {
            $(this).puilistbox('selectItem',0);
        }
    });
    
    $('.ui-listbox').addClass('ui-selectonelistbox');
    
    $('#growlel').puigrowl({sticky: true});        
    
    tinymce.init({ 
        selector:'.html_editor',
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
    
    //initSubmitAjaxForms();
    //initAjaxLinks();
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
        
        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            data: $(this).serialize(),
            dataType: "html",            
            beforeSend: function( xhr ) {
                addLoadingMessage();
                removeFieldErrorMsgs();
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
              initUiComponents();
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
                initUiComponents();            
                clearMessage();
            })
            .fail(function() {
                addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
            });
        
        e.preventDefault();
    });
};

removeFieldErrorMsgs = function() {    
    $(".ui-state-error").each(function(){
        $(this).removeClass("ui-state-error");
    });
    
    $(".help-block").each(function() {
        if ($(this).html().trim().length > 0) {
            $(this).html("").animate({ height: 'hide' });
        }
    });            
};

