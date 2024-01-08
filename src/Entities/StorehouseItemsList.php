<?php

declare(strict_types=1);

namespace Sylapi\Saloon\Destiny\Entities;

use Sylapi\Saloon\Destiny\DTO\StorehouseItem;

final class StorehouseItemsList
{
    /**
     * @var StorehouseItem[] The storehouseItems
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param  StorehouseItem  ...$storehouseItem The storehouseItems
     */
    public function __construct(StorehouseItem ...$storehouseItem)
    {
        $this->list = $storehouseItem;
    }

    /**
     * Add storehouseItem to list.
     *
     * @param  StorehouseItem  $storehouseItem The storehouseItem
     */
    public function add(StorehouseItem $storehouseItem): void
    {
        $this->list[] = $storehouseItem;
    }

    /**
     * Get all storehouseItems.
     *
     * @return StorehouseItem[] The storehouseItems
     */
    public function all(): array
    {
        return $this->list;
    }
}
