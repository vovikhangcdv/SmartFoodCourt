<div class="card">
    <div class="card-header">
        <h2> <?= $title ?></h2>
        <?php if($_SESSION['role'] !== 2): ?>
        <form class="float-right" action="../index.php?c=assignment&a=add_assignment" method="POST">
            <div class="float-right">
                <button class="btn btn-sm btn-success" type="submit"> Create Assignment</button>
            </div>
        </form>
        <?php endif;?>
        <div class="spinner-border text-success" style="display:none;" id="load_scan" role="status">
            <span class="sr-only">Loading...</span>
        </div>

    </div>
    <form class="float-right" id="delete_assignment" action="../index.php?c=assignment&a=delete" method="POST">
        <input type='text' name='id' id='input_id_delete' style='display:none' value='a'>
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </form>
    <form class="float-right" id="upload_assignment" action="../index.php?c=assignment&a=upload" method="POST">
        <input type='text' name='id' id='input_id_upload' style='display:none' value='a'>
    </form>
    <div class="card-body">
        <?php foreach ($list_assignment as $row): ?>
            <nav aria-label="breadcrumb" role="navigation">
                <?php if($_SESSION['role'] !== 2): ?>
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-danger" onclick="toggle('delete_assignment','<?=$row['id'] ?>','input_id_delete')" type="button"> Delete</div>
                </div>
                <?php endif;?>
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-success" onclick="toggle('upload_assignment','<?=$row['id'] ?>','input_id_upload')" type="button"> <?= $title_upload ?></div>
                </div>
                <div class="float-right" style="margin:2px">
                    <div class="btn btn-sm btn-success collapsed" type="button" data-toggle="collapse" data-target='#title<?=md5($row['title']) ?>' aria-expanded="false" aria-controls="title<?=md5($row['title']) ?>">Show/Hidden</div>
                </div>
                <div>
                    <h3><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                </div>
            </nav>
            <hr>
            <div class="collapse" id="title<?=md5($row['title'])  ?>" style="">
                
                <dl class="row">
                    <dt class="col-sm-3">Lecturer</dt>
                    <dd class="col-sm-9"><b><?= htmlspecialchars($row['creator'], ENT_QUOTES, 'UTF-8') ?></b></dd>
                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></dd>
                    <dt class="col-sm-3">Attachment</dt>
                    <dd class="col-sm-9">
                        <?php foreach($row['list_attachment'] as $path):?>
                            <?php 
                                $parser = explode('/',$path);
                                $file_name = $parser[count($parser)-1];
                            ?>
                            <p><a target="_blank" href='<?= $path ?>'><?= $file_name?></a></p>
                        <?php endforeach;?>
                    </dd>
                    <dt class="col-sm-3">Submissions</dt>
                    <dd class="col-sm-9">
                        <?php foreach($row['list_submit'] as $submitter=>$paths):?>
                        <?php if($_SESSION['role'] !== 2): ?>

                        <dl class="row">
                        <dt class="col-sm-4"><?= $submitter ?></dt>
                        <dd class="col-sm-8">
                            <?php foreach ($paths as $path):?>
                                <?php 
                                    $parser = explode('/',$path);
                                    $file_name = $parser[count($parser)-1];
                                ?>
                            <p><a target="_blank" href='<?= $path ?>'><?= $file_name?></a></p>
                            <?php endforeach ?>
                        </dd>
                        </dl>
                        <?php else: ?>
                            <?php if($submitter === $_SESSION['username']): ?>
                                <?php foreach ($paths as $path):?>
                                    <?php 
                                        $parser = explode('/',$path);
                                        $file_name = $parser[count($parser)-1];
                                    ?>
                                <p><a target="_blank" href='<?= $path ?>'><?= $file_name?></a></p>
                                <?php endforeach ?>
                            <?php endif;?>
                        <?php endif;?>
                        <?php endforeach;?>
                    </dd>
                </dl>
                <hr>
            </div>
            <?php endforeach; ?>
    </div>
</div>