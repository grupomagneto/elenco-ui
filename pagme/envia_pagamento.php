<?php
    require("pagarme-php/Pagarme.php");

    PagarMe::setApiKey("ak_test_grXijQ4GicOa2BLGZrDRTR5qNQxJW0");

    $transaction = new PagarMe_Transaction(array(
        'amount' => 1000,
        'card_hash' => "{CARD_HASH}",
        'installments' => 1,
		'payment_method' =>	'credit_card',
		'postback_url' => 'http://seusite.com/payments/2718/confirma.php',
		'soft_descriptor' => 'Profissional',
		'capture' => true
    ));

    $transaction->charge();

    $status = $transaction->status; // status da transação
?>