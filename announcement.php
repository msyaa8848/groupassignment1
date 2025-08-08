<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPSI - Announcements</title>
    <link rel="icon" href="https://bendahari.upsi.edu.my/wp-content/uploads/2020/09/cropped-upsi-logo-1-180x180.png" type="image/png"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .header-bg {
            background: linear-gradient(rgba(187, 0, 0, 0.7), rgba(42, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .urgent-banner {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(220, 38, 38, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0); }
        }
        
        .announcement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .category-tag {
            position: absolute;
            top: 28px;
            right: 20px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <?php include 'header.php' ?>

    <?php
    require_once 'config/database.php';

    // Fetch the latest urgent news item
    $urgent_news_sql = "SELECT ns.*, nc.category_name 
                        FROM news_section ns
                        LEFT JOIN news_categories nc ON ns.category_id = nc.id
                        WHERE ns.is_urgent = 1 
                        ORDER BY ns.publish_date DESC 
                        LIMIT 1";
    $urgent_news_result = $conn->query($urgent_news_sql);
    $urgent_news = $urgent_news_result->fetch_assoc();

    // Fetch all news items
    $all_news_sql = "SELECT ns.*, nc.category_name 
                     FROM news_section ns
                     LEFT JOIN news_categories nc ON ns.category_id = nc.id
                     ORDER BY ns.publish_date DESC"; // Default sort: Newest First
    $all_news_result = $conn->query($all_news_sql);
    $all_news_items = $all_news_result->fetch_all(MYSQLI_ASSOC);

    // Fetch all categories for the filter dropdown
    $categories_sql = "SELECT id, category_name FROM news_categories ORDER BY category_name ASC";
    $categories_result = $conn->query($categories_sql);
    $categories = $categories_result->fetch_all(MYSQLI_ASSOC);
    ?>

    <!-- Page Header -->
    <section class="header-bg text-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Announcements</h1>
            <p class="text-lg md:text-xl max-w-2xl">Stay updated with the latest news and important notices from the Bursar Department</p>
        </div>
    </section>

    <!-- Urgent Announcement Banner -->
    <?php if ($urgent_news): ?>
    <section class="bg-red-600 text-white py-4 urgent-banner">
        <div class="container mx-auto px-4 flex items-center">
            <div class="mr-4 text-2xl">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="flex-grow">
                <h3 class="font-bold"><?php echo htmlspecialchars($urgent_news['title']); ?></h3>
                <p class="text-sm">New deadline: <?php echo htmlspecialchars(date('F j, Y', strtotime($urgent_news['publish_date']))); ?></p>
            </div>
            <a href="<?php echo htmlspecialchars($urgent_news['link_url'] ?? '#'); ?>" class="bg-white text-red-600 font-bold py-2 px-4 rounded hover:bg-gray-100 transition duration-300">
                View Details
            </a>
        </div>
    </section>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <!-- Filters and Search -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form id="filterForm" class="grid md:grid-cols-3 gap-6">
                <div class="flex flex-col">
                    <label for="category" class="text-sm font-medium text-gray-700 mb-2">Filter by Category</label>
                    <select id="category" name="category" class="form-select w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['category_name']); ?>"><?php echo htmlspecialchars($cat['category_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="sort" class="text-sm font-medium text-gray-700 mb-2">Sort by</label>
                    <select id="sort" name="sort" class="form-select w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="search" class="text-sm font-medium text-gray-700 mb-2">Search</label>
                    <div class="relative">
                        <input
                            id="search"
                            name="search"
                            type="text"
                            placeholder="Search announcements..."
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-red-500"
                        >
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Announcements Grid -->
        <div id="announcementGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        
            <?php if (!empty($all_news_items)): ?>
                <?php foreach ($all_news_items as $news): ?>
                    <!-- Determine category tag color based on category name or a predefined map -->
                    <?php
                    $category_color_class = 'bg-gray-100 text-gray-800'; // Default
                    switch ($news['category_name']) {
                        case 'Tuition Fees':
                            $category_color_class = 'bg-red-100 text-red-800';
                            break;
                        case 'Financial Aid':
                            $category_color_class = 'bg-green-100 text-green-800';
                            break;
                        case 'Vendor':
                            $category_color_class = 'bg-purple-100 text-purple-800';
                            break;
                        case 'General':
                            $category_color_class = 'bg-yellow-100 text-yellow-800';
                            break;
                        // Add more cases for other categories
                    }
                    ?>
                    <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative"
                         data-category="<?php echo htmlspecialchars($news['category_name'] ?? ''); ?>"
                         data-date="<?php echo htmlspecialchars($news['publish_date']); ?>">
                        <?php if (!empty($news['category_name'])): ?>
                            <span class="category-tag <?php echo $category_color_class; ?>"><?php echo htmlspecialchars($news['category_name']); ?></span>
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="bg-red-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-calendar-alt text-red-600"></i> <!-- Default icon, consider adding icon field to DB -->
                                </div>
                                <span class="text-sm text-gray-500"><?php echo htmlspecialchars(date('F j, Y', strtotime($news['publish_date']))); ?></span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 text-red-800"><?php echo htmlspecialchars($news['title']); ?></h3>
                            <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($news['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($news['link_url'] ?? '#'); ?>" class="text-red-600 font-medium hover:underline inline-flex items-center">
                                Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="col-span-full text-center text-gray-600">No announcements found.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex justify-center mt-12 space-x-2">
            <!-- Pagination buttons will be generated by JavaScript -->
        </div>
    </main>
    
    <!-- Footer -->
    <?php include 'footers-baru.php' ?>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const cardsPerPage = 6;
        const grid = document.getElementById('announcementGrid');
        const pagination = document.getElementById('pagination');
        
        // Get all cards from the DOM (these are now dynamically generated by PHP)
        let allCards = [...document.querySelectorAll('.announcement-card')];

        function getVisibleCards() {
            // Filter based on current display style set by filterCards
            return allCards.filter(card => card.style.display !== 'none');
        }

        function showPage(pageNumber) {
            const visibleCards = getVisibleCards();
            const start = (pageNumber - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            visibleCards.forEach((card, index) => {
                // Only show cards for the current page
                card.style.display = (index >= start && index < end) ? 'block' : 'none';
            });

            // Ensure all non-visible cards (from filtering) are hidden
            allCards.forEach(card => {
                if (!visibleCards.includes(card)) {
                    card.style.display = 'none';
                }
            });

            renderPagination(visibleCards.length, pageNumber);
        }

        function renderPagination(totalItems, currentPage) {
            const totalPages = Math.ceil(totalItems / cardsPerPage);
            pagination.innerHTML = '';

            if (totalPages <= 1) return;

            const createPageButton = (text, page) => {
                const btn = document.createElement('button');
                btn.innerHTML = text; // Use innerHTML for icons
                btn.className = `px-4 py-2 border rounded-md ${page === currentPage ? 'bg-red-500 text-white border-red-500' : 'text-gray-700 border-gray-300 hover:bg-gray-100'}`;
                btn.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default link behavior if it were an <a>
                    currentPage = page; // Update current page
                    showPage(page);
                });
                return btn;
            };

            if (currentPage > 1) {
                pagination.appendChild(createPageButton('<i class="fas fa-chevron-left"></i>', currentPage - 1));
            }

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                pagination.appendChild(createPageButton(i, i));
            }

            if (currentPage < totalPages) {
                pagination.appendChild(createPageButton('<i class="fas fa-chevron-right"></i>', currentPage + 1));
            }
        }

        const searchInput = document.getElementById('search');
        const categorySelect = document.getElementById('category');
        const sortSelect = document.getElementById('sort');

        const getDateFromCard = (card) => {
            const dateText = card.dataset.date; // Use data-date attribute
            return new Date(dateText);
        };

        function filterAndSortCards() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categorySelect.value;
            const sortOption = sortSelect.value;

            // First, reset all cards to block for filtering
            allCards.forEach(card => card.style.display = 'block');

            // Filter
            let currentlyDisplayedCards = allCards.filter(card => {
                const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
                const description = card.querySelector('p')?.textContent.toLowerCase() || '';
                const category = card.dataset.category.toLowerCase(); // Use data-category

                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                const matchesCategory = !selectedCategory || category === selectedCategory.toLowerCase();
                
                return matchesSearch && matchesCategory;
            });

            // Sort
            currentlyDisplayedCards.sort((a, b) => {
                const dateA = getDateFromCard(a);
                const dateB = getDateFromCard(b);

                return sortOption === 'newest' ? dateB - dateA : dateA - dateB;
            });

            // Reorder DOM and then paginate
            grid.innerHTML = ''; // Clear existing cards
            currentlyDisplayedCards.forEach(card => grid.appendChild(card)); // Append sorted/filtered cards

            // Re-initialize allCards for pagination after DOM reordering
            allCards = [...document.querySelectorAll('.announcement-card')]; 
            
            currentPage = 1; // Reset to first page after filtering/sorting
            showPage(currentPage);
        }

        // Event listeners for filters and sort
        searchInput.addEventListener('input', filterAndSortCards);
        categorySelect.addEventListener('change', filterAndSortCards);
        sortSelect.addEventListener('change', filterAndSortCards);

        // Initial load
        filterAndSortCards(); // Call this to initially populate and paginate
    });
    </script>

    <!-- MOBILE MENU SCRIPT -->
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
