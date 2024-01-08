<?php

namespace Sylapi\Saloon\Destiny\Entities\Documents;

use Rakit\Validation\Validator;
use Sylapi\Saloon\Destiny\Traits\Errorable;

class OrderLine
{
    use Errorable;

    private string $orderId;

    private string $measureUnitId;

    private int $goodId;

    private float $totalPrice;

    private string $name;

    private float $quantity;

    private int $storehousePlaceId;

    private int $currencyId;

    private int $goodItemId;

    public function validate(): bool
    {
        $rules = [
            'order_id' => 'required|numeric',
            'measure_unit_id' => 'required|numeric',
            'good_id' => 'required|numeric',
            'total_price' => 'required|numeric',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'storehouse_place_id' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'good_item_id' => 'nullable|numeric',
        ];

        $data = [
            'order_id' => $this->getOrderId(),
            'measure_unit_id' => $this->getMeasureUnitId(),
            'good_id' => $this->getGoodId(),
            'total_price' => $this->getTotalPrice(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'storehouse_place_id' => $this->getStorehousePlaceId(),
            'currency_id' => $this->getCurrencyId(),
            'good_item_id' => $this->getGoodItemId(),
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
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of measureUnitId
     */
    public function getMeasureUnitId(): string
    {
        return $this->measureUnitId;
    }

    /**
     * Set the value of measureUnitId
     */
    public function setMeasureUnitId(string $measureUnitId): self
    {
        $this->measureUnitId = $measureUnitId;

        return $this;
    }

    /**
     * Get the value of goodId
     */
    public function getGoodId(): int
    {
        return $this->goodId;
    }

    /**
     * Set the value of goodId
     */
    public function setGoodId(int $goodId): self
    {
        $this->goodId = $goodId;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     */
    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = substr($name, 0, 100);

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     */
    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of storehousePlaceId
     */
    public function getStorehousePlaceId(): int
    {
        return $this->storehousePlaceId;
    }

    /**
     * Set the value of storehousePlaceId
     */
    public function setStorehousePlaceId(int $storehousePlaceId): self
    {
        $this->storehousePlaceId = $storehousePlaceId;

        return $this;
    }

    /**
     * Get the value of currencyId
     */
    public function getCurrencyId(): int
    {
        return $this->currencyId;
    }

    /**
     * Set the value of currencyId
     */
    public function setCurrencyId(int $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Get the value of goodItemId
     */
    public function getGoodItemId(): ?int
    {
        return $this->goodItemId;
    }

    /**
     * Set the value of goodItemId
     */
    public function setGoodItemId(?int $goodItemId): self
    {
        $this->goodItemId = $goodItemId;

        return $this;
    }
}
