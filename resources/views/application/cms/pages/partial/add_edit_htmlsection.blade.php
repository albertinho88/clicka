<div id="divEditHtmlSection" class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
        <div class="ui-grid-col-12">
            <div class="text-center titulo">
                <p><i class="fa fa-code" ></i></p>
                <p><h1 class="coolvetica-rg" >Sección Html.</h1></p>                
            </div>
        </div>
    </div>

    <div class="EmptyBox10"></div>

    <div class="ui-grid-row">
        <div class="ui-grid-col-12">
            <textarea id="newHtmlSection" ></textarea>
            <input id="iptHtmlContentId" type="hidden"/>
            <script type="text/javascript">
                tinymce.init({
                        selector:'#newHtmlSection',
                        cleanup_on_startup: false,
                        trim_span_elements: false,
                        verify_html: false,
                        cleanup: false,
                        convert_urls: false,                        
                        height: 200,
                        plugins: [
                                "advlist autolink lists link image charmap preview anchor",
                                "searchreplace visualblocks code fullscreen",
                                "insertdatetime table contextmenu paste image imagetools emoticons"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image emoticons",
                        setup: function (editor) {
                                editor.on('change', function () {
                                        editor.save();
                                });
                        },
                        init_instance_callback : function(editor) {                                
                            editor.save();
                        },
                        file_picker_types: 'image',
                        file_picker_callback: function(callback, value, meta) {
                            //alert("CB: " + cb + ", VALUE: " + value + ",META: " + meta); // debug/testing
                            // Opens a HTML page inside a TinyMCE dialog
                            tinymce.activeEditor.windowManager.open({
                              title: 'Imágenes',
                              url: "{{ route('view_image_selector')  }}",
                              width: 700,
                              height: 600
                            }, {                                                                
                                onselect: function(url)
                                {
                                    //win.document.getElementById(field_name).value = url;
                                    callback(url);
                                }
                            });                            

                        }
                });                                                        
            </script>
            <p-dialog id="dlgelement" title="Godfather I" modal showeffect="fade" hideeffect="fade" renderdelay="10">
                <p>The story begins as Don Vito Corleone, the head of a New York Mafia family, oversees his daughter's wedding. 
                    His beloved son Michael has just come home from the war, but does not intend to become part of his father's business. 
                    Through Michael's life the nature of the family business becomes clear. The business of the family is just like the head of the family, 
                    kind and benevolent to those who give respect, 
                    but given to ruthless violence whenever anything stands against the good of the family.</p>
                 <script type="x-facet-buttons">
                    <button type="button" is="p-button" icon="fa-check" onclick="document.getElementById('dlgelement').hide()">Yes</button>
                    <button type="button" is="p-button" icon="fa-close" onclick="document.getElementById('dlgelement').hide()">No</button>
                </script>   
            </p-dialog>
        </div>
    </div>

    <div class="EmptyBox20"></div>

    <fieldset>
        <legend>Tamaño de columna por resolución</legend>

        <div class="EmptyBox10"></div>

        <div class="ui-grid-row">
            <div class="ui-grid-col-12">
                <small style="color: blue;">
                    El tamaño máximo es 12 y significa que habrá 1 sola columna en la fila, mientras que si se escoge el tamaño 1 significa que el contenido
                    ocupará 1 columna de las 12 posibles en una fila.
                </small>
            </div>
        </div>

        <div class="EmptyBox20"></div>

        <div class="ui-grid-row">
            <div class="ui-grid-col-2">                                            
                <label for="columns_on_lg" class="col-md-4 control-label">Dispositivos grandes:</label>
            </div>
            <div class="ui-grid-col-10">
                <select id="columns_on_lg" name="columns_on_lg" class="selectOneMenu">
                    @for($i=12; $i>=1; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>                                                                                                                
        </div> 

        <div class="ui-grid-row">
            <div class="ui-grid-col-2">                                            
                <label for="columns_on_md" class="col-md-4 control-label">Dispositivos medianos:</label>
            </div>
            <div class="ui-grid-col-10">
                <select id="columns_on_md" name="columns_on_md" class="selectOneMenu">
                    @for($i=12; $i>=1; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>                                                                                                                
        </div>

        <div class="ui-grid-row">
            <div class="ui-grid-col-2">                                            
                <label for="columns_on_g" class="col-md-4 control-label">Dispositivos pequeños:</label>
            </div>
            <div class="ui-grid-col-10">
                <select id="columns_on_g" name="columns_on_g" class="selectOneMenu">                                
                    @for($i=12; $i>=1; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor 
                </select>
            </div>                                                                                                                
        </div>
    </fieldset>

    <div class="EmptyBox10"></div>


    <div class="ui-grid-row text-center">
        <div class="ui-grid-col-12" >                                
            <button id="add-new-section" role="button" aria-disabled="false" is="p-button" icon="fa-plus" class="width_auto" >
                Agregar
            </button>
            <button id="edit-section" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" class="width_auto" >
                Editar
            </button>
            <button id="cancel-new-section" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" >
                Cancelar
            </button>
        </div>
    </div> 

</div>