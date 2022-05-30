<?php
class Template
{
    private $path = '/var/www/html/resources/templates/';
    //TODO: Grab templates path from config file

    public function setPath(string $path)
    {
        $this->path = $path;  
    }

    public function render(string $view, array $context = [])
    {
        if (!file_exists($file = $this->path.$view.'.php')) {
            throw new \Exception(sprintf('The template %s could not be found at %s.', $view,$this->path.$view.'.php'));
        }

        extract(array_merge($context, ['template' => $this]));
        ob_start();
        include ($file);
        echo ob_get_clean();
    }
}