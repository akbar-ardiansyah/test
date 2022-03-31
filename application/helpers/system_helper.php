<?php
function add_js($add_js)
{
    $ci = &get_instance();
    $ci->path_js = $add_js;
}
function asset_js()
{
    $ci = &get_instance();
    $js = '';

    if (!empty($ci->path_js)) {

        foreach ($ci->path_js as $phat_js) {
            $js .= "\n\t\t" . '<script src="' . base_url() . 'assets/' . $phat_js . '" type="text/javascript"></script>';
        }
    }
    echo $js;
}
