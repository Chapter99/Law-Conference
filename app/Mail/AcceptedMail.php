<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Paper;

class AcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Paper $paper)
    {
        $this->user = $user;
        $this->paper = $paper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $paper = $this->paper;
        return $this->subject('แจ้งผลการประเมินผลงาน ในงานประชุมวิชาการระดับชาติทางนิติศาสตร์ ครั้งที่ 1')->view('backend.emails.accepted')->with(compact('user'))->with(compact('paper'));
    }
}
