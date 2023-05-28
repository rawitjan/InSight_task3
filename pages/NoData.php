<?php 
require_once("../includes/addModules.php");
$title = $l->tr("NoData");
require_once("../includes/header.php");
?>
<div class="container-tight py-4">
    <div class="empty">
        <div class="empty-header"><svg xmlns="http://www.w3.org/2000/svg" class="icon fs-1" width="128" height="128" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path><path d="M10 13v.01"></path><path d="M10 7v3"></path></svg></div>
        <p class="empty-title"><?=$l->tr('No data')?></p>
        <p class="empty-subtitle text-muted"><?=$l->tr('No data available.')?></p>
        <div class="empty-action">
            <a href="/" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
              <?=$l->tr('Take me home')?>
            </a>
        </div>
    </div>
</div>
<?php
require_once("../includes/footer.php");

?>