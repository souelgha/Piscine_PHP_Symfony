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
        if($fileName){
			$this->fileName = $fileName;
		}
		else
		{
			echo "Error: File name is required \n";
			return;
		}
		$htmlcontent= $this->element->getHTML();
		file_put_contents($this->fileName, $htmlcontent);         
	}

}