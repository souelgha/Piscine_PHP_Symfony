<?php
require_once 'Coffee.php';
require_once 'Tea.php';
class TemplateEngine
{
    public $fileName="unknown";
    

    public function createFile(HotBeverage $text)   {
        $this->fileName = $fileName;
		$html="<!DOCTYPE html>\n". "<html>\n\t<head>\n";
		$html .="\t\t<title>".$texts->gettext()."</title>\n";
		$html .="\t</head>\n\t<body>\n";
		$html .="\t\t<h1>".$texts->gettext()."</h1>\n";		

        if ($texts) {            
            $content = $texts->readData();
			print($content);
			$html .= $content;
			$html .="\t</body>\n</html>";
			file_put_contents($this->fileName, $html);
		} else {
			throw new Exception("No data to write");
		}   
    }
}

 if (file_exists($this->templateName)) {
            $content = file_get_contents($this->templateName);
            foreach ($this->parameters as $key => $value) {
                $content = str_replace("{" . $key . "}", $value, $content);
            }
            file_put_contents($this->fileName, $content);
        } else {
            throw new Exception("Template file not found");
        }