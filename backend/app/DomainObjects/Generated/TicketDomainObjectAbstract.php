<?php

namespace HiEvents\DomainObjects\Generated;

/**
 * THIS FILE IS AUTOGENERATED - DO NOT EDIT IT DIRECTLY.
 * @package HiEvents\DomainObjects\Generated
 */
abstract class TicketDomainObjectAbstract extends \HiEvents\DomainObjects\AbstractDomainObject
{
    final public const SINGULAR_NAME = 'ticket';
    final public const PLURAL_NAME = 'tickets';
    final public const ID = 'id';
    final public const EVENT_ID = 'event_id';
    final public const TITLE = 'title';
    final public const SALE_START_DATE = 'sale_start_date';
    final public const SALE_END_DATE = 'sale_end_date';
    final public const MAX_PER_ORDER = 'max_per_order';
    final public const DESCRIPTION = 'description';
    final public const MIN_PER_ORDER = 'min_per_order';
    final public const SALES_VOLUME = 'sales_volume';
    final public const SALES_TAX_VOLUME = 'sales_tax_volume';
    final public const HIDE_BEFORE_SALE_START_DATE = 'hide_before_sale_start_date';
    final public const HIDE_AFTER_SALE_END_DATE = 'hide_after_sale_end_date';
    final public const HIDE_WHEN_SOLD_OUT = 'hide_when_sold_out';
    final public const SHOW_QUANTITY_REMAINING = 'show_quantity_remaining';
    final public const IS_HIDDEN_WITHOUT_PROMO_CODE = 'is_hidden_without_promo_code';
    final public const ORDER = 'order';
    final public const CREATED_AT = 'created_at';
    final public const UPDATED_AT = 'updated_at';
    final public const DELETED_AT = 'deleted_at';
    final public const TYPE = 'type';
    final public const IS_HIDDEN = 'is_hidden';
    final public const START_COLLAPSED = 'start_collapsed';

    protected int $id;
    protected int $event_id;
    protected string $title;
    protected ?string $sale_start_date = null;
    protected ?string $sale_end_date = null;
    protected ?int $max_per_order = null;
    protected ?string $description = null;
    protected ?int $min_per_order = null;
    protected float $sales_volume = 0.0;
    protected float $sales_tax_volume = 0.0;
    protected bool $hide_before_sale_start_date = false;
    protected bool $hide_after_sale_end_date = false;
    protected bool $hide_when_sold_out = false;
    protected bool $show_quantity_remaining = false;
    protected bool $is_hidden_without_promo_code = false;
    protected int $order;
    protected string $created_at;
    protected ?string $updated_at = null;
    protected ?string $deleted_at = null;
    protected string $type = 'PAID';
    protected ?bool $is_hidden = false;
    protected bool $start_collapsed = false;

    public function toArray(): array
    {
        return [
                    'id' => $this->id ?? null,
                    'event_id' => $this->event_id ?? null,
                    'title' => $this->title ?? null,
                    'sale_start_date' => $this->sale_start_date ?? null,
                    'sale_end_date' => $this->sale_end_date ?? null,
                    'max_per_order' => $this->max_per_order ?? null,
                    'description' => $this->description ?? null,
                    'min_per_order' => $this->min_per_order ?? null,
                    'sales_volume' => $this->sales_volume ?? null,
                    'sales_tax_volume' => $this->sales_tax_volume ?? null,
                    'hide_before_sale_start_date' => $this->hide_before_sale_start_date ?? null,
                    'hide_after_sale_end_date' => $this->hide_after_sale_end_date ?? null,
                    'hide_when_sold_out' => $this->hide_when_sold_out ?? null,
                    'show_quantity_remaining' => $this->show_quantity_remaining ?? null,
                    'is_hidden_without_promo_code' => $this->is_hidden_without_promo_code ?? null,
                    'order' => $this->order ?? null,
                    'created_at' => $this->created_at ?? null,
                    'updated_at' => $this->updated_at ?? null,
                    'deleted_at' => $this->deleted_at ?? null,
                    'type' => $this->type ?? null,
                    'is_hidden' => $this->is_hidden ?? null,
                    'start_collapsed' => $this->start_collapsed ?? null,
                ];
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setEventId(int $event_id): self
    {
        $this->event_id = $event_id;
        return $this;
    }

    public function getEventId(): int
    {
        return $this->event_id;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setSaleStartDate(?string $sale_start_date): self
    {
        $this->sale_start_date = $sale_start_date;
        return $this;
    }

    public function getSaleStartDate(): ?string
    {
        return $this->sale_start_date;
    }

    public function setSaleEndDate(?string $sale_end_date): self
    {
        $this->sale_end_date = $sale_end_date;
        return $this;
    }

    public function getSaleEndDate(): ?string
    {
        return $this->sale_end_date;
    }

    public function setMaxPerOrder(?int $max_per_order): self
    {
        $this->max_per_order = $max_per_order;
        return $this;
    }

    public function getMaxPerOrder(): ?int
    {
        return $this->max_per_order;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setMinPerOrder(?int $min_per_order): self
    {
        $this->min_per_order = $min_per_order;
        return $this;
    }

    public function getMinPerOrder(): ?int
    {
        return $this->min_per_order;
    }

    public function setSalesVolume(float $sales_volume): self
    {
        $this->sales_volume = $sales_volume;
        return $this;
    }

    public function getSalesVolume(): float
    {
        return $this->sales_volume;
    }

    public function setSalesTaxVolume(float $sales_tax_volume): self
    {
        $this->sales_tax_volume = $sales_tax_volume;
        return $this;
    }

    public function getSalesTaxVolume(): float
    {
        return $this->sales_tax_volume;
    }

    public function setHideBeforeSaleStartDate(bool $hide_before_sale_start_date): self
    {
        $this->hide_before_sale_start_date = $hide_before_sale_start_date;
        return $this;
    }

    public function getHideBeforeSaleStartDate(): bool
    {
        return $this->hide_before_sale_start_date;
    }

    public function setHideAfterSaleEndDate(bool $hide_after_sale_end_date): self
    {
        $this->hide_after_sale_end_date = $hide_after_sale_end_date;
        return $this;
    }

    public function getHideAfterSaleEndDate(): bool
    {
        return $this->hide_after_sale_end_date;
    }

    public function setHideWhenSoldOut(bool $hide_when_sold_out): self
    {
        $this->hide_when_sold_out = $hide_when_sold_out;
        return $this;
    }

    public function getHideWhenSoldOut(): bool
    {
        return $this->hide_when_sold_out;
    }

    public function setShowQuantityRemaining(bool $show_quantity_remaining): self
    {
        $this->show_quantity_remaining = $show_quantity_remaining;
        return $this;
    }

    public function getShowQuantityRemaining(): bool
    {
        return $this->show_quantity_remaining;
    }

    public function setIsHiddenWithoutPromoCode(bool $is_hidden_without_promo_code): self
    {
        $this->is_hidden_without_promo_code = $is_hidden_without_promo_code;
        return $this;
    }

    public function getIsHiddenWithoutPromoCode(): bool
    {
        return $this->is_hidden_without_promo_code;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setDeletedAt(?string $deleted_at): self
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setIsHidden(?bool $is_hidden): self
    {
        $this->is_hidden = $is_hidden;
        return $this;
    }

    public function getIsHidden(): ?bool
    {
        return $this->is_hidden;
    }

    public function setStartCollapsed(bool $start_collapsed): self
    {
        $this->start_collapsed = $start_collapsed;
        return $this;
    }

    public function getStartCollapsed(): bool
    {
        return $this->start_collapsed;
    }
}
