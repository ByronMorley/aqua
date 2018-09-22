<?php

class ActivityQuestion extends Activity
{

	private static $db = array(
		'Question' => 'HTMLText'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $has_many = array(
		'Answers' => 'ActivityQuestionAnswer'
	);

	private static $summary_fields = array(
		'ID' => 'ID',
		'Question.NoHTML' => 'Question',
		'ClassName' => 'ClassName',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

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

		$uploadField = UploadField::create('Image');
		$uploadField->getValidator()->setAllowedExtensions(array(
			'png', 'gif', 'jpeg', 'jpg'
		));

		$fields->addFieldToTab("Root.Main", $uploadField);

		return $fields;
	}
}