<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $other)
    {
        $this->other = $other->latest()->first();

        // $orders->transform(function($order, $key){
        //     $order->cart = unserialize($order->cart);
        //     return $order;
        // });
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->other->email, $this->other->name)
        ->subject('Invoice')
        ->view('emails.orders.mailorder')
        ->with([
            'orderAddress' => $this->other->address,
            'discount' => $this->other->discount,
            'phone_number' => $this->other->phone_number,
            'id' => $this->other->payment_id,
            'date' => $this->other->created_at->toFormattedDateString(),
            'orderProduct' => unserialize($this->other->cart),
        ]);

        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
            ->addTextHeader('Custom-Header', 'HeaderValue');
        });

    }
}
