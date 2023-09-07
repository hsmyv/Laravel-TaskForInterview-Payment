<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\Card;
use App\Models\Invoice;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
    public function home()
    {
        $invoice = Invoice::inRandomOrder()->first();
        return view('welcome', ['invoice' => $invoice]);
        session()->forget('invoice_id');
        session()->forget('invoice_amount');  // I also this line in other place and call from it as helper.php
    }

    public function checkout(Invoice $invoice)
    {
        session()->put('invoice_id', $invoice->id);
        session()->put('invoice_amount', $invoice->amount);
        return view('checkout', ['invoice' => $invoice]);
    }

    public function pay(PayRequest $payRequest)
    {

        try {
            $invoiceId = session('invoice_id');
            $invoiceAmount = session('invoice_amount');

            $card = Card::first();
            $payRequest->validated();

            $expiration_date = $payRequest->expiration_date;
            $currentDate = now();

            $parsedExpirationDate = DateTime::createFromFormat('m/y', $expiration_date);

            if (
                $parsedExpirationDate < $currentDate
                || $expiration_date != $card->expiration_date
                || $payRequest->number != $card->number
                || $payRequest->full_name != $card->full_name
                || $payRequest->cvv != $card->cvv
            ) {
                return view('rejected');
                session()->forget('invoice_id');
                session()->forget('invoice_amount');
            } elseif ($invoiceAmount < $card->amount) {

                Payment::create([
                    'user_id' => 1,  // Assuming you have not authenticated the user yet
                    'invoice_id' => $invoiceId,
                    'invoice_amount' => $invoiceAmount,
                    'payment_date' => $currentDate
                ]);
                $userAmount = $card->amount - $invoiceAmount;
                Card::where('user_id', 1)->update(['amount' => $userAmount]);
                session()->forget('invoice_id');
                session()->forget('invoice_amount');


                return view('success');
            } else {
                return view('fail');
                session()->forget('invoice_id');
                session()->forget('invoice_amount');
            }
        } catch (\Exception $th) {
            return view('rejected');
            session()->forget('invoice_id');
            session()->forget('invoice_amount');
        }
    }
}
