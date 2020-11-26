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

/**
 * Set is add or edit url form.
 *
 * @return string $url
 */
if (!function_exists('generateBrandUrl'))
{
    function generateBrandUrl($slug)
    {
        $category = app('request')->input('category');
        $dataBrands = app('request')->input('brands');

        $arrBrands = $dataBrands ? explode(",", $dataBrands) : [];
        if (in_array($slug, $arrBrands))  {
            // UNCHECK
            $slugIndex = array_search($slug, $arrBrands);
            unset($arrBrands[$slugIndex]);
        } else  {
            // CHECK
            array_push($arrBrands, $slug);
        }

        // Default Url
        $url = [
            'brands' => implode(",", $arrBrands),
        ];

        if ($category) {
            $url['category'] = $category;
        }

        return route('product-list', $url);
    }
}
