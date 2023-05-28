<?php 

require_once("../includes/addModules.php");
$title = $l->tr("Storage Providers");
require_once("../includes/header.php");

$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage_providers';
$providerPerformance = getProviderPerformance($providerURL);
echo '<div class="row">';
foreach ($providerPerformance['sps'] as $SP) {?>
<div class="col-md-6 col-lg-6">
    <div class="card mb-3">
        <div class="card-status-start bg-green"></div>
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <h4 class="nav-link"><b><?=$SP['description']['moniker']?></b></h4>
                </li>
                <li class="nav-item ms-auto">
                    <a class="nav-link" href="/storageProviders/<?=$SP['operator_address']?>"><i class="ti ti-arrow-right h1"></i></a>
                </li>
            </ul>
        </div>
        <div class="card-body p-1">
            <div class="list-group list-group-flush overflow-auto fw-bold" style="max-height: 35rem">
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b>Operator Address</b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><?=$SP['operator_address']?></div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b>Funding Address</b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><?=$SP['funding_address']?></div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b>Seal Address</b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><?=$SP['seal_address']?></div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b>Approval Address</b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><?=$SP['approval_address']?></div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b>Endpoint Address</b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><?=$SP['endpoint']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? };
echo '</div>';
?>
<?php

require_once("../includes/footer.php");

?>