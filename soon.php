<?php 
require_once("../includes/addModules.php");
$title = $l->tr("Home");
require_once("../includes/header.php");

$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/block_results';
$providerPerformance = getProviderPerformance($providerURL);
?>
<pre><?=print_r($providerPerformance)?></pre>
<?php
require_once("../includes/footer.php");

?>STATUS_IN_SERVICE:"STATUS_IN_SERVICE",STATUS_IN_JAILED:"STATUS_IN_JAILED",STATUS_GRACEFUL_EXITING:"STATUS_GRACEFUL_EXITING",STATUS_OUT_OF_SERVICE:"STATUS_OUT_OF_SERVICE"