<?php

namespace Sylapi\Saloon\Destiny\Requests\GoodItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;

class UpdateGoodItemRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good_item/'.$this->goodItemId;
    }

    public function __construct(public int $goodItemId, public array $goodItemData)
    {

    }

    public function defaultData(): array
    {
        return $this->goodItemData;
    }
}
