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
     * @return $this
     */
    public function setRelative()
    {
        $this->flagRelative = true;
        return $this;
    }

    /**
     * @param $viewsDir
     * @return $this
     */
    public function setViewsDir($viewsDir)
    {
        $this->viewsDirectory = $viewsDir;
        return $this;
    }


    /**
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

        $arr = preg_split('/(?=[A-Z])/',basename($fn));

//        $basename = str_replace("Widget.php", "", basename($fn));

        unset($arr[count($arr)-1]);
        $basename = implode("", $arr);


        // duplicated forwawrd slash won't spoil it

        //$path = $relativePath =  '/'. $basename.'/';
        $relativePath = '/'. $basename.'/';
        $path = $dirController.'/'. $relativePath;

        if ($this->flagRelative) {
            $path = $relativePath;
        }


        return $path;
    }






}
