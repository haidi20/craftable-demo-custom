<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/posts',                                  'Admin\PostsController@index');
    Route::get('/admin/posts/create',                           'Admin\PostsController@create');
    Route::post('/admin/posts',                                 'Admin\PostsController@store');
    Route::get('/admin/posts/{post}/edit',                      'Admin\PostsController@edit')->name('admin/posts/edit');
    Route::post('/admin/posts/{post}',                          'Admin\PostsController@update')->name('admin/posts/update');
    Route::delete('/admin/posts/{post}',                        'Admin\PostsController@destroy')->name('admin/posts/destroy');

    Route::get('/admin/sort/posts', 'Admin\PostsController@sortIndex')->name('admin/posts/sort');
    Route::post('/admin/update-order/posts', 'Admin\PostsController@sortUpdate')->name('admin/posts/sort/update');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/translatable-articles',                  'Admin\TranslatableArticlesController@index');
    Route::get('/admin/translatable-articles/create',           'Admin\TranslatableArticlesController@create');
    Route::post('/admin/translatable-articles',                 'Admin\TranslatableArticlesController@store');
    Route::get('/admin/translatable-articles/{translatableArticle}/edit','Admin\TranslatableArticlesController@edit')->name('admin/translatable-articles/edit');
    Route::post('/admin/translatable-articles/{translatableArticle}','Admin\TranslatableArticlesController@update')->name('admin/translatable-articles/update');
    Route::delete('/admin/translatable-articles/{translatableArticle}','Admin\TranslatableArticlesController@destroy')->name('admin/translatable-articles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/articles',                               'Admin\ArticlesController@index');
    Route::get('/admin/articles/create',                        'Admin\ArticlesController@create');
    Route::post('/admin/articles',                              'Admin\ArticlesController@store');
    Route::get('/admin/articles/{article}/edit',                'Admin\ArticlesController@edit')->name('admin/articles/edit');
    Route::post('/admin/articles/{article}',                    'Admin\ArticlesController@update')->name('admin/articles/update');
    Route::delete('/admin/articles/{article}',                  'Admin\ArticlesController@destroy')->name('admin/articles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/exports',                                'Admin\ExportsController@index');
    Route::get('/admin/exports/create',                         'Admin\ExportsController@create');
    Route::post('/admin/exports',                               'Admin\ExportsController@store');
    Route::get('/admin/exports/{export}/edit',                  'Admin\ExportsController@edit')->name('admin/exports/edit');
    Route::post('/admin/exports/{export}',                      'Admin\ExportsController@update')->name('admin/exports/update');
    Route::delete('/admin/exports/{export}',                    'Admin\ExportsController@destroy')->name('admin/exports/destroy');
    Route::get('/admin/exports/export',                         'Admin\ExportsController@export')->name('admin/exports/export');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/articles-with-relationships',            'Admin\ArticlesWithRelationshipController@index');
    Route::get('/admin/articles-with-relationships/create',     'Admin\ArticlesWithRelationshipController@create');
    Route::post('/admin/articles-with-relationships',           'Admin\ArticlesWithRelationshipController@store');
    Route::get('/admin/articles-with-relationships/{articlesWithRelationship}/edit','Admin\ArticlesWithRelationshipController@edit')->name('admin/articles-with-relationships/edit');
    Route::post('/admin/articles-with-relationships/{articlesWithRelationship}','Admin\ArticlesWithRelationshipController@update')->name('admin/articles-with-relationships/update');
    Route::delete('/admin/articles-with-relationships/{articlesWithRelationship}','Admin\ArticlesWithRelationshipController@destroy')->name('admin/articles-with-relationships/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/bulk-actions',                           'Admin\BulkActionsController@index');
    Route::get('/admin/bulk-actions/create',                    'Admin\BulkActionsController@create');
    Route::post('/admin/bulk-actions',                          'Admin\BulkActionsController@store');
    Route::get('/admin/bulk-actions/{bulkAction}/edit',         'Admin\BulkActionsController@edit')->name('admin/bulk-actions/edit');
    Route::post('/admin/bulk-actions/bulk-destroy',             'Admin\BulkActionsController@bulkDestroy')->name('admin/bulk-actions/bulk-destroy');
    Route::post('/admin/bulk-actions/{bulkAction}',             'Admin\BulkActionsController@update')->name('admin/bulk-actions/update');
    Route::delete('/admin/bulk-actions/{bulkAction}',           'Admin\BulkActionsController@destroy')->name('admin/bulk-actions/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/articles',                               'Admin\ArticlesController@index');
    Route::get('/admin/articles/create',                        'Admin\ArticlesController@create');
    Route::post('/admin/articles',                              'Admin\ArticlesController@store');
    Route::get('/admin/articles/{article}/edit',                'Admin\ArticlesController@edit')->name('admin/articles/edit');
    Route::post('/admin/articles/bulk-destroy',                 'Admin\ArticlesController@bulkDestroy')->name('admin/articles/bulk-destroy');
    Route::post('/admin/articles/{article}',                    'Admin\ArticlesController@update')->name('admin/articles/update');
    Route::delete('/admin/articles/{article}',                  'Admin\ArticlesController@destroy')->name('admin/articles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/tags',                                   'Admin\TagsController@index');
    Route::get('/admin/tags/create',                            'Admin\TagsController@create');
    Route::post('/admin/tags',                                  'Admin\TagsController@store');
    Route::get('/admin/tags/{tag}/edit',                        'Admin\TagsController@edit')->name('admin/tags/edit');
    Route::post('/admin/tags/bulk-destroy',                     'Admin\TagsController@bulkDestroy')->name('admin/tags/bulk-destroy');
    Route::post('/admin/tags/{tag}',                            'Admin\TagsController@update')->name('admin/tags/update');
    Route::delete('/admin/tags/{tag}',                          'Admin\TagsController@destroy')->name('admin/tags/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/roles',                                  'Admin\RolesController@index');
    Route::get('/admin/roles/create',                           'Admin\RolesController@create');
    Route::post('/admin/roles',                                 'Admin\RolesController@store');
    Route::get('/admin/roles/{role}/edit',                      'Admin\RolesController@edit')->name('admin/roles/edit');
    Route::post('/admin/roles/bulk-destroy',                    'Admin\RolesController@bulkDestroy')->name('admin/roles/bulk-destroy');
    Route::post('/admin/roles/{role}',                          'Admin\RolesController@update')->name('admin/roles/update');
    Route::delete('/admin/roles/{role}',                        'Admin\RolesController@destroy')->name('admin/roles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::delete('/admin/users/{user}',                        'Admin\UsersController@destroy')->name('admin/users/destroy');
    Route::get('/admin/users/{user}/resend-activation',         'Admin\UsersController@resendActivationEmail')->name('admin/users/resendActivationEmail');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/list-shops',                             'Admin\ListShopController@index');
    Route::get('/admin/list-shops/create',                      'Admin\ListShopController@create');
    Route::post('/admin/list-shops',                            'Admin\ListShopController@store');
    Route::get('/admin/list-shops/{listShop}/edit',             'Admin\ListShopController@edit')->name('admin/list-shops/edit');
    Route::post('/admin/list-shops/bulk-destroy',               'Admin\ListShopController@bulkDestroy')->name('admin/list-shops/bulk-destroy');
    Route::post('/admin/list-shops/{listShop}',                 'Admin\ListShopController@update')->name('admin/list-shops/update');
    Route::delete('/admin/list-shops/{listShop}',               'Admin\ListShopController@destroy')->name('admin/list-shops/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/list-shops',                             'Admin\ListShopController@index');
    Route::get('/admin/list-shops/create',                      'Admin\ListShopController@create');
    Route::post('/admin/list-shops',                            'Admin\ListShopController@store');
    Route::get('/admin/list-shops/{listShop}/edit',             'Admin\ListShopController@edit')->name('admin/list-shops/edit');
    Route::post('/admin/list-shops/bulk-destroy',               'Admin\ListShopController@bulkDestroy')->name('admin/list-shops/bulk-destroy');
    Route::post('/admin/list-shops/{listShop}',                 'Admin\ListShopController@update')->name('admin/list-shops/update');
    Route::delete('/admin/list-shops/{listShop}',               'Admin\ListShopController@destroy')->name('admin/list-shops/destroy');
});