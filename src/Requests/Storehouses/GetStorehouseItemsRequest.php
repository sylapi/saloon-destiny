<?php

namespace Sylapi\Saloon\Destiny\Requests\Storehouses;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\DTO\StorehouseItem;
use Sylapi\Saloon\Destiny\DTO\StorehouseItems;
use Sylapi\Saloon\Destiny\Entities\StorehouseItemsList;
use Sylapi\Saloon\Destiny\Exceptions\GetStorehouseItemsException;

class GetStorehouseItemsRequest extends Request
{
    public ?int $tries = 10;

    public ?int $retryInterval = 500;

    public ?bool $useExponentialBackoff = true;

    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    /**
     * @var array<int,string>
     */
    private array $finenesses = [
        8589935783 => '999',
        8589935784 => '750',
        8589935785 => '585',
        8589935786 => '375',
        8589935787 => '333',
        8589935797 => '925',
        8589936041 => '950',
    ];

    public function __construct(public string $storehouseId)
    {

    }

    public function resolveEndpoint(): string
    {
        return 'm/plugin/savicki/live_storehouse_state?_fields=id_storehouse_place,quantity,ean,quantity_reserved,quantity_avaible,id_good,good_item&id_storehouse_place='.$this->storehouseId;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();

        if (isset($data['result_code']) && ! isset($data['result_message'])) {
            $items = $data['json_data'] ?? null;

            if (! $items) {
                throw new GetStorehouseItemsException('Empty stock.');
            }

            $storehouseItemsList = $this->getStorehouseItemsList($items);

            return new StorehouseItems($storehouseItemsList);
        } else {
            throw new GetStorehouseItemsException('Error while getting good items from storehouse. Error message: '.$data['result_message']);
        }

    }

    /**
     * @param  array<int,mixed>  $data
     */
    private function getStorehouseItemsList(array $data): StorehouseItemsList
    {
        $storehouseItemsList = new StorehouseItemsList();

        foreach ($data as $item) {
            $storehouseItem = new StorehouseItem($item['id_good_item'], $item['id_good'], $item['quantity'], $item['quantity_avaible'], $item['good_item.size'] ?? null, $this->mapFineness((int) ($item['good_item.id_sys_const_list-jeweler_assay'] ?? 8589935785)), $item['good_item.params'] ?? null, $item['good_item.ean'] ?? null, null);

            $storehouseItemsList->add($storehouseItem);
        }

        return $storehouseItemsList;
    }

    private function mapFineness(int $fineness): ?string
    {
        return $this->finenesses[$fineness] ?? null;
    }
}
