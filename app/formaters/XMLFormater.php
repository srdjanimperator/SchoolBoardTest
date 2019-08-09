<?php


class XMLFormater implements IFormater
{

    public function format($data)
    {
        // TODO: Implement format() method.
       return "XML data - not implemented. <br/><br/>" . json_encode($data);
    }
}