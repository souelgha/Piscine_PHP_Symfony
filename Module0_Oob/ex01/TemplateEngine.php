<?php
require_once 'Text.php';
class TemplateEngine
{
    public $fileName="unknown";

    public function createFile($fileName, Text $texts)
    {
        $this->fileName = $fileName;      

        if ($texts) {
            $html="<!DOCTYPE html>\n". "<html>\n\t<head>\n";
		$html .="\t\t<title>".$texts->gettext()."</title>\n";
		$html .="\t</head>\n\t<body>\n";
		$html .="\t\t<h1>".$texts->gettext()."</h1>\n";
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
