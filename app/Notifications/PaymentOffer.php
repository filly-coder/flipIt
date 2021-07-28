<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Helpers\UrlGen;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class PaymentOffer extends Notification implements ShouldQueue
{
    use Queueable, SendGrid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $post;
    public $data;
    public function __construct(Post $post, $data)
    {
        $this->post = $post;
        $this->data = $data;
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
        $postUrl = UrlGen::post($this->post);
        
        return (new MailMessage)
            ->subject( Str::limit($this->post->title, 50).'has a new offer')
            ->greeting('New Offer')
            ->line($this->data['name'].' has made a new offer on the post below')
            ->line('Your ad <a href="'.$postUrl.'">'.$this->post->title.'</a> has an offer.')
            ->line("trasaction details\n Email: ".$this->data['email']."\n Amount: $".$this->data['amount'])
            ->line(trans('mail.post_activated_content_4', ['appName' => config('app.name')]));
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
