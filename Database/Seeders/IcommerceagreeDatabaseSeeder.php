<?php

namespace Modules\Icommerceagree\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Icommerce\Entities\ShippingMethod;

class IcommerceagreeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $name = config('asgard.icommerceagree.config.shippingName');
        $result = ShippingMethod::where('name',$name)->first();

        if(!$result){
            $options['init'] = "Modules\Icommerceagree\Http\Controllers\Api\IcommerceAgreeApiController";

            $titleTrans = 'icommerceagree::icommerceagrees.single';
            $descriptionTrans = 'icommerceagree::icommerceagrees.description';

            foreach (['en', 'es'] as $locale) {

                if($locale=='en'){
                    $params = array(
                        'title' => trans($titleTrans),
                        'description' => trans($descriptionTrans),
                        'name' => $name,
                        'status' => 1,
                        'options' => $options
                    );

                    $shippingMethod = ShippingMethod::create($params);
                    
                }else{

                    $title = trans($titleTrans,[],$locale);
                    $description = trans($descriptionTrans,[],$locale);

                    $shippingMethod->translateOrNew($locale)->title = $title;
                    $shippingMethod->translateOrNew($locale)->description = $description;

                    $shippingMethod->save();
                }

            }// Foreach
        }else{
            $this->command->alert("This method has already been installed !!");
        }
        
    }
}
