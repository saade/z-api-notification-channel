<?php

namespace NotificationChannels\ZApi;

use Illuminate\Notifications\Notification;
use Saade\ZApi\Messages\TextMessage;
use Saade\ZApi\ZApi;

class ZApiChannel
{
    public function __construct(protected ZApi $instance) { }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\ZApi\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if(! $channel = $notifiable->routeNotificationFor('ZApi', $notification)) {
            return;
        }

        $message = TextMessage::to($channel);

        return $this->instance->sendMessage(
            $notification->toZApi($notifiable, $message)
        );
    }
}
