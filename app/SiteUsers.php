<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteUsers extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'users';

    protected $guarded = [];
}
