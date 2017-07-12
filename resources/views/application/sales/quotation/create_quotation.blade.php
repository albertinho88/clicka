@extends('layouts.app')

@section('content')


<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">

                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-calculator" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nueva Cotización.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="createQuotationForm" name="createQuotationForm" method="POST" action="{{ route('store_quotation') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="name" class="col-md-4 control-label">Nombre:</label>
                            </div>
                            <div class="ui-grid-col-4">
                                <input id="name" name="name" type="text" autocomplete="off" class="form-control" maxlength="50" />
                            </div> 
                            <div class="ui-grid-col-1"></div>
                            <div class="ui-grid-col-2">                                            
                                <label for="identification" class="col-md-4 control-label">RUC / CI:</label>
                            </div>
                            <div class="ui-grid-col-3">
                                <input id="identification" name="identification" type="text" autocomplete="off" class="form-control" maxlength="13" />
                            </div> 
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="email" class="col-md-4 control-label">E-mail:</label>
                            </div>
                            <div class="ui-grid-col-4">
                                <input id="email" name="email" type="text" autocomplete="off" class="form-control" maxlength="30" />
                            </div> 
                            <div class="ui-grid-col-1"></div>
                            <div class="ui-grid-col-2">                                            
                                <label for="phone" class="col-md-4 control-label">Teléfono:</label>
                            </div>
                            <div class="ui-grid-col-3">
                                <input id="phone" name="phone" type="text" autocomplete="off" class="form-control" maxlength="10" />
                            </div> 
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                <fieldset>
                                    <legend>Detalle</legend>
                                    <div class="EmptyBox10" ></div>
                                    <div class="ui-grid-row" >
                                        
                                        <div class="ui-datatable-tablewrapper ui-datatable ui-widget">
                                            <table>
                                                <thead>
                                                    <tr class="ui-state-default">
                                                        <th class="ui-state-default" style="width: 10%;" ><span class="ui-column-title">Código</span></th>
                                                        <th class="ui-state-default" ><span class="ui-column-title">Descripción</span></th>
                                                        <th class="ui-state-default" style="width: 10%;"><span class="ui-column-title">Cantidad</span></th>
                                                        <th class="ui-state-default" style="width: 10%;"><span class="ui-column-title">Valor Unitario</span></th>
                                                        <th class="ui-state-default" style="width: 10%;"><span class="ui-column-title">Valor Total</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-datatable-data ui-widget-content">
                                                    <tr class="ui-widget-content ui-datatable-even">
                                                        <td><input type="text" /></td>
                                                        <td>Página Web Estática</td>
                                                        <td><input type="text" /></td>
                                                        <td><input type="text" /></td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr class="ui-widget-content ui-datatable-even">
                                                        <td><input type="text" /></td>
                                                        <td>Hosting</td>
                                                        <td><input type="text" /></td>
                                                        <td><input type="text" /></td>
                                                        <td>A</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                                                
                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                <p>Esta cotización tiene validez por 30 días.</p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
