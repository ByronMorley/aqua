<?php

class Pair extends DataObject
{

	private static $db = array();

	private static $has_one = array(
		'ActivityPair' => 'ActivityPairs',
		'Left' => 'Singular',
		'Right' => 'Singular',
	);

	private static $has_many = array();

	private static $summary_fields = array(
		'Left.Text'=>'Left side',
		'Right.Text'=>'Right side',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$left = DropdownField::create('LeftID', 'Left', Singular::get()->filter('Side', 'left')->map('ID', 'Text'))->setEmptyString('(Select Left Item)');
		$right = DropdownField::create('RightID', 'Right', Singular::get()->filter('Side', 'right')->map('ID', 'Text'))->setEmptyString('(Select Right Item)');

		$fields->addFieldsToTab('Root.Pairs', array($left, $right));

		return $fields;
	}

	public function onAfterWrite(){

		$this->writePairID($this->Left()->ID);
		$this->writePairID($this->Right()->ID);
	}

	public function writePairID($id){
		$singular = Singular::get()->filter('ID', $id)->first();
		$singular->PairID = $this->ID;
		try {
			$singular->write();
		} catch (ValidationException $e) {
		}

	}
}