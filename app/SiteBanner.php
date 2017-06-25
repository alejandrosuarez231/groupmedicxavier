<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteBanner extends Model
{
    use SoftDeletes;
    
    protected $connection = 'mysqlWebSite';

    protected $table = 'banners';

    protected $guarded = [];

    public $timestamps = false;
}
