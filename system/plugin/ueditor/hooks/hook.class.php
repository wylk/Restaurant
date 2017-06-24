<?php

class plugin_ueditor_hook extends plugin
{
    // UEditor 插件hook
    public function editor(&$data)
    {
        if (MODULE_NAME == 'notify') return false;
        if (METHOD_NAME == 'tpl_parcel') return false;
        $url = url('attachment/index/editor', array('upload_init' => $data['upload_init']));
        $config = cache('ueditor_config', '', 'plugin');
        $plugin_dir = 'system/plugin/ueditor/';
        $name = 'content';
        if ($_GET['id']) $name = 'spu[content]';
        if ($config['editor'] == 'ueditor') {
            $data['string'] = "<script id='container' name='$name' type='text/plain'>{$data['value']}</script>
                <script type='text/javascript' src='{$plugin_dir}ueditor.config.js'></script>
                <script type='text/javascript' src='{$plugin_dir}ueditor.all.js'></script>
                <script type='text/javascript'>
                    var ue = UE.getEditor('container',{serverUrl :'{$url}',imageFieldName:'editor'});
//                    var ue = UE.getEditor('container');
                    $('#container').parent('div').removeClass('hidden');
                </script>";
        }
    }
}