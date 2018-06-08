<?php

class ActivityQuestion extends Activity
{

	private static $db = array(
		'Question' => 'HTMLText',
		'Marker' => "enum('box,number,letter','box)",
	);

	private static $has_one = array();

	private static $has_many = array(
		'Answers' => 'ActivityQuestionAnswer'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		/* -- Marker -- */

		$markers = array(
			'box' => 'Box',
			'number' => 'Number',
			'letter' => 'Letter',
		);

		$marker = DropdownField::create('Marker', 'Marker', $markers, $this->Marker)->setEmptyString('( Select Marker )');
		$fields->addFieldToTab('Root.Main', $marker);


		/* -- Question -- */

		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Question', 'Question')->setRows(3));


		return $fields;
	}
}