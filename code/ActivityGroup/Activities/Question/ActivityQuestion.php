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

		/* -- Answer -- */

		$saveWarning = LiteralField::create("Warning", "<p class='cms-warning-label'>Please Save changes to Question before adding Answers</p>");

		$sectionconfig = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponents(
				new GridFieldDeleteAction()
			);

		if ($this->ID) {
			$sectionconfig->addComponents(
				new GridFieldOrderableRows('SortOrder'),
				new GridFieldAddNewButton()
			);
		} else {
			$fields->addFieldToTab('Root.Answers', $saveWarning);
		}

		$sectiongridField = GridField::create('Answers', "Answers", $this->Answers(), $sectionconfig);
		$fields->addFieldToTab("Root.Answers", $sectiongridField);


		return $fields;
	}
}