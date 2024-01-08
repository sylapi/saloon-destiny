<?php

namespace Sylapi\Saloon\Destiny\Requests\GoodItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetGoodItemRequest extends Request
{
    public ?int $tries = 10;

    public ?int $retryInterval = 500;

    public ?bool $useExponentialBackoff = true;

    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good_item?'.http_build_query($this->params);
    }

    public function __construct(public array $params)
    {

    }
}
