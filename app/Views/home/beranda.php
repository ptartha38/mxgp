<style>
    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <!-- Container for the image gallery -->

                <!-- Full-width images with number text -->
                <div class="mySlides">
                    <div style="color:black;" class="numbertext">1 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/1.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">2 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/2.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">3 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/3.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">4 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/4.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">5 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/5.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">6 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/6.jpg" style="width:100%">
                </div>

                <div style="color:black;" class="mySlides">
                    <div class="numbertext">7 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/7.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">8 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/8.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">9 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/9.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">10 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/10.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">11 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/11.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">12 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/12.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">13 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/13.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">14 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/14.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">15 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/15.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">16 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/16.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">17 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/17.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">18 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/18.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">19 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/19.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">20 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/20.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">21 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/21.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">22 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/22.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">23 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/23.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">24 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/24.jpg" style="width:100%">
                </div>
                <div style="color:black;" class="mySlides">
                    <div class="numbertext">25 / 43</div>
                    <img src="<?= base_url() ?>/assets/img/presentasi/25.jpg" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Image text -->
                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <!-- Thumbnail images -->
                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/1.jpg" style="width:100%" onclick="currentSlide(1)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/2.jpg" style="width:100%" onclick="currentSlide(2)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/3.jpg" style="width:100%" onclick="currentSlide(3)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/4.jpg" style="width:100%" onclick="currentSlide(4)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/5.jpg" style="width:100%" onclick="currentSlide(5)"">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/6.jpg" style="width:100%" onclick="currentSlide(6)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/7.jpg" style="width:100%" onclick="currentSlide(7)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/8.jpg" style="width:100%" onclick="currentSlide(8)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/9.jpg" style="width:100%" onclick="currentSlide(9)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/10.jpg" style="width:100%" onclick="currentSlide(10)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/11.jpg" style="width:100%" onclick="currentSlide(11)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/12.jpg" style="width:100%" onclick="currentSlide(12)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/13.jpg" style="width:100%" onclick="currentSlide(13)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/13.jpg" style="width:100%" onclick="currentSlide(13)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/14.jpg" style="width:100%" onclick="currentSlide(14)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/15.jpg" style="width:100%" onclick="currentSlide(15)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/16.jpg" style="width:100%" onclick="currentSlide(16)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/17.jpg" style="width:100%" onclick="currentSlide(17)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/18.jpg" style="width:100%" onclick="currentSlide(18)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/19.jpg" style="width:100%" onclick="currentSlide(19)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/20.jpg" style="width:100%" onclick="currentSlide(20)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/21.jpg" style="width:100%" onclick="currentSlide(21)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/22.jpg" style="width:100%" onclick="currentSlide(22)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/23.jpg" style="width:100%" onclick="currentSlide(23)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/24.jpg" style="width:100%" onclick="currentSlide(24)">
                    </div>
                    <div class=" column">
                        <img class="demo cursor" src="<?= base_url() ?>/assets/img/presentasi/25.jpg" style="width:100%" onclick="currentSlide(25)">
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    <?php if (session()->getFlashdata('sukses')) { ?>
        Swal.fire(
            'Selamat',
            '<?php echo $session->sukses ?>',
            'success'
        )
    <?php } ?>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>