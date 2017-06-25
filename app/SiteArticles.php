<?php

namespace Cpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteArticles extends Model
{
    use SoftDeletes;

    protected $connection = 'mysqlWebSite';

    protected $table = 'products';

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function category(){
        return $this->hasOne('Cpanel\SiteCategories', 'id', 'product_categorie_id');
    }

    public function pictures()
    {
    	return $this->hasMany('Cpanel\SiteArticlesPictures', 'product_id');
    }

    public function caracteristics()
    {
    	return $this->hasMany('Cpanel\SiteArticlesCaracteristics', 'product_id');
    }
}
