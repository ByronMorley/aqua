<?php

class ActivityHighlighting extends Activity
{
	private static $db = array(
		'Introduction' => 'HTMLText',
		'TextExtract' => 'HTMLText',
	);

	private static $has_one = array();

	private static $has_many = array(
		'Words' => 'HighlightingWords'
	);

	private static $summary_fields = array(
		'ID' => 'ID',
		'ClassName' => 'ClassName',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Introduction', 'Introduction')->setRows(3));

		$saveWarning = LiteralField::create("Warning", "<p class='cms-warning-label'>Please Save before adding words and phrases</p>");

		$sectionconfig = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponents(
				new GridFieldDeleteAction()
			);

		if ($this->ID) {
			$sectionconfig->addComponents(
				new GridFieldAddNewButton()
			);
		} else {
			$fields->addFieldToTab('Root.Words', $saveWarning);
		}

		$sectiongridField = GridField::create('Words', "Words", $this->Words(), $sectionconfig);
		$fields->addFieldToTab("Root.Words", $sectiongridField);

		return $fields;
	}

	public function wordList()
	{
		$arr = array();
		foreach ($this->Words() as $index => $word) {
			$arr[] = strtolower($word->Word);
		}
		return json_encode($arr);
	}
}