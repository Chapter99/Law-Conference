<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reviewer;
use App\Models\Paper;

class ReviewerRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reviewer $reviewer, Paper $paper)
    {
        $this->reviewer = $reviewer;
        $this->paper = $paper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reviewer = $this->reviewer;
        $paper = $this->paper;
        return $this->subject('ผู้ทรงคุณวุฒิได้ปฏิเสธการประเมินคุณภาพผลงาน')->view('backend.emails.reviewer_reject')->with(compact('reviewer'))->with(compact('paper'));
    }
}
