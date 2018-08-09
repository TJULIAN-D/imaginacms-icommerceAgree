<?php

namespace Modules\Icommerceagree\Repositories\Cache;

use Modules\Icommerceagree\Repositories\ConfigagreeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheConfigagreeDecorator extends BaseCacheDecorator implements ConfigagreeRepository
{
    public function __construct(ConfigagreeRepository $configagree)
    {
        parent::__construct();
        $this->entityName = 'icommerceagree.configagrees';
        $this->repository = $configagree;
    }
}
