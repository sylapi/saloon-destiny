<?php
namespace Sylapi\Saloon\Destiny\Requests\Margins;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetMarginsRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/plugin/savicki/live_order_margin?date_from=' . $this->dateFrom . '&date_to=' . $this->dateTo;
    }
    
    public function __construct(public DateTime $dateFrom, public DateTime $dateTo)
    {
        $this->dateFrom = $dateFrom->format('Y-m-d');
        $this->dateTo = $dateTo->Format('Y-m-d');
    }
}