<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    public $job_id;
    public $job_name;
    public $user_id;
    public $job_recruiter;

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($job_id, $job_name, $user_id, $job_recruiter)
    {
        $this->job_id = $job_id;
        $this->job_name = $job_name;
        $this->user_id   = $user_id;
        $this->job_recruiter   = $job_recruiter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');

        return (new MailMessage)
            ->line('You have received a new Application')
            ->line('Greetings ' . $this->job_recruiter . ', a new user has applied to "' . $this->job_name . '" ')
            ->action('Show Notifications', $url)
            ->line('Thank you for using DevJobs!');
    }

    /**
     * Stores the Notification in the DB
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'job_id' => $this->job_id,
            'job_name' => $this->job_name,
            'user_id' => $this->user_id
        ];
    }
}
