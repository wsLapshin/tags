@if ($crud->hasAccess('github_tags'))
	<!-- report issues -->
	<a href="https://github.com/tjventurini/tags/issues" target="_blank" class="btn btn-danger ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-github"></i>&nbsp;{{ trans('tags::backpack.report_issue') }}</span></a>
	<!-- visit documentation -->
	<a href="https://github.com/tjventurini/tags" target="_blank" class="btn btn-info ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-github"></i>&nbsp;{{ trans('tags::backpack.go_to_tags_documentation') }}</span></a>
@endif

