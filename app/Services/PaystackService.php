<?php

namespace App\Services;

use Yabacon\Paystack;
use Illuminate\Support\Facades\Config;

class PaystackService
{
    protected $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack( getenv('PAYSTACK_SECRET_KEY'),
);
    }

    public function initiatePayment(array $data)
    {
        try {
            $response = $this->paystack->transaction->initialize([
                'amount' => $data['amount'] * 100, // Convert to kobo
                'email' => $data['email'],
                'reference' => $data['reference'],
                'metadata' => json_encode($data['metadata']),
            ]);
            return $response->data->authorization_url;
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }

    public function verifyPayment(string $reference)
    {
        try {
            return $this->paystack->transaction->verify([
                'reference' => $reference,
            ]);
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }
}
