<style>
  .navbar-light .navbar-nav .nav-link.active {
        color: white;
        background-color: #519ac7;
        border-radius: 5px;
  }
  /* .navbar-light .navbar-nav .nav-link {
    color: white;
        background-color: #519ac7;
        border-radius: 10px;
  } */
</style>

<div class="container">
  <nav class="navbar navbar-expand navbar-light bg-light">
        
    <div class="container-fluid">
          <a class="navbar-brand" href="index_.php">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <!-- 如果pageName是list的時候，class增加active、disabled"(當前頁面無法再點擊a連結)"的屬性 -->
                <a class="nav-link <?= $pageName=='list' ? 'active disabled' : '' ?>" href="list.php">列表</a>
              </li>
              <li class="nav-item">
                <!-- 如果pageName是list的時候，class增加active、disabled"(當前頁面無法再點擊a連結)"的屬性 -->
                <a class="nav-link <?= $pageName=='insert' ? 'active disabled' : '' ?>" href="insert.php">新增</a>
              </li>
            </ul>

            <!-- NavBar右邊，有登入顯示暱稱+登出按鈕，沒登入顯示登入按鈕 -->
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