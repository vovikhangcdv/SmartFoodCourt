<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<div class="card">
    <div class="card-header">
        <h2> <?= $title ?></h2>
        <?php if ($_SESSION['role'] === 0) :?>
        <form class="float-right" action="<?= PATH_INDEX ?>?c=vendor&a=add_vendor" method="POST">
            <div class="float-right">
                <button class="btn btn-sm btn-success" type="submit"> Add New Vendor</button>
            </div>
        </form>
        <?php endif; ?>
        <div class="spinner-border text-success" style="display:none;" id="load_scan" role="status">
            <span class="sr-only">Loading...</span>
        </div>

    </div>
    <form class="float-right" id="delete_challenge" action="<?= PATH_INDEX ?>?c=vendor&a=delete" method="POST">
        <input type='text' name='id' id='input_id_delete' style='display:none' value='a'>
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </form>
    <div class="card-body">
        <?php foreach ($list_vendor as $row): ?>
            <nav aria-label="breadcrumb" role="navigation">
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-success collapsed" type="button" data-toggle="collapse" data-target='#title<?=md5($row['id']) ?>' aria-expanded="false" aria-controls="title<?=md5($row['title']) ?>">Show/Hidden</div>
                </div>
                <div>
                    <h3><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                </div>
            </nav>
            <hr>
            <div class="collapse <?= (isset($collapse_show_id) and ($collapse_show_id == $row['id']))?'show':'' ?>" id="title<?=md5($row['id'])  ?>" style="">
                <dl class="row">
                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></dd>
                </dl>
                <div>
                <img class="center" src="<?= PATH_USER_ASSETS.$row['photo']?>">
                </div>
                <hr>

                <?php if(isset($collapse_show_id) and ($collapse_show_id == $row['id'])): ?>
                    <div style='display:<?=(isset($message) and $message != NULL) ? "block" : "none" ?>'>
                    <br>
                    <div class=<?=$return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?=(isset($message) and $message != NULL) ? $message : "" ?></div>
                    </div>
                <?php endif;?>
                <hr>
            </div>
            <?php endforeach; ?>
    </div>
</div>