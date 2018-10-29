<?php

class ActivityOrderList extends Activity
{
	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Items' => 'ActivityOrderListItem'
	);

	private static $summary_fields = array(
		'ID' => 'ID',
		'Question.NoHTML' => 'Question',
		'ClassName' => 'ClassName',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		/*********************************
		 *      List Items
		 ********************************/

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
			$fields->addFieldToTab('Root.Items', $saveWarning);
		}


		$sectiongridField = GridField::create('Items', "Items", $this->Items(), $sectionconfig);
		$fields->addFieldToTab("Root.Items", $sectiongridField);

		return $fields;
	}

	public function randomisedList()
	{
		$orderedList = $this->Items()->sort('sortOrder', 'ASC');
		$newList = array();

		foreach ($orderedList as $index => $item) {
			$item->SortOrder = $index + 1;
			$newList[] = $item;
		}
		shuffle($newList);

		return new ArrayList($newList);
	}
}