<?php

class ActivityWordSearch extends Activity
{
	private static $db = array(
		'Question' => 'HTMLText'
	);

	private static $has_one = array();

	private static $has_many = array(
		'Words' => 'WordSearchWords'
	);

	private static $summary_fields = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		/* -- Question -- */

		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Question', 'Question')->setRows(3));

		return $fields;
	}
}