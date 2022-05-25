<?php
require('stripe-php-master/init.php');
include 'include/config.php';
$selectdoc="SELECT * FROM `doctor`";
$selectdocResult=mysqli_query($con,$selectdoc);
$Row=mysqli_fetch_array($selectdocResult);
$docId=$Row['doc_fees'];
$payAmount = $docId*100;

$publishableKey ="pk_test_51K11OHSFHDpkU75oxafEhihYHev8HCvCLTitJDrRi4yB8Z9Jxacx1ooC3eOQULFq8qTKaGJnmySzbf6BsU4o0wqw00laSSFlBI";
$secretKey ="sk_test_51K11OHSFHDpkU75ouE70F8e7t0e3A1DZgk3gEkI0y9bOkn1PiDSbCBhXBzbrHOr9miNHhYp9IA9SInN2QcfxzoJg00xHyAgRmP";
\Stripe\Stripe::setApiKey($secretKey);
