<?php
if (!defined('IN_ADMIN')) exit('Access Denied');
if (IS_POST) {
    $config['line'] = $_GET['line'];
    $config['number'] = $_GET['number'];
    if (!preg_match('/^[0-9]*$/', $config['line']) || $config['line'] < 0) showmessage('您输入的库存线不合法!');
    if (!preg_match('/^[0-9]*$/', $config['number'] || $config['number'] < 0)) showmessage('您输入的增长数不合法!');
    cache('auto_inc', $config, 'plugin');
    showmessage('配置完成', -1, 1);
} else {
    if (!$_GET['action']) {
        $config = cache('auto_inc', '', 'plugin');
        include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
    }
    if ($_GET['action'] == 'log') {
        $page = $_GET['page'] ? $_GET['page'] : 1;
        $limit = $_GET['limit'] ? $_GET['limit'] : 10;
        $logs = model('inc_log')->page($page)->limit($limit)->select();
        $count = model('inc_log')->count();
        $pages = admin_pages($count, $limit);
        include(PLUGIN_PATH . PLUGIN_ID . '/template/log.php');
    }
}

function admin_pages($totalrow, $pagesize = 10, $pagenum = 5)
{
    $totalPage = ceil($totalrow / $pagesize);
    $rollPage = floor($pagenum / 2);

    $StartPage = $_GET['page'] - $rollPage;
    $EndPage = $_GET['page'] + $rollPage;
    if ($StartPage < 1) $StartPage = 1;
    if ($EndPage < $pagenum) $EndPage = $pagenum;

    if ($EndPage >= $totalPage) {
        $EndPage = $totalPage;
        $StartPage = max(1, $totalPage - $pagenum + 1);
    }
    $string = '<ul class="fr">';
    $string .= '<li>共' . $totalrow . '条数据</li>';
    $string .= '<li class="spacer-gray margin-lr"></li>';
    $string .= '<li>每页显示<input class="input radius-none" type="text" name="limit" value="' . $pagesize . '"/>条</li>';
    $string .= '<li class="spacer-gray margin-left"></li>';

    /* 第一页 */
    if ($_GET['page'] > 1) {
        $string .= '<li class="start"><a href="' . page_url(array('page' => 1)) . '"></a></li>';
        $string .= '<li class="prev"><a href="' . page_url(array('page' => $_GET['page'] - 1)) . '"></a></li>';
    } else {
        $string .= '<li class="default-start"></li>';
        $string .= '<li class="default-prev"></li>';
    }
    for ($page = $StartPage; $page <= $EndPage; $page++) {
        $string .= '<li ' . (($page == $_GET['page']) ? 'class="current"' : '') . '><a href="' . page_url(array('page' => $page)) . '">' . $page . '</a></li>';
    }
    if ($_GET['page'] < $totalPage) {
        $string .= '<li class="next"><a href="' . page_url(array('page' => $_GET['page'] + 1)) . '"></a></li>';
        $string .= '<li class="end"><a href="' . page_url(array('page' => $totalPage)) . '"></a></li>';
    } else {
        $string .= '<li class="default-next"></li>';
        $string .= '<li class="default-end"></li>';
    }
    $string .= '</ul>';
    return $string;
}
