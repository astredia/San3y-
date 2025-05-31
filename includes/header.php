<header class="header">
    <div class="container header__container">
        <a href="#" class="header__logo">
            <h2><span>San</span><span class="highlight">3</span><span>y</span></h2>
        </a>

        <button class="nav__toggle">
            <i class="fas fa-bars"></i>
        </button>

        <nav class="nav">
            <ul class="nav__links">
                <li><a href="#" class="nav__link  <?php echo $page == 'index' ? 'nav__link--active' : '' ?>">الرئيسية</a>
                </li>
                <li><a href="#" class="nav__link  <?php echo $page == 'about' ? 'nav__link--active' : '' ?>">عن الموقع</a>
                </li>
                <li><a href="#" class="nav__link  <?php echo $page == 'artisans' ? 'nav__link--active' : '' ?>">المهنيين</a>
                </li>
                <li><a href="#" class="nav__link  <?php echo $page == 'blog' ? 'nav__link--active' : '' ?>">المدونة</a></li>
            </ul>
            <a href="#" class="btn btn--secondary">سجل كمهني</a>
        </nav>
    </div>
</header>