<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteArticlesCaracteristics extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'products_features';

    protected $guarded = [];
}
