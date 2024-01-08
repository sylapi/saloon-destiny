<?php

namespace Sylapi\Saloon\Destiny\Entities\Documents;

use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Entities\RwPwGood;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class RwPw
{
    use Errorable;

    private int $idStorehousePlaceFrom;

    private int $idStorehousePlaceTo;

    private array $inGoods;

    private array $outGoods;

    private string $printedNote;

    private string $note;

    public function validate(): bool
    {
        $rules = [
            'id_storehouse_place_from' => 'required|numeric',
            'id_storehouse_place_to' => 'required|numeric',
            'in_good' => 'required|array',
            'out_good' => 'required|array',
            'printed_note' => 'required',
            'note' => 'required',
        ];

        $data = [
            'id_storehouse_place_from' => $this->getIdStorehousePlaceFrom(),
            'id_storehouse_place_to' => $this->getIdStorehousePlaceTo(),
            'in_good' => $this->getInGoods(),
            'out_good' => $this->getOutGoods(),
            'printed_note' => $this->getPrintedNote(),
            'note' => $this->getNote(),
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
     * Get the value of idStorehousePlaceFrom
     */
    public function getIdStorehousePlaceFrom()
    {
        return $this->idStorehousePlaceFrom;
    }

    /**
     * Set the value of idStorehousePlaceFrom
     *
     * @return  self
     */
    public function setIdStorehousePlaceFrom($idStorehousePlaceFrom)
    {
        $this->idStorehousePlaceFrom = $idStorehousePlaceFrom;

        return $this;
    }

    /**
     * Get the value of idStorehousePlaceTo
     */
    public function getIdStorehousePlaceTo()
    {
        return $this->idStorehousePlaceTo;
    }

    /**
     * Set the value of idStorehousePlaceTo
     *
     * @return  self
     */
    public function setIdStorehousePlaceTo($idStorehousePlaceTo)
    {
        $this->idStorehousePlaceTo = $idStorehousePlaceTo;

        return $this;
    }

    /**
     * Get the value of inGoods
     */
    public function getInGoods()
    {
        return $this->inGoods;
    }

    /**
     * Set the value of inGoods
     *
     * @return  self
     */
    public function setInGoods($inGoods)
    {
        $this->inGoods = $inGoods;

        return $this;
    }

    /**
     * Get the value of outGoods
     */
    public function getOutGoods()
    {
        return $this->outGoods;
    }

    /**
     * Set the value of outGoods
     *
     * @return  self
     */
    public function setOutGoods($outGoods)
    {
        $this->outGoods = $outGoods;

        return $this;
    }

    /**
     * Get the value of printedNote
     */
    public function getPrintedNote()
    {
        return $this->printedNote;
    }

    /**
     * Set the value of printedNote
     *
     * @return  self
     */
    public function setPrintedNote($printedNote)
    {
        $this->printedNote = $printedNote;

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
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    public function addOutGood(RwPwGood $outGood)
    {
        $this->outGoods[] = $outGood->toArray();
    }

    public function addInGood(RwPwGood $inGood)
    {
        $this->inGoods[] = $inGood->toArray();
    }
}
