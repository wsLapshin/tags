<?php

/*
 |--------------------------------------------------------------------------
 | Tjventurini\Tags Configuration
 |--------------------------------------------------------------------------
 |
 | In this file you will find all configuration values of this package.
 |
 */

return [

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

];