<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayAzaPaymentController extends Controller
{
    public function createVirtualAccount(Request $request)
    {
        $response = Http::withHeaders([
            "Authorization" => "Payaza UFo3OC1QS0xJVkUtMEUzRUVCRjYtQjU4Qi00REQyLTlDNzgtOTlEMUU2MTk0NUY4"
        ])->post("https://router-live.78financials.com/api/request/secure/payloadhandler", [
            "service_type" => "Account",
            "service_payload" => [
                "request_application" => "Payaza",
                "application_module" => "USER_MODULE",
                "application_version" => "1.0.0",
                "request_class" => "MerchantCreateVirtualAccount",
                "customer_first_name" => "Samuel",
                "customer_last_name" => "Mashok",
                "customer_email" => "samuelmashok@gmail.com",
                "customer_phone" => "07038020172",
                "virtual_account_provider" => "Providus",
                "payment_amount" => 1000,
                "payment_reference" => uniqid('sm')
            ]
        ])->throw();

        Log::info(json_decode($response->body(), true));

        return Response::api("Virtual Account created successfully");
    }

    public function getVirtualAccountDetails($id)
    {
        $response = Http::withHeaders([
            "Authorization" => "Payaza UFo3OC1QS0xJVkUtMEUzRUVCRjYtQjU4Qi00REQyLTlDNzgtOTlEMUU2MTk0NUY4"
        ])->post("https://router-live.78financials.com/api/request/secure/payloadhandler", [
            "service_type" => "Account",
             "service_payload" => [
                "request_application" => "Payaza",
                "application_module" => "USER_MODULE",
                "application_version" => "1.0.0",
                "request_class" => "GetAccountDetailsStaticAndDynamic",
                "virtual_account_number" => $id
             ]
        ])->throw();

        Log::info(json_decode($response->body(), true));

        return Response::api("Virtual Account created successfully");
    }

    public function createReservedAccount(Request $request)
    {
        $response = Http::withHeaders([
            "Authorization" => "Payaza UFo3OC1QS0xJVkUtMEUzRUVCRjYtQjU4Qi00REQyLTlDNzgtOTlEMUU2MTk0NUY4"
        ])->post("https://router-live.78financials.com/api/request/secure/payloadhandler", [
            "service_type" => "Account",
            "service_payload" => [
                "request_application" => "Payaza",
                "application_module" => "USER_MODULE",
                "application_version" => "1.0.0",
                "request_class" => "CreateReservedAccountForCustomers",
                "customer_first_name" => "Samuel",
                "customer_last_name" => "Mashok",
                "customer_email" => "samuelmashok@gmail.com",
                "customer_phone" => "07038020172",
                "virtual_account_provider" => "Providus"
            ]
        ])->throw();

        Log::info(json_decode($response->body(), true));

        return Response::api("Virtual Account created successfully");
    }

    public function getReservedTransactionHistory($id)
    {
        $response = Http::withHeaders([
            "Authorization" => "Payaza UFo3OC1QS0xJVkUtMEUzRUVCRjYtQjU4Qi00REQyLTlDNzgtOTlEMUU2MTk0NUY4"
        ])->post("https://router-live.78financials.com/api/request/secure/payloadhandler", [
            "service_type" => "Account",
            "service_payload" => [
                "request_application" => "Payaza",
                "application_module" => "USER_MODULE",
                "application_version" => "1.0.0",
                "request_class" => "GetTransactionHistoryStaticAccountRequest",
                "static_account_number" => $id,
                "start_date" => "01-01-2022",
                "end_date" => "17-12-2022",
                "order" => "desc",
                "page" => 1
            ]
        ])->throw();

        Log::info(json_decode($response->body(), true));

        return Response::api("Virtual Account created successfully");
    }
}
