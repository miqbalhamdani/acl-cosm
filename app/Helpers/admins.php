<?php

/**
 * Set is add or edit url form.
 *
 * @return string $url
 */
if (!function_exists('setPostUrl'))
{
    function setPostUrl()
    {
        $current = explode(url("/"), url()->current());
        return $current[1];
    }
}
