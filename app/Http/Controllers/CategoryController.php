<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            $items = Category::all();
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
        $data = $request->only('code','name');
        $categoria = new Category;
        $categoria->code = $data['code'];
        $categoria->name = $data['name'];
        $categoria->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = Category::where('id', $category->id)->get();
        return compact('data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->only('id','code','name');
        $categoria = Category::find($data['id']);
        $categoria->code = $data['code'];
        $categoria->name = $data['name'];
        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Category::find($id);
        $categoria->delete();
    }
}
