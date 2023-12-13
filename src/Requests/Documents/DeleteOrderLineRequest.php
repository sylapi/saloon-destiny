<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;


class DeleteOrderLineRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/order_sale_pos/' . $this->orderLineId;
    }

    public function __construct(public int $orderLineId)
    {
        
    }

    public function defaultData(): array
    {
        return [];
    }
    
}