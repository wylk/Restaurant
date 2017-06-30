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

    public function clear_html($array)
    {
        if (!is_array($array))
            return trim(htmlspecialchars($array, ENT_QUOTES));
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->clear_html($value);
            } else {
                $array[$key] = trim(htmlspecialchars($value, ENT_QUOTES));
            }
        }
        return $array;
    }

    public function dexit($data = '')
    {
        if (is_array($data)) {
            echo json_encode($data);
        } else {
            echo $data;
        }
        exit();
    }





}