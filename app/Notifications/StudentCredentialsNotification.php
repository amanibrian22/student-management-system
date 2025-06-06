<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentCredentialsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Student Account Login Credentials')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your student account has been created. Here are your login details:')
            ->line('Email: ' . $notifiable->email)
            ->line('Password: ' . $this->password)
            ->line('You can login at: ' . route('login'))
            ->line('Please change your password after first login.')
            ->action('Login Now', route('login'))
            ->line('Thank you for using EduConnect!');
    }
}