$(document).ready(function(){
    
    var newContentCount = 1;
    
    $("#divEditHtmlSection").hide();
    $("#divEditSlider").hide();    

    $( "#ulPageContent" ).sortable({
        update: function( event, ui ) {                
            var cont = 0;
            $("input.page_content_order").each(function(index){
                $(this).val(cont);
                cont++;
            });                                        
        }
    });
    $( "#ulPageContent" ).disableSelection();                

    if ($("#is_menu_item")[0].checked) {
        $("#fldsMenu").show();
    } else {                
        $("#fldsMenu :text").val("");
        $("#fldsMenu").hide();
    }                

    $("#is_menu_item").change(function(){            
        $("#fldsMenu").toggle("fade", 500);            
    });

    //***************************** HTML SECTIONS ***************************************
    
    /**
     * función para abrir el formulario para agregar nueva sección html
     */
    $("#addHtmlSection").click(function(e){
        $("#edit-section").hide();
        $("#add-new-section").show();                                    
        $("#divEditPage").toggle("fade", 300);            
        $("#divEditHtmlSection").toggle("fade", 300, function() {                    
            $('html, body').animate({scrollTop: 0}, 200);
        });  
        e.preventDefault();
    });
    
    /**
    * función para salir sin guardar de formulario para agregar/editar nueva sección html
    */
    $("#cancel-new-section").click(function(e){         
        $("#divEditHtmlSection").toggle("fade", 300);                        
        $("#divEditPage").toggle("fade", 300, function() {
            tinyMCE.get('newHtmlSection').setContent("");
            $('html, body').animate({
                scrollTop: $("#addHtmlSection").offset().top
            }, 600);
        });
        e.preventDefault();
    });
    
    $("#add-new-section").click(function(){        
	clearMessage();	
	var li_count = $("#ulPageContent li").length; 
	var new_li = '';
	var v_columns_on_lg = $("#columns_on_lg").val();
	var v_columns_on_md = $("#columns_on_md").val();
	var v_columns_on_g = $("#columns_on_g").val();	
        var li_content_id = 'li_ncontent_' + newContentCount;
	
	new_li = '<li class="ui-state-default liPageContent" id="' + li_content_id + '">'
                + '<div class="ui-grid-row">'
                + '<div class="ui-grid-col-12" >'
                + '<button id="delete_' + li_content_id + '" class="delete_content btn-mng-content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" parent_li="' + li_content_id + '" ></button>'
                + '<button id="edit_nhtmlcontent_' + li_content_id + '" class="edit_htmlcontent btn-mng-content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" parent_li="' + li_content_id + '" ></button>'
                + '<button id="show_nlayoutinfo_' + li_content_id + '" class="show_layoutinfo btn-mng-content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-info-circle" parent_li="' + li_content_id + '" ></button>'
                + '<div id="' + li_content_id + '_nlayoutinfo" title="Tamaño de columna por resolución" >'
                + '<div class="ui-grid-responsive">'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos grandes: </span></div><div id="' + li_content_id + '_columns_on_lg_div" class="ui-grid-col-4">' + v_columns_on_lg + '</div></div>'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos medianos: </span></div><div id="' + li_content_id + '_columns_on_md_div" class="ui-grid-col-4">' + v_columns_on_md + '</div></div>'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos pequeños: </span></div><div id="' + li_content_id + '_columns_on_g_div" class="ui-grid-col-4">' + v_columns_on_g + '</div></div>'                                        
                + '</div></div>'
                + '</div></div>'
                + '<div class="ui-grid-row"><div class="ui-grid-col-12">'
                + '<input type="hidden" name="page_content['+ li_content_id +'][page_content_id]" value="" />'
                + '<input type="hidden" name="page_content['+ li_content_id +'][order]" value="' + li_count + '" class="page_content_order" />'
                + '<input id="' + li_content_id + '_columns_on_lg" type="hidden" name="page_content['+ li_content_id +'][columns_on_lg]" value="' + v_columns_on_lg + '" />' 
                + '<input id="' + li_content_id + '_columns_on_md" type="hidden" name="page_content['+ li_content_id +'][columns_on_md]" value="' + v_columns_on_md + '" />' 
                + '<input id="' + li_content_id + '_columns_on_g" type="hidden" name="page_content['+ li_content_id +'][columns_on_g]" value="' + v_columns_on_g + '" />'
                + '<input type="hidden" name="page_content['+ li_content_id +'][content_type]" value="HTMLSEC" />'
                + '<input type="hidden" id="' + li_content_id + '_htmlcontent" name="page_content['+ li_content_id +'][html_content]" value=\''  + tinyMCE.get('newHtmlSection').getContent({format : 'raw'}) + '\' />'
                + '<div id="' + li_content_id + '_htmlcontent_div" >' + tinyMCE.get('newHtmlSection').getContent({format : 'raw'}) + '</div>'
                + '</div></div></li>';                        
	
	$("#ulPageContent").append(new_li); 
	addMessage([{ severity: 'info', summary: '', detail: 'Sección html agregada/modificada correctamente.' }]); 
	
	$("#divEditHtmlSection").toggle("fade", 300);            
	tinyMCE.get('newHtmlSection').setContent("");
	$("#divEditPage").toggle("fade", 400);                        
				
	$("#edit_nhtmlcontent_" + li_content_id).click(function(e){                
		editHtmlSection($(this).attr('parent_li'),e);                
	});
				
	$("#delete_" + li_content_id).click(function(e){                                                                                
		deleteContent($(this).attr('parent_li'), e);
	});
				
	$('#show_nlayoutinfo_' + li_content_id).click(function(e){                
		$('#' + $(this).attr('parent_li') + '_nlayoutinfo').puidialog('show');                 
		e.preventDefault();
	});
				
	$('#' + li_content_id + '_nlayoutinfo').puidialog({
            showEffect: 'fade',
            hideEffect: 'fade',                
            responsive: true,
            minWidth: 200,
            modal: true
	});
				
	$('html, body').animate({
            scrollTop: $("#" + li_content_id).offset().top
	}, 800);
				
	newContentCount++;
				
    });
    
    $("#edit-section").click(function(){            
        $("#" + $("#iptHtmlContentId").val() + '_htmlcontent').val(tinyMCE.get('newHtmlSection').getContent({format : 'raw'}));
        $("#" + $("#iptHtmlContentId").val() + "_htmlcontent_div").html(tinyMCE.get('newHtmlSection').getContent({format : 'raw'}));

        $("#" + $("#iptHtmlContentId").val() + '_columns_on_lg').val($("#columns_on_lg").puidropdown('getSelectedValue'));
        $("#" + $("#iptHtmlContentId").val() + '_columns_on_md').val($("#columns_on_md").puidropdown('getSelectedValue'));
        $("#" + $("#iptHtmlContentId").val() + '_columns_on_g').val($("#columns_on_g").puidropdown('getSelectedValue'));

        $("#" + $("#iptHtmlContentId").val() + '_columns_on_lg_div').html($("#columns_on_lg").puidropdown('getSelectedValue'));
        $("#" + $("#iptHtmlContentId").val() + '_columns_on_md_div').html($("#columns_on_md").puidropdown('getSelectedValue'));
        $("#" + $("#iptHtmlContentId").val() + '_columns_on_g_div').html($("#columns_on_g").puidropdown('getSelectedValue'));

        $("#divEditHtmlSection").toggle("fade", 300);            
        tinyMCE.get('newHtmlSection').setContent("");
        $("#divEditPage").toggle("fade", 400); 

        $('html, body').animate({
            scrollTop: $("#" + $("#iptHtmlContentId").val() + "_htmlcontent_div").offset().top
        }, 800);
    });
    
    
    // ********************************* SLIDERS *****************************************
    
    /**
     * función para abrir el formulario para agregar un nuevo slider
     */
    $("#addSlider").click(function(e){            
        $("#divEditPage").toggle("fade", 300);            
        $("#divEditSlider").toggle("fade", 300, function() {                    
            $('html, body').animate({scrollTop: 0}, 200);
        });  
        //$("#add_edit_slider").trigger("reset");         
        e.preventDefault();
    });
    
    $("#cancel-new-slider").click(function(e){            
        $("#divEditSlider").toggle("fade", 300);                        
        $("#divEditPage").toggle("fade", 300, function() {                
            $('html, body').animate({
                scrollTop: $("#addSlider").offset().top
            }, 600);
        });            

        e.preventDefault();
    });
    
    $("#add-new-slider").click(function(e){            
        clearMessage();            
        var selected_slider = $('input[name=sld_rd]:checked');

        if (selected_slider.length <= 0) {
            addMessage([{ severity: 'error', summary: '', detail: "Seleccione un slider." }]);
        } else {                        	                        
            
            var selected_slider_val = selected_slider.val();                
            var li_count = $("#ulPageContent li").length;
            var new_li = '';
            var v_columns_on_lg = $("#columns_on_lg_sl").val();
            var v_columns_on_md = $("#columns_on_md_sl").val();
            var v_columns_on_g = $("#columns_on_g_sl").val();
            var li_content_id = 'li_ncontent_' + newContentCount;

            new_li = '<li class="ui-state-default liPageContent" id="' + li_content_id + '">'
                + '<div class="ui-grid-row">'
                + '<div class="ui-grid-col-12" >'
                + '<button id="delete_' + li_content_id + '" class="delete_content btn-mng-content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" parent_li="' + li_content_id + '" ></button>'
                + '<button id="show_nlayoutinfo_' + li_content_id + '" class="show_layoutinfo btn-mng-content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-info-circle" parent_li="' + li_content_id + '" ></button>'
                + '<div id="' + li_content_id + '_nlayoutinfo" title="Tamaño de columna por resolución" >'
                + '<div class="ui-grid-responsive">'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos grandes: </span></div><div id="' + li_content_id + '_columns_on_lg_div" class="ui-grid-col-4">' + v_columns_on_lg + '</div></div>'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos medianos: </span></div><div id="' + li_content_id + '_columns_on_md_div" class="ui-grid-col-4">' + v_columns_on_md + '</div></div>'
                + '<div class="ui-grid-row" ><div class="ui-grid-col-8"><span class="bolded">Dispositivos pequeños: </span></div><div id="' + li_content_id + '_columns_on_g_div" class="ui-grid-col-4">' + v_columns_on_g + '</div></div>'
                + '</div></div>'
                + '</div></div>'
                + '<div class="ui-grid-row"><div class="ui-grid-col-12">'
                + '<input type="hidden" name="page_content['+ li_content_id +'][page_content_id]" value="" />'
                + '<input type="hidden" name="page_content['+ li_content_id +'][order]" value="' + li_count + '" class="page_content_order" />'
                + '<input id="' + li_content_id + '_columns_on_lg" type="hidden" name="page_content['+ li_content_id +'][columns_on_lg]" value="' + v_columns_on_lg + '" />' 
                + '<input id="' + li_content_id + '_columns_on_md" type="hidden" name="page_content['+ li_content_id +'][columns_on_md]" value="' + v_columns_on_md + '" />' 
                + '<input id="' + li_content_id + '_columns_on_g" type="hidden" name="page_content['+ li_content_id +'][columns_on_g]" value="' + v_columns_on_g + '" />'
                + '<input type="hidden" name="page_content['+ li_content_id +'][content_type]" value="SLIDER" />'                
                + '<input type="hidden" id="'+ li_content_id +'_slider" name="page_content['+ li_content_id +'][slider_id]" value="' + selected_slider_val + '" />'
                + $("#sldr_" + selected_slider_val).html()
                //+ 'SLIDER ' + selected_slider_val
                + '</div></div></li>';

            $("#ulPageContent").append(new_li); 
            addMessage([{ severity: 'info', summary: '', detail: 'Slider agregado correctamente.' }]);

            $("#divEditSlider").toggle("fade", 300);                        
            $("#divEditPage").toggle("fade", 300);
            
            $("#delete_" + li_content_id).click(function(e){                                                                                
                    deleteContent($(this).attr('parent_li'), e);
            });

            $('#show_nlayoutinfo_' + li_content_id).click(function(e){                
                    $('#' + $(this).attr('parent_li') + '_nlayoutinfo').puidialog('show');                 
                    e.preventDefault();
            });                                       

            $('#' + li_content_id + '_nlayoutinfo').puidialog({
                showEffect: 'fade',
                hideEffect: 'fade',                
                responsive: true,
                minWidth: 200,
                modal: true
            });                                   

            $('html, body').animate({
                scrollTop: $("#" + li_content_id).offset().top
            }, 800);                   

            newContentCount++;                               
        }

        e.preventDefault();
    });
    
    
    // ************************** INICIALIZAR COMPONENTES *************************************
    
    initContentButtons();
    initHtmlSectionButtons();                   
});



