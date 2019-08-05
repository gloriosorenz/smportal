<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Carbon;

class OrderConfirmed extends Notification
{
    use Queueable;

    protected $order, $days;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $days)
    {
        $this->order = $order;
        $this->days = $days;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'database',
            'mail'
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Order Confirmed') // it will use this class name if you don't specify
                    // ->greeting('Hello Customer!') // example: Dear Sir, Hello Madam, etc ...
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
                    ->markdown('partials.mail.order_confirmed', [
                                                                'days' => $this->days,
                                                                'order' => $this->order,
                                                                ]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'timeCreated'=> Carbon\Carbon::now()->diffForHumans(),
            'user'=>auth()->user()
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
