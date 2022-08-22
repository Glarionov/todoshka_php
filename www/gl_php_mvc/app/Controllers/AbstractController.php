<?php

namespace App\Controllers;

use App\Helpers\RenderHelpers\RendererFactory;
use App\Helpers\RenderHelpers\RenderHelperInterface;
use App\Helpers\User\Auth;
use Smarty;

abstract class AbstractController
{
    protected $renderer;

    public function __construct()
    {
        $this->renderer = RendererFactory::getRendererByConfig();

        $this->renderer->setVariables(Auth::getAuthVariables());
    }
}
