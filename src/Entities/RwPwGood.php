<?php 

namespace Sylapi\Saloon\Destiny\Entities;

use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Traits\Errorable;
use Sylapi\Saloon\Destiny\Contracts\Arrayable;

class RwPwGood implements Arrayable
{
    use Errorable;

    private string $code;
    private string $ean;
    private int $quantity;

    public function validate()
    {
        $rules = [
            'quantity'  => 'required|numeric',
            'code'      => 'required'
        ];
        
        $data = [
            'quantity'  => $this->getQuantity(),
            'code'      => $this->getCode()
        ];

        $validator = new Validator();

        $validation = $validator->validate($data, $rules);
        if ($validation->fails()) {
            $this->setErrors($validation->errors()->toArray());

            return false;
        }

        return true;
    }

    public function toArray()
    {
        return [
            'ean'       => isset($this->ean) ?? null,
            'quantity'  => $this->quantity,
            'code'      => $this->code,
        ];
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of ean
     */ 
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set the value of ean
     *
     * @return  self
     */ 
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}