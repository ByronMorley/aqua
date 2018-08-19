<?php

class ActivityGroupExtension extends DataExtension
{

	private static $db = array(
		'Modal' => 'Boolean',
		'KeepScore' => 'boolean',
		'ScoreMultiplier' => 'Int',
		'ShowActivityCount' => 'boolean',
		'ShowNavButtons' => 'boolean',
		'ShowFinalScreen' => 'boolean',
		'ShowIntroductionScreen' => 'boolean',
	);

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

	public function forTemplate()
	{
		return ($this->owner->Modal) ? $this->owner->renderWith('Activity/ActivityGroupModal') : $this->owner->renderWith('Activity/ActivityGroup');
	}

	public function contentControllerInit()
	{
		Requirements::css('components/font-awesome/css/font-awesome.min.css');
		Requirements::css(AQUA_DIR . '/css/style.css');;
		Requirements::javascript(AQUA_DIR . '/js/main.min.js');
		Requirements::javascript(AQUA_DIR . '/app/dist/bundle.js');

	}

	public function populateDefaults()
	{

		$this->owner->Modal = false;
		$this->owner->KeepScore = true;
		$this->owner->ScoreMultiplier = 1;
		$this->owner->ShowActivityCount = true;
		$this->owner->ShowNavButtons = true;
		$this->owner->ShowFinalScreen = true;
		$this->owner->ShowIntroductionScreen = false;

		parent::populateDefaults();
	}

	public function dataOptions()
	{

		$defaults = array(
			'keepScore' => $this->owner->KeepScore,
			'scoreMultiplier' => $this->owner->ScoreMultiplier,
			'showActivityCount' => $this->owner->ShowActivityCount,
			'showNavButtons' => $this->owner->ShowNavButtons,
			'showFinalScreen' => $this->owner->ShowFinalScreen,
			'showIntroductionScreen' => $this->owner->ShowIntroductionScreen,
		);

		return $this->arrayToJson($defaults);

	}

	public function arrayToJson($arr)
	{
		$json = "'{";
		$pos = 0;

		foreach ($arr as $key => $value) {

			$json .= '"' . $key . '":' . $value;
			$json .= ($pos < count($arr) - 1) ? "," : "}'";
			$pos++;
		}
		return $json;
	}

	public function updateCMSFields(FieldList $fields)
	{

		/*********************************
		 *        CONFIG
		 ********************************/

		$fields->addFieldsToTab('Root.Config', array(
				CheckboxField::create('Modal'),
				CheckboxField::create('KeepScore'),
				NumericField::create('ScoreMultiplier', 'Score Multiplier')->setValue($this->owner->ScoreMultiplier),
				CheckboxField::create('ShowActivityCount'),
				CheckboxField::create('ShowNavButtons'),
				CheckboxField::create('ShowFinalScreen'),
				CheckboxField::create('ShowIntroductionScreen'),
			)
		);

		/*********************************
		 *      ACTIVITY BUILDER
		 ********************************/

		$sectionmultiClassConfig = new GridFieldAddNewMultiClass();
		$sectionmultiClassConfig->setClasses(
			array(
				'ActivityQuestion' => ActivityQuestion::get_activity_type(),
				'ActivityOrderList' => ActivityOrderList::get_activity_type(),
				'ActivityPairs' => ActivityPairs::get_activity_type(),
				'ActivityWordSearch' => ActivityWordSearch::get_activity_type(),
				'ActivityShearTransformation' => ActivityShearTransformation::get_activity_type(),
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