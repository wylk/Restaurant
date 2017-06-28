<?php
class index extends init_control{

	public function _initialize()
	{
		parent::_initialize();
    }


    public function test()
    {
        echo 'ok';
    }
    public function test()
    {
        echo 'ok';
        echo FOOD_PATH;
    }

    public function test1()
    {
        $limit = model('app')->select();

        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';

    }

    public function test1()
    {
        $limit = model('app')->select();
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';
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