<?php

class ActivityNumeracyQuestion extends Activity
{
	private static $db = array(
		'QuestionSetup' => 'HTMLText',
		'Question' => 'HTMLText',
		'Answer' => 'Int',
		'isDecimal' => 'Boolean',
		'DecimalAnswer' => 'Decimal'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $has_many = array();

	private static $summary_fields = array(
		'ID' => 'ID',
		'Question.NoHTML' => 'Question',
		'Answer' => 'Answer',
		'ClassName' => 'ClassName',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$intAnswer = NumericField::create('Answer', 'Answer');
		$decimalAnswer = NumericField::create('DecimalAnswer', 'Answer');
		$isDecimal = CheckboxField::create('isDecimal');

		$decimalAnswer->displayIf('isDecimal')->isChecked();
		$intAnswer->displayIf('isDecimal')->isNotChecked();

		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('QuestionSetup', 'Question setup')->setRows(3));
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Question', 'Question')->setRows(3));
		$fields->addFieldToTab('Root.Main', $isDecimal, 'Answer');
		$fields->addFieldsToTab('Root.Main', array(
			$decimalAnswer,
			$intAnswer
		));

		$uploadField = UploadField::create('Image');
		$uploadField->getValidator()->setAllowedExtensions(array(
			'png', 'gif', 'jpeg', 'jpg'
		));

		$fields->addFieldToTab("Root.Main", $uploadField);

		return $fields;
	}

	public function correctAnswer()
	{
		return ($this->isDecimal) ? $this->DecimalAnswer : $this->Answer;
	}
}