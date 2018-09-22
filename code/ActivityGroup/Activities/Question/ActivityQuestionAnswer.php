<?php

class ActivityQuestionAnswer extends DataObject
{

	private static $db = array(
		'SortOrder' => 'Int',
		'CustomText' => 'Boolean',
		'Answer' => 'HTMLText',
		'CorrectAnswer' => 'Boolean',
	);

	private static $has_one = array(
		'Question' => 'ActivityQuestion',
		'CommonAnswer' => 'CommonAnswer',
	);

	static $plural_name = "Answers";
	static $singular_name = "Answer";

	private static $summary_fields = array(
		'ID' => 'ID',
		'Answer.NoHTML' => 'Answer',
		'CommonAnswer.Title' => 'Title',
		'CorrectAnswer.Nice' => 'Correct Answer',
		'ClassName' => 'ClassName',
	);

	public function AnswerText()
	{
		if ($this->CustomText) {
			return $this->Answer;
		} else {
			return $this->CommonAnswer()->Answer;
		}
	}

	private static $has_many = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$useCustomText = CheckboxField::create('CustomText', 'Use Custom Text');
		$customText = HtmlEditorField::create('Answer', 'Answer')->setRows(3);
		$commonAnswer = DropdownField::create('CommonAnswerID', 'Answer', CommonAnswer::get()->map('ID', 'Title')->toArray())->setEmptyString('( None )');
		$correctAnswer = CheckboxField::create('CorrectAnswer', 'Correct Answer');

		$customText->displayIf('CustomText')->isChecked();
		$commonAnswer->displayIf('CustomText')->isNotChecked();

		$fields->addFieldsToTab('Root.Main', array(
				$useCustomText,
				$customText,
				$commonAnswer,
				$correctAnswer
			)
		);

		$fields->removeByName('QuestionID');
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');

		return $fields;
	}
}