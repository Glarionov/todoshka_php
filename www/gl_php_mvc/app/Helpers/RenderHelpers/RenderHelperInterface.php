<?php

namespace App\Helpers\RenderHelpers;

interface RenderHelperInterface
{
    /**
     * Sets variables for template
     * @param $param
     * @param $value
     * @return mixed
     */
    public function setVariables($param, $value = null);

    /**
     * Renders template
     * @param $templatePath
     * @return mixed
     */
    public function display($templatePath);

}