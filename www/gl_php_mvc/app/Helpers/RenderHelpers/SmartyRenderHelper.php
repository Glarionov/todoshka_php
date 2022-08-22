<?php

namespace App\Helpers\RenderHelpers;

use App\Config\Config;
use Smarty;

class SmartyRenderHelper implements RenderHelperInterface
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();

        $templateDir = Config::get('render.template_dir');
        $this->smarty->setTemplateDir($templateDir);
        $this->smarty->setEscapeHtml(true);
    }

    /**
     * Sets variables for template
     * @param $param
     * @param $value
     * @return mixed
     */
    public function setVariables($param, $value = null)
    {
        if (is_array($param)) {
            $this->smarty->assign($param);
        } else {
            $this->smarty->assign($param, $value);
        }
    }

    /**
     * Renders template
     * @param $templatePath
     * @return mixed
     */
    public function display($templatePath)
    {
        $this->smarty->display($templatePath . '.tpl');
    }
}
