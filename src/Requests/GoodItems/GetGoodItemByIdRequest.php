<?php

namespace Sylapi\Saloon\Destiny\Requests\GoodItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\DTO\GoodItem;
use Sylapi\Saloon\Destiny\Exceptions\GetGoodItemException;

class GetGoodItemByIdRequest extends Request
{
    public ?int $tries = 10;

    public ?int $retryInterval = 500;

    public ?bool $useExponentialBackoff = true;

    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/good_item/'.$this->id;
    }

    public function __construct(public int $id)
    {

    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();
        $item = $data['json_data']['_rows'][0] ?? null;

        if (! $item) {
            throw new GetGoodItemException('Item not found');
        }

        if (! isset($item['code'])) {
            throw new GetGoodItemException('Item code is missing');
        }

        return new GoodItem(
            code: $item['code'],
            name: $item['name'],
        );
    }
}
