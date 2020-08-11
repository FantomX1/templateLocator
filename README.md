# viewLocator
View locator class, for locating views/templates relatively the to processing logic controller/model, especially used in frameworks or independent framework-agnostic extensions
Following the standard frameworks way of reflecting the controller's name as subfolders inside the views (MVC) folder, containing a template for each executing logic (Controller/Widget) action eg. CRUD.


        Controllers
           SiteController
         Views
           Site
              create.php (C-reate)
              index.php  (R-ead)
              edit.php   (U-pdate)
              list.php   (D-delete)

# Usage

        $tl = new TemplateLocator();
        $path = $tl->seek($this);
        
        $path = $path .'/'.$template.'.php';
        #####################################
        
        $tl = new TemplateLocator();
        $path = $tl->getRelative()->setViewsDir('../../twig/views')->seek($this);
        $path = $path .'/'.$template.'.php';

$this - passing the $this param to the $seek method, is a controller in which is this library used in, to reflect the templates path relatively to it. (TODO: better to add it to some fluent interface method chaining)

# In full context

        
    protected function render($template, array $vars)
    {

        $tl = new ViewLocator();
        $path = $tl->setViewsDir('./templates')->seek($this);

        extract($vars);
        include $path.''.$template.'.php';
    }

## Using fantomx1\ViewLocatorRenderTrait  for handling rendering overhead in libraries from the shelf  eg. in real wold context..

~~private $viewsDir = './views/';~~
```    
<?php


namespace fantomx1\toolmasterforeman\examples\ComposerAssetsInstallerTool;

use fantomx1\toolmasterforeman\ToolMasterForemanAbstract;
use fantomx1\ViewLocatorRenderTrait;

class ComposerAssetsInstallerTool extends ToolMasterForemanAbstract
{

    use ViewLocatorRenderTrait;


    /**
     *   the 
     * protected function getViewsDir()
     * {
     * return $this->getDefaultViewsDir();
     * }
     * @return string
     */
    protected function getViewsDir()
    {
        return $this->getDefaultViewsDir("./views");
    }


    public function actionIndex()
    {
        $this->render("index", ['test'=>1]);
    }

}
```    
    
        

