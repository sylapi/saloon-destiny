<?php

declare(strict_types=1);

namespace Sylapi\Saloon\Destiny\DTO;

final class StorehouseItem
{
    public function __construct(
        public string $goodItemId,
        public string $goodId,
        public string $quantity,
        public string $availableQuantity,
        public ?string $defaultSize,
        public ?string $defaultFineness,
        /**
         * @var array<string, mixed>
         */
        public ?array $params,
        public ?string $ean
    ) {
    }
}
