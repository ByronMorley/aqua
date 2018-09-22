<?php

class ActivityAnagram extends Activity
{
	private static $db = array(
		'QuestionSetup' => 'HTMLText',
		'Anagram' => 'Text'
	);

	private static $has_one = array();

	private static $has_many = array();

	private static $summary_fields = array(
		'ID' => 'ID',
		'Anagram' => 'Anagram',
		'ClassName' => 'ClassName',
	);

	public function AnagramMixed()
	{
		$words = explode(" ", trim($this->Anagram));
		$mixedWords = array();

		foreach ($words as $index => $word) {
			$mixedWords[] = $this->shuffleWord($word);
		}
		$anagram = implode(" ", $mixedWords);

		return $anagram;
	}

	public function shuffleWord($word){
		$string = null;
		do {
			$string = str_shuffle($word);
		} while ($string == $word);

		return $string;
	}

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('QuestionSetup', 'Question Setup')->setRows(3));
		$fields->addFieldToTab('Root.Main', TextField::create('Anagram'));

		return $fields;
	}

	public function populateDefaults()
	{
		$this->QuestionSetup = "<p>Re-arrange the letters to create a word, input your answer below and press confirm.</p>";
		parent::populateDefaults();
	}
}