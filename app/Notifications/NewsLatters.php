<?php

namespace App\Notifications;

use App\Models\Artigo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewsLatters extends Notification
{
    use Queueable;
    private Artigo $artigo;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Artigo $artigo)
    {
        //
        $this->artigo = $artigo;
        $this->afterCommit();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject($this->artigo->titulo)->
        markdown('mail.newslatters',['url'=>url('/artigo/'.$this->artigo->id),'artigo'=>$this->artigo]);
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
