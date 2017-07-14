<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.sales.item_types.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_item_types');
    }
    
    public function listItemTypesJson() {
        $item_types = \App\ItemType::all();
        return response()->json($item_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_type = new \App\ItemType();
        return view($this->viewsDir.'create_item_types', compact('item_type'));
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
            'name' => 'required|max:25',
            'description' => 'max:100',
            'state' => 'required|max:1'
        ]);
        
        $item_type = new \App\ItemType();        
        $item_type->name = $request->name;
        $item_type->description = $request->description;
        $item_type->state = $request->state;       
        $item_type->save();
        
        return view($this->viewsDir.'partial.view_item_types', compact('item_type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_type = \App\ItemType::findOrFail($id);
        return view($this->viewsDir.'show_item_types', compact('item_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_type = \App\ItemType::findOrFail($id);
        return view($this->viewsDir.'edit_item_types', compact('item_type'));
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
            'name' => 'required|max:25',
            'description' => 'max:100',
            'state' => 'required|max:1'
        ]);
        
        $item_type = \App\ItemType::findOrFail($request->item_type_id);       
        $item_type->name = $request->name;
        $item_type->description = $request->description;
        $item_type->state = $request->state;       
        $item_type->save();
        
        return view($this->viewsDir.'partial.view_item_types', compact('item_type'));
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
