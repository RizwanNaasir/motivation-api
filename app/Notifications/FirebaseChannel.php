<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Exception\RuntimeException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseChannel
{
    public Messaging $messaging;

    public function __construct()
    {
        $this->messaging = $this->connect();
    }

    /**
     * Send the given notification.
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toFirebase($notifiable);
        /** @var User $notifiable */
        $deviceToken = $notifiable->device_token;
        if (!isset($deviceToken)) {
            throw new RuntimeException('device_token not set for this user: '. $notifiable->full_name);
        }
        $this->messaging->send(
            message: CloudMessage::withTarget('token', $deviceToken)
                ->withNotification($message)
                ->withData($message['data'] ?? [])
        );
    }
    public function connect(): Messaging
    {
        $firebase = (new Factory)->withServiceAccount(base_path(config('services.firebase.credentials')));
        return $firebase->createMessaging();
    }
}
