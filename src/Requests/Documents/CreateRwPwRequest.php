<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\RwPw;

class CreateRwPwRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'plugin/savicki/_tranform_good';
    }

    public function __construct(public RwPw $rwpw)
    {

    }

    public function defaultData(): array
    {
        return [
            'id_storehouse_place_from' => $this->rwpw->getIdStorehousePlaceFrom(),
            'id_storehouse_place_to' => $this->rwpw->getIdStorehousePlaceTo(),
            'in_good' => $this->rwpw->getInGoods(),
            'out_good' => $this->rwpw->getOutGoods(),
            'printed_note' => $this->rwpw->getPrintedNote(),
            'note' => $this->rwpw->getNote(),
        ];
    }
}
