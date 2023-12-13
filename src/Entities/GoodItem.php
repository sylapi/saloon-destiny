<?php 

namespace Sylapi\Saloon\Destiny\Entities;

use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Contracts\Arrayable;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class GoodItem implements Arrayable
{
    use Errorable;
    
    private int $idGood;
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
    private string $note;
    private int $netPrice;
    private int $totPrice;
    private int $inactive;
    private int $idUserGoodGroup;
    private int $idProducer;
    private int $size;
    private int $idSysConstListJewelerAssay;
    private array $params;

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
    public function getIdSysConstListLumpRate()
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
    public function getIdSysConstListGoodType()
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

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote(string $note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of netPrice
     */ 
    public function getNetPrice(): int
    {
        return $this->netPrice;
    }

    /**
     * Set the value of netPrice
     *
     * @return  self
     */ 
    public function setNetPrice(int $netPrice)
    {
        $this->netPrice = $netPrice;

        return $this;
    }

    /**
     * Get the value of totPrice
     */ 
    public function getTotPrice(): int
    {
        return $this->totPrice;
    }

    /**
     * Set the value of totPrice
     *
     * @return  self
     */ 
    public function setTotPrice(int $totPrice)
    {
        $this->totPrice = $totPrice;

        return $this;
    }

    /**
     * Get the value of idGood
     */ 
    public function getIdGood(): int
    {
        return $this->idGood;
    }

    /**
     * Set the value of idGood
     *
     * @return  self
     */ 
    public function setIdGood(int $idGood)
    {
        $this->idGood = $idGood;

        return $this;
    }

    /**
     * Get the value of inactive
     */ 
    public function getInactive(): int
    {
        return $this->inactive;
    }

    /**
     * Set the value of inactive
     *
     * @return  self
     */ 
    public function setInactive(int $inactive)
    {
        $this->inactive = $inactive;

        return $this;
    }

    /**
     * Get the value of idUserGoodGroup
     */ 
    public function getIdUserGoodGroup(): int
    {
        return $this->idUserGoodGroup;
    }

    /**
     * Set the value of idUserGoodGroup
     *
     * @return  self
     */ 
    public function setIdUserGoodGroup(int $idUserGoodGroup)
    {
        $this->idUserGoodGroup = $idUserGoodGroup;

        return $this;
    }

    /**
     * Get the value of idProducer
     */ 
    public function getIdProducer(): int
    {
        return $this->idProducer;
    }

    /**
     * Set the value of idProducer
     *
     * @return  self
     */ 
    public function setIdProducer(int $idProducer)
    {
        $this->idProducer = $idProducer;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize(int $size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Add the value to params array
     *
     * @return  self
     */ 
    public function addSize(int $size)
    {
        $this->params[] = [
            'size' => $size
        ];

        return $this;
    }

    public function toArray()
    {
        return [
            'id_good' => $this->idGood,
            'name' => $this->name,
            'invoice_name' => $this->invoiceName,
            'description' => isset($this->description) ?? '',
            'code' => $this->code,
            'producer_code' => isset($this->producerCode) ?? '',
            'ean' => isset($this->ean) ?? '', 
            'note' => isset($this->note) ?? '',
            'net_price' => $this->netPrice/100,
            'tot_price' => $this->totPrice/100,
            'id_measure_unit' => $this->idMeasureUnit,
            'id_vat_rate' => $this->idVatRate,
            'inactive' => $this->inactive,
            'id_user_good_group' => isset($this->idUserGoodGroup) ?? null,
            'id_good_group' => $this->idGoodGroup,
            'id_producer' => isset($this->idProducer) ?? null,
            'id_sys_const_list-good_strategy' => $this->idSysConstListGoodStrategy,
            'size' => $this->size,
            'id_sys_const_list-jeweler_assay' => $this->idSysConstListJewelerAssay,
            'params' => $this->params,
        ];
    }

    /**
     * Get the value of idSysConstListJewelerAssay
     */ 
    public function getIdSysConstListJewelerAssay(): int
    {
        return $this->idSysConstListJewelerAssay;
    }

    /**
     * Set the value of idSysConstListJewelerAssay
     *
     * @return  self
     */ 
    public function setIdSysConstListJewelerAssay(int $idSysConstListJewelerAssay)
    {
        $this->idSysConstListJewelerAssay = $idSysConstListJewelerAssay;

        return $this;
    }

    public function validate(): bool
    {
        $rules = [
            'id_good' => 'required|numeric',
            'name' => 'required',
            'invoice_name' => 'required',
            'code' => 'required',
            'net_price' => 'required|numeric',
            'tot_price' => 'required|numeric',
            'id_measure_unit' => 'required|numeric',
            'id_vat_rate' => 'required|numeric',
            'inactive' => 'required|numeric',
            'id_good_group' => 'required|numeric',
            'id_sys_const_list-good_strategy' => 'required|numeric',
            'size' => 'required|numeric',
            'id_sys_const_list-jeweler_assay' => 'required|numeric'
        ];

        $data = [
            'id_good' => $this->getIdGood(),
            'name' => $this->getName(),
            'invoice_name' => $this->getInvoiceName(),
            'code' => $this->getCode(),
            'net_price' => $this->getNetPrice()/100,
            'tot_price' => $this->getTotPrice()/100,
            'id_measure_unit' => $this->getIdMeasureUnit(),
            'id_vat_rate' => $this->getIdVatRate(),
            'inactive' => $this->getInactive(),
            'id_good_group' => $this->getIdGoodGroup(),
            'id_sys_const_list-good_strategy' => $this->getIdSysConstListGoodStrategy(),
            'size' => $this->getSize(),
            'id_sys_const_list-jeweler_assay' => $this->getIdSysConstListJewelerAssay()
        ];

        $validator = new Validator();

        $validation = $validator->validate($data, $rules);
        if ($validation->fails()) {
            $this->setErrors($validation->errors()->toArray());

            return false;
        }

        return true;
    }

    /**
     * Get the value of params
     */ 
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }
}
                                           