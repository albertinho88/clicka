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
        
        if (!$catalog->catalog_details->isEmpty()) :
            if (isset($request->catalog_details)) :
                // Save-Update Roles
                foreach($catalog->catalog_details as $catdet):
                    if (in_array($catdet->catalog_detail_id, $request->catalog_details)):                                                
                        $request->catalog_details = array_diff($request->catalog_details, [$catdet->catalog_detail_id]);
                    elseif (!in_array($catdet->catalog_detail_id, $request->catalog_details) && $catdet->state = 'A') :
                        $catdet->state = 'E';                
                        $catalog->catalog_details()->save($catdet); 
                    endif;
                endforeach; 
            else :
                // Eliminar todos los roles
                foreach($catalog->catalog_details as $catdet) :
                    $catdet->state = 'E';
                    $catalog->catalog_details()->save($catdet); 
                endforeach;
            endif;
        endif;
        
        if (isset($request->catalog_details)) :
            foreach ($request->catalog_details as $catdet) :
                $newDetail = new \App\CatalogDetail();
                $newDetail->catalog_id = $request->catalog_id;
                $newDetail->catalog_detail_id = $catdet['catalog_detail_id'];
                $newDetail->value = $catdet['value'];
                $newDetail->state = 'A';                                                
                $newDetail->save();
            endforeach;
        endif;
        //die(print_r($request->catalog_details));
        
        return response()->json($request);
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
