<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;

class SiteNewsletters extends Model
{
    protected $connection = 'mysqlWebSite';

    protected $table = 'newsletters';

    protected $guarded = [];
}
