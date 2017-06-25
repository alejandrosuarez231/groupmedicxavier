<?php

// Inicio
Breadcrumbs::register('index', function ($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('index'));
});

/*------------ Users BreadCrumbs ------------*/
// Home > Usuarios
Breadcrumbs::register('user.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Usuarios', route('user.index'));
});

/*------------ Marcas BreadCrumbs ------------*/
// Home > Marcas
Breadcrumbs::register('marca.index', function($breadcrumbs, $marca)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Marcas', route('marca.index'));
});

// Home > Usuarios > Crear
Breadcrumbs::register('user.create', function($breadcrumbs)
{
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Crear usuario', route('user.create'));
});

// Home > Usuarios > Editar
Breadcrumbs::register('usersEdit', function($breadcrumbs, $user) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push($user->name, route('user.edit', $user->id));
});

// Home > Profile
Breadcrumbs::register('profile', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Mi Perfil', route('user.profile'));
});
/*------------ /Users BreadCrumbs ------------*/


/*------------ Web Site BreadCrumbs ------------*/
// Home > Articles
Breadcrumbs::register('articulos.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Maestro de articulos', route('articulos.index'));
});

Breadcrumbs::register('articlesShow', function($breadcrumbs, $article) {
    $breadcrumbs->parent('articulos.index');
    $breadcrumbs->push( substr($article->description, 0, 15).' ...', route('articulos.show', $article->id));
});

// Home > Articles > Galery
Breadcrumbs::register('galery', function($breadcrumbs)
{
    $breadcrumbs->parent('articulos.index');
    $breadcrumbs->push('Galeria de Imagenes', route('articulos.index'));
});

// Home > Articles > Img Category
Breadcrumbs::register('web.categorie.img.index', function($breadcrumbs, $articulo)
{
    $breadcrumbs->parent('articulos.index');
    $breadcrumbs->push('Imagen', route('web.categorie.img.index', $articulo));
});

// Home > Articles > Img Supplier
Breadcrumbs::register('supplierImg', function($breadcrumbs)
{
    $breadcrumbs->parent('articulos.index');
    $breadcrumbs->push('Imagen', route('articulos.index'));
});

// Home > Articles > Caracteristics
Breadcrumbs::register('caracteristics', function($breadcrumbs)
{
    $breadcrumbs->parent('articulos.index');
    $breadcrumbs->push('Caracteristicas', route('articulos.index'));
});

Breadcrumbs::register('promotions', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Promociones', route('promociones.index'));
});

Breadcrumbs::register('promotionsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('promotions');
    $breadcrumbs->push('Crear Promoción', route('promociones.create'));
});

Breadcrumbs::register('promotionsEdit', function($breadcrumbs, $promocion) {
    $breadcrumbs->parent('promotions');
    $breadcrumbs->push($promocion->title, route('promociones.edit', $promocion->id));
});
/*------------ /Web Site BreadCrumbs ------------*/

/*------------ Clientes BreadCrumbs ------------*/
Breadcrumbs::register('SiteUsers', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Clientes', route('siteUsers.index'));
});


/*------------ /Clientes BreadCrumbs ------------*/

Breadcrumbs::register('clientes.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Clientes de la empresa', route('clientes.index'));
});