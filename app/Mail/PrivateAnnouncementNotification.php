<?php

namespace App\Mail;

use App\Models\PrivateAnnouncement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrivateAnnouncementNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $announcement;

    public function __construct(PrivateAnnouncement $announcement)
    {
        $this->announcement = $announcement;
    }

    public function build()
    {
        return $this->subject('New Private Announcement: ' . $this->announcement->title)
                    ->view('emails.private_announcement');
    }
}