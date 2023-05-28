<?php 

require_once("../includes/addModules.php");
$title = "Buckets";
require_once("../includes/header.php");
$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/abci_info';
$provider = getProviderPerformance($providerURL);
$buckets = getProviderPerformance('https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage/list_buckets?pagination.reverse=true'); 

$pagedArray = array_chunk($originalArray, 10, true);
$nthPage = $pagedArray[$pageNumber];?>
<div class="row row-cols-1 row-cols-md-2 g-4">
<?php 
foreach ($buckets['bucket_infos'] as $bucket) { ?>
<div class="col">
    <div class="card card-link">
        <div class="card-header p-3">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item"><h5 class="card-title"><b><?=$bucket['bucket_name']?></b></h5></li>
                <li class="nav-item ms-auto"><a class="nav-link" href=""><i class="ti ti-arrow-right h1"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
</div>
<pre>
    <?=print_r($buckets);?>
</pre>
<?php

require_once("../includes/footer.php");

?>