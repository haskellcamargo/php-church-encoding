<?php
require_once 'boolean.php';

// Proofing that booleans can be converted from their encoded forms
$proof_boolean_true = $boolean_to_primitive($true);
$proof_boolean_true = $proof_boolean_true(true);
$proof_boolean_true = $proof_boolean_true(false);

$proof_boolean_false = $boolean_to_primitive($false);
$proof_boolean_false = $proof_boolean_false(true);
$proof_boolean_false = $proof_boolean_false(false);
