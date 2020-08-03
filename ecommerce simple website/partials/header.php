<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Push Cart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
          if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] === '1'){
            ?>

              <li class="nav-item">
                <a class="nav-link" href="./category.php">Add Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./add_product.php">Add Product</a>
              </li> 
            <?php
          }
       ?>
    </ul>
      <!-- right navbar -->
    <ul class="navbar-nav ml-auto"> 
      <?php 
        if(
          (isset($_SESSION['user']) && $_SESSION['user']['role_id'] !== '1') || !isset($_SESSION['user'])
        ) {
          ?>

            <li class="nav-item">
              <a href="./cart.php" class="nav-link">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>Cart
                <!-- start badge -->
                 <span class="badge badge-light">
                   <?php
                      if(isset($_SESSION['cart-count'])){
                        echo $_SESSION['cart-count'];
                      }else{
                        echo 0;
                      }
                   ?>
                 </span>
                 <!-- end badge -->
              </a>
            </li>
          <?php

        }
      ?>

      <?php
         if(isset($_SESSION['user'])){
          ?>
            <li class="nav-item">
              <a href="./transactions.php" class="nav-link">Transactions</a>
            </li>

          <?php

         }
      ?>

       <?php 
        if(!isset($_SESSION['user'])){
          ?>
            <li class="nav-item">
              <a href="./login.php" class="nav-link">Login</a>
            </li>

            <li class="nav-item">
              <a href="./register.php" class="nav-link">Register</a>
            </li>

          <?php
         }else{
          ?>
            <li class="nav-item">
              <span class="nav-link">Hello, <?php echo $_SESSION['user']['fullname']?></span>
            </li>
            <li class="nav-item">
              <a href="./../controllers/logout.php" class="nav-link">Logout</a>
            </li>

          <?php
         }

       ?>

    </ul>
  </div>
</nav>