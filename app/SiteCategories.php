<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteCategories extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'product_categories';

    protected $guarded = [];
}
