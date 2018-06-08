<?php

class SectionActivityGroup extends Section
{

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Activities' => 'Activity'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		/*********************************
		 *      SECTION BUILDER
		 ********************************/

		$sectiondataColumns = new GridFieldDataColumns();
		$sectiondataColumns->setDisplayFields(
			array(
				'ID' => 'ID',
				'Title' => 'Title',
				'ClassName' => 'Class Name'
			)
		);

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
				$sectionmultiClassConfig,
				$sectiondataColumns
			);

		if ($this->ID) {
			$sectionconfig->addComponent(new GridFieldOrderableRows('SortOrder'));
		} else {
			$fields->addFieldToTab('Root.Activities', $saveWarning);
		}

		$sectiongridField = GridField::create('Activities', "Activities", $this->Activities(), $sectionconfig);
		$fields->addFieldToTab("Root.Activities", $sectiongridField);

		return $fields;
	}
}