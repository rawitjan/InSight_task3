<?php 

require_once("includes/addModules.php");
$title = $l->tr("Home");
require_once("includes/header.php");

$providerURL = 'https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/abci_info';
$provider = getProviderPerformance($providerURL);
$buckets = getProviderPerformance('https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage/list_buckets?pagination.limit=5&pagination.reverse=true');

?>
<div class="row mb-3">
    <div class="col-6 col-sm-3 mb-3">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 8l2 2l4 -4l4 4l2 -2l-6 -6z"></path><path d="M6 16l2 -2l4 4l3.5 -3.5l2 2l-5.5 5.5z"></path><path d="M20 10l2 2l-2 2l-2 -2z"></path><path d="M4 10l2 2l-2 2l-2 -2z"></path><path d="M12 10l2 2l-2 2l-2 -2z"></path></svg>                
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Data')?></span>
                <h3 class="text-capitalize"><b><?=$provider['result']['response']['data']?></b></h3>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-3 mb-3">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-api-app" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 15h-6.5a2.5 2.5 0 1 1 0 -5h.5"></path><path d="M15 12v6.5a2.5 2.5 0 1 1 -5 0v-.5"></path><path d="M12 9h6.5a2.5 2.5 0 1 1 0 5h-.5"></path><path d="M9 12v-6.5a2.5 2.5 0 0 1 5 0v.5"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Version')?></span>
                <h3 class=""><b><?=$provider['result']['response']['version']?></b></h3>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-3 mb-3">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-container" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M20 4v.01"></path><path d="M20 20v.01"></path><path d="M20 16v.01"></path><path d="M20 12v.01"></path><path d="M20 8v.01"></path><path d="M8 4m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z"></path><path d="M4 4v.01"></path><path d="M4 20v.01"></path><path d="M4 16v.01"></path><path d="M4 12v.01"></path><path d="M4 8v.01"></path></svg>                
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Last block height')?></span>
                <h3 class=""><b><?=$provider['result']['response']['last_block_height']?></b></h3>
            </div>
        </a>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="col">
        <a class="card card-link">
            <div class="card-body p-3">
                <h5 class="card-title"><?=$l->tr('Bucket Name')?></h5>
                    <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th><?=$l->tr('Bucket Name')?></th>
                                <th><?=$l->tr('Owner')?></th>
                                <th><?=$l->tr('SP')?></th>
                                <th><?=$l->tr('Created')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach ($buckets['bucket_infos'] as $bucket) {
                                $sp = getProviderPerformance('https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/greenfield/storage_provider/'.$bucket['primary_sp_address']);
                                ?>
                                <tr>
                                    <td><a href="/buckets/<?=$bucket['bucket_name']?>" class="text-green"><?=$bucket['bucket_name']?></a></td>
                                    <td><a href="/account/<?=$bucket['owner']?>" class="text-green"><?=getChars($bucket['owner'])?></a></td>
                                    <td><?=$sp['storageProvider']['description']['moniker']?></td>
                                    <td><?=date('d.m.Y', $bucket['create_at']);?></td>
                                </tr>
                            <?php if ($i++ == 5) { break; }; }; ?>
                        </tbody>
                    </table>
                    </div>

            </div>
        </a>
    </div>
</div>
<?php
require_once("includes/footer.php");

?>