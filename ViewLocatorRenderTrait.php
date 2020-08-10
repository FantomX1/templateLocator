<?php


namespace fantomx1;


/**
 * Trait ViewLocatorRenderTrait
 * @package fantomx1
 */
trait ViewLocatorRenderTrait
{


    /**
     * @return string
     */
    protected function getDefaultViewsDir($dir = '')
    {
        return $dir;
    }


    /**
    * protected function getViewsDir()
    * {
    * return $this->getDefaultViewsDir();
    * }
    * @return string
    */
    abstract protected function getViewsDir();

    /**
     * @param $template
     * @param $vars
     */
    protected function render($template, $vars)
    {
        $tl = new ViewLocator();

        if ($viewsDir = $this->getViewsDir()) {
            $tl->setViewsDir($viewsDir);
        }

        $path = $tl->seek($this);
        $path =  $path.'/'.$template.'.php';

        extract($vars);

        include $path;

    }



}
