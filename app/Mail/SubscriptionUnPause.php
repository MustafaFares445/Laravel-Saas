<?php

namespace App\Mail;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionUnPause extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Plan $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Subscription un-paused')
            ->view('emails.subscription_un_paused')
            ->with([
                'user' => $this->user,
                'plan' => $this->plan
            ]);
    }
}
