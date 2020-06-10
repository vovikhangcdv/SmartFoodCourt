<div class="card">
    <div class="card-header"><h3>Add Assignment</h3></div>
    <div class="card-body">
    <div id="content">

    <form class="form-horizontal" action="../index.php?c=assignment&a=add_assignment" runat="server" method="POST" enctype="multipart/form-data" >
    <div class="form-group row">
    <label class="col-md-3 col-form-label" for="text-input"><h3>Title</h3></label>
    <div class="col-md-9">
    <input class="form-control" id="text-input" type="text" name="title" placeholder="Text">
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-3 col-form-label" for="textarea-input"><h4>Description</h4></label>
    <div class="col-md-9">
    <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Content.."></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-3 col-form-label" for="textarea-input"><h4>Attachment</h4></label>
    <div class="col-md-9">
    <input type="file" name="file" multiple>
    </div>
    </div>

    <div class="card-footer">
    <button class="btn btn-sm btn-success" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </div>
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