<?php
namespace Sylapi\Saloon\Destiny\Requests\Warehouses;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetWarehouseItemsRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function __construct(public string $warehouseId)
    {
        
    }

    public function resolveEndpoint(): string
    {
        return 'm/plugin/savicki/live_storehouse_state?_fields=id_storehouse_place,quantity,ean,quantity_reserved,quantity_avaible,id_good,good_item&id_storehouse_place=' . $this->warehouseId;
    }
}