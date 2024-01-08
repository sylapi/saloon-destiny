<?php

declare(strict_types=1);

namespace Sylapi\Saloon\Destiny\DTO;

class GoodItem
{
    public function __construct(
        public string $id,
        public ?string $code,
        public ?string $name,
    ) {
    }
}
