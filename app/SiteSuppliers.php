<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteSuppliers extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'product_makers';

    protected $guarded = [];
}
