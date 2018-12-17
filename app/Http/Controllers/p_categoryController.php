<?php

namespace App\Http\Controllers;

use App\p_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\brand;

class p_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('p_categories')->select('category','id')->get();
        return $brands;
    }

    public function select()
    {
        $category = DB::table('p_categories')->get();
        $brands = brand::get();
//        var_dump($category);
//        exit();
        return view('store')->withCategory($category)->withBrands($brands);
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
     * @param  \App\p_category  $p_category
     * @return \Illuminate\Http\Response
     */
    public function show(p_category $p_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\p_category  $p_category
     * @return \Illuminate\Http\Response
     */
    public function edit(p_category $p_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\p_category  $p_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, p_category $p_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\p_category  $p_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(p_category $p_category)
    {
        //
    }
}
