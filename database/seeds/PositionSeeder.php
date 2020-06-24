<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productFlats = \Webkul\Product\Models\ProductFlat::whereLocale('hy')->get(['position', 'product_id'])->toArray();
		foreach($productFlats as $flat){
			$finded = \Webkul\Product\Models\ProductAttributeValue::where('product_id', $flat['product_id'])->where('attribute_id', '28')->count();
				if(!$finded){
					$data['text_value'] = $flat['position'];
					$data['product_id'] = $flat['product_id'];
					$data['attribute_id'] = 28;
					dump('product_id ' . $flat['product_id'] . 'Created Successfully');
					\Webkul\Product\Models\ProductAttributeValue::create($data);
				}
		}    
	}

}
