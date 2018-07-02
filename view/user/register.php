<div class="page-header">
    <h1>Register Page</h1>

    <form action="<?php echo $this->controllerFromView('user','register'); ?>" method="post">
        <p></p>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php echo isset($userExiste) ? $userExiste : ''  ?>
</div>