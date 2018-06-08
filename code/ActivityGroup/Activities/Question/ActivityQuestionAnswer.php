<?php

class ActivityQuestionAnswer extends DataObject
{

	private static $db = array(
		'Answer' => 'HTMLText',
		'CorrectAnswer' => 'Boolean',
	);

	private static $has_one = array(
		'Question' => 'ActivityQuestion'
	);

	static $plural_name = "Answers";
	static $singular_name = "Answer";

	private static $has_many = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Answer', 'Answer')->setRows(3));

		$fields->addFieldToTab('Root.Main', CheckboxField::create('CorrectAnswer', 'Correct Answer'));

		$fields->removeByName('QuestionID');

		return $fields;
	}
}