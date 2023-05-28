<?php 
require_once("../includes/addModules.php");
$title = $l->tr("Account | ").$_GET['address'];
$address = $_GET['address'];
$query = getProviderPerformance("https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/cosmos/auth/v1beta1/accounts/".$address);
$account = $query['account'];
if ($account == []) { header("Location: /noData"); };
require_once("../includes/header.php"); 

$balance = getProviderPerformance("https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/cosmos/bank/v1beta1/balances/".$address."/by_denom?denom=BNB")?>
<?php 
$accountType = explode(".", $account['@type']);
if ($accountType['3'] == "ModuleAccount") {
    $accountData = $account['base_account'];
} else { $accountData = $account; }?>
<div class="row row-cols-2 row-cols-md-4 g-4 mb-3">
    <div class="col">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-binance" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 8l2 2l4 -4l4 4l2 -2l-6 -6z"></path><path d="M6 16l2 -2l4 4l3.5 -3.5l2 2l-5.5 5.5z"></path><path d="M20 10l2 2l-2 2l-2 -2z"></path><path d="M4 10l2 2l-2 2l-2 -2z"></path><path d="M12 10l2 2l-2 2l-2 -2z"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Balance')?></span>
                <h3 class="text-capitalize"><b><?=number_format($balance['balance']['amount']/1000000000000000000, 3, '.', ' ');?> BNB</b></h3>
            </div>
        </a>
    </div>
    <div class="col">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-123" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 10l2 -2v8"></path><path d="M9 8h3a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3"></path><path d="M17 8h2.5a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1 -1.5 1.5h-1.5h1.5a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1 -1.5 1.5h-2.5"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Account number')?></span>
                <h3 class="text-capitalize"><b>#<?=$accountData['account_number']?></b></h3>
            </div>
        </a>
    </div>
    <div class="col">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Account Type')?></span>
                <h3 class="text-capitalize"><b><?=$accountType['3']?></b></h3>
            </div>
        </a>
    </div>
    <div class="col">
        <a class="card card-link">
            <div class="card-stamp">
                <div class="card-stamp-icon bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </div>
            </div>
            <div class="card-body p-3 lh-1">
                <span class="text-muted"><?=$l->tr('Account Type')?></span>
                <h3 class="text-capitalize"><b><?=$accountType['3']?></b></h3>
            </div>
        </a>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="avatar avatar-xl rounded"><?=$accountData['account_number']?></span>
                </div>
                <div class="card-title mb-1"><?=getChars($accountData['address'])?></div>
                <div class="text-muted"><?=$accountType[3]?></div>
            </div>
            <a href="/account/<?=$accountData['address']?>" class="card-btn"><?=$l->tr("View account")?></a>
        </div>
    </div>
</div>
<?php
require_once("../includes/footer.php");

?>