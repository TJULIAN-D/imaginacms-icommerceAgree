<?php

namespace Modules\IcommerceAgree\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\IcommerceAgree\Entities\Configagree;
use Modules\IcommerceAgree\Http\Requests\CreateConfigagreeRequest;
use Modules\IcommerceAgree\Http\Requests\UpdateConfigagreeRequest;
use Modules\IcommerceAgree\Repositories\ConfigagreeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Setting\Repositories\SettingRepository;
class ConfigagreeController extends AdminBaseController
{
    /**
     * @var ConfigagreeRepository
     */
    private $configagree;
    private $setting;
    public function __construct(ConfigagreeRepository $configagree,SettingRepository $setting)
    {
        parent::__construct();
        $this->configagree = $configagree;
        $this->setting=$setting;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateConfigagreeRequest $request
     * @return Response
     */
    public function store(CreateConfigagreeRequest $request)
    {
        $this->configagree->create($request->all());

        return redirect()->route('admin.icommerce.shipping.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icommerceagree::configagrees.title.configagrees')]));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Configagree $configagree
     * @param  UpdateConfigagreeRequest $request
     * @return Response
     */
    public function update(Configagree $configagree, UpdateConfigagreeRequest $request)
    {

        //if(!isset($request->status))
        //   $request->merge(['status' => 0]);
        if($request->status=='on')
            $request['status'] = "1";
        else
            $request['status'] = "0";
        $data = $request->all();
        $token =$data['_token'];
        unset($data['_token']);
        unset($data['_method']);
        $newData['_token']=$token;
        foreach ($data as $key => $val)
            $newData['icommerceagree::'.$key ]= $val;
        $this->setting->createOrUpdate($newData);

        return redirect()->route('admin.icommerce.shipping.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icommerceagree::configagrees.title.configagrees')]));
    }


}
