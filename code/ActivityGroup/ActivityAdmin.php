<?php

class ActivityAdmin extends ModelAdmin {

	private static $menu_title = 'Activities';

	private static $url_segment = 'activities';

	private static $managed_models = array (
		'ActivityGroup'
	);

}