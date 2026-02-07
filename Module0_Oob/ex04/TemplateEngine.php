<?php
require_once 'Elem.php';

class TemplateEngine
{
    public $fileName;
	public $element;

	public function __construct(Elem $element)
	{
		$this->element=$element;	
	}

    public function createFile($fileName)
    {
        $this->fileName = $fileName;
		$htmlcontent= $this->element->getHTML();
		file_put_contents($this->fileName, $htmlcontent);         
	}

}