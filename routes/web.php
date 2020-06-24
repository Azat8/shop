<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::get('/products', 'IndexController@products')->defaults('_config', [ 'view' => 'products' ])->name('products');
//    Route::get('/matrix', 'IndexController@matrix')->defaults('_config', [ 'view' => 'matrix' ])->name('matrix');
});

Route::get('position-attributes', function(){
	$productFlats = \Webkul\Product\Models\ProductFlat::whereLocale('hy')->get(['position', 'product_id'])->toArray();
	foreach($productFlats as $flat){
		$finded = \Webkul\Product\Models\ProductAttributeValue::where('product_id', $flat['product_id'])->where('attribute_id', '28')->count();
		if(!$finded){
			$data['text_value'] = $flat['position'];
			$data['product_id'] = $flat['product_id'];
			$data['attribute_id'] = $flat['attribute_id'];
			\Webkul\Product\Models\ProductAttributeValue::create($data);
		}
	}
});