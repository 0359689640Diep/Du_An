<header>
        <section class="mainHeader">
        <section class="SEOSignUp">
            <h4>Sign up and get 20% off to your first order.<a href="?controller=SignIn"> Sign Up Now</a></h4>
            <i class="ti-close"></i>
        </section>
            <section class="contentHeader">
            <section class="NavMobile">
                <i class="ti-menu" id ="ti-menu"></i>
                <section class="contentNavMobile" id = "contentNavMobile">
                    <nav id="nav" >
                        <h5>On Sale</h5>
                        <h5>Daily wear</h5>
                        <h5>New Arrivals</h5>
                        <h5>Brands</h5>
                    </nav>
                </section>
            </section>
            <article class="logo" onclick="RenderNotId('home')">
                <img src="../assets/img/logo.png" alt="logo">
            </article>
            
            <nav class="nav">
                <h5>On Sale</h5>
                <h5 onmouseover="showMenu('menuproduct', 'flex')" onmouseout="setHideTimeout('menuproduct')" onclick="clearTimeout()">Product portfolio</h5>
                <h5 onclick="RenderNotId('home')">Home</h5>
                <h5 onclick="RenderNotId('login')" >Log in</h5>
            </nav>
            <form action="index.php?controller=Casual&action=sheach" method="post" class="sheach" id="sheach">
                <input type="text" placeholder="Search for product..." name="sheach" id="sheachInput">
                <i class="ti-search" id = "ti-search" ></i>
            </form>
            <section class="sheachMobile" id = "sheachMobile" >
                <input type="text" placeholder="Search for product..." id="sheachInput">
            </section>
            <article class="Cart_Individual">
                <?php 
                    $IdAccountUser = isset($_SESSION['IdAccountUser']) ?? "";
                ?>

                <i onclick="RenderPersonalPage('Cart', <?= $IdAccountUser?>)" class="ti-shopping-cart"></i>
                <i onclick="RenderPersonalPage('Personal', <?= $IdAccountUser?>)" class="ti-user"></i>
            </article>
        </section> 
    </section>

    <section class="menu-product" id="menuproduct">
        <section class="product">
            <header>
                <h1 style="color: red">According to product</h1>
            </header>
            <section class="mainMeuProduct">
              <a href="index.php?controller=Casual&id=All">All</a>
                <?php 
                foreach($data['showCategory'] as $value){
                    echo "<a href='index.php?controller=Casual&id=$value[IdCategory]'>$value[NameCategory]</a>";
                }
                ?>
            </section>

        
            </section>
        </section>
</header>
<script>
    let hideTimeout;

function showMenu(elementId, type) {
  if(type === "flex"){
    let menuElement = document.getElementById(elementId);
    menuElement.style.display = type;
  }
  let menuElement = document.getElementById(elementId);
  menuElement.style.display = type;
}

function hideMenu(elementId) {
  let menuElement = document.getElementById(elementId);
  menuElement.style.display = "none";
}

function setHideTimeout(elementId) {
  hideTimeout = setTimeout(function() {
    hideMenu(elementId);
  }, 5000); // thời gian trễ ẩn menu (đơn vị: millisecond)
}

function clearTimeout() {
  clearTimeout(hideTimeout);
}

function showHideMenu(menu, showHide) {
  // Đầu tiên, chúng ta cần tạo biến để lưu trạng thái hiện tại của menu
  let isOpen = false;
  // Lấy các phần tử menu và showHide theo ID
  let menuElement = document.getElementById(menu);
  let showHideElement = document.getElementById(showHide);
  
  // Lắng nghe sự kiện click trên phần tử muốn áp dụng
  showHideElement.addEventListener("click", function() {
    if (isOpen) {
      // Nếu menu đang hiển thị, ẩn nó
      menuElement.style.display = "none";
      isOpen = false;
    } else {
      // Nếu menu đang ẩn, hiển thị nó
      menuElement.style.display = "block";
      isOpen = true;
    }
  });
}
showHideMenu( 'contentNavMobile','ti-menu')
showHideMenu( 'sheachMobile','ti-search');
    function RenderPersonalPage(Arrive, IdAccountUser){
        if (IdAccountUser === null || IdAccountUser === undefined) {
                window.location.replace("index.php?controller=login");
            } else {
                window.location.replace(`index.php?controller=${Arrive}`);
            
            }
        }

function RenderNotId(Arrive){
  window.location.replace(`index.php?controller=${Arrive}`)
}

// gửi from khi ấn enter
document.getElementById('sheachInput').addEventListener("keyup", function(event){
  event.preventDefault();
  // 13 là phím enter
  if(event.keyCode === 13){
    document.getElementById("sheach").submit();
  }
});
</script>
