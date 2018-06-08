<?php

class ActivityPairs extends Activity
{

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Pairs' => 'Pair',
		'Singles' => 'Singular',
	);

	public function leftSide (){
		return Singular::get()->filter('Side', 'left');
	}

	public function rightSide(){
		return Singular::get()->filter('Side', 'right');
	}

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}