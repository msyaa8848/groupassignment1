
    <!-- TEST -->
    <?php include 'database/db_connect.php'; // your database connection file
    $query = "SELECT * FROM team_profile";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="swiper-slide bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-primary h-40 flex items-center justify-center">
                <img src="uploads/' . $row['profile_img'] . '" alt="' . $row['name'] . '" class="h-24 w-24 object-cover rounded-full">
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-1 text-primary">' . $row['name'] . '</h3>
                <p class="text-yellow-500 font-medium mb-3">' . $row['position'] . '</p>
                <p class="text-gray-600">' . $row['description'] . '</p>
            </div>
        </div>';
    }
    ?>