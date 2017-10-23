<?php
namespace API\Expedia;

class Exception extends \Exception
{
    protected $data;

    public function __construct($data)
    {
        parent::__construct($data['verboseMessage']);

        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
