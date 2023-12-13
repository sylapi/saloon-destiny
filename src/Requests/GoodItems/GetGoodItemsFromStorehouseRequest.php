<?php
namespace Sylapi\Saloon\Destiny\Requests\GoodItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetGoodItemsFromStorehouseRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/plugin/savicki/live_storehouse_state?_fields=' . $this->fields . '&id_storehouse_place=' . $this->storehouseId;
    }
    
    /*public function defaultData(): array
    {
        return [
            'date_from' => $this->dateFrom,
            'date_to'   => $this->dateTo,
        ];
    }*/
    
    public function __construct(public int $storehouseId, public string $fields)
    {
        
    }
}