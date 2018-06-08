<?php

class ActivityOrderList extends Activity
{
	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Items' => 'ActivityOrderListItem'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		/*********************************
		 *      List Items
		 ********************************/

		$sectiondataColumns = new GridFieldDataColumns();
		$sectiondataColumns->setDisplayFields(
			array(
				'ID' => 'ID',
				'Text' => 'Text',
				'ClassName' => 'Class Name'
			)
		);

		$saveWarning = LiteralField::create("Warning", "<p class='cms-warning-label'>To Add Content please save changes</p>");

		$sectionconfig = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponents(
				new GridFieldDeleteAction(),
				$sectiondataColumns
			);

		if ($this->ID) {
			$sectionconfig->addComponent(new GridFieldOrderableRows('SortOrder'));
		} else {
			$fields->addFieldToTab('Root.Items', $saveWarning);
		}

		$sectiongridField = GridField::create('Items', "Items", $this->Items(), $sectionconfig);
		$fields->addFieldToTab("Root.Items", $sectiongridField);

		return $fields;
	}

	public function randomisedList(){

		return $this->Items()->sort('RAND()');
	}

}