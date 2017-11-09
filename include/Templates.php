<?php

namespace REPLACE_PLUGIN_NAMESPACE;

class Templates
{
    public function __call($template, $arguments)
    {
        ob_start();
        include_once REPLACE_PLUGIN_NAMESPACE_TEMPLATES . $template . '.php';
        echo ob_get_clean();
    }
}
