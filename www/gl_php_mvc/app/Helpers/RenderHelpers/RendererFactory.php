<?php

namespace App\Helpers\RenderHelpers;

use App\Config\Config;
use App\Exception\Handler;

class RendererFactory
{
    /**
     * Get render engine by current config settings
     * @return RenderHelperInterface|false
     */
    public static function getRendererByConfig()
    {
        $renderEngine = Config::get('render.engine');
        $engineList = Config::get('render.engines');
        if (empty($engineList[$renderEngine])) {
            Handler::showDefaultError("Unknown render engine '$renderEngine' set in config");
            return false;
        }

        return new $engineList[$renderEngine]();
    }
}
