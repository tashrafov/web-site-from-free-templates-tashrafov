<?php

namespace App\Http\Controllers;

use App\orders;
use App\product;
use Illuminate\Http\Request;
use App\brand;
use App\p_category;
use App\customer;
use Illuminate\Support\Facades\Hash;
use App\OrderDetails;

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
           // var_dump($request->min_price);exit();
        if(isset($request->category) && !isset($request->brand) && !isset($request->min_price))
        {

            $products=product::where('name','like','%'.$request->keyword.'%')->get();
        }
        else if(isset($request->keyword))
        {

            $products=product::where('name','like','%'.$request->keyword.'%')->where('fk_category',$request->category)->get();
        }
        else
        {

            $products=product::whereBetween('price',[$request->min_price,$request->max_price])->where('fk_category','like','%'.$cat_id.'%')->where('fk_brand','like','%'.$brand_id.'%')->get();
        }
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
    public function placeOrder(Request $request)
    {
        //var_dump($request->email);exit();
        $details="";
        $date = date('Y-m-d');
        if(isset($_COOKIE['productID'])) {
            if ($request->shipping_address  =="on") {
                $details = [
                    'name' => $request->s_first_name,
                    'surname' => $request->s_last_name,
                    'email' => $request->s_email,
                    'address' => $request->s_address,
                    'city' => $request->s_city . ',' . $request->s_country,
                    'zip_code' => $request->s_zip_code,
                    'phone' => $request->s_tel
                ];
            }
            else{
                $details = [
                    'name' => $request->first_name,
                    'surname' => $request->last_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'city' => $request->city . ',' . $request->country,
                    'zip_code' => $request->zip_code,
                    'phone' => $request->tel
                ];
            }
            //var_dump($details);exit();
            if ($request->create_account =="on") {
                $cust_info=(
                    [
                        'name' => $request->first_name,
                        'surname' => $request->last_name,
                        'email' => $request->email,
                        'username' => $request->emial,
                        'address' => $request->address,
                        'city' => $request->country . ',' . $request->city,
                        'zip_code' => $request->zip_code,
                        'phone' => $request->tel,
                        'password' => Hash::make($request->password)
                    ]
                );
                $customer = new customer($cust_info);
                $customer->save();
                $user_id = $customer->id;

                $orders = new orders();

                $orders->fk_user_id = $user_id;
                $orders->fk_order_status_id = '3';
                $orders->order_details = json_encode($details);
                $orders->created_at = $date;
                $orders->updated_at = $date;
                $orders->save();
                $order_id = $orders->id;

                for ($i = 1; $i <= count($_COOKIE['productID']);$i++)
                {
                    //echo $_COOKIE['productID'][$i]."<br/>";
                    $order_detail = new OrderDetails();
                    $order_detail->fk_product_id = $_COOKIE['productID'][$i];
                    $order_detail->fk_order_id = $order_id;
                    $order_detail->fk_order_status_code_id ='1';
                    $order_detail->quantity = $_COOKIE['productNumber'][$i];
                    $order_detail->price = $_COOKIE['productPrice'][$i];
                    $order_detail->created_at = $date;
                    $order_detail->updated_at = $date;
                    $order_detail->save();
                }

        }
        else {
                $user_id = customer::where('email', 'like','%'.trim($request->emial).'%')->get()[0];
                //var_dump($user_id->id);exit();
                $orders = new orders();

                    $orders->fk_user_id = $user_id->id;
                    $orders->fk_order_status_id = '3';
                    $orders->order_details = json_encode($details);
                    $orders->created_at = $date;
                    $orders->updated_at = $date;
                    $orders->save();

                $order_id = $orders->id;
                for ($i = 1; $i <= count($_COOKIE['productID']);$i++)
                {
                    //echo $_COOKIE['productID'][$i]."<br/>";
                    $order_detail = new OrderDetails();
                    $order_detail->fk_product_id = $_COOKIE['productID'][$i];
                    $order_detail->fk_order_id = $order_id;
                    $order_detail->fk_order_status_code_id ='1';
                    $order_detail->quantity = $_COOKIE['productNumber'][$i];
                    $order_detail->price = $_COOKIE['productPrice'][$i];
                    $order_detail->created_at = $date;
                    $order_detail->updated_at = $date;
                    $order_detail->save();
                }

        }

            return $this->indexx();
        }
        else{
            return redirect()->back();
        }

    }
    public function indexx()
    {
        $category = p_category::get();
        $products = product::orderBy('created_at','desc')->take(10)->get();
        $productsSmt = product::where('fk_category','5')->orderBy('created_at','desc')->take(9)->get();
        $productsLap = product::where('fk_category','3')->orderBy('created_at','desc')->take(9)->get();
        $productsAcc = product::where('fk_category','2')->orderBy('created_at','desc')->take(9)->get();
        return view('index')->withProducts($products)->withCategory($category)->withProductsSmt($productsSmt)->withProductsLap($productsLap)->withProductsAcc($productsAcc);
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
