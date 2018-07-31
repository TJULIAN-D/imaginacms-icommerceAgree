<?php

namespace Modules\IcommerceAgree\Entities;

class Configagree
{
    private $status;
    private $options;
    public function __construct()
    {
        $this->status = setting('icommerceAgree::status');
        $this->options = setting('icommerceAgree::options');
    }

    public function getData()
    {
        return (object) [
            'status' => $this->status,
            'options' => $this->options
        ];
    }

}