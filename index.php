<!DOCTYPE html>
<html lang="ar" dir="rtl">

<?php
$title = "San3y - منصة لتوصيل المهنيين بالعملاء";
$description = "ابحث عن أفضل المهنيين في منطقتك، من سباكين إلى كهربائيين، نوفر لك كل ما تحتاجه بسهولة وسرعة.";
$keywords = "San3y, مهنيين, خدمات منزلية, سباكة, كهرباء, نجارة, دهان, تبريد وتكييف";
$icon = "assets/images/logo.jpg";
$page = "index";
$page_image = "assets/images/logo.jpg";
require_once 'includes/head.php';
?>

<body>
    <!-- Header -->
    <?php require_once 'includes/header.php'; ?>
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero__content">
                <h1 class="hero__title">ابحث عن أفضل المهنيين في منطقتك</h1>
                <p class="hero__subtitle">من الحرفيين إلى المتخصصين، نوفر لك أفضل الخبراء لتحصل على الخدمة المثالية التي
                    تبحث عنها</p>
                <div class="hero__actions">
                    <a href="register.php" class="btn btn--primary">انضم إلينا</a>
                    <a href="artisans.php" class="btn btn--outline">ابدأ البحث</a>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="section how-it-works">
            <div class="container">
                <div class="section__title">
                    <h2>كيف يعمل الموقع؟</h2>
                </div>
                <div class="steps">
                    <div class="step">
                        <span class="step__number">1</span>
                        <div class="step__icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3 class="step__title">أنشئ حسابك</h3>
                        <p class="step__description">أنشئ حسابك المجاني بخطوات بسيطة وابدأ رحلتك معنا</p>
                    </div>
                    <div class="step">
                        <span class="step__number">2</span>
                        <div class="step__icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="step__title">ابحث عن المهنيين</h3>
                        <p class="step__description">ابحث عن المهنيين المتاحين في منطقتك حسب التخصص والمهارات</p>
                    </div>
                    <div class="step">
                        <span class="step__number">3</span>
                        <div class="step__icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="step__title">احجز موعدك</h3>
                        <p class="step__description">تواصل واحجز موعدك مباشرة مع المهني الذي تختاره</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="section features">
            <div class="container">
                <div class="section__title">
                    <h2>مميزات منصتنا</h2>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">خدمات موثوقة</h3>
                        <p class="feature-description">جميع المهنيين لدينا يتم التحقق منهم بعناية لضمان جودة الخدمات</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3 class="feature-title">سرعة التنفيذ</h3>
                        <p class="feature-description">تواصل مع المهنيين مباشرة واحصل على الخدمة في أسرع وقت</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <h3 class="feature-title">أسعار تنافسية</h3>
                        <p class="feature-description">احصل على أفضل الأسعار مع ضمان الجودة من خلال منافسة المهنيين</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="feature-title">تقييمات حقيقية</h3>
                        <p class="feature-description">تصفح تقييمات العملاء السابقين لاختيار المهني الأنسب لك</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Professionals Section -->
        <section class="section professionals">
            <div class="container">
                <div class="section__title">
                    <h2>المهنيون المميزون</h2>
                </div>

                <div class="categories">
                    <div class="category category--active" data-category="all">الجميع</div>
                    <?php
                    $get_categories = "SELECT * FROM profession";
                    $result_categories = $conn->query($get_categories);
                    if ($result_categories->num_rows > 0) {
                        foreach ($result_categories as $category) {
                            ?>
                            <div class="category" data-category="<?php echo $category['slug'] ?>">
                                <?php echo $category['name'] ?>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="category">لا توجد فئات متاحة</div>';
                    }
                    ?>
                </div>

                <div class="professionals-grid" id="professionalsContainer">
                    <!-- Professionals will be loaded dynamically -->
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="section testimonials">
            <div class="container">
                <div class="section__title">
                    <h2 style="color: var(--white);">آراء عملائنا</h2>
                </div>
                <div class="testimonials-grid">

                    <?php
                    $get_testimonials = "SELECT * FROM testimonials LIMIT 3";
                    $result_testimonials = $conn->query($get_testimonials);
                    if ($result_testimonials->num_rows > 0) {
                        while ($testimonial = $result_testimonials->fetch_assoc()) {
                            ?>
                            <div class="testimonial-card">
                                <p class="testimonial-content">
                                    "<?php echo $testimonial['comment']; ?>"
                                </p>
                                <div class="testimonial-author">
                                    <div class="author-avatar">
                                        <img src="assets/images/person.jpg" alt="<?php echo $testimonial['name']; ?>" loading="lazy">
                                    </div>
                                    <div class="author-info">
                                        <h4><?php echo $testimonial['name']; ?></h4>
                                        <p><?php echo $testimonial['notice']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>لا توجد آراء متاحة حاليًا.</p>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="section about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>من <span>نحن</span> في San3y؟</h2>
                        <p>نحن منصة رائدة تهدف إلى ربط العملاء بالمهنيين المحترفين في مختلف المجالات. نسعى لتقديم تجربة
                            سهلة وسريعة للعثور على أفضل الخبراء في منطقتك.</p>
                        <p>تأسست San3y عام 2020 بمهمة بسيطة: جعل عملية العثور على الحرفيين والمهنيين المحترفين أسهل
                            وأكثر موثوقية. اليوم، نخدم آلاف العملاء في جميع أنحاء المملكة.</p>

                        <div class="about-stats">
                            <div class="stat-item">
                                <?php
                                $get_count_artisans = "SELECT COUNT(*) AS total FROM artisans";
                                $result_count_artisans = $conn->query($get_count_artisans);
                                $count_artisans = $result_count_artisans->fetch_assoc();
                                $count_artisans = $count_artisans['total'];

                                $get_count_services = "SELECT COUNT(*) AS total FROM services";
                                $result_count_services = $conn->query($get_count_services);
                                $count_services = $result_count_services->fetch_assoc();
                                $count_services = $count_services['total'];

                                $get_coint_visits = "SELECT COUNT(*) AS total FROM visits";
                                $result_count_visits = $conn->query($get_coint_visits);
                                $count_visits = $result_count_visits->fetch_assoc();
                                $count_visits = $count_visits['total'];
                                ?>
                                <div class="stat-number"><?php echo $count_artisans ?>+</div>
                                <div class="stat-text">مهني مسجل</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $count_services ?>+</div>
                                <div class="stat-text">خدمة مقدمة</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $count_visits ?>+</div>
                                <div class="stat-text">عدد الزوار</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">25+</div>
                                <div class="stat-text">مدينة مغطاة</div>
                            </div>
                        </div>
                    </div>

                    <div class="about-image">
                        <img src="assets/images/hero.webp" alt="فريق San3y" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <div class="cta__content">
                    <h2 class="cta__title">هل أنت مهني وتريد زيادة دخلك؟</h2>
                    <p class="cta__description">انضم إلى منصتنا وابدأ في الحصول على عملاء جدد من منطقتك اليوم</p>
                    <a href="#" class="btn btn--secondary">سجل كمهني الآن</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php
    require_once 'includes/footer.php';
    ?>
    <script>
        // Toggle mobile navigation
        const navToggle = document.querySelector('.nav__toggle');
        const nav = document.querySelector('.nav');

        navToggle.addEventListener('click', () => {
            nav.classList.toggle('nav--active');
            const icon = navToggle.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile nav when clicking on a link
        document.querySelectorAll('.nav__link').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('nav--active');
                const icon = navToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });

        // Professionals data
        fetch('php/get_artisans.php')
            .then(response => response.json())
            .then(data => {
                professionalsData = data;
                renderProfessionals();
            })
            .catch(error => console.error('Error fetching professionals:', error));

        professionalsData = [];
        //  [
        //     {
        //         id: 1,
        //         name: "أحمد محمد",
        //         category: "plumbing",
        //         categoryName: "سباكة",
        //         rating: 4.5,
        //         reviews: 42,
        //         location: "الرياض، حي المروج",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1505373877841-8d25f7d46678?q=80&w=2128&auto=format&fit=crop"
        //     },
        //     {
        //         id: 2,
        //         name: "خالد عبدالله",
        //         category: "electrical",
        //         categoryName: "كهرباء",
        //         rating: 5,
        //         reviews: 63,
        //         location: "جدة، حي الصفا",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=2070&auto=format&fit=crop"
        //     },
        //     {
        //         id: 3,
        //         name: "سامي علي",
        //         category: "ac",
        //         categoryName: "تبريد وتكييف",
        //         rating: 4,
        //         reviews: 37,
        //         location: "الدمام، حي الراكة",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2053&auto=format&fit=crop"
        //     },
        //     {
        //         id: 4,
        //         name: "مصطفى حسن",
        //         category: "carpentry",
        //         categoryName: "نجارة",
        //         rating: 4.7,
        //         reviews: 28,
        //         location: "الرياض، حي النخيل",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=1976&auto=format&fit=crop"
        //     },
        //     {
        //         id: 5,
        //         name: "ياسر عبدالرحمن",
        //         category: "painting",
        //         categoryName: "دهان",
        //         rating: 4.3,
        //         reviews: 51,
        //         location: "الدمام، حي الخليج",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2070&auto=format&fit=crop"
        //     },
        //     {
        //         id: 6,
        //         name: "عمر فاروق",
        //         category: "plumbing",
        //         categoryName: "سباكة",
        //         rating: 4.8,
        //         reviews: 39,
        //         location: "جدة، حي الروضة",
        //         views: 20,
        //         image: "https://images.unsplash.com/photo-1593104547480-9efb3c5f4a8b?q=80&w=1974&auto=format&fit=crop"
        //     }
        // ];

        // Render professionals
        function renderProfessionals(category = 'all') {
            const container = document.getElementById('professionalsContainer');
            container.innerHTML = '';

            const filteredProfessionals = category === 'all'
                ? professionalsData
                : professionalsData.filter(pro => pro.category === category);

            filteredProfessionals.forEach(professional => {
                const stars = [];
                for (let i = 1; i <= 5; i++) {
                    if (i <= Math.floor(professional.rating)) {
                        stars.push('<i class="fas fa-star"></i>');
                    } else if (i === Math.ceil(professional.rating) && !Number.isInteger(professional.rating)) {
                        stars.push('<i class="fas fa-star-half-alt"></i>');
                    } else {
                        stars.push('<i class="far fa-star"></i>');
                    }
                }

                const card = document.createElement('div');
                card.className = 'professional-card';
                card.innerHTML = `
                    <div class="professional-card__image">
                        <img src="${professional.image}" alt="${professional.name}" loading="lazy">
                    </div>
                    <div class="professional-card__content">
                        <h3 class="professional-card__title">${professional.name}</h3>
                        <span class="professional-card__category">${professional.categoryName}</span>
                        <div class="professional-card__rating">
                            ${stars.join('')}
                            <span>(${professional.reviews} تقييم)</span>
                        </div>
                        <div class="professional-card__location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>${professional.location}</span>
                        </div>
                        <div class="professional-card__location">
                            <i class="fas fa-eye"></i>
                            <span>${professional.views}</span>
                        </div>
                        <a href="#" class="btn btn--primary" style="width: 100%; padding: 10px;">عرض الملف</a>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Initialize professionals
        renderProfessionals();

        // Category selection
        document.querySelectorAll('.category').forEach(category => {
            category.addEventListener('click', () => {
                // Remove active class from all categories
                document.querySelectorAll('.category').forEach(cat => {
                    cat.classList.remove('category--active');
                });

                // Add active class to clicked category
                category.classList.add('category--active');

                // Filter professionals
                const categoryType = category.getAttribute('data-category');
                renderProfessionals(categoryType);
            });
        });
    </script>
</body>

</html>