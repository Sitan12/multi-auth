<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Notifications\Notification;

class CommandNotification extends Notification
{
    public $commande;
    use Queueable;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

 
    public function toArray($notifiable)
    {
        return [
            'restaurant' => $this->commande->restaurant_id,
            'livreur' => $this->commande->livreur_id,
            
        ];
    }
}
