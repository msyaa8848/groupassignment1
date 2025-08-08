<?php
require_once 'config/database.php';

// Fetch all service categories for the overview section
$categories_overview_sql = "SELECT * FROM service_categories ORDER BY id ASC"; // Or by a 'sort_order' column if you add one
$categories_overview_result = $conn->query($categories_overview_sql);
$service_categories_overview = $categories_overview_result->fetch_all(MYSQLI_ASSOC);

// Fetch all forms and documents for the Forms & Documents section
$forms_sql = "SELECT * FROM service_forms_documents ORDER BY category_group, document_title ASC";
$forms_result = $conn->query($forms_sql);
$forms_documents = $forms_result->fetch_all(MYSQLI_ASSOC);

// Group forms by category_group for easier display
$grouped_forms = [];
foreach ($forms_documents as $form) {
    $group_name = $form['category_group'] ?? 'Uncategorized';
    if (!isset($grouped_forms[$group_name])) {
        $grouped_forms[$group_name] = [];
    }
    $grouped_forms[$group_name][] = $form;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPSI - Services</title>
    <link rel="icon" href="https://bendahari.upsi.edu.my/wp-content/uploads/2020/09/cropped-upsi-logo-1-180x180.png" type="image/png"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style_servicesdrop.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .header-bg {
            background: linear-gradient(rgba(187, 0, 0, 0.7), rgba(42, 0, 0, 0.7)), 
            url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .category-title {
            border-bottom: 2px solid #3B82F6;
        }
        /* Custom Tailwind Colors */
        .text-um-red { color: #8B0000; } /* Dark Red */
        .bg-um-yellow { background-color: #FFD700; } /* Gold/Yellow */
        .text-um-yellow { color: #FFD700; }
        .hover\:bg-yellow-500:hover { background-color: #FACC15; } /* Tailwind yellow-500 */

        /* Styles for dropdowns */
        .card {
            margin-bottom: 1.5rem; /* Space between dropdown cards */
            border-radius: 0.5rem; /* Rounded corners */
            overflow: hidden; /* Ensures content stays within bounds */
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            cursor: pointer;
            color: white;
            font-weight: 600;
            font-size: 1.25rem; /* text-xl */
        }
        .dropdown-content {
            display: none; /* Hidden by default */
            padding: 1.5rem;
            border: 1px solid #e2e8f0; /* border-gray-200 */
            border-top: none; /* No top border if it's a continuation of the card */
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            background-color: #fff;
        }
        .dropdown-content.active {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <?php include 'header.php' ?>

    <!-- Page Header -->
    <section class="header-bg text-white py-16 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white">Our Services</h1>
            <p class="text-lg md:text-xl">Explore the financial services available to students, staff, and vendors.</p>
    </section>

    <!-- Services Overview -->
    <main class="container mx-auto px-4 py-12">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <?php if (!empty($service_categories_overview)): ?>
                <?php foreach ($service_categories_overview as $category): ?>
                    <div class="service-card bg-white p-6 rounded-lg shadow-lg">
                        <div class="text-4xl <?php 
                            // Dynamically set icon color based on category name
                            $icon_color_class = 'text-gray-500'; // Default
                            if ($category['category_name'] == 'Student Services') {
                                $icon_color_class = 'text-green-500';
                            } elseif ($category['category_name'] == 'Staff Services') {
                                $icon_color_class = 'text-red-500';
                            } elseif ($category['category_name'] == 'Vendor Services') {
                                $icon_color_class = 'text-orange-500';
                            }
                            echo $icon_color_class;
                        ?> mb-4">
                            <i class="<?php echo htmlspecialchars($category['icon_class'] ?? 'fas fa-info-circle'); ?>"></i>
                        </div>
                        <h3 class="text-xl font-bold text-um-red mb-3"><?php echo htmlspecialchars($category['category_name']); ?></h3>
                        <p class="mb-4"><?php echo htmlspecialchars($category['description']); ?></p>
                        
                        <?php 
                        // Assuming points_list is comma-separated or newline-separated
                        $points = explode("\n", $category['points_list'] ?? '');
                        $points = array_map('trim', $points);
                        $points = array_filter($points); // Remove empty entries
                        ?>
                        <?php if (!empty($points)): ?>
                            <div class="space-y-3 mb-6">
                                <?php foreach ($points as $point): ?>
                                    <div class="flex items-start">
                                        <i class="fas fa-check-circle <?php echo $icon_color_class; ?> mt-1 mr-2"></i>
                                        <span><?php echo htmlspecialchars($point); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="col-span-3 text-center text-gray-600">No service categories found. Please add them via the admin panel.</p>
            <?php endif; ?>
        </div>

        <!-- Service Categories Dropdowns -->
        <h2 class="text-2xl font-semibold text-um-red mb-6">Service Categories</h2>    

        <?php 
        // Fetch all service categories again for the dropdowns, including their IDs
        $dropdown_categories_sql = "SELECT id, category_name FROM service_categories ORDER BY id ASC";
        $dropdown_categories_result = $conn->query($dropdown_categories_sql);
        $dropdown_categories = $dropdown_categories_result->fetch_all(MYSQLI_ASSOC);

        foreach ($dropdown_categories as $cat_dropdown): 
            $category_id = $cat_dropdown['id'];
            $category_name = $cat_dropdown['category_name'];

            // Fetch service items for this specific category
            $items_sql = "SELECT * FROM service_items WHERE category_id = ? ORDER BY item_title ASC";
            $items_stmt = $conn->prepare($items_sql);
            $items_stmt->bind_param("i", $category_id);
            $items_stmt->execute();
            $items_result = $items_stmt->get_result();
            $service_items_for_category = $items_result->fetch_all(MYSQLI_ASSOC);
        ?>
            <div class="card">
                <div class="card-header bg-red-800" onclick="toggleDropdown('dropdown-<?php echo htmlspecialchars($category_id); ?>')">
                    <h2><?php echo htmlspecialchars($category_name); ?></h2>
                    <i class="fas fa-chevron-down"></i>
                </div>

                <div class="dropdown-content" id="dropdown-<?php echo htmlspecialchars($category_id); ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php if (!empty($service_items_for_category)): ?>
                            <?php foreach ($service_items_for_category as $item): ?>
                                <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                                    <?php if (!empty($item['image_url'])): ?>
                                        <div class="mb-4">
                                            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['item_title']); ?>" class="w-full h-auto rounded-md">
                                        </div>
                                    <?php else: ?>
                                        <div class="text-4xl text-um-red mb-4">
                                            <i class="fas fa-file-invoice-dollar"></i> <!-- Default icon if no image -->
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="font-semibold text-red-800"><?php echo htmlspecialchars($item['item_title']); ?></h3>
                                    <p class="text-gray-600 mb-4 flex-grow"><?php echo htmlspecialchars($item['item_description']); ?></p>
                                    <?php 
                                    $item_points = explode("\n", $item['points_list'] ?? '');
                                    $item_points = array_map('trim', $item_points);
                                    $item_points = array_filter($item_points);
                                    ?>
                                    <?php if (!empty($item_points)): ?>
                                        <ul class="list-disc list-inside text-gray-600 mb-4">
                                            <?php foreach ($item_points as $point): ?>
                                                <li><?php echo htmlspecialchars($point); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (!empty($item['link_url']) && !empty($item['link_text'])): ?>
                                        <a href="<?php echo htmlspecialchars($item['link_url']); ?>" class="inline-block bg-um-yellow text-um-red px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">
                                            <?php echo htmlspecialchars($item['link_text']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="col-span-3 text-center text-gray-600">No service items found for this category. Please add them via the admin panel.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <!-- Forms Section -->
    <section id="forms" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-red-800 mb-12">Forms & Documents</h2>
            <div class="max-w-3xl mx-auto">
                <div class="relative mb-8">
                    <input type="text" id="formSearch" placeholder="Search forms..." class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <button class="absolute right-3 top-3 text-gray-400 hover:text-red-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
                <div id="formsList" class="space-y-4">
                    <?php if (!empty($grouped_forms)): ?>
                        <?php foreach ($grouped_forms as $group_name => $forms_in_group): ?>
                            <div class="border-b border-gray-200 pb-4 form-group-container" data-group="<?php echo htmlspecialchars(strtolower($group_name)); ?>">
                                <h3 class="text-xl font-semibold text-red-800 mb-3"><?php echo htmlspecialchars($group_name); ?></h3>
                                <ul class="space-y-2">
                                    <?php foreach ($forms_in_group as $form): ?>
                                        <li class="form-item" data-title="<?php echo htmlspecialchars(strtolower($form['document_title'])); ?>">
                                            <a href="<?php echo htmlspecialchars($form['file_url']); ?>" target="_blank" class="text-gray-600 hover:text-red-600 flex items-center">
                                                <?php 
                                                $file_icon = 'fas fa-file'; // Default icon
                                                switch (strtolower($form['document_type'])) {
                                                    case 'pdf': $file_icon = 'fas fa-file-pdf text-red-500'; break;
                                                    case 'doc':
                                                    case 'docx': $file_icon = 'fas fa-file-word text-blue-500'; break;
                                                    case 'xls':
                                                    case 'xlsx': $file_icon = 'fas fa-file-excel text-green-500'; break;
                                                    case 'ppt':
                                                    case 'pptx': $file_icon = 'fas fa-file-powerpoint text-orange-500'; break;
                                                }
                                                ?>
                                                <i class="<?php echo $file_icon; ?> mr-2"></i> 
                                                <?php echo htmlspecialchars($form['document_title']); ?> (<?php echo htmlspecialchars(strtoupper($form['document_type'])); ?>)
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-gray-600">No forms or documents found. Please add them via the admin panel.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footers-baru.php' ?>

    <!-- DROPDOWN OF EACH CATEGORY -->
    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            // Toggle 'active' class to control display via CSS
            dropdown.classList.toggle('active');

            // Close other dropdowns
            document.querySelectorAll('.dropdown-content').forEach(otherDropdown => {
                if (otherDropdown.id !== dropdownId) {
                    otherDropdown.classList.remove('active');
                }
            });
        }
    </script>

    <!-- Forms Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formSearchInput = document.getElementById('formSearch');
            const formsListContainer = document.getElementById('formsList');

            formSearchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const formItems = formsListContainer.querySelectorAll('.form-item');
                const formGroupContainers = formsListContainer.querySelectorAll('.form-group-container');

                formItems.forEach(item => {
                    const title = item.dataset.title;
                    if (title.includes(searchTerm)) {
                        item.style.display = 'flex'; // Show item
                    } else {
                        item.style.display = 'none'; // Hide item
                    }
                });

                // Hide category groups if all their items are hidden
                formGroupContainers.forEach(groupContainer => {
                    const visibleItemsInGroup = Array.from(groupContainer.querySelectorAll('.form-item'))
                                                    .some(item => item.style.display !== 'none');
                    if (visibleItemsInGroup) {
                        groupContainer.style.display = 'block';
                    } else {
                        groupContainer.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <!-- MOBILE MENU SCRIPT (Existing, just ensure it's here) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion (if applicable, ensure elements exist)
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const content = question.nextElementSibling;
                    const icon = question.querySelector('i');
                    if (content) { // Check if content exists
                        if (content.style.maxHeight) {
                            content.style.maxHeight = null;
                            if (icon) icon.style.transform = 'rotate(0deg)';
                        } else {
                            content.style.maxHeight = content.scrollHeight + 'px';
                            if (icon) icon.style.transform = 'rotate(180deg)';
                        }
                    }
                    faqQuestions.forEach(item => {
                        if (item !== question) {
                            const otherContent = item.nextElementSibling;
                            const otherIcon = item.querySelector('i');
                            if (otherContent) otherContent.style.maxHeight = null;
                            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                        }
                    });
                });
            });
            
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        if (menuToggle && mobileMenu) { // Check if elements exist
            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>

</body>
</html>
