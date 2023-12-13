<?php

namespace Sylapi\Saloon\Destiny\Requests\Goods;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\Entities\Good;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Saloon\Traits\Body\HasJsonBody;

class CreateGoodRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good/';
    }

    public function __construct(public Good $good)
    {
        
    }

    public function defaultData(): array
    {
        return $this->good->toArray();
    }
}