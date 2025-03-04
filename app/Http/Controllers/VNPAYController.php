<?php

namespace App\Http\Controllers;

use App\Repositories\OrderDetailRepository;
use App\Repositories\TransactionRepository;
use App\Services\VNPAYService;
use Exception;
use Illuminate\Http\Request;

class VNPAYController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function return(Request $request)
    {
        $transactionCode = $request->vnp_TxnRef;
//        $cardType = $request->vnp_CardType;
        $bankCode = $request->vnp_BankCode;
        $transaction = $this->transactionRepository->findByPaymentCode($transactionCode);

        if (!empty($transaction)) {
            return $this->transactionRepository->update(["bank_code" => strtolower($bankCode)], $transaction->id);
        }

        return redirect('/transactions/' . $transaction->id . 'status/');
    }

    public function ipn(Request $request)
    {
        return VNPAYService::ipn($request->all(), $this->transactionRepository);
    }
}
