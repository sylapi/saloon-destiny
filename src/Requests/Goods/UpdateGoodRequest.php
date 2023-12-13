<?php

namespace Sylapi\Saloon\Destiny\Requests\Goods;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\Entities\Good;
use Sylapi\Saloon\Destiny\DestinyConnector;

class UpdateGoodRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good/' . $this->goodId;
    }

    public function __construct(public int $goodId, public Good $good)
    {
        
    }

    public function defaultData(): array
    {
        return $this->good->toArray();
    }
    
}