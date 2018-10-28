<?php

namespace Tjventurini\Tags\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tjventurini\Tags\App\Models\Tag;

class TagController extends Controller
{
	/**
	 * Method to show all available tags
	 * @param  Request $request The incomming request
	 * @return View           The view that shows all tags
	 */
    public function index(Request $request)
    {
    	// load the tags
    	$tags = Tag::orderBy('name', 'asc')->paginate(15);

    	// return view
    	return view(config('vendor.tjventurini.tags.view_tags'))
    		->with('tags', $tags);
    }

    /**
     * Method to show single tag
     * @param  Request $request The incomming request
     * @return View 		The view to show tag
     */
    public function tag(Request $request, $slug)
    {
    	// load the tag
    	$tag = Tag::findBySlugOrFail($slug);

    	// return view
    	return view(config('vendor.tjventurini.tags.view_tag'))
    		->with('tag', $tag);
    }

}
