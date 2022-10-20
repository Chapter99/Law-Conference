<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reviewer;

class InviteReviewerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reviewer $reviewer)
    {
        $this->reviewer = $reviewer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reviewer = $this->reviewer;
        return $this->subject('ขอส่งผลงานเพื่อประเมินคุณภาพในงานประชุมวิชาการระดับชาติทางนิติศาสตร์ ครั้งที่ 1')->view('backend.emails.reviewer', compact('reviewer'));
    }
}
