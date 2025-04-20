import {Card} from "../Card";
import {getAttendeeTicketPrice, getAttendeeTicketTitle} from "../../../utilites/tickets.ts";
import {Anchor, Button, CopyButton} from "@mantine/core";
import {formatCurrency} from "../../../utilites/currency.ts";
import {t} from "@lingui/macro";
import {prettyDate} from "../../../utilites/dates.ts";
import QRCode from "react-qr-code";
import {IconCopy, IconDownload, IconPrinter, IconTicket} from "@tabler/icons-react";
import {Attendee, Event, Ticket} from "../../../types.ts";
import classes from './AttendeeTicket.module.scss';

interface AttendeeTicketProps {
    event: Event;
    attendee: Attendee;
    ticket: Ticket;
    hideButtons?: boolean;
}

const downloadQR = async () => {
    const qr = document.getElementById("qrcode");
    const svgData = new XMLSerializer().serializeToString(qr)
    const canvas = document.createElement("canvas")
    const ctx = canvas.getContext("2d")
    const img = new Image();
    img.onload = function () {
        canvas.width = img.width + 40;
        canvas.height = img.height + 40;

        const ctx = canvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Optional: Draw border
        ctx.strokeRect(0, 0, canvas.width, canvas.height);

        // Draw the original image onto the canvas
        ctx.drawImage(img, 20, 20);

        // 🔥 Apply high-contrast filter to the canvas
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const data = imageData.data;

        for (let i = 0; i < data.length; i += 4) {
            const r = data[i];
            const g = data[i + 1];
            const b = data[i + 2];

            const brightness = 0.299 * r + 0.587 * g + 0.114 * b;
            const color = brightness > 128 ? 255 : 0;

            data[i] = color;     // R
            data[i + 1] = color; // G
            data[i + 2] = color; // B
            // Alpha (data[i + 3]) stays the same
        }

        ctx.putImageData(imageData, 0, 0);

        // Convert canvas to PNG
        const pngFile = canvas.toDataURL("image/png", 1.0);

        // Create and click download link
        const downloadLink = document.createElement("a");
        downloadLink.download = "qrcode";
        downloadLink.href = pngFile;
        downloadLink.target = "_blank";
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);

        downloadLink.remove();
    };

// SVG to image
    img.src = "data:image/svg+xml;base64," + btoa(svgData);
}

export const AttendeeTicket = ({attendee, ticket, event, hideButtons = false}: AttendeeTicketProps) => {
    const ticketPrice = getAttendeeTicketPrice(attendee, ticket);

    return (
        <>
            <Card className={classes.attendee}>
                <div className={classes.attendeeInfo}>
                    <div className={classes.attendeeNameAndPrice}>
                        <div className={classes.attendeeName}>
                            <h2>
                                {attendee.first_name} {attendee.last_name}
                            </h2>
                            <div className={classes.ticketName}>
                                {getAttendeeTicketTitle(attendee)}
                            </div>
                            <Anchor href={`mailto:${attendee.email}`}>
                                {attendee.email}
                            </Anchor>
                        </div>
                        <div className={classes.ticketPrice}>
                            <div className={classes.badge}>
                                {ticketPrice > 0 && formatCurrency(ticketPrice, event?.currency)}
                                {ticketPrice === 0 && t`Free`}
                            </div>
                        </div>
                    </div>
                    <div className={classes.eventInfo}>
                        <div className={classes.eventName}>
                            {event?.title}
                        </div>
                        <div className={classes.eventDate}>
                            {prettyDate(event.start_date, event.timezone)}
                        </div>
                    </div>
                </div>
                <div className={classes.qrCode}>
                    <div className={classes.attendeeCode}>
                        {attendee.public_id}
                    </div>

                    <div className={classes.qrImage}>
                        {attendee.status === 'CANCELLED' && (
                            <div className={classes.cancelled}>
                                {t`Cancelled`}
                            </div>
                        )}
                        <div>
                            {attendee.status !== 'CANCELLED' && <QRCode id={"qrcode"} bgColor={'#ffffff'} fgColor={'#000000'} value={String(attendee.public_id)}/>}
                        </div>
                        <div>
                            {attendee.status !== 'CANCELLED' && <Button variant={'transparent'} size={'sm'} onClick={downloadQR}>
                                Download QR-Code
                            </Button> }
                        </div>
                    </div>

                    {!hideButtons && (
                        <div className={classes.ticketButtons}>
                            <Button variant={'transparent'}
                                    size={'sm'}
                                    onClick={() => window?.open(`/ticket/${event.id}/${attendee.short_id}/print`, '_blank', 'noopener,noreferrer')}
                                    leftSection={<IconPrinter size={18}/>
                                    }>
                                {t`Print`}
                            </Button>

                            <CopyButton value={`${window?.location.origin}/ticket/${event.id}/${attendee.short_id}`}>
                                {({copied, copy}) => (
                                    <Button variant={'transparent'}
                                            size={'sm'}
                                            onClick={copy}
                                            leftSection={<IconCopy size={18}/>
                                            }>
                                        {copied ? t`Copied` : t`Copy Link`}
                                    </Button>
                                )}
                            </CopyButton>
                        </div>
                    )}
                </div>
            </Card>
            <Card className={classes.attendee}>
                <div className={classes.sponsorBlock}>
                    <div className={classes.sponsorImagesWrapper}>
                        <div className={classes.sponsorImageElement}>
                            <div>Jetzt LAKE EXPLOSION Super-Early-Bird-Tickets sichern!</div>
                            <div className={classes.ticketButtons}>
                                <Button variant={'transparent'}
                                        size={'sm'}
                                        onClick={() => window?.open(`/event/3/lake-explosion-2025`, '_blank', 'noopener,noreferrer')}
                                        leftSection={<IconTicket size={18}/>
                                    }>
                                    Zum Shop
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </Card>
        </>
    );
}