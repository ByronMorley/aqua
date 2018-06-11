<?php


class ActivityShearTransformation extends Activity {

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		return $fields;
	}
}