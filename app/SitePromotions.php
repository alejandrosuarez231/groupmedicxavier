<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SitePromotions extends Model
{
    use SoftDeletes;
    
    protected $connection = 'mysqlWebSite';

    protected $table = 'promotions';

    protected $guarded = [];

    public $timestamps = false;

    public function banner()
    {
    	return $this->hasOne('Cpanel\SiteBanner', 'promotion_id');
    }
}
