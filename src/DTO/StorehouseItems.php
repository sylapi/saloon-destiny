<?php

declare(strict_types=1);

namespace Sylapi\Saloon\Destiny\DTO;

use Sylapi\Saloon\Destiny\Entities\StorehouseItemsList;

class StorehouseItems
{
    public function __construct(
        public ?StorehouseItemsList $items,
    ) {}
}
