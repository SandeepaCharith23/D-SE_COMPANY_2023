<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D & SE company-Ecommerse Web site-2023</title>

    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"> <i class="fa fa-cogs"></i> D & SE TRADING</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#services">Our services</a>
            <a href="#aboutus">About us</a>
            <a href="#features">Features</a>
            <a href="#products">Products</a>
            <a href="#contact">Contact Us</a>
            <a href="#reviews">Reviews</a>


        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"></div>
            <!-- <div id="signUp-btn" class="fas fa-user-plus"></div> -->
        </div>
        <a href="#" class="button">Join</a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-close" id="searchbarclosebutton"></i>
        </form>

        <form action="admin_area/login_process.php" class="login-form" method="POST">
            
            <!-- Add a progress bar -->
            <!-- <div class="progress-container">
                <div class="progress"></div>
                <div class="progress-text">0%</div>
            </div> -->

            <div class="login-heading">
                <h3>Login for Admin </h3> <span class="close-button" id="close-button"> <i class="fa fa-close"></i></span>
            </div>
            <input type="email" placeholder="Please Enter Your Email address" class="textfield-box" name="adminemailaddress" required>
            <input type="password" placeholder="Please Enter Your password" class="textfield-box" name="adminpassword" required>
            <div class="flex">
                <input type="checkbox" name="remember-me" id="remember-me">
                <label for="remember-me">Remember me</label>
                <a href="#">Forget password</a>
            </div>

            <input type="submit" value="login" class="button" id="adminloginbutton">
            <p>Don't have an account <a href="admin_area/admin_registration.php">Create new Account</a></p>
        </form>

        <!-- sign-Up Screen -->
        <!-- <form action="" class="signUp-form">
            <div class="login-heading">
                <h3>SignUp Screen </h3> <span class="close-button" id="close-button"> <i class="fa fa-close"></i></span>
            </div>
            <input type="email" placeholder="Please Enter Your Email address" class="textfield-box">
            <input type="password" placeholder="Please Enter Your password" class="textfield-box">
            <div class="flex">
                <input type="checkbox" name="" id="remember-me1">
                <label for="remember-me">Remember me</label>
                <a href="#">Forget password</a>
            </div>

            <input type="submit" value="SignUp now" class="button">

        </form> -->
    </header>
    <!-- header section end -->

    <!-- home section start -->
    <section class="home" id="home">

        <div class="image">
            <img src="images/logo.png" alt="no image">
        </div>

        <div class="content">
            <h3>Bright Ideas, Brilliant Solutions: Explore Our Electrical Engineering Expertise & Online Marketplace.</h3>
            <p>
                Providing top-tier electrical engineering solutions and cutting-edge products to power your projects.
                Our expertise illuminates innovation and sparks efficiency in every connection.</p>
            <a href="#" class="button">Know more</a>
        </div>
    </section>
    <!-- home section end -->

    <!-- our services section start-->
    <section id="services" class="services">

        <div class="heading">
            <span>Our services</span>
            <h1>What we provide to you...</h1>
        </div>

        <div class="swiper services-slider">
            <div class="swiper-wrapper">


                <section class="swiper-slide slide" style="background :url(images/services_banner_01.jpg) no-repeat;">


                    <div class="content">

                        <h3>Electrical System Design and Estimation</h3>
                        <p>
                            Electrical system design and estimation are key components in the field of electrical
                            engineering and construction.
                            They involve the planning, layout, and cost assessment of electrical systems for various
                            applications, such as
                            residential, commercial, industrial, or infrastructure projects.
                            
                        </p>

                        <a href="#features" class="button">Know More</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background :url(images/services_banner_02.jpg) no-repeat;">


                    <div class="content">

                        <h3>Lightining protction System Design and Installation</h3>
                        <p>A Lightning Protection System (LPS) is a set of measures and components designed to protect
                            structures and
                            occupants from the damaging effects of lightning strikes. It involves both design and
                            installation to ensure
                            the safety of buildings, people, and sensitive equipment</p>
                        <a href="#features" class="button">Know More</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background :url(images/services_banner_03.jpg) no-repeat;">


                    <div class="content">

                        <h3>Generator/Motor Repair and Services </h3>
                        <p>Generator and motor repair and services involve the maintenance, repair, and optimization of
                            electrical
                            generators and electric motors. These are crucial components in various industries, such as
                            manufacturing,
                            energy production, construction, and more. </p>
                        <a href="#features" class="button">Know More</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background :url(images/services_banner_04.jpg) no-repeat;">


                    <div class="content">

                        <h3>Industrial troubleshoot and Installation </h3>
                        <p>Industrial troubleshooting and installation involve the processes of identifying and
                            resolving issues, as
                            well as setting up or replacing industrial equipment, machinery, and systems in various
                            manufacturing and
                            industrial settings. </p>
                        <a href="#features" class="button">Know More</a>
                    </div>
                </section>


            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


    </section>
    <!-- our services section ends -->

    <!-- aboutus section start -->
    <section class="aboutus" id="aboutus">

        <div class="heading">
            <span>About Us</span>
            <h1>About our company</h1>

        </div>
        <div class="maincontent">
            <div class="image">
                <img src="images/Questions-cuate.png" alt="No image available here">
            </div>

            <div class="content">

                <h2>Welcome to D & SE Trading <br> "Your Trusted Partner in Electrical Engineering and Products."</h2>
                <p>Who We Are..<br>
                    At D & SE Trading, we are a team of dedicated professionals specializing in Electrical System
                    Design, Estimation, Lightning Protection System Design and Installation, Generator/Motor Repair and
                    Services, and Industrial Troubleshooting and Installation. With a rich history of 5-6 years, we've
                    earned a reputation for excellence and reliability in the Electrical Excellence and Electronic industry.
                </p>
                <!-- <h2>Why Choose Us?</h2>
                <p>
                    <li>Expertise: Our team comprises industry professionals with years of experience.</li>
                    <li>Expertise: Our team comprises industry professionals with years of experience.</li>
                </p> -->
                <a href="#" class="button">Read more</a>
            </div>
        </div>
    </section>
    <!-- aboutus section end -->

    <!-- Features section start -->
    <section class="feature" id="features">
        <div class="heading">
            <span>Our features</span>
            <h1>what makes us different from others</h1>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="images/features01.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Electrical System Design and Estimation</span></h3>
                    <p>
                    <ul>
                        <li><b>Tailored Solutions:<b> Customized electrical designs to meet your specific requirements.
                        </li>
                        <li>Efficiency Optimization: Expert estimation to ensure efficient electrical systems.</li>
                        <li>Regulatory Compliance: Designs that adhere to industry standards and safety regulations.
                        </li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features02.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Lightning Protection System Design and Installation</h3>
                    <p>
                    <ul>
                        <li>Expertise in Protection: Safeguard your assets with our comprehensive lightning protection
                            system designs.</li>
                        <li>Professional Installation: Precise installation to ensure maximum safety.</li>
                        <li>Minimized Risks: Protection against lightning strikes and potential damage.</li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features03.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Industrial Troubleshooting and Installation</h3>
                    <p>
                    <ul>
                        <li>Efficient Solutions: Troubleshooting expertise to resolve industrial equipment issues.</li>
                        <li>Seamless Installation: Precise installation services for your industrial needs.</li>
                        <li>Optimized Performance: Ensuring smooth operations and equipment performance.</li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features04.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Generator/Motor Repair and Services</h3>
                    <p>
                    <ul>
                        <li>Expert Repair: Skilled technicians for the repair and maintenance of generators and motors.
                        </li>
                        <li>Reliable Services: Ensuring your equipment operates at peak performance.</li>
                        <li>Downtime Reduction: Rapid response to minimize downtime and disruptions.</li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features05.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Quality Electronic Products with Guarantee</h3>
                    <p>
                    <ul>
                        <li>Product Range: Explore our selection of electronic items and products</li>
                        <li>Quality Assurance: We stand behind the quality of our electronic products.</li>
                        <li>Solid Guarantee: Enjoy peace of mind with our guarantee on all electronic items.</li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features06.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Expert Team</h3>
                    <p>
                    <ul>
                        <li>Industry Professionals: Our dedicated team of experts brings years of industry experience
                        </li>
                        <li>Customer-Centric: We prioritize your satisfaction and understand your unique needs.</li>
                        <li>Innovation: Staying at the forefront of technological advancements for top-notch solutions.
                        </li>
                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features07.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Community Involvement</h3>
                    <p>
                    <ul>
                        <li>Giving Back: We actively participate in local initiatives and community events.</li>
                        <li>Making a Difference: Contributing to [Community involvement, e.g., charity events,
                            educational programs, etc.]</li>

                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/features08.png" alt="No image">
                </div>
                <div class="content">
                    <h3>Get in Touch</h3>
                    <p>
                    <ul>
                        <li>Reach Out: We're here to assist you. Feel free to [Contact Us] for inquiries, quotes, or
                            more information.</li>
                        <li>Your Trusted Partner: Partner with D & SE Company Ltd for all your electrical and electronic
                            needs.</li>

                    </ul>
                    </p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section End -->

    <!-- start of the product section -->
    <section class="products" id="products">

        <div class="heading">
            <h1>Explore our Products Store</h1>
        </div>


        <div class="productslider">

            <div class="productslide active">

                <div class="productimage">
                    <img src="images/Marketplace-pana.png" alt="">
                </div>

                <div class="productdescription">
                    <h1>Why you should choose us</h1>
                    <p>Welcome to D & SE Trading online store, where innovation meets quality and your shopping experience takes center stage. We are your one-stop destination for a wide range of products that cater to your every need. Explore our meticulously curated selection, featuring the latest in technology, fashion, home essentials, and more. With a commitment to excellence and customer satisfaction, we bring you a seamless online shopping journey that combines convenience, affordability, and style. Discover the future of shopping with us at D & SE Company online store. Your satisfaction is our priority, and we can't wait to serve you better than ever before.</p>
                    <a href="productshome.php" class="button">Visit Our online market</a>
                </div>
            </div>

            <div class="productslide active">

                <div class="productimage">
                    <img src="images/Product hunt-cuate.png" alt="">
                </div>

                <div class="productdescription">
                    <h1>What we sell??</h1>
                    <p>Embark on a journey of endless possibilities at D & SE Tradings. As your ultimate shopping destination, we bring you an expansive array of top-notch products, including state-of-the-art electronics, must-have mobile accessories, essential groceries, high-quality tools, and so much more. Our commitment to quality, affordability, and convenience is unparalleled. Explore our online emporium, shop with confidence, and elevate every aspect of your lifestyle with us today. Your satisfaction is our guarantee, and we're dedicated to exceeding your expectations at every turn.</p>
                    <a href="productshome.php" class="button">Visit Our online market</a>
                </div>
            </div>


        </div>



    </section>

    <!-- End of the product section -->

    <!-- start of a slide show -->
    <!-- <section id="products" class="productsA">
        <div class="slideshow-container">
            <div class="mySlides fade">
                
            </div>
            <div class="mySlides fade">
                <img src="images/features02.png" alt="Image 2">
            </div>
            <div class="mySlides fade">
                <img src="images/features03.png" alt="Image 3">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

    </section> -->

    <!-- end of the slide show -->

    <!-- Start of the Contact-Us section-07 -->
    <section class="contact" id="contact">

        <h1 class="heading">Contact Us</h1>

        <div class="row">
        
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1979.0088912881854!2d80.12668119909682!3d7.238810104043714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1711346028199!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form action="" method="POST">
                <h3>Contact us from Email</h3>
                <input type="text" name="customer_name" placeholder="Enter your name" class="box">
                <input type="email" name="customer_emailaddress" placeholder="Enter your Email address" class="box">
                <input type="number" name="customer_contact_number" placeholder="Enter your Mobile Number" class="box">
                <textarea name="customer_message" class="box" placeholder="Enter your Message" cols="30" rows="10"></textarea>
                <input type="submit" value="Send email" name="Send_Email" class="button">
            </form>
            

        </div>
        <div class="row">
        <div class="contact-details-column-style">
                <!-- <img src="images/logo.png" alt="no image"> -->
                <h2>Contact</h2>
                <p><strong>Address</strong>No 35/9 Jayampathi,Neligama, Mirigama</p>
                <p><strong>Phone</strong>:+94 752948648</p>
                <p><strong>Email</strong>:dasunpremathilake93@gmail.com</p>
                <p><strong>Hours</strong>:9:00-18:00 ,Mon-Sat</p>
            </div>
        </div>
    </section>

    <!-- End of the Contact-Us section-07 -->
    <!-- Reviews section start -->
    <section class="reviews" id="reviews">
        <div class="heading">
            <h1>Our clients reviews</h1>
        </div>

        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <p>"Love shopping at D & SE Trading's online store! Easy browsing, diverse products, and quick delivery ensure I'm always stocked. It's my go-to for everything from electronics to groceries!"</p>
                    <div class="user">
                        <img src="images/userimage02 .png" alt="">
                        <div class="info">
                            <h3>Mr.Charith</h3>
                            <h4>Loyal Customer</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>""Highly recommend D & SE Tradings for anyone seeking reliable electrical engineering solutions. Their attention to detail in system design and their convenient online marketplace make them stand out from the crowd"</p>
                    <div class="user">
                        <img src="images/userimage02 .png" alt="">
                        <div class="info">
                            <h3>Mr.Charuka</h3>
                            <h4>Loyal Customer-Electronic Service</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>"Top-notch service from start to finish! D & SE Trading- not only fixed our generator swiftly but also provided valuable advice on optimizing our industrial setup. Their online shop is a bonus for busy professionals like us!"</p>
                    <div class="user">
                        <img src="images/userimage02 .png" alt="">
                        <div class="info">
                            <h3>Mr.Bawantha</h3>
                            <h4>Loyal Customer</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>"Five stars all around for D & SE Trading-. Their dedication to quality and customer satisfaction is evident in every aspect of their service. Whether it's electrical system design or online shopping convenience, they've got it all covered!"</p>
                    <div class="user">
                        <img src="images/userimage02 .png" alt="">
                        <div class="info">
                            <h3>Mr.Chamika</h3>
                            <h4>Loyal Customer</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!--End of the review section-->





    <!-- Start of the footer section-10 -->

    <section class="footer">
        <div class="links">
            <a class="button" href="#home">Home</a>
            <a class="button" href="#services">Our services</a>
            <a class="button" href="#aboutus">About us</a>
            <a class="button" href="#features">Features</a>
            <a class="button" href="#products">Products</a>
            <a class="button" href="#reviews">Reviews</a>



        </div>
        <!-- http://www.ageesolution.com/ -->
        <div class="credit">Created by <span><i class="fas fa-copyright"></i><a href="">AG SOFT SOLUTION</a></span> | all rights reserved!</div>
    </section>
    <!-- End of the footer section-10 -->











    <!-- link custom js file -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/script.js?v=123"></script>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

        var swiper = new Swiper(".services-slider", {
            loop: true,
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

        var swiper = new Swiper(".reviews-slider", {
            loop: true,
            grabCursor: true,
            spaceBetween: 20,
            breakpoints: {
                "@0.00": {
                    slidesPerView: 1,

                },



                "@0.75": {
                    slidesPerView: 3,

                },
                "@1.00": {
                    slidesPerView: 3,

                },

            },

        });
    </script>




</body>

</html>