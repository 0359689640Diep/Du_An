<section class="setting" onclick="redirectToPage('index.php?controller=homeAdmin')">
    <i class="ti-home"></i>
    <a href="index.php?controller=homeAdmin">Home</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=Oder')">
    <i class="ti-pencil-alt"></i>
    <a href="index.php?controller=Oder">Browse orders</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=LisstComment')">
    <i class="ti-comment-alt"></i>
    <a href="index.php?controller=LisstComment">Comment</a>
</section>
<section class="setting"  onclick="redirectToPage('index.php?controller=LisstAccount')">
    <i class="ti-list"></i>
    <a href="index.php?controller=LisstAccount">Lisst Account</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=SignIn')">
    <i class="ti-cloud-up"></i>
    <a href="index.php?controller=SignIn">Add Account</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=LisstProduct')">
    <i class="ti-list"></i>
    <a href="index.php?controller=LisstProduct">Lisst product</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=addProduct')">
    <i class="ti-cloud-up"></i>
    <a href="index.php?controller=addProduct">Add Product</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=AddCategory')">
    <i class="ti-write"></i>
    <a href="index.php?controller=AddCategory">Add Category</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=LisstCategory')">
    <i class="ti-cloud-up"></i>
    <a href="index.php?controller=LisstCategory">Lisst Category</a>
</section>
<section class="setting" onclick="redirectToPage('index.php?controller=TrashCan')">
    <i class="ti-package"></i>
    <a href="index.php?controller=TrashCan">Trash can</a>
</section>
<section class="setting">
    <i class="ti-settings"></i>
    <a href="">Setting</a>
</section>
<section class="setting" onclick="redirectToPage('location:DuAn/user/index.php')">
    <i class="ti-share-alt"></i>
    <a href="location:DuAn/user/index.php">Log out</a>

</section>

<script>
    function redirectToPage(url) {
    window.location.href = url;
  }
</script>