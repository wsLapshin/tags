# Laravel Backpack Tags Package

This package provides tagging functionality for my <a href="https://laravel.com">laravel</a> based blog. It requires  <a href="https://backpackforlaravel.com" target="_blank">Backpack for Laravel</a> so you will need to install it.

+ <a href="https://backpackforlaravel.com/docs/3.4/installation" target="_blank">Installation of Backpack</a>

# Installation

This package is available through <a href="https://packagist.org/packages/tjventurini/tags" target="_blank">packagist</a>. Install it with the following command.

```
composer require tjventurini/tags
```

## Migrations

You will need to run the migrations for the tags table.

```
php artisan migrate
```

## Config

You will need to publish the package configuraton.

```
php artisan vendor:publish --provider="Tjventurini\Tags\TagsServiceProvider" --tag=config
```

## Views (optional)

The views are available through `tags::view-name` even though you don't publish them.

```
php artisan vendor:publish --provider="Tjventurini\Tags\TagsServiceProvider" --tag=views
```

## Translations (optional)

The translations are available through `tags::tags.key` even though you don't publish them.

```
php artisan vendor:publish --provider="Tjventurini\Tags\TagsServiceProvider" --tag=lang
```

## Seeding (optional)

The package provides seeding for the tags table.

```
artisan db:seed --class="Tjventurini\Tags\Database\Seeds\TagsSeeder"
```

## Backpack

By now you should be ready to update the backpack admin panel. Open `resources/views/vendor/backpack/base/inc/sidebar_content.blade.php` and add the following line.

```
<li><a href="{{ backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>{{ trans('tags::tags.menu_item') }}</span></a></li>
```

The last thing to do is to publish the buttons needed for the backpack crud.

```
php artisan vendor:publish --provider="Tjventurini\Tags\TagsServiceProvider" --tag=backpack
```

![Backpack Admin Panel](https://thomasventurini.com/storage/Bildschirmfoto%20von%20»2018-11-08%2019-27-52«.png)

# Configuration

## Routes

```
/*
 |--------------------------------------------------------------------------
 | Tjventurini\Tags Routes
 |--------------------------------------------------------------------------
 |
 | In this file you will find all routes needed for this package to work in
 | in the backpack backend as well as the frontend.
 |
 */

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'Tjventurini\Tags\App\Http\Controllers\Admin',
], function () {

    CRUD::resource('tag', 'TagCrudController');

});

Route::group([
    'prefix'     => 'tags',
    'middleware' => ['web'],
    'namespace'  => 'Tjventurini\Tags\App\Http\Controllers',
], function () {

    // show tags
    Route::get('/', 'TagController@index')->name('tags');

    // show single tags
    Route::get('/{slug}', 'TagController@tag')->name('tags.tag');

});
```

## Route Prefix

```
/*
 |--------------------------------------------------------------------------
 | Route Prefix
 |--------------------------------------------------------------------------
 |
 | In this section you can define the route prefix of this package.
 |
 */

'route_prefix' => 'tags',
```

## Views

```
/*
 |--------------------------------------------------------------------------
 | Views
 |--------------------------------------------------------------------------
 |
 | In this section you can define the views to show when the routes are 
 | called.
 |
 */

// view to show all articles
'view_tags' => 'tags::all',

// view to show single article
'view_tag' => 'tags::tag',
```

## Relationships

```
/*
 |--------------------------------------------------------------------------
 | Relationships
 |--------------------------------------------------------------------------
 |
 | In this section you can define other implementations of tags that extend
 | the tags model of this package. This way we can list the relationships
 | of tags in tag view.
 |
 */

'relationships' => [

    // 'articles' => Tjventurini\Articles\App\Models\Tag::class,

],
```

## Validation

```
/*
 |--------------------------------------------------------------------------
 | Validation
 |--------------------------------------------------------------------------
 |
 | In this section you can change the validation rules of the tags request.
 |
 */

'rules' => [
    'name' => 'required|min:2|max:50',
    'slug' => 'unique:tags,slug',
    'image' => 'required|string',
    'description' => 'required|min:50|max:255',
],
```

# Extending the Tag Model

If you need to add more functionality to the tags model, then you can simply extend the model for your own package. Here is an example implementation from the [tjventurini/articles](https//github.com/tjventurini/articles) package.

```
<?php

namespace Tjventurini\Articles\App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Tag extends \Tjventurini\Tags\App\Models\Tag
{

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function articles()
    {
        return $this->belongsToMany('Tjventurini\Articles\App\Models\Article');
    }
}
```