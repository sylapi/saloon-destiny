<?php 

namespace Sylapi\Saloon\Destiny\Entities\Documents;

use DateTime;
use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class Invoice
{
    use Errorable;

    private int $orderId;
    private string $note;
    private int $paymentWayId;
    private string $printedNote;
    private DateTime $date;
    private DateTime $saleDate;
    private DateTime $docDate;
    private string $countryIso;

    public function validate(): bool
    {
        $rules = [
            'order_id'  => 'required|numeric',
            'note'  => 'nullable',
            'payment_way_id'  => 'required|numeric',
            'printed_note'  => 'nullable',
            'date'  => 'required',
            'sale_date'  => 'required',
            'doc_date'  => 'required',
            'country_iso'  => 'required',
        ];

        $data = [
            'order_id'  => $this->getOrderId(),
            'note'  => $this->getNote(),
            'payment_way_id'  => $this->getPaymentWayId(),
            'printed_note'  => $this->getPrintedNote(),
            'date'  => $this->getDate(),
            'sale_date'  => $this->getSaleDate(),
            'doc_date'  => $this->getDocDate(),
            'country_iso'  => $this->getCountryIso(),
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
     * Get the value of orderId
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */
    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of paymentWayId
     */
    public function getPaymentWayId(): int
    {
        return $this->paymentWayId;
    }

    /**
     * Set the value of paymentWayId
     *
     * @return  self
     */
    public function setPaymentWayId(int $paymentWayId): self
    {
        $this->paymentWayId = $paymentWayId;

        return $this;
    }

    /**
     * Get the value of printedNote
     */
    public function getPrintedNote(): string
    {
        return $this->printedNote;
    }

    /**
     * Set the value of printedNote
     *
     * @return  self
     */
    public function setPrintedNote(string $printedNote): self
    {
        $this->printedNote = $printedNote;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of saleDate
     */
    public function getSaleDate(): DateTime
    {
        return $this->saleDate;
    }

    /**
     * Set the value of saleDate
     *
     * @return  self
     */
    public function setSaleDate(DateTime $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * Get the value of docDate
     */
    public function getDocDate(): DateTime
    {
        return $this->docDate;
    }

    /**
     * Set the value of docDate
     *
     * @return  self
     */
    public function setDocDate(DateTime $docDate): self
    {
        $this->docDate = $docDate;

        return $this;
    }

    /**
     * Get the value of countryIso
     */
    public function getCountryIso(): string
    {
        return $this->countryIso;
    }

    /**
     * Set the value of countryIso
     *
     * @return  self
     */
    public function setCountryIso(string $countryIso): self
    {
        $this->countryIso = $countryIso;

        return $this;
    }
}