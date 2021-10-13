<?php

namespace App\Listeners;

use App\Events\SendInvitationMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendInvitationMail  $event
     * @return void
     */
    public function handle(SendInvitationMail $event)
    {
       //dd($event);
//        if ($event->user->active) {
//            return;
//        }
//

      Mail::to($event->user->email)->send(new SendMail($event->user));

//        $user = User::where($event->user->id)->update(['user_send_invitation' =>]);


    }
}
