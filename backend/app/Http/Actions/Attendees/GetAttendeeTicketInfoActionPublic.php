<?php

namespace HiEvents\Http\Actions\Attendees;

use HiEvents\DomainObjects\Generated\AttendeeDomainObjectAbstract;
use HiEvents\DomainObjects\TicketDomainObject;
use HiEvents\DomainObjects\TicketPriceDomainObject;
use HiEvents\Http\Actions\BaseAction;
use HiEvents\Repository\Eloquent\Value\Relationship;
use HiEvents\Repository\Interfaces\AttendeeRepositoryInterface;
use HiEvents\Resources\Attendee\AttendeeCheckinLimitedResourcePublic;
use HiEvents\Resources\Attendee\AttendeeResourcePublic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GetAttendeeTicketInfoActionPublic extends BaseAction
{
    private AttendeeRepositoryInterface $attendeeRepository;

    public function __construct(AttendeeRepositoryInterface $attendeeRepository)
    {
        $this->attendeeRepository = $attendeeRepository;
    }

    /**
     * @todo move to handler
     */
    public function __invoke(string $attendeePublicId): JsonResponse|Response
    {
        $attendee = $this->attendeeRepository
            ->loadRelation(new Relationship(
                domainObject: TicketDomainObject::class,
                nested: [
                    new Relationship(
                        domainObject: TicketPriceDomainObject::class,
                    ),
                ], name: 'ticket'))
            ->findFirstWhere([
                AttendeeDomainObjectAbstract::PUBLIC_ID => $attendeePublicId
            ]);

        if (!$attendee) {
            return $this->notFoundResponse();
        }

        return $this->resourceResponse(AttendeeCheckinLimitedResourcePublic::class, $attendee);
    }
}
