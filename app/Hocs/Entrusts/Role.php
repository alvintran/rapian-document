<?php

namespace Nht\Hocs\Entrusts;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
   protected $guarded = ['_token', 'perms'];
}
