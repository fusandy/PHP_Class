<style>
  .navbar-light .navbar-nav .nav-link.active {
        color: white;
        background-color: #519ac7;
        border-radius: 5px;
  }

</style>

<div class="container">
  <nav class="navbar navbar-expand navbar-light bg-light">
        
    <div class="container-fluid">
          <a class="navbar-brand" href="index_.php">印食 3D Printer</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <!-- Navbar Button -->
              <!-- <li class="nav-item">
                <a class="nav-link <?= $pageName=='classic' ? 'active disabled' : '' ?>" href="#">經典商品</a>
              </li>

              <li class="nav-item"> 
                <a class="nav-link <?= $pageName=='customized' ? 'active disabled' : '' ?>" href="#">客製化商品</a>
              </li> -->

              <li class="nav-item"> 
                <a class="nav-link <?= $pageName=='cart_classic' ? 'active disabled' : '' ?>" href="cart_classic.php">購物車</a>
              </li>

              <li class="nav-item"> 
                <a class="nav-link <?= $pageName=='cart_insert' ? 'active disabled' : '' ?>" href="cart_insert.php">新增購物車明細</a>
              </li>

          </ul>

            <!-- Login area -->
            <ul class="navbar-nav mb-2 mb-lg-0">
              <?php if(isset($_SESSION['admin'])): ?>
              
                <li class="nav-item">
                <a class="nav-link"> <?= $_SESSION['admin']['nickname'] ?></a>
                </li>
              
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">登出</a>
                </li>
              <?php else: ?>
              
                <li class="nav-item">
                <a class="nav-link" href="login.php">登入</a>
                </li>
              
                <?php endif; ?>
            </ul>

          </div>
        </div>
        
  </nav>
</div>