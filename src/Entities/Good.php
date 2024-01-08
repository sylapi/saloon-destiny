<?php

namespace Sylapi\Saloon\Destiny\Entities;

use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Contracts\Arrayable;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class Good implements Arrayable
{
    use Errorable;

    private string $name;

    private string $invoiceName;

    private string $description;

    private string $code;

    private string $producerCode;

    private string $ean;

    private int $idMeasureUnit;

    private string $idSysConstListLumpRate;

    private int $idVatRate;

    private int $idGoodGroup;

    private string $idSysConstListGoodType;

    private int $status;

    private int $idSysConstListGoodStrategy;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of invoiceName
     */
    public function getInvoiceName()
    {
        return $this->invoiceName;
    }

    /**
     * Set the value of invoiceName
     *
     * @return  self
     */
    public function setInvoiceName(string $invoiceName)
    {
        $this->invoiceName = $invoiceName;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
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
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of producerCode
     */
    public function getProducerCode()
    {
        return $this->producerCode;
    }

    /**
     * Set the value of producerCode
     *
     * @return  self
     */
    public function setProducerCode(string $producerCode)
    {
        $this->producerCode = $producerCode;

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
    public function setEan(string $ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get the value of idMeasureUnit
     */
    public function getIdMeasureUnit(): int
    {
        return $this->idMeasureUnit;
    }

    /**
     * Set the value of idMeasureUnit
     *
     * @return  self
     */
    public function setIdMeasureUnit(int $idMeasureUnit)
    {
        $this->idMeasureUnit = $idMeasureUnit;

        return $this;
    }

    /**
     * Get the value of idSysConstListLumpRate
     */
    public function getIdSysConstListLumpRate(): string
    {
        return $this->idSysConstListLumpRate;
    }

    /**
     * Set the value of idSysConstListLumpRate
     *
     * @return  self
     */
    public function setIdSysConstListLumpRate(string $idSysConstListLumpRate)
    {
        $this->idSysConstListLumpRate = $idSysConstListLumpRate;

        return $this;
    }

    /**
     * Get the value of idVatRate
     */
    public function getIdVatRate(): int
    {
        return $this->idVatRate;
    }

    /**
     * Set the value of idVatRate
     *
     * @return  self
     */
    public function setIdVatRate(int $idVatRate)
    {
        $this->idVatRate = $idVatRate;

        return $this;
    }

    /**
     * Get the value of idGoodGroup
     */
    public function getIdGoodGroup(): int
    {
        return $this->idGoodGroup;
    }

    /**
     * Set the value of idGoodGroup
     *
     * @return  self
     */
    public function setIdGoodGroup(int $idGoodGroup)
    {
        $this->idGoodGroup = $idGoodGroup;

        return $this;
    }

    /**
     * Get the value of idSysConstListGoodType
     */
    public function getIdSysConstListGoodType(): string
    {
        return $this->idSysConstListGoodType;
    }

    /**
     * Set the value of idSysConstListGoodType
     *
     * @return  self
     */
    public function setIdSysConstListGoodType(string $idSysConstListGoodType)
    {
        $this->idSysConstListGoodType = $idSysConstListGoodType;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of idSysConstListGoodStrategy
     */
    public function getIdSysConstListGoodStrategy(): int
    {
        return $this->idSysConstListGoodStrategy;
    }

    /**
     * Set the value of idSysConstListGoodStrategy
     *
     * @return  self
     */
    public function setIdSysConstListGoodStrategy(int $idSysConstListGoodStrategy)
    {
        $this->idSysConstListGoodStrategy = $idSysConstListGoodStrategy;

        return $this;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'invoice_name' => $this->invoiceName,
            'description' => $this->description,
            'code' => $this->code,
            'producer_code' => $this->producerCode ?? '',
            'ean' => $this->ean ?? '',
            'id_measure_unit' => $this->idMeasureUnit,
            'id_sys_const_list-lump_rate' => $this->idSysConstListLumpRate,
            'id_vat_rate' => $this->idVatRate,
            'id_good_group' => $this->idGoodGroup,
            'id_sys_const_list-good_type' => $this->idSysConstListGoodType,
            'status' => $this->status,
            'id_sys_const_list-good_strategy' => $this->idSysConstListGoodStrategy,
        ];
    }

    public function validate(): bool
    {
        $rules = [
            'name' => 'required',
            'invoice_name' => 'required',
            'code' => 'required',
            'id_measure_unit' => 'required|numeric',
            'id_sys_const_list-lump_rate' => 'required|numeric',
            'id_vat_rate' => 'required|numeric',
            'id_good_group' => 'required|numeric',
            'id_sys_const_list-good_type' => 'required|numeric',
            'status' => 'required|numeric',
            'id_sys_const_list-good_strategy' => 'required|numeric',
        ];

        $data = [
            'name' => $this->getName(),
            'invoice_name' => $this->getInvoiceName(),
            'code' => $this->getCode(),
            'id_measure_unit' => $this->getIdMeasureUnit(),
            'id_sys_const_list-lump_rate' => $this->getIdSysConstListLumpRate(),
            'id_vat_rate' => $this->getIdVatRate(),
            'id_good_group' => $this->getIdGoodGroup(),
            'id_sys_const_list-good_type' => $this->getIdSysConstListGoodType(),
            'status' => $this->getStatus(),
            'id_sys_const_list-good_strategy' => $this->getIdSysConstListGoodStrategy(),
        ];

        $validator = new Validator();

        $validation = $validator->validate($data, $rules);
        if ($validation->fails()) {
            $this->setErrors($validation->errors()->toArray());

            return false;
        }

        return true;
    }
}
