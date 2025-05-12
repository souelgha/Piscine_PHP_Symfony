<?php

class TemplateEngine
{
    public $fileName="unknown";
    public $templateName="";
    public $parameters=[];

    public function createFile($fileName, $templateName, $parameters)
    {
        $this->fileName = $fileName;
        $this->templateName = $templateName;
        $this->parameters = $parameters;        

        if (file_exists($this->templateName)) {
            $content = file_get_contents($this->templateName);
            foreach ($this->parameters as $key => $value) {
                $content = str_replace("{" . $key . "}", $value, $content);
            }
            file_put_contents($this->fileName, $content);
        } else {
            throw new Exception("Template file not found");
        }
        

    }

}