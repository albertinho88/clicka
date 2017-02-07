<div id="growlel"></div>  
<script>            
    
    $(function() {
        $('#growlel').puigrowl({life: 8000});                         
        
        $('.ajaxJsonForm').submit(function(e){                        
            var a = $(this).attr("action");
            var form_id = $(this).attr("id");  
            
            $(".ui-state-error").removeClass('ui-state-error');
            $(".help-block").html("").animate({ height: 'hide' });
            
            $.ajax({
                url: a,
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",                
                beforeSend: function( xhr ) {
                    addMessage([{severity: 'warn', summary: '', detail: '<i class="fa fa-spinner fa-spin MarRight10"></i> Enviando...'}]);
                }
              })
              .done(function(data){
                  if ('1' === data.codigoRespuesta) {                      
                      addMessage([{ severity: 'info', summary: '', detail: 'Información enviada y almacenada exitosamente.' }]);
                      document.getElementById(form_id).reset();
                  } else {
                      addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
                  }                      
              })  
              .fail(function(data){
                  // error...
                    var errors = data.responseJSON;                                        
                    
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
              .always(function() {
                  // always executed..                 
              });
            
            e.preventDefault();  
        });
        
    });
    
    addMessage = function(msg) {
        $('#growlel').puigrowl('show', msg);
    };
</script>