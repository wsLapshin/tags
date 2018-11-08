@if ($crud->hasAccess('open_tag'))
	<a href="{{ route('tags.tag', ['slug' => $entry->slug]) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> {{ trans('tags::backpack.open_tag') }}</a>
@endif