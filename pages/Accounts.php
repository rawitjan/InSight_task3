<?php 
require_once("../includes/addModules.php");
$title = $l->tr("Accounts");
if (!isset($_GET['page'])) { $page = '';} else { $page = $_GET['page']; };
require_once("../includes/header.php"); 
$query = getProviderPerformance("https://gnfd-testnet-fullnode-tendermint-us.bnbchain.org/cosmos/auth/v1beta1/accounts?pagination.key=".$page."&pagination.limit=20");
?>
<?php echo '<div class="row row-cols-2 row-cols-md-4 g-4 mb-3">';
foreach ($query['accounts'] as $account) {
$accountType = explode(".", $account['@type']);
if ($accountType['3'] == "ModuleAccount") {
    $accountData = $account['base_account'];
} else { $accountData = $account; }?>
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
<?php }; ?>
</div>
<div class="btn-list justify-content-end">
    <a href="/accounts?page=<?=urlencode($query['pagination']['next_key'])?>" class="btn btn-green"><?=$l->tr('Next page')?></a>
</div>
<?php
require_once("../includes/footer.php");

?>