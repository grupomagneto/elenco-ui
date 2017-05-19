<?php
    require("pagarme-php/Pagarme.php");

    Pagarme::setApiKey("ek_test_Ec8KhxISQ1tug1b8bCGxC2nXfxqRmk");

    $transaction = PagarMe_Transaction::findById("{TOKEN}");
    $transaction->capture(19900);
?>