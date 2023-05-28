<?php 
require_once("../includes/addModules.php");
$title = $l->tr("Bucket | ").$_GET['title'];

$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage/head_bucket/'.$_GET['title'];
$bucketInfo = getProviderPerformance($providerURL);
$bucket = $bucketInfo['bucket_info'];
if ($bucket['owner'] == '') { header("Location: /noData"); };
require_once("../includes/header.php"); ?>
<div class="row row-cols-2 row-cols-md-6 g-4 mb-3">
    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Owner')?></span>
                <h3 class="text-capitalize"><b><a href="/account/<?=$bucket['owner']?>" class="text-green"><?=getChars($bucket['owner'])?></a></b></h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-binance" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 8l2 2l4 -4l4 4l2 -2l-6 -6z"></path><path d="M6 16l2 -2l4 4l3.5 -3.5l2 2l-5.5 5.5z"></path><path d="M20 10l2 2l-2 2l-2 -2z"></path><path d="M4 10l2 2l-2 2l-2 -2z"></path><path d="M12 10l2 2l-2 2l-2 -2z"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Bucket name')?></span>
                <h3 class="text-capitalize"><b><?=$bucket['bucket_name']?></b></h3>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-accessible" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path><circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Visibility type')?></span>
                <h3 class="text-capitalize"><b><?php if($bucket['visibility'] == 'VISIBILITY_TYPE_PUBLIC_READ'){ echo '<span class="badge bg-green-lt">Public read</span>'; } else { echo '<span class="badge bg-red-lt">Private</span>'; }; ?></b></h3>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hierarchy" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M6.5 17.5l5.5 -4.5l5.5 4.5"></path><path d="M12 7l0 6"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Status')?></span>
                <h3 class="text-capitalize"><b><?php if($bucket['bucket_status'] == 'BUCKET_STATUS_CREATED'){ echo '<span class="badge bg-green-lt">Created</span>'; } else { echo $bucket['bucket_status']; }; ?></b></h3>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hierarchy" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M6.5 17.5l5.5 -4.5l5.5 4.5"></path><path d="M12 7l0 6"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Total size')?></span>
                <h3 class="text-capitalize"><b><?=$bucket['billing_info']['total_charge_size']/1024/1024?> MB</b></h3>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Create at')?></span>
                <h3 class="text-capitalize"><b><?=date('d.m.Y', $bucket['create_at']);?></b></h3>
            </div>
        </div>
    </div>
</div>
<div class="card card-link">
    <div class="card-body">
        <h3 class="card-title"><?=$l->tr('More information')?></h3>
            <div class="list-group list-group-flush overflow-auto fw-bold" style="max-height: 35rem">
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b><?=$l->tr('Payment address')?></b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><a href="/account/<?=$bucket['payment_address']?>" class="text-green"><?=$bucket['payment_address']?></a></div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <b><?=$l->tr('Primary sp address')?></b>
                        </div>
                        <div class="col text-truncate">
                            <div class="text-muted text-truncate mt-n1"><a href="/account/<?=$bucket['primary_sp_address']?>" class="text-green"><?=$bucket['primary_sp_address']?></a></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php
require_once("../includes/footer.php");

?>