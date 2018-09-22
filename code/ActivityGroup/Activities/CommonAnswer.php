<?php

class CommonAnswer extends DataObject
{
	private static $db = array(
		'Title' => 'varchar',
		'Answer' => 'HtmlText'
	);

	private static $has_one = array();

	private static $has_many = array(
		'Answers' => 'ActivityQuestionAnswer'
	);

	private static $summary_fields = array(
		'ID' => 'ID',
		'Answer.NoHTML' => 'Answer'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('Answers');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Answer', 'Answer')->setRows(3));

		return $fields;
	}
}