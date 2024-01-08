<?php

namespace Sylapi\Saloon\Destiny\Requests\Goods;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetGoodsRequest extends Request
{
    public ?int $tries = 10;

    public ?int $retryInterval = 500;

    public ?bool $useExponentialBackoff = true;

    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good?_fields='.$this->fields;
    }

    public function __construct(public string $fields = 'id,name,code,tot_price')
    {

    }
}
