<?php

class ActivityWordSearch extends Activity
{
	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Words' => 'WordSearchWords'
	);

	private static $summary_fields = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}