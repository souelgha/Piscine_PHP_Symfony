<?php

require_once 'Text.php';

class TemplateEngine
{
    public $fileName="unknown";

    public function createFile($fileName, Text $texts)
    {
        $this->fileName = $fileName;      

        $html="<!DOCTYPE html>\n". "<html>\n\t<head>\n";
		$html .="\t\t<title>".$texts->getFirstValue()."</title>\n";
		$html .="\t</head>\n\t<body>\n";
		$html .="\t\t<h1>".$texts->getFirstValue()."</h1>\n\n";
        $content = $texts->readData();        
		$html .= $content;
        $html .="\t</body>\n</html>";
        file_put_contents($this->fileName, $html);
	}

}
