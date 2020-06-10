<div class="card">
    <div class="card-header">
        <h2> <?= $title ?></h2>
        <?php if ($_SESSION['role'] !== 2) :?>
        <form class="float-right" action="../index.php?c=challenge&a=add_challenge" method="POST">
            <div class="float-right">
                <button class="btn btn-sm btn-success" type="submit"> Create Challenge</button>
            </div>
        </form>
        <?php endif; ?>
        <div class="spinner-border text-success" style="display:none;" id="load_scan" role="status">
            <span class="sr-only">Loading...</span>
        </div>

    </div>
    <form class="float-right" id="delete_challenge" action="../index.php?c=challenge&a=delete" method="POST">
        <input type='text' name='id' id='input_id_delete' style='display:none' value='a'>
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </form>
    <div class="card-body">
        <?php foreach ($list_challenge as $row): ?>
            <nav aria-label="breadcrumb" role="navigation">
                <?php if($_SESSION['role'] !== 2): ?>
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-danger" onclick="toggle('delete_challenge','<?=$row['id'] ?>','input_id_delete')" type="button"> Delete</div>
                </div>
                <?php endif; ?>
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-success collapsed" type="button" data-toggle="collapse" data-target='#title<?=md5($row['title']) ?>' aria-expanded="false" aria-controls="title<?=md5($row['title']) ?>">Show/Hidden</div>
                </div>
                <div>
                    <h3><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                </div>
            </nav>
            <hr>
            <div class="collapse <?= (isset($collapse_show_id) and ($collapse_show_id == $row['id']))?'show':'' ?>" id="title<?=md5($row['title'])  ?>" style="">
                <dl class="row">
                    <dt class="col-sm-3">Lecturer</dt>
                    <dd class="col-sm-9"><b><?= htmlspecialchars($row['creator'], ENT_QUOTES, 'UTF-8') ?></b></dd>
                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></dd>
                    <dt class="col-sm-3">Attachment</dt>
                    <dd class="col-sm-9">
                            <p><a target="_blank" href='../index.php?c=download&a=challenge&id=<?= $row['id']?>'>File</a></p>
                    </dd>
                </dl>
                <hr>
                <form action='../index.php?c=challenge&a=submit' method="POST">
                    <div class="input-group"><span class="input-group-prepend">
                    <button class="btn btn-primary" type="button">
                    </svg> Answer
                    </button></span>
                    <input type="text" name="id" value="<?= $row['id'] ?>" style="display:none">
                    <input class="form-control" id="input1-group2" type="text" name="answer" placeholder="answer">
                    <span class="input-group-append"><button class="btn btn-primary" type="submit">Submit</button></span>
                    </div>
                </form>
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