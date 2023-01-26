<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class PaystackWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        abort_unless(403, in_array($request->ip, [
            '52.214.14.220', '52.49.173.169', '52.31.139.75', '127.0.0.1'
        ]));

        if ($request->event == 'charge.success') {
            Subscription::where('reference', $request->input('data.reference'))->first()->markAsPaid();
        }
    }
}
