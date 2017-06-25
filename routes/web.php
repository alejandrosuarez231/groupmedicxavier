<?php

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

Route::get('login', function () {
	return view('login');
})->name('login');

Route::get('login', 'Auth\LoginController@ingreso');
Route::post('user/login', 'Auth\LoginController@login')->name('log.login');

Route::group(['middleware' => ['auth', 'web']], function () {
	
	Route::get('/', function () {
		Session::flash('title', 'Panel Principal');
		return view('welcome');
	})->name('index');

	Route::get('user/logout', 'Auth\LoginController@logout')->name('log.logout');

	/*-------------- Marcas ---------*/
	Route::resource('marca','MarcasController');

	/*-------------- User Routes --------------*/
	Route::resource('user', 'UserController');
	Route::get('profile', 'UserController@myProfile')->name('user.profile');
	Route::get('usuarios/all', 'UserController@getBasicData')->name('user.all');
	Route::get('usuarios/{id}/password/reset', 'UserController@passwordReset')->name('user.password.reset');
	/*-------------- /User Routes --------------*/
	
	/*-------------- Ventas Routes --------------*/
	Route::resource('clientes', 'VentasClientesController');
	/*-------------- /Ventas Routes --------------*/

	/*-------------- Web Site Routes --------------*/
	
	Route::resource('articulos', 'WebSiteArticleController');

	//Route::get('articulos', 'WebSiteArticleController@articlesIndex')->name('web.articles.index');
	Route::get('articulos/table/{id}', 'WebSiteArticleController@articlesTable')->name('web.articles.table');

	//Route::post('articulos/store', 'WebSiteArticleController@articlesStore')->name('web.articles.store');
	

	//Route::get('articulos/edit/{id}', 'WebSiteArticleController@articlesEdit')->name('web.articles.edit');
	//Route::post('articulos/{id}/update', 'WebSiteArticleController@articlesUpdate')->name('web.articles.update');
	Route::delete('articulos/{id}/delete', 'WebSiteArticleController@articlesDelete')->name('web.articles.delete');
	Route::get('articulos/{id}/restore', 'WebSiteArticleController@articlesRestore')->name('web.articles.restore');
	Route::delete('articulos/{id}/destroy', 'WebSiteArticleController@articlesDestroy')->name('web.articles.destroy');

	Route::post('articulos/categorie/store', 'WebSiteArticleController@articlesCategorieStore')->name('web.articles.categories.store');
	Route::get('articulos/categorie/edit/{id}', 'WebSiteArticleController@articleCategrieEdit')->name('web.categorie.edit');
	Route::post('articulos/categorie/{id}/update', 'WebSiteArticleController@articlesCategorieUpdate')->name('web.categorie.update');
	Route::delete('articulos/categorie/{id}/delete', 'WebSiteArticleController@articleCategorieDestroy')->name('web.articles.categories.delete');

	Route::post('articulos/supplier/store', 'WebSiteArticleController@articleSupplierStore')->name('web.articles.supplier.store');
	Route::get('articulos/supplier/edit/{id}', 'WebSiteArticleController@articleSupplierEdit')->name('web.articles.supplier.edit');
	Route::post('articulos/supplier/{id}/update', 'WebSiteArticleController@articlesSupplierUpdate')->name('web.articles.supplier.update');
	Route::delete('articulos/supplier/{id}/delete', 'WebSiteArticleController@articleSupplierDestroy')->name('web.articles.supplier.delete');
	
	/*-------------- Web img Routes --------------*/
	Route::post('articulos/galeria/store/{id}', 'WebSiteArticleController@articlesGaleryStore')->name('web.articles.galery.store');
	Route::delete('articulos/galeria/destroy/{id}', 'WebSiteArticleController@articlesGaleryDestroy')->name('web.articles.galery.destroy');
	Route::get('articulos/galeria/{id}/changePrimary', 'WebSiteArticleController@articlesGaleryChangePrimary')->name('web.articles.galery.changePrimary');

	Route::get('articulos/categoria/imagen/{id}', 'WebSiteArticleController@articlesCategorieImgIndex')->name('web.categorie.img.index');
	Route::post('articulos/categoria/imagen/store/{id}', 'WebSiteArticleController@articlesCategorieImgStore')->name('web.categorie.img.store');
	Route::delete('articulos/categoria/imagen/destroy/{id}', 'WebSiteArticleController@articlesCategorieImgDestroy')->name('web.categorie.img.destroy');

	Route::get('articulos/proveedor/imagen/{id}', 'WebSiteArticleController@articlesSupplierImgIndex')->name('web.supplier.img.index');
	Route::post('articulos/proveedor/imagen/store/{id}', 'WebSiteArticleController@articlesSupplierImgStore')->name('web.supplier.img.store');
	Route::delete('articulos/proveedor/imagen/destroy/{id}', 'WebSiteArticleController@articlesSupplierImgDestroy')->name('web.supplier.img.destroy');
	/*-------------- /Web img Routes --------------*/

	Route::get('articulos/caracteristicas/{id}', 'WebSiteArticleController@articlesCaracteristicsIndex')->name('web.articles.caracteristics.index');
	Route::post('articulos/caracteristicas/store/{id}', 'WebSiteArticleController@articlesCaracteristicsStore')->name('web.articles.caracteristics.store');
	Route::delete('articulos/caracteristicas/destroy/{id}', 'WebSiteArticleController@articlesCaracteristicsDestroy')->name('web.articles.caracteristics.destroy');
	Route::resource('articles', 'WebSiteArticleController');

	Route::resource('promociones', 'WebSitePromotionsController');
	Route::get('promociones/{id}/delete', 'WebSitePromotionsController@delete')->name('promociones.delete');
	Route::get('promociones/{id}/restore', 'WebSitePromotionsController@restore')->name('promociones.restore');
	Route::resource('banner', 'WebSiteBannerController');
	Route::get('promociones/articulos/{id}', 'WebSitePromotionsController@promotionsItems')->name('promociones.articulos');
	Route::get('promociones/all/data', 'WebSitePromotionsController@allData')->name('promociones.all');
	
	Route::get('siteUsers/convenio/{id}', 'WebSiteUserController@convenio')->name('siteUsers.convenio');
	Route::resource('siteUsers', 'WebSiteUserController');
	Route::get('usuarios/{tabla}/all', 'WebSiteUserController@getBasicData')->name('siteUsers.all');
	/*-------------- /Web Site Routes --------------*/


	Route::get('estadisticas/visitorsAndPageViews/{startDate?}/{endDate?}', 'EstadisticasController@visitorsAndPageViews')->name('estaditicas.visitorsAndPageViews');
	Route::get('estadisticas/totalVisitorsAndPageViews/{startDate?}/{endDate?}', 'EstadisticasController@totalVisitorsAndPageViews')->name('estaditicas.totalVisitorsAndPageViews');
	Route::get('estadisticas/mostVisitedPages/{startDate?}/{endDate?}/{maxResults?}', 'EstadisticasController@mostVisitedPages')->name('estaditicas.mostVisitedPages');
	Route::get('estadisticas/topReferrers/{startDate?}/{endDate?}/{maxResults?}', 'EstadisticasController@topReferrers')->name('estaditicas.topReferrers');
	Route::get('estadisticas/topBrowsers/{startDate?}/{endDate?}/{maxResults?}', 'EstadisticasController@topBrowsers')->name('estaditicas.topBrowsers');
	Route::get('estadisticas/performQuery/{startDate?}/{endDate?}', 'EstadisticasController@performQuery')->name('estaditicas.performQuery');

});
