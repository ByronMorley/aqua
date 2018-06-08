<?php

class ActivityGroupExtension extends DataExtension
{

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Activities' => 'Activity'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}

	public function updateCMSFields(FieldList $fields)
	{

		/*********************************
		 *      SECTION BUILDER
		 ********************************/


		$sectionmultiClassConfig = new GridFieldAddNewMultiClass();
		$sectionmultiClassConfig->setClasses(
			array(
				'ActivityQuestion' => ActivityQuestion::get_activity_type(),
				'ActivityOrderList' => ActivityOrderList::get_activity_type(),
				'ActivityPairs' => ActivityPairs::get_activity_type(),
			)
		);
		$saveWarning = LiteralField::create("Warning", "<p class='cms-warning-label'>To Add Content please save changes</p>");

		$sectionconfig = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponents(
				new GridFieldDeleteAction(),
				$sectionmultiClassConfig
			);

		if ($this->owner->ID) {
			$sectionconfig->addComponent(new GridFieldOrderableRows('SortOrder'));
		} else {
			$fields->addFieldToTab('Root.Activities', $saveWarning);
		}

		$sectiongridField = GridField::create('Activities', "Activities", $this->owner->Activities(), $sectionconfig);
		$fields->addFieldToTab("Root.Activities", $sectiongridField);

		return $fields;
	}
}