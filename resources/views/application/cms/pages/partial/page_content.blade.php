<div class="ui-grid-row">
    <div class="ui-grid-col-12" >                                                        
        <button class="delete_htmlcontent" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" 
                style="height: 30px; width: 30px; float: right;" parent_li="li_sec_{{ $pcontent->page_content_id }}" ></button>

        <button class="edit_htmlcontent" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" 
                style="height: 30px; width: 30px; float: right;" parent_li="li_sec_{{ $pcontent->page_content_id }}" ></button>

        <button class="show_layoutinfo" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-info-circle" 
                style="height: 30px; width: 30px; float: right;" parent_li="li_sec_{{ $pcontent->page_content_id }}"></button>

        <p-dialog id="li_sec_{{ $pcontent->page_content_id }}_layoutinfo" title="Layout Info" modal showeffect="fade" hideeffect="fade" renderdelay="10">
            <p><span class="bolded">Columnas en g: </span> {{ $pcontent->columns_on_g }}</p>
            <p><span class="bolded">Columnas en md: </span> {{ $pcontent->columns_on_md }}</p>
            <p><span class="bolded">Columnas en lg: </span> {{ $pcontent->columns_on_lg }}</p>                                                               
        </p-dialog>

    </div>
</div>

<div class="ui-grid-row">
    <div class="ui-grid-col-12">                                                        
        <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][page_content_id]" value="{{ $pcontent->page_content_id }}" />
        <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][order]" value="{{ $pcontent->order }}" class="page_content_order" />
        
        <input id="li_sec_{{ $pcontent->page_content_id }}_columns_on_lg" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_lg]" value="{{ $pcontent->columns_on_lg }}" />
        <input id="li_sec_{{ $pcontent->page_content_id }}_columns_on_md" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_md]" value="{{ $pcontent->columns_on_md }}" />
        <input id="li_sec_{{ $pcontent->page_content_id }}_columns_on_g" type="hidden" name="page_content[{{ $pcontent->page_content_id }}][columns_on_g]" value="{{ $pcontent->columns_on_g }}" />
        
        @if ($pcontent->content->cat_det_id_type == 'HTMLSEC')                                                    
            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="HTMLSEC" />
            <input type="hidden" id="li_sec_{{ $pcontent->page_content_id }}_htmlcontent" 
                    name="page_content[{{ $pcontent->page_content_id }}][html_content]" 
                    value="<?php echo htmlentities($pcontent->content->htmlsection->html_content); ?>" />                                                            
            <div id="li_sec_{{ $pcontent->page_content_id }}_htmlcontent_div" >
                <?php echo $pcontent->content->htmlsection->html_content; ?>
            </div>
        @elseif ($pcontent->content->cat_det_id_type == 'SLIDER')
            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="SLIDER" />
            Slider
        @elseif ($pcontent->content->cat_det_id_type == 'FORM')
            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="FORM" />
            Formulario
        @endif 
    </div>
</div>