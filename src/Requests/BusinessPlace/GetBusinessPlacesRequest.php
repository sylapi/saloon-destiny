<?php
namespace Sylapi\Saloon\Destiny\Requests\BusinessPlace;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetBusinessPlacesRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/business_place';
    }
}