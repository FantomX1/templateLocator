<?php


namespace fantomx1;

/**
 * Class ViewLocator
 * @package fantomx1
 */
class ViewLocator
{


    /**
     * @var
     */
    private $flagRelative;

    /**
     * @var
     */
    private $viewsDirectory;


    /**
     * whether to return relative paths for libraries which need it that way, eg symfony Twig
     * @return $this
     */
    public function getRelative()
    {
        $this->flagRelative = true;
        return $this;
    }

    /**
     * to override default relative vies location from ../views to eg ../../twig/templates etc.
     * @param $viewsDir
     * @return $this
     */
    public function setViewsDir($viewsDir)
    {
        $this->viewsDirectory = $viewsDir;
        return $this;
    }


    /**
     *
     * returns the views path without the trailing slash
     *  Usage:
     *  $tl = new TemplateLocator();
     *  $path = $tl->seek($this);
     *  $path = $path .'/'.$template.'.php';
     *  #####################################
     *
     *  $tl = new TemplateLocator();
     *  $path = $tl->getRelative()->setViewsDir('../../twig/views')->seek($this);
     *  $path = $path .'/'.$template.'.php';
     *
     * @param $viewsDir
     * @return $this
     */
    public function seek($class)
    {

        $reflector = new \ReflectionClass($class);
        $fn = $reflector->getFileName();
        $dirController = dirname($fn).'/../views';

        if ($this->viewsDirectory) {
            //$dir = dirname($fn).'/../'.$this->viewsDirectory;
            $dirController = dirname($fn).'/'.$this->viewsDirectory;
        }

//        var_dump($dirController);

        // separate words snake based to remove the last part for a template from word, being it to remove
        // a word "Controller" or a "Widget"
        $arr = preg_split('/(?=[A-Z])/', basename($fn));

//        $basename = str_replace("Widget.php", "", basename($fn));

        unset($arr[count($arr)-1]);
        $basename = implode("", $arr);

        //$path = $relativePath =  '/'. $basename.'/';
        //$relativePath = '/'. $basename.'/';
        $relativePath =  $basename;
        $path = $dirController.'/'. $relativePath;

        if ($this->flagRelative) {
            $path = $relativePath;
        }


        return $path;
    }






}
