<?php

class HighlightingWords extends DataObject
{
	private static $db = array(
		'Word' => 'varchar(30)'
	);

	private static $has_one = array(
		'Highlighting' => 'ActivityHighlighting'
	);

	private static $has_many = array();

	private static $summary_fields = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}