// ****************************** MÉTODOS COMUNES **************************************

initContentButtons = function(){
    $(".delete_content").click(function(e){                                                          
        deleteContent($(this).attr('parent_li'), e);
    });
    
    $(".show_layoutinfo").click(function(e){              
        document.getElementById($(this).attr('parent_li') + "_layoutinfo").show();            
        e.preventDefault();
    });
};

initHtmlSectionButtons = function() {
    $(".edit_htmlcontent").click(function(e){                                   
        editHtmlSection($(this).attr('parent_li'),e);
    });
};

/**
 * Método para eliminar un contenido
 * 
 * @param {String} content_id
 * @param {Event} e
 * @returns 
 */
deleteContent = function(content_id, e) {
    $("#" + content_id).fadeOut("normal", function() {
        $(this).remove();
    });
    e.preventDefault();
};

/**
* Función para mostrar el formulario de edición de una sección html
* 
* @param {String} htmlsection_id
* @param {Event} e
* @returns 
*/
editHtmlSection = function(htmlsection_id, e) {
   tinyMCE.get('newHtmlSection').setContent($("#" + htmlsection_id + '_htmlcontent').val(),{format:'text'});            
   $("#iptHtmlContentId").val(htmlsection_id);                

   $('#columns_on_lg').puidropdown('selectValue', $("#" + htmlsection_id + '_columns_on_lg').val());       
   $('#columns_on_md').puidropdown('selectValue', $("#" + htmlsection_id + '_columns_on_md').val());
   $('#columns_on_g').puidropdown('selectValue', $("#" + htmlsection_id + '_columns_on_g').val());

   $("#edit-section").show();
   $("#add-new-section").hide();

   $("#divEditPage").toggle("fade", 300);            
   $("#divEditHtmlSection").toggle("fade", 300, function() {
           console.log();
           $('html, body').animate({scrollTop: 0}, 200);
   });

   e.preventDefault();
};
    
    