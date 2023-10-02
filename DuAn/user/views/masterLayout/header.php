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
                                    <h5 >Daily wear</h5>
                                    <h5 >New Arrivals</h5>
                                    <h5>Brands</h5>
                                </nav>
                            </section>
                        </section>
                        <article class="logo">
                            <img src="../assets/img/logo.png" alt="logo">
                        </article>
                        
                        <nav class="nav">
                            <h5>On Sale</h5>
                            <h5 onmouseover="showMenu('menuproduct', 'flex')" onmouseout="setHideTimeout('menuproduct')" onclick="clearTimeout()">Daily wear</h5>
                            <h5 onmouseover="showMenu('menuproduct', 'flex')" onmouseout="setHideTimeout('menuproduct')" onclick="clearTimeout()">New Arrivals</h5>
                            <h5 onclick="RenderNotId('login')" >Log in</h5>
                        </nav>
                        <section class="sheach">
                            <input type="text" placeholder="Search for product...">
                            <i class="ti-search" id = "ti-search" ></i>
                        </section>
                        <section class="sheachMobile" id = "sheachMobile" >
                            <input type="text" placeholder="Search for product...">
                        </section>
                        <article class="Cart_Individual">
                            <i class="ti-shopping-cart"></i>
                            <i class="ti-user"></i>
                        </article>
                    </section> 
                </section>

                <section class="menu-product" id="menuproduct">
                    <section class="product">
                        <header>
                            <h1>According to product</h1>
                        </header>
                        <section class="mainMeuProduct">
                            <a href="#">All</a>
                            <a href="#">New product</a>
                            <?php 
                            foreach($data['showCategory'] as $value){
                                echo "<a href='$value[IdCategory]'>$value[NameCategory]</a>";
                            }
                            ?>

                    
                        </section>
                    </section>
                    <article class="imageProduct">
                        <img src="" alt="">
                    </article>
                </section>
            </header>