<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\OrderLine;


class CreateOrderLineRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/order_sale_pos';
    }

    public function __construct(public OrderLine $orderLine)
    {
        
    }

    public function defaultData(): array
    {
        return [
            'id_order_sale_doc' => $this->orderLine->getOrderId(),
            'id_measure_unit' => $this->orderLine->getMeasureUnitId(),
            'id_good' => $this->orderLine->getGoodId(),
            'tot_price' => $this->orderLine->getTotalPrice(),
            'good_name' => $this->orderLine->getName(),
            'quantity' => $this->orderLine->getQuantity(),
            'id_storehouse_place' => $this->orderLine->getStorehousePlaceId(),
            'id_currency' => $this->orderLine->getCurrencyId(),
            'id_good_item' => $this->orderLine->getGoodItemId(),
            'gross_doc' => 1,
        ];
    }
    
}