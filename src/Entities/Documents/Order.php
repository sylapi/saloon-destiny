<?php 

namespace Sylapi\Saloon\Destiny\Entities\Documents;

use DateTime;
use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class Order 
{
    use Errorable;

    private string $externalOrderId;
    private DateTime $completionDate;
    private ?string $customerTaxId;
    private string $customerPostalCode;
    private string $customerAddress;
    private string $customerPostOffice;
    private string $customerEmail;
    private string $customerName;
    private int $currencyId;
    private int $paymentWayId;
    private int $businessPlaceId;
    private int $countryId;
    private int $customerId;

    public function validate(): bool
    {
        $rules = [
            'external_order_id'  => 'required|numeric',
            'completion_date'    => 'required',
            'customer_tax_id'    => 'numeric|nullable',
            'customer_postal_code'  => 'required',
            'customer_address'  => 'required',
            'customer_post_office'  => 'required',
            'customer_email'  => 'required|email',
            'customer_name'  => 'required',
            'currency_id'  => 'required|numeric',
            'payment_way_id'  => 'required|numeric',
            'business_place_id'  => 'required|numeric',
            'country_id'  => 'required|numeric',
            'customer_id'  => 'required|numeric',
        ];

        $data = [
            'external_order_id'  => $this->getExternalOrderId(),
            'completion_date'    => $this->getCompletionDate(),
            'customer_tax_id'    => $this->getCustomerTaxId(),
            'customer_postal_code'  => $this->getCustomerPostalCode(),
            'customer_address'  => $this->getCustomerAddress(),
            'customer_post_office'  => $this->getCustomerPostOffice(),
            'customer_email'  => $this->getCustomerEmail(),
            'customer_name'  => $this->getCustomerName(),
            'currency_id'  => $this->getCurrencyId(),
            'payment_way_id'  => $this->getPaymentWayId(),
            'business_place_id'  => $this->getBusinessPlaceId(),
            'country_id'  => $this->getCountryId(),
            'customer_id'  => $this->getCustomerId(),
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
     * Get the value of externalOrderId
     */ 
    public function getExternalOrderId(): string
    {
        return $this->externalOrderId;
    }

    /**
     * Set the value of externalOrderId
     *
     * @return  self
     */ 
    public function setExternalOrderId(string $externalOrderId)
    {
        $this->externalOrderId = $externalOrderId;

        return $this;
    }
    
    /**
     * Get the value of completionDate
     */
    public function getCompletionDate(): DateTime
    {
        return $this->completionDate;
    }

    /**
     * Set the value of completionDate
     *
     * @return  self
     */
    public function setCompletionDate(DateTime $completionDate)
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    /**
     * Get the value of customerTaxId
     */
    public function getCustomerTaxId()
    {
        return $this->customerTaxId;
    }

    /**
     * Set the value of customerTaxId
     *
     * @return  self
     */
    public function setCustomerTaxId(?string $customerTaxId)
    {
        $this->customerTaxId = $customerTaxId;

        return $this;
    }

    /**
     * Get the value of customerPostalCode
     */
    public function getCustomerPostalCode()
    {
        return $this->customerPostalCode;
    }

    /**
     * Set the value of customerPostalCode
     *
     * @return  self
     */
    public function setCustomerPostalCode(string $customerPostalCode)
    {
        $this->customerPostalCode = $customerPostalCode;

        return $this;
    }

    /**
     * Get the value of customerAddress
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }

    /**
     * Set the value of customerAddress
     *
     * @return  self
     */
    public function setCustomerAddress(string $customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * Get the value of customerPostOffice
     */
    public function getCustomerPostOffice()
    {
        return $this->customerPostOffice;
    }

    /**
     * Set the value of customerPostOffice
     *
     * @return  self
     */
    public function setCustomerPostOffice(string $customerPostOffice)
    {
        $this->customerPostOffice = $customerPostOffice;

        return $this;
    }

    /**
     * Get the value of customerEmail
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Set the value of customerEmail
     *
     * @return  self
     */
    public function setCustomerEmail(string $customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get the value of customerName
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set the value of customerName
     *
     * @return  self
     */
    public function setCustomerName(string $customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get the value of currencyId
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * Set the value of currencyId
     *
     * @return  self
     */
    public function setCurrencyId(int $currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Get the value of paymentWayId
     */
    public function getPaymentWayId()
    {
        return $this->paymentWayId;
    }

    /**
     * Set the value of paymentWayId
     *
     * @return  self
     */
    public function setPaymentWayId(int $paymentWayId)
    {
        $this->paymentWayId = $paymentWayId;

        return $this;
    }

    /**
     * Get the value of businessPlaceId
     */
    public function getBusinessPlaceId()
    {
        return $this->businessPlaceId;
    }

    /**
     * Set the value of businessPlaceId
     *
     * @return  self
     */
    public function setBusinessPlaceId(int $businessPlaceId)
    {
        $this->businessPlaceId = $businessPlaceId;

        return $this;
    }

    /**
     * Get the value of countryId
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set the value of countryId
     *
     * @return  self
     */
    public function setCountryId(int $countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get the value of customerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set the value of customerId
     *
     * @return  self
     */
    public function setCustomerId(int $customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }
}