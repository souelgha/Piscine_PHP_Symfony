<?php
require_once 'Coffee.php';
require_once 'Tea.php';

class TemplateEngine
{
    public function createFile(HotBeverage $text){
		$className=(new ReflectionClass($text))->getShortName();
		$filename=$className.".html";
		$template=file_get_contents('template.html');
		echo $template;
		$reflect = new ReflectionClass($text);
		$props= $reflect->getProperties();
		print_r($props);
		foreach ($props as $prop) {
            $propName = $prop->getName(); 
			echo $propName, "\n";
            $getter = "get" . ucfirst($propName);
			echo $getter , "\n";

            if (method_exists($text, $getter)) {
                $value = $text->$getter();
				echo "Value => ", $value, "\n";               
                $template = str_replace("{" . $propName . "}", $value, $template);
            }
        }
		file_put_contents($filename, $template);
  
		   
    }
}

