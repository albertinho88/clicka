$(document).ready(function(){
                
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
     * función para abrir el formulario para agregar un nuevo slider
     */
    $("#addSlider").click(function(e){            
        $("#divEditPage").toggle("fade", 300);            
        $("#divEditSlider").toggle("fade", 300, function() {                    
            $('html, body').animate({scrollTop: 0}, 200);
        });  
        e.preventDefault();
    });
                        
});
    
    