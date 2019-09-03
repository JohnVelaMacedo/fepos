<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = '';
        $data = $request->only('limit','page','like','all','attr');
        if(isset($data['all'])){
            $items = Product::join('categories','products.category_id','=','categories.id')
                                ->select('products.*',\DB::raw('concat(categories.code,\' \',categories.name) as category_name'))->get();
            $data = array("items"=>$items);
            return compact('data');
        }else{
            if(isset($data['like'])){
                // var_dump($data['like'][0]);
                $query = 'and name like \''.$data['like'][0].'%\'';
            }
            $items = \DB::select('select id as link, concat(code, \' \',name) as value from categories where 1=1 '.$query,[]);
            $data = array("items"=>$items);
            return compact('items');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('code','name','unit','size','cost','price',
                                'alert_quantity','image','category_id','subcategory_id','cf1','cf2'
                                ,'cf3','cf4','cf5','cf6','quantity','tax_rate','track_quantity','details');
        $producto = new Product;
        $producto->code = $data['code'];
        $producto->name = $data['name'];
        $producto->unit = $data['unit']?$data['unit']:'';
        $producto->size = $data['size']?$data['size']:'';
        $producto->cost = $data['cost']?$data['cost']:null;
        $producto->price = $data['price']?$data['price']:'';
        $producto->alert_quantity = $data['alert_quantity']?$data['alert_quantity']:'';
        $producto->category_id = $data['category_id']?$data['category_id']:'';
        $producto->subcategory_id = $data['subcategory_id']?$data['subcategory_id']:null;
        $producto->cf1 = $data['cf1']?$data['cf1']:null;
        $producto->cf2 = $data['cf2']?$data['cf2']:null;
        $producto->cf3 = $data['cf3']?$data['cf3']:null;
        $producto->cf4 = $data['cf4']?$data['cf4']:null;
        $producto->cf5 = $data['cf5']?$data['cf5']:null;
        $producto->cf6 = $data['cf6']?$data['cf6']:null;
        $producto->quantity = $data['quantity']?$data['quantity']:null;
        $producto->tax_rate = $data['tax_rate']?$data['tax_rate']:null;
        $producto->track_quantity = $data['track_quantity']?$data['track_quantity']:null;
        $producto->details = $data['details']?$data['details']:null;
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->only('id','code','name','unit','size','cost','price',
                                'alert_quantity','image','category_id','subcategory_id','cf1','cf2'
                                ,'cf3','cf4','cf5','cf6','quantity','tax_rate','track_quantity','details');
        $producto = Product::find($data['id']);
        $producto->code = $data['code'];
        $producto->name = $data['name'];
        $producto->unit = $data['unit']?$data['unit']:null;
        $producto->size = $data['size']?$data['size']:null;
        $producto->cost = $data['cost']?$data['cost']:null;
        $producto->price = $data['price']?$data['price']:null;
        $producto->alert_quantity = $data['alert_quantity']?$data['alert_quantity']:null;
        $producto->category_id = $data['category_id']?$data['category_id']:null;
        $producto->subcategory_id = $data['subcategory_id']?$data['subcategory_id']:null;
        $producto->cf1 = $data['cf1']?$data['cf1']:null;
        $producto->cf2 = $data['cf2']?$data['cf2']:null;
        $producto->cf3 = $data['cf3']?$data['cf3']:null;
        $producto->cf4 = $data['cf4']?$data['cf4']:null;
        $producto->cf5 = $data['cf5']?$data['cf5']:null;
        $producto->cf6 = $data['cf6']?$data['cf6']:null;
        $producto->quantity = $data['quantity']?$data['quantity']:null;
        $producto->tax_rate = $data['tax_rate']?$data['tax_rate']:null;
        $producto->track_quantity = $data['track_quantity']?$data['track_quantity']:null;
        $producto->details = $data['details']?$data['details']:null;
        $producto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();
    }
}
