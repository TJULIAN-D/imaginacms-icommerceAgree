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

        $options['init'] = "Modules\Icommerceagree\Http\Controllers\Api\IcommerceAgreeApiController";

        $params = array(
            'title' => trans('icommerceagree::icommerceagrees.single'),
            'description' => trans('icommerceagree::icommerceagrees.description'),
            'name' => config('asgard.icommerceagree.config.shippingName'),
            'status' => 0,
            'options' => $options
        );

        ShippingMethod::create($params);

    }
}
