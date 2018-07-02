<div class="hero-unit">
    <h1>welcome</h1>
    <p>This is a chat application </p>
</div>

<div class="row">
    <div class="col-md-8">
        <div id="ajax" style="height: 500px;overflow: auto;padding: 5px;border: solid 1px gray;">
            <?php foreach ($messages as $message): ?>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading"><?= $message->user ?> <span
                                style="font-size: small"><?= $message->createdAt ?></span></h4>
                        <p class="list-group-item-text"><?= $message->message ?></p>
                    </a>
                </div>
            <?php endforeach; ?>


        </div>
        <form method="post" action="">
            <label>Message</label> <textarea rows="4" cols="50" name="message" class="form-control"></textarea>
            <input type="submit" class="btn btn-outline-info pull-left" value="submit">
        </form>
    </div>

    <div class="col-md-4">
        <form method="POST" action='<?php echo $this->controllerFromView('user','logout'); ?>'>
            <input type="submit" name="logout"  value="Logout">
        </form>
    </div>
    
</div>
