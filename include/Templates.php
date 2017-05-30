<?php

namespace REPLACE_PLUGIN_NAMESPACE;

class Templates
{
    public function __call($template, $arguments)
    {
    	include_once WPPB_TEMPLATES . $template . '.php';
    }
}
