<?php

class Singular extends DataObject
{

	private static $db = array(
		"Text" => "VarChar",
		"Side" => "enum('left,right')",
	);

	private static $has_one = array(
		'ActivityPair' => 'ActivityPairs',
		'Pair'=>'Pair',
	);

	private static $summary_fields = array(
		'Text'=>'Text',
		'Side'=>'Side',
	);

	private static $has_many = array();


	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName('PairID');
		$fields->removeByName('ActivityPairID');

		return $fields;
	}
}