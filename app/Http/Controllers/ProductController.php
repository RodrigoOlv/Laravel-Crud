<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $products->toJson();
    }

    public function indexView()
    {
        $products = Product::all();

        return view('products', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('create-product', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Product();

        $prod->name = $request->name;
        $prod->stock = $request->stock;
        $prod->price = $request->price;
        $prod->category_id = $request->category_id;

        $prod->save();

        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Product::find($id);

        if ( isset($prod) )
            
            return json_encode($prod);

        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::find($id);
        $categories = Category::all();

        if ( isset($prod) )

            return view('edit-product', compact(['prod', 'categories']));

        return redirect()->route('product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Product::find($id);

        if ( isset($prod) ) {

            $prod->name = $request->name;
            $prod->stock = $request->stock;
            $prod->price = $request->price;
            $prod->category_id = $request->category_id;

            $prod->save();

            return json_encode($prod);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);

        if ( isset($prod) ) {

            $prod->delete();

            return response('OK', 200);
        }

        return response('Produto não encontrado', 404);
    }
}
