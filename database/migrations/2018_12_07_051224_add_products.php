<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\product;

class AddProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date=date('Y-m-d h-i-s');
        product::insert(
            array(
                array(
                    'name'=>'Iphone 5',
                    'price'=>'800',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 5',
                    'price'=>'800',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 5S',
                    'price'=>'1000',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 5S',
                    'price'=>'1000',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6',
                    'price'=>'1200',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6',
                    'price'=>'1200',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6S',
                    'price'=>'1400',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6S',
                    'price'=>'1400',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6S+',
                    'price'=>'1500',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone 6S+',
                    'price'=>'1500',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone X',
                    'price'=>'1800',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Iphone X',
                    'price'=>'1800',
                    'fk_brand'=>'4',
                    'quantity'=>'30',
                    'fk_size'=>'10',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'2',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Asus',
                    'price'=>'2000',
                    'fk_brand'=>'5',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Asus',
                    'price'=>'2000',
                    'fk_brand'=>'5',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'2',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Asus',
                    'price'=>'2000',
                    'fk_brand'=>'5',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'3',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Asus',
                    'price'=>'2000',
                    'fk_brand'=>'5',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'4',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Asus',
                    'price'=>'2000',
                    'fk_brand'=>'5',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'5',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Lenovo B590',
                    'price'=>'2000',
                    'fk_brand'=>'7',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'1',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Lenovo B590',
                    'price'=>'2000',
                    'fk_brand'=>'7',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'2',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Lenovo B590',
                    'price'=>'2000',
                    'fk_brand'=>'7',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'3',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                ),
                array(
                    'name'=>'Lenovo B590',
                    'price'=>'2000',
                    'fk_brand'=>'7',
                    'quantity'=>'30',
                    'fk_size'=>'12',
                    'fk_color'=>'4',
                    'avatar'=>'',
                    'in_stock'=>'1',
                    'fk_category'=>'1',
                    'description'=>'test Description',
                    'details'=>'test details',
                    'created_at'=>$date,
                    'updated_at'=>$date
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
