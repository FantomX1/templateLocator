<?php


namespace fantomx1;


/**
 * Trait ViewLocatorRenderTrait
 * @package fantomx1
 */
trait ViewLocatorRenderTrait
{


    /**
     * @param $template
     * @param $vars
     */
    private function render($template, $vars)
    {
        $tl = new ViewLocator();

        if (!empty($this->viewsDir)) {
            $tl->setViewsDir($this->viewsDir);
        }

        $path = $tl->seek($this);
        $path =  $path.'/'.$template.'.php';

        extract($vars);

        include $path;

    }



}
