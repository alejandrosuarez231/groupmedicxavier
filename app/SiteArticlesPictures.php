<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteArticlesPictures extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'products_pictures';

    protected $guarded = [];
}
