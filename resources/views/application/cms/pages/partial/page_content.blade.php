<?php $li_content_id = "li_content_".$pcontent->page_content_id; ?>

<li class="ui-state-default liPageContent" id="{{ $li_content_id }}">
    
    <div class="ui-grid-row">
        <div class="ui-grid-col-12" >                                                        
            <button class="delete_content" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" 
                    style="height: 30px; width: 30px; float: right;" parent_li="{{ $li_content_id }}" ></button>

            @if ($pcontent->content->cat_det_id_type == 'HTMLSEC') 
            <button class="edit_htmlcontent" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" 
                    style="height: 30px; width: 30px; float: right;" parent_li="{{ $li_content_id }}" ></button>
            @endif

            <button class="show_layoutinfo" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-info-circle" 
                    style="height: 30px; width: 30px; float: right;" parent_li="{{ $li_content_id }}"></button>

            <p-dialog id="{{ $li_content_id }}_layoutinfo" title="Tamaño de columna por resolución" modal showeffect="fade" hideeffect="fade" renderdelay="10">
                <div class="ui-grid-responsive">
                    <div class="ui-grid-row" >
                        <div class="ui-grid-col-8"><span class="bolded">Dispositivos grandes: </span></div> 
                        <div id="{{ $li_content_id }}_columns_on_lg_div" class="ui-grid-col-4">{{ $pcontent->columns_on_lg }}</div>
                    </div>

                    <div class="ui-grid-row" >
                        <div class="ui-grid-col-8"><span class="bolded">Dispositivos medianos: </span></div>
                        <div id="{{ $li_content_id }}_columns_on_md_div" class="ui-grid-col-4">{{ $pcontent->columns_on_md }}</div>
                    </div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-8"><span class="bolded">Dispositivos pequeños: </span></div>
                        <div id="{{ $li_content_id }}_columns_on_g_div" class="ui-grid-col-4">{{ $pcontent->columns_on_g }}</div>
                    </div>
                </div>
            </p-dialog>

        </div>
    </div>

    <div class="ui-grid-row">
        <div class="ui-grid-col-12">                                                        
            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][page_content_id]" value="{{ $pcontent->page_content_id }}" />
            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][order]" value="{{ $pcontent->order }}" class="page_content_order" />        

            <input id="{{ $li_content_id }}_columns_on_lg" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_lg]" value="{{ $pcontent->columns_on_lg }}" />
            <input id="{{ $li_content_id }}_columns_on_md" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_md]" value="{{ $pcontent->columns_on_md }}" />
            <input id="{{ $li_content_id }}_columns_on_g" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_g]" value="{{ $pcontent->columns_on_g }}" />

            @if ($pcontent->content->cat_det_id_type == 'HTMLSEC')                                                    
                <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="HTMLSEC" />
                <input type="hidden" id="{{ $li_content_id }}_htmlcontent" name="page_content[{{ $pcontent->page_content_id }}][html_content]" 
                       value="<?php echo htmlentities($pcontent->content->htmlsection->html_content); ?>" />                                                            
                <div id="{{ $li_content_id }}_htmlcontent_div" >
                    <?php echo $pcontent->content->htmlsection->html_content; ?>
                </div>
            @elseif ($pcontent->content->cat_det_id_type == 'SLIDER')
                <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][slider_id]" value="{{ $pcontent->content->slider->slider_id }}" />
                <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="SLIDER" />

                @include('partial.slider',['slider' => $pcontent->content->slider])

            @elseif ($pcontent->content->cat_det_id_type == 'FORM')
                <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="FORM" />
                Formulario
            @endif 
        </div>
    </div>
    
</li>