<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leadership Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>
<body class="bg-gray-50">

<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-blue-900 mb-2">Our Leadership Team</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Meet the dedicated professionals who lead our Bursar Department.</p>
        <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
    </div>

    <!-- Swiper Container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            include 'database/db_connect.php';

            $query = "SELECT * FROM team_profile";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $img = !empty($row['profile_img']) 
                    ? '<img src="./team/' . $row['profile_img'] . '" alt="' . $row['name'] . '" class="h-36 w-36 object-cover rounded-full border-4 border-white shadow-lg -mt-16 mx-auto">'
                    : '<div class="h-36 w-36 bg-gray-300 rounded-full flex items-center justify-center text-white text-2xl -mt-16 mx-auto"><i class="fa fa-user"></i></div>';

                echo '
                <div class="swiper-slide transition-transform transform hover:-translate-y-2 hover:shadow-xl duration-300 bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="bg-blue-900 h-24"></div>
                    ' . $img . '
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-blue-900 mb-1">' . $row['name'] . '</h3>
                        <p class="text-yellow-500 font-semibold mb-3">' . $row['position'] . '</p>
                        <p class="text-gray-600 text-sm mb-4">' . $row['description'] . '</p>
                        <div><i class="fas fa-envelope mr-1 text-gray-500"></i>' . $row['email'] . '</div>
                        <div><i class="fas fa-phone mr-1 text-gray-500"></i>' . $row['phoneNo'] . '</div>
                        <div class="flex items-center justify-center text-sm text-gray-600 space-x-4">

                           
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-pagination mt-4"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Swiper Init -->
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
        }
    });
</script>

</body>
</html>
