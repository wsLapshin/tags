# Laravel Backpack Tags Package

This package provides tags functionality for my blog <a href="https://laravel.com">laravel</a> based blog.. It requires  <a href="https://backpackforlaravel.com" target="_blank">Backpack for Laravel</a> so you will need to install it.

# Installation

For now the package does not use tags, but the branch `master` will be stable for sure.

```
composer require tjventurini/tags "dev-master"
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

# Configuration

## Routes

This package provides three routes by default.

+ `admin/tag`
+ `tags`
+ `tags/{slug}`

## Views

You can overwrite the package views or you can define your own and change the views that are used in the given routes.

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