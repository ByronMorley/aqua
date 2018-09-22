<?php


class Activity extends DataObject
{

    private static $db = array(
        'SortOrder' => 'Int',

    );

    private static $default_sort = 'SortOrder ASC';

    static $plural_name = "Activities";
    static $singular_name = "Activity";

    private static $summary_fields = array(
        'ID' => 'ID',
        'Title' => 'Title',
        'ClassName' => 'ClassName',
    );

    private static $has_one = array(
        'Group' => 'ActivityGroup'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('Title')->setCustomValidationMessage('This Field is Required'));

        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        $fields->removeFieldFromTab('Root.Main', 'GroupID');

        return $fields;
    }


    public static function get_activity_type()
    {
        return trim(preg_replace('/([A-Z])/', ' $1', str_ireplace('Activity', '', get_called_class())));;
    }


    public function forTemplate()
    {
        $template = str_replace(" ", "", $this->get_activity_type());

        SS_Log::log(serialize($this->get_activity_type()), SS_Log::NOTICE);
        SS_Log::log(serialize(get_called_class()), SS_Log::NOTICE);


        return $this->renderWith('Activity/' . $template);
    }


    public function activityCountIntroduction($pos)
    {
        $count = $this->Group()->Activities()->Count();
        return "Question " . $pos . " of " . $count . ".";
    }

    public function correctAnswerCount()
    {
        return $this->Answers()->filter('CorrectAnswer', 1)->Count();
    }

    public function questionRuleText()
    {
        if ($this->correctAnswerCount() > 1) {
            return "(Select one or more Answers)";
        } else {
            return "(Select one Answer)";
        }
    }

    public function ShowTitle()
    {
        return $this->Group()->ShowTitle;
    }

    public function ActivityTitle()
    {
        return $this->Group()->Title;
    }
}