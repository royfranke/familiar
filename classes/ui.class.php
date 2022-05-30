<?php
class Ui
{
    private $path = '/var/www/html/resources/components/';
    private $icon_path = '/var/www/html/resources/icons/';
    //TODO: Grab components path from config file

    public function setPath(string $path)
    {
        $this->path = $path;  
    }

    public function setIconPath(string $icon_path)
    {
        $this->icon_path = $icon_path;  
    }
    /**
     * @param string $view
     * @param array $context
     * @return string
     * @throws \Exception
     */
    private function render(string $view, array $context = [])
    {
        if (!file_exists($file = $this->path.$view.'.php')) {
            throw new \Exception(sprintf('The component %s could not be found.', $view));
        }

        extract(array_merge($context, ['component' => $this]));
        ob_start();
        include ($file);
        echo ob_get_clean();
    }

    private function renderIcon(string $icon)
    {
        if (!file_exists($file = $this->icon_path.$icon.'.svg')) {
            throw new \Exception(sprintf('The icon %s could not be found at %s.', $icon,$this->icon_path.$icon.'.svg'));
        }
        else {
            return file_get_contents($file);
        }
        
    }

    public function setting($value,string $id,string $label) {
        $context = ['id'=>$id,'value'=>$value,'label'=>$label];
        $this->render('setting',$context);
    }

    public function button(string $id, string $class, string $function, string $attr, string $value) {
        $context = ['id'=>$id,'class'=>$class,'function'=>$function,'attr'=>$attr,'value'=>$value];
        $this->render('button',$context);
    }

    public function footerbutton(string $function, string $icon_label, string $label, string $id, string $class) {
        $icon = $this->icon($icon_label);
        $context = ['function'=>$function,'icon'=>$icon,'label'=>$label,'id'=>$id,'class'=>$class];
        $this->render('footerbutton',$context);
    }

    public function input(string $id, string $class, string $function, string $attr, string $value, string $label, string $type) {

        $context = ['id'=>$id,'class'=>$class,'function'=>$function,'attr'=>$attr,'value'=>$value,'label'=>$label,'type'=>$type];
        $this->render('input',$context);
    }

    public function icon(string $name) {
        return $this->renderIcon($name);
    }

    public function iconTip(string $icon_name, string $class1,string $class2) {
        $context = ['icon'=>$this->renderIcon($icon_name),'class1'=>$class1,'class2'=>$class2,'arrow'=>$this->renderIcon('arrow_right')];
        $this->render('icontip',$context);
    }

    public function alertMessage ($message) {
        $context = ['message'=>$message];
        $this->render('alertmessage',$context);
    }

}