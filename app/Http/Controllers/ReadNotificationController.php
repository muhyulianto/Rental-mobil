<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReadNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $user = User::where('is_admin', 1)->first()->unreadNotifications;
        $user->where('id', $id)->markAsRead();

        return redirect()->route('payment.show', $request->id_payment);
    }
}
