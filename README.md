# viewLocator
Wiew locator class, for locating views/templates relatively the to processing logic controller/model, especially used in frameworks or independent framework-agnostic extensions
Following the standard frameworks way of copying the controller's name as subfolders inside the views (MVC) folder, containing a template for each executing logic (Controller/Widget) action eg. CRUD.


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
        $path = $tl->setRelative()->setViewsDir('../../twig/views')->seek($this);
