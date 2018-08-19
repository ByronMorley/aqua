<?php

class WordSearchWords extends DataObject
{
	private static $db = array(
		'Word' => 'varchar(12)'
	);

	private static $has_one = array('WordSearch' => 'ActivityWordSearch');

	private static $has_many = array();

	private static $summary_fields = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}