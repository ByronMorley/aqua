<?php

class ActivityOrderListItem extends DataObject
{
	private static $db = array(
		'Text' => 'Varchar',
		'SortOrder' => 'Int',
	);

	private static $has_one = array(
		'ActivityOrderList' => 'ActivityOrderList'
	);

	private static $has_many = array();

	static $plural_name = "Items";
	static $singular_name = "Item";

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('ActivityOrderListID');
		$fields->removeByName('SortOrder');
		return $fields;
	}
}