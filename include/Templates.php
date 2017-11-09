<?php

namespace REPLACE_PLUGIN_NAMESPACE;

class Templates
{
    public function __call($template, $arguments)
    {
        // function starts with 'return' and we will return compiled template
        if (0 === strpos($template, 'return')) {
            ob_start();
            include_once FT_TEMPLATES . $template . '.php';
            return ob_get_clean();
        }
        // echo out compiled template
        include_once FT_TEMPLATES . $template . '.php';
    }
}
