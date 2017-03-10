<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.management.catalogs.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_catalogs');
    }
    
    public function listCatalogsJson() {
        $lista_catalogos = \App\Catalog::whereIn('state',array('A','I'))
                ->orderBy('created_at','asc')
                ->get();
        return response()->json($lista_catalogos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewsDir.'create_catalog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'catalog_id' => 'required|unique:catalogs',            
            'state' => 'required'
        ]);
        
        $catalog = new \App\Catalog();
        $catalog->catalog_id = $request->catalog_id;
        $catalog->name = $request->name;
        $catalog->state = $request->state;
        
        $catalog->save();
        return view($this->viewsDir.'partial.view_catalog',compact('catalog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = \App\Catalog::findOrFail($id);
        
        //if ($catalog) {
        return view($this->viewsDir.'show_catalog',compact('catalog'));
        //} else {
            //return view('errors.no_entity_found');
        //}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = \App\Catalog::findOrFail($id);
        return view($this->viewsDir.'edit_catalog',compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'catalog_id' => 'required',            
            'state' => 'required'
        ]);
        
        $catalog = \App\Catalog::find($request->catalog_id);
        $catalog->catalog_id = $request->catalog_id;
        $catalog->name = $request->name;
        $catalog->state = $request->state;
        
        $catalog->update();
        
        return view($this->viewsDir.'partial.view_catalog',compact('catalog')); 
    }
    
    public function manageDetail($id) 
    {
        $catalog = \App\Catalog::findOrFail($id);
        return view($this->viewsDir.'catalog_details.index_details',compact('catalog'));
    }
    
    public function storeCatalogDetails(Request $request) {        
        $catalog = \App\Catalog::findOrFail($request->catalog_id);
        $request_catalog_details = $request->catalog_details;
        
        if (!$catalog->catalog_details->isEmpty()) :
            if (isset($request_catalog_details)) :
                // Save-Update Details
                foreach($catalog->catalog_details as $catdet):                                                            
                    if (isset($request_catalog_details[$catdet->catalog_detail_id])) : 
                        
                        $hasToUpdate = false;
                        
                        if ($catdet->state == 'A' && !isset($request_catalog_details[$catdet->catalog_detail_id]['state'])):
                            $catdet->state = 'I';
                            $hasToUpdate = true;
                        elseif ($catdet->state == 'I' && isset($request_catalog_details[$catdet->catalog_detail_id]['state'])):
                            $catdet->state = 'A';
                            $hasToUpdate = true;
                        endif;
                        
                        if ($request_catalog_details[$catdet->catalog_detail_id]['value'] != $catdet->value) :
                            $catdet->value = $request_catalog_details[$catdet->catalog_detail_id]['value'];                            
                            $hasToUpdate = true;
                        endif;
                        
                        if ($hasToUpdate) :
                            $catalog->catalog_details()->save($catdet);
                        endif;                                                                             
                        
                        unset($request_catalog_details[$catdet->catalog_detail_id]);                    
                        
                    endif;
                endforeach; 
            else :
                // Inactivar todos los details
                foreach($catalog->catalog_details as $catdet) :
                    $catdet->state = 'I';
                    $catalog->catalog_details()->save($catdet); 
                endforeach;
            endif;
        endif;
        
        if (isset($request_catalog_details)) :
            foreach ($request_catalog_details as $catdet) :
                $newDetail = new \App\CatalogDetail();                
                $newDetail->catalog_detail_id = $catdet['catalog_detail_id'];
                $newDetail->value = $catdet['value'];
                $newDetail->state = isset($catdet['state'])?'A':'I';
                $catalog->catalog_details()->save($newDetail);                
            endforeach;
        endif;        
        
        $catalog = \App\Catalog::findOrFail($request->catalog_id);
        
        return view($this->viewsDir.'partial.view_catalog',compact('catalog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
