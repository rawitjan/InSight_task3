<?php 
require_once("../includes/addModules.php");
$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage_provider/'.$_GET['address'];
$providerPerformance = getProviderPerformance($providerURL);
$title = $l->tr("Storage Providers").' / '.$providerPerformance['storageProvider']['description']['moniker'];
if (!$providerPerformance['storageProvider']) {
    header("Location: /noData");
};
require_once("../includes/header.php");
$SP = $providerPerformance['storageProvider'];?>
<div class="row mb-3">
    <div class="col-6 col-sm-3 mb-3 h-100">
        <a class="card card-link">
            <div class="card-status-start bg-green"></div>
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hierarchy" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M6.5 17.5l5.5 -4.5l5.5 4.5"></path><path d="M12 7l0 6"></path></svg>                
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Status')?></span>
                <h3 class="text-capitalize"><b><?=$SP['status']?></b></h3>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-3 mb-3 h-100">
        <a class="card card-link">
            <div class="card-status-start bg-green"></div>
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path><path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path><path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path><path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path><path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path><path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path><path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path><path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path><path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Endpoint')?></span>
                <h3 class=""><b><?=$SP['endpoint']?></b></h3>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-3 mb-3 h-100">
        <a class="card card-link">
            <div class="card-status-start bg-green"></div>
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-binance" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 8l2 2l4 -4l4 4l2 -2l-6 -6z"></path><path d="M6 16l2 -2l4 4l3.5 -3.5l2 2l-5.5 5.5z"></path><path d="M20 10l2 2l-2 2l-2 -2z"></path><path d="M4 10l2 2l-2 2l-2 -2z"></path><path d="M12 10l2 2l-2 2l-2 -2z"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Deposit')?></span>
                <h3 class=""><b><?=$SP['total_deposit']/1000000000000000000?></b></h3>
            </div>
        </a>
    </div>
</div>
<div class="row">
<div class="col">
    <div class="card mb-3">
        <div class="card-status-start bg-green"></div>
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
<? 
echo '</div>';
?>
<?php

require_once("../includes/footer.php");

?>