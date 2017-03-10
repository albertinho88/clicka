@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <ul class="menubar">                                    
                            <li>
                                <a  data-icon="fa-plus" class="">Subir Archivo</a>
                            </li>                            
                        </ul>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Archivos Multimedia.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="gridMediaFiles"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $('#gridMediaFiles').puidatagrid({       
        datasource: [
            {'brand': 'Volkswagen', 'year': 2012, 'color': 'White', 'vin': 'dsad231ff'},
            {'brand': 'Audi', 'year': 2011, 'color': 'Black', 'vin': 'gwregre345'},
            {'brand': 'Renault', 'year': 2005, 'color': 'Gray', 'vin': 'h354htr'},
            {'brand': 'BMW', 'year': 2003, 'color': 'Blue', 'vin': 'j6w54qgh'},
            {'brand': 'Ford', 'year': 1995, 'color': 'White', 'vin': 'hrtwy34'},
            {'brand': 'Fiat', 'year': 2005, 'color': 'Black', 'vin': 'jejtyj'},
            {'brand': 'Honda', 'year': 2012, 'color': 'Yellow', 'vin': 'g43gr'},
            {'brand': 'Volvo', 'year': 2013, 'color': 'White', 'vin': 'greg34'},
            {'brand': 'Ford', 'year': 2000, 'color': 'Black', 'vin': 'h54hw5'},
            {'brand': 'BMW', 'year': 2013, 'color': 'Red', 'vin': '245t2s'},
            {'brand': 'Jaguar', 'year': 2011, 'color': 'Blue', 'vin': 'few234'},
            {'brand': 'Ford', 'year': 2010, 'color': 'White', 'vin': 'bfnt23'},
            {'brand': 'BMW', 'year': 2011, 'color': 'Green', 'vin': 'aad423'},
            {'brand': 'Mercedes', 'year': 2012, 'color': 'Black', 'vin': 'vx23f2'},
            {'brand': 'Fiat', 'year': 2014, 'color': 'Grey', 'vin': 'vxr23fd'},
            {'brand': 'Renault', 'year': 2015, 'color': 'Blue', 'vin': 'vxc23f'},
            {'brand': 'Volvo', 'year': 2015, 'color': 'Yellow', 'vin': 'vxcff4'},
            {'brand': 'Volvo', 'year': 2015, 'color': 'White', 'vin': 'ht3w1d'},
            {'brand': 'Renault', 'year': 2013, 'color': 'Black', 'vin': 'az12s2'},
            {'brand': 'Fiat', 'year': 2015, 'color': 'Green', 'vin': 'ds12d1'},
            {'brand': 'Volkswagen', 'year': 2001, 'color': 'Grey', 'vin': 'vsd3f2'},
            {'brand': 'Volvo', 'year': 2011, 'color': 'Blue', 'vin': 'dsy4g22'},
            {'brand': 'BMW', 'year': 1996, 'color': 'Black', 'vin': 'h3g254'},
            {'brand': 'Audi', 'year': 2005, 'color': 'Red', 'vin': 'g54gwg'},
            {'brand': 'Ford', 'year': 2011, 'color': 'Blue', 'vin': '14ffqf4'},
            {'brand': 'BMW', 'year': 2015, 'color': 'Black', 'vin': 'h465he6'},
            {'brand': 'Jaguar', 'year': 2010, 'color': 'White', 'vin': 'dsf4frt'},
            {'brand': 'Jaguar', 'year': 2009, 'color': 'Red', 'vin': 'g6hehr'},
        ],
        content: function(car) {
            return $('<div title="'+ car.vin + '"><img src="showcase/resources/demo/images/car/' + car.brand + 
                    '.gif" /><div class="car-detail">' + car.year + ' - ' + car.color  +'</div></div>').puipanel();
        }
    });
});
</script>

@endsection