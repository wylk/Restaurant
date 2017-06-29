<?php
class plugin extends init_control
{
    public $arrays = array();
    public function _initialize()
    {
        parent::_initialize();
    }

    public function display($a)
    {

         foreach($this->arrays as $key =>$value)
        {
            $$key=$value;
        }

        include_once(DISPLAY_PATH.$_GET['p'].'/'.$a.'.php');
    }
    public function assign($field, $value = '')
    {
        if (!empty($value)) {
             $this->arrays[$field] = $value;

        }
        else if (is_array($field)) {
            foreach ($field as $key => $value) {
                $this->arrays[$key] = $value;
            }
        }
        else {
             $this->arrays[$field] = $value;
        }
    }

}