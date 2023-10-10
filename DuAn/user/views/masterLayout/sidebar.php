<section class="sidebar">
    <section class="headerSidebar">
        <article class="img">
            <img src="../assets/imgUpload/<?= $_SESSION["ImageUser"]?>" alt="">
        </article>
        <article class="Name">
            <h1><?= $_SESSION["NameUser"]?></h1>
        </article>
    </section>
    <section class="mainSidebar">
        <article class="item" onclick="loadView('WaitForConfirmation')">
            <h3>Wait for confirmation</h3>
            <i class="ti-write"></i>
        </article>
        <article class="item" onclick="loadView('WaitingForDelivery')">
            <h3>Waiting for delivery</h3>
            <i class="ti-archive"></i>
        </article>
        <article class="item" onclick="loadView('BeingShipped')">
            <h3>Being shipped</h3>
            <i class="ti-truck"></i>
        </article>
        <article class="item" onclick="loadView('DeliveredSuccessfully')">
            <h3>Delivered Successfully</h3>
            <i class="ti-check-box"></i>
        </article>
        <article class="item" onclick="loadView('CommentUser')">
            <h3>Evaluate</h3>
            <i class="ti-id-badge"></i>
        </article>
        <article class="item" onclick="loadView('home')">
            <h3>Home</h3>
            <i class="ti-home"></i>
        </article>
    </section>
    <section class="footerSidebar">
        <article class="item" onclick="loadView('Personal')">
            <h3>Profile</h3>
            <i class="ti-user"></i>
        </article>
        <article class="item">
            <h3>Log out</h3>
            <i class="ti-share-alt"></i>
        </article>

    </section>
</section>
<script>
    function loadView(type){
        window.location.replace(`index.php?controller=${type}`)
    }
</script>