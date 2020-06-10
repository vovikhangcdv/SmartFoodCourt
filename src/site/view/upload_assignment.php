<div class="card">
    <div class="card-header"><h3><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8')  ?> - <?= htmlspecialchars($assignment_title, ENT_QUOTES, 'UTF-8')  ?></h3></div>

    <div class="card-body">
    <div id="content">
    <form class="form-horizontal" action="../index.php?c=assignment&a=upload" runat="server" method="POST" enctype="multipart/form-data" >
    <div class="form-group row">
    <label class="col-md-3 col-form-label" for="textarea-input"><h4>File</h4></label>
    <div class="col-md-9">
    <input type="file" name="file" multiple>
    </div>
    <input type='text' style='display:none' name='id' value=<?= $id ?>>
    </div>

    <div class="card-footer">
    <button class="btn btn-sm btn-success" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
    </div>
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </form>

    <?php if (isset($message)):; ?>
    <div style='display:<?=(isset($message) and $message != NULL) ? "block" : "none" ?>'>
        <br>
        <div class=<?=$return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?=(isset($message) and $message != NULL) ? $message : "" ?></div>
    </div>
    <?php endif; ?>
    </div>
    </div>
    </div>