<?php

namespace Nht\Hocs\Entrusts;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
   protected $guarded = ['_token'];
}
