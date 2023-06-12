  <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">
            <?= $view_bag['heading'] ?>
          </h1>
        </div>
      </div>
     
      <div class="row">
        <form action="" method="POST">
          <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email" />
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" />
          </div>
          <div class="from-group">
            <input type="submit" name="login" value="Login" />
          </div>
        </form>
      </div>
      <div class="row">
        <?php 
          if (isset($status)) {
            echo $status;
          }
        ?>
      </div>
    </div>