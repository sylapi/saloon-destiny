<?php 
namespace Sylapi\Saloon\Destiny\Traits;

trait Errorable 
{
    public array $errors = [];

    /**
     * Get the value of errors
     */ 
    public function getErrors($asText = false)
    {
        if ($asText) {
            $text = '';
            foreach ($this->errors as $info) {
                foreach ($info as $error) {
                    $text .= $error . PHP_EOL;
                }
            }
            return $text;
        }
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */ 
    public function setErrors(array $errors)
    {
        $this->errors = $errors;

        return $this;
    }
}