<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.sales.taxes.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_taxes');
    }
    
    public function listTaxesJson() {
        $taxes = \App\Tax::orderBy('init_date','desc')->orderBy('expiration_date','desc')->get();
        return response()->json($taxes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tax = new \App\Tax();        
        return view($this->viewsDir.'create_tax', compact('tax'));
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
            'percentage' => 'required|numeric',
            'init_date' => 'required|date',
            'expiration_date' => 'date'
        ]);
        
        $tax = new \App\Tax();        
        $tax->name = $request->name;
        $tax->description = $request->description;
        $tax->percentage = $request->percentage;
        $tax->init_date = $request->init_date;               
        if (isset($request->expiration_date) && trim($request->expiration_date) != "") {
            $tax->expiration_date = $request->expiration_date;
        } else {
            $tax->expiration_date = null;
        }
       
        $tax->save();
        
        return view($this->viewsDir.'partial.view_tax', compact('tax'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tax = \App\Tax::findOrFail($id);        
        return view($this->viewsDir.'show_tax', compact('tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tax = \App\Tax::findOrFail($id);        
        return view($this->viewsDir.'edit_tax', compact('tax'));
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
            'percentage' => 'required|numeric',
            'init_date' => 'required|date',
            'expiration_date' => 'date'
        ]);
        
        $tax = \App\Tax::findOrFail($request->tax_id);         
        $tax->name = $request->name;
        $tax->description = $request->description;
        $tax->percentage = $request->percentage;
        $tax->init_date = $request->init_date;               
        if (isset($request->expiration_date) && trim($request->expiration_date) != "") {
            $tax->expiration_date = $request->expiration_date;
        } else {
            $tax->expiration_date = null;
        }
       
        $tax->update();
        
        return view($this->viewsDir.'partial.view_tax', compact('tax'));
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
