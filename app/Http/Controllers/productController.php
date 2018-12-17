<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\brand;
use App\p_category;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function select(Request $request)
    {
        $category = p_category::get();
        $brands = brand::get();
        if($request->category==0)
            $products=product::where('name','like','%'.$request->keyword.'%')->get();
        else
            $products=product::where('name','like','%'.$request->keyword.'%')->where('fk_category',$request->category)->get();
        return view('store')->withProducts($products)->withCategory($category)->withBrands($brands);
    }
    public function select2(Request $request)
    {
        //echo($request->brand." ".$request->category." ");exit();
        $category = p_category::get();
        $brands = brand::get();
        $brand_id = "";
        $cat_id = "";
        foreach ($brands as $br)
            if($br->name == $request->brand)
                $brand_id=$br->id;
        foreach ($category as $cr)
            if($cr->category == $request->category)
                $cat_id=$cr->id;
            //var_dump($cat_id." ".$brand_id);exit();
        $products=product::whereBetween('price',[$request->min_price,$request->max_price])->where('fk_category','like','%'.$cat_id.'%')->where('fk_brand','like','%'.$brand_id.'%')->get();
        //var_dump($products);exit();
        return view('store')->withProducts($products)->withCategory($category)->withBrands($brands);
    }
    public function selectC($cat)
    {
        $category = p_category::get();
        $brands = brand::get();
        $cat_id="";
        foreach ($category as $cate)
        {
            if($cate->category == $cat)
                $cat_id=$cate->id;
        }
        $products=product::where('fk_category',$cat_id)->get();
        return view('store')->withProducts($products)->withCategory($category)->withBrands($brands);
    }
    public function selectP($pro)
    {
        $category = p_category::get();
        $brands = brand::get();
        $products = product::where('id',$pro)->get()[0];
        $related = product::where('fk_category',$products->fk_category)->where('fk_brand',$products->fk_brand)->get();
        //var_dump($related);exit();
        return view('product')->withProducts($products)->withRelated($related)->withCategory($category)->withBrands($brands);
    }
    public function cookies(Request $request)
    {

        $numCoockie= (isset($_COOKIE['productID'])) ? sizeof($_COOKIE['productID'])+1 : 1;
        //var_dump($request->productImage);exit();
        setcookie("productID[$numCoockie]",$request->productId,time() + 7*(86400 * 30), "/");
        setcookie("productSize[$numCoockie]",$request->size,time() + 7*(86400 * 30), "/");
        setcookie("productColor[$numCoockie]",$request->color,time() + 7*(86400 * 30), "/");
        setcookie("productNumber[$numCoockie]",$request->quantity,time() + 7*(86400 * 30), "/");
        setcookie("productName[$numCoockie]",$request->productName,time() + 7*(86400 * 30), "/");
        setcookie("productImage[$numCoockie]",$request->productImage,time() + 7*(86400 * 30), "/");
        setcookie("productPrice[$numCoockie]",$request->productPrice,time() + 7*(86400 * 30), "/");
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
