<?php
include 'includes/db.php';
include 'includes/header.php';
?>

    <header id="home">
        <div class="header__container">
            <div class="header__content">
                <p>ELEVATE YOUR TRAVEL JOURNEY</p>
                <h1>Experience The Magic Of Flight!</h1>
                <div class="header__btns">
                    <button class="btn">Book A Trip Now</button>
                    <a href="#">
                        <span><i class="ri-play-circle-fill"></i></span>
                    </a>
                </div>
            </div>
            <div class="header__image">
                <img src="photos/plane.png" alt="header" />
            </div>
        </div>
    </header>

    <section class="section__container destination__container" id="about">
        <h2 class="section__header">Popular Destination</h2>
        <p class="section__description">
            Discover the Most Loved Destinations Around the Globe
        </p>
        <div class="destination__grid">
            <div class="destination__card">
                <img src="photos/destination-1.jpg" alt="destination" />
                <div class="destination__card__details">
                    <div>
                        <h4>Tradition and Futurism</h4>
                        <p>New York City, USA</p>
                    </div>
                    <div class="destination__rating">
                        <span><i class="ri-star-fill"></i></span>
                        4.7
                    </div>
                </div>
            </div>
            <div class="destination__card">
                <img src="photos/destination-2.jpg" alt="destination" />
                <div class="destination__card__details">
                    <div>
                        <h4>The City of Lights</h4>
                        <p>Paris, France</p>
                    </div>
                    <div class="destination__rating">
                        <span><i class="ri-star-fill"></i></span>
                        4.5
                    </div>
                </div>
            </div>
            <div class="destination__card">
                <img src="photos/destination-3.jpg" alt="destination" />
                <div class="destination__card__details">
                    <div>
                        <h4>Island of the Gods</h4>
                        <p>Bali, Indonesia</p>
                    </div>
                    <div class="destination__rating">
                        <span><i class="ri-star-fill"></i></span>
                        4.8
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</main>

<?php
include 'includes/footer.php';
?>