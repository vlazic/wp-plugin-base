<?php

namespace REPLACE_PLUGIN_NAMESPACE;

class Templates
{
    public function __call($template, $arguments)
    {
        // function starts with 'return' and we will return compiled template
        if (0 === strpos($template, 'return')) {
            ob_start();
            include_once REPLACE_PLUGIN_NAMESPACE_TEMPLATES . substr($template, 6) . '.php';
            return ob_get_clean();
        }
        // echo out compiled template
        include_once REPLACE_PLUGIN_NAMESPACE_TEMPLATES . $template . '.php';
    }
}
