<?php

namespace App\Listeners;

use App\Events\FeedbackMail;
use Mail;
use App\Events\UserApprove;
use Log;

class FeedbackMailListener
{

    /**
     * Handle the event.
     *
     * @param  FeedbackMail  $event
     * @return void
     */
    public function handle(FeedbackMail $event)
    {
        Log::info($event->data);
        $data = $event->data;

        Mail::send('emails.feedback-email', $data, function($message) use ($data) {
            $message->from('bajraprabin100@gmail.com','Info Admin');
            $message->to($data['to_email'])
                ->subject($data['subject']);
        });
    }
}
