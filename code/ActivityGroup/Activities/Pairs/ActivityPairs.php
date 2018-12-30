<?php

class ActivityPairs extends Activity
{

	private static $db = array(
		'Question' => 'HTMLText'
	);

	private static $has_one = array();

	private static $has_many = array(
		'Pairs' => 'Pair',
		'Singles' => 'Singular',
	);

	public function leftSide()
	{
		return Singular::get()->filter(array('Side' => 'left', 'ActivityPairID' => $this->ID));
	}

	public function rightSide()
	{
		return Singular::get()->filter(array('Side' => 'right', 'ActivityPairID' => $this->ID));
	}

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}