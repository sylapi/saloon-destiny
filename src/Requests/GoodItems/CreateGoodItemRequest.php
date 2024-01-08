<?php

namespace Sylapi\Saloon\Destiny\Requests\GoodItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\GoodItem;

class CreateGoodItemRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good_item/';
    }

    public function __construct(public GoodItem $goodItem)
    {

    }

    public function defaultData(): array
    {
        return $this->goodItem->toArray();
    }
}
