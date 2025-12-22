<?php

namespace HiEvents\Resources\Attendee;

use HiEvents\DomainObjects\AttendeeDomainObject;
use HiEvents\Resources\Ticket\TicketMinimalResourcePublic;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin AttendeeDomainObject
 */
class AttendeeCheckinLimitedResourcePublic extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'public_id' => $this->getPublicId(),
            'ticket_id' => $this->getTicketId(),
            'ticket_price_id' => $this->getTicketPriceId(),
            'ticket' => $this->when((bool)$this->getTicket(), fn() => new TicketMinimalResourcePublic($this->getTicket())),
        ];
    }
}
