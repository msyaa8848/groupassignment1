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
            background: linear-gradient(rgba(0, 50, 100, 0.9), rgba(0, 50, 100, 0.9)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
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
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
              <img src="images/logo-bendahari_upsi.jpg" alt="" class="h-12">
                <span class="ml-3 text-xl font-semibold text-blue-800">Bursar Department</span>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="index.php" class="text-blue-800 hover:text-blue-600 font-medium">Home</a></li>
                    <li><a href="announcement.php" class="text-blue-800 font-medium border-b-2 border-blue-600">Announcements</a></li>
                    <li><a href="services.php" class="text-blue-800 hover:text-blue-600 font-medium">Services</a></li>
                    <li><a href="feedback.php" class="text-blue-800 hover:text-blue-600 font-medium">Feedback</a></li>
                </ul>
            </nav>
            <button id="menuToggle" class="md:hidden text-blue-800 text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Mobile menu -->
        <nav id="mobileMenu" class="md:hidden hidden px-4 pb-4">
            <ul class="space-y-2">
                <li><a href="index.php" class="block text-blue-800 hover:text-blue-600 font-medium">Home</a></li>
                <li><a href="announcement.php" class="block text-blue-800 hover:text-blue-600 font-medium border-b-2 border-blue-600">Announcements</a></li>
                <li><a href="services.php" class="block text-blue-800 hover:text-blue-600 font-medium">Services</a></li>
                <li><a href="feedback.php" class="block text-blue-800 hover:text-blue-600 font-medium">Feedback</a></li>
            </ul>
        </nav>
        
    </header>

    <!-- Page Header -->
    <section class="header-bg text-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Announcements</h1>
            <p class="text-lg md:text-xl max-w-2xl">Stay updated with the latest news and important notices from the Bursar Department</p>
        </div>
    </section>

    <!-- Urgent Announcement Banner -->
    <section class="bg-red-600 text-white py-4">
        <div class="container mx-auto px-4 flex items-center">
            <div class="mr-4 text-2xl">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="flex-grow">
                <h3 class="font-bold">URGENT: Semester 2 Tuition Fee Payment Deadline Extended</h3>
                <p class="text-sm">New deadline: June 30, 2023</p>
            </div>
            <a href="#" class="bg-white text-red-600 font-bold py-2 px-4 rounded hover:bg-gray-100 transition duration-300">
                View Details
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <!-- Filters and Search -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form id="filterForm" class="grid md:grid-cols-3 gap-6">
                <div class="flex flex-col">
                    <label for="category" class="text-sm font-medium text-gray-700 mb-2">Filter by Category</label>
                    <select id="category" name="category" class="form-select w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        <option value="Tuition Fees">Tuition Fees</option>
                        <option value="Financial Aid">Financial Aid</option>
                        <option value="Vendor">Vendor</option>
                        <option value="General">General</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="sort" class="text-sm font-medium text-gray-700 mb-2">Sort by</label>
                    <select id="sort" name="sort" class="form-select w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Announcements Grid -->
        <div id="announcementGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        
            <!-- Announcement Card 1 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-blue-100 text-blue-800">Tuition Fees</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-calendar-alt text-blue-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">June 15, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">New Online Payment System Launch</h3>
                    <p class="text-gray-600 mb-4">We're excited to introduce our upgraded payment portal with enhanced security features and a more user-friendly interface.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Announcement Card 2 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-green-100 text-green-800">Financial Aid</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-graduation-cap text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">June 10, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Financial Aid Applications Now Open</h3>
                    <p class="text-gray-600 mb-4">Applications for the 2023-2024 academic year financial aid programs are now being accepted through the student portal.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Announcement Card 3 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-purple-100 text-purple-800">Vendor</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-purple-100 p-2 rounded-full mr-3">
                            <i class="fas fa-file-invoice-dollar text-purple-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">June 5, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Updated Vendor Payment Process</h3>
                    <p class="text-gray-600 mb-4">Starting July 1, all vendor payments will require submission through our new online portal. Training sessions available.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Announcement Card 4 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-blue-100 text-blue-800">Tuition Fees</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-money-bill-wave text-blue-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">May 28, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Installment Payment Plan Options</h3>
                    <p class="text-gray-600 mb-4">Learn about our flexible tuition payment plans designed to help students manage their educational expenses.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Announcement Card 5 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-yellow-100 text-yellow-800">General</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-yellow-100 p-2 rounded-full mr-3">
                            <i class="fas fa-info-circle text-yellow-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">May 20, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">Bursar Office Summer Hours</h3>
                    <p class="text-gray-600 mb-4">During the summer months (June-August), our office hours will be 8:30am to 3:30pm, Monday through Friday.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Announcement Card 6 -->
            <div class="announcement-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative">
                <span class="category-tag bg-green-100 text-green-800">Financial Aid</span>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-hands-helping text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-500">May 15, 2023</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-800">New Scholarship Opportunities</h3>
                    <p class="text-gray-600 mb-4">Three new scholarship programs have been added for students in STEM fields. Application deadline is July 15.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                        Read More <i class="fas fa-chevron-right ml-1 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex justify-center mt-12 space-x-2">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 border border-blue-500 bg-blue-500 text-white rounded-md">1</a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">3</a>
                <span class="px-4 py-2 text-gray-500">...</span>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">8</a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </main>


    
    <!-- Footer -->
    <?php include 'footers-baru.php' ?>

    <!-- SCRIPT 1 -->

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const cardsPerPage = 6;
        const grid = document.getElementById('announcementGrid');
        const pagination = document.getElementById('pagination');
        let currentPage = 1;

        const allCards = [...grid.children];

        function getVisibleCards() {
            return allCards.filter(card => card.style.display !== 'none');
        }

        function showPage(pageNumber) {
            const visibleCards = getVisibleCards();
            const start = (pageNumber - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            visibleCards.forEach((card, index) => {
                card.style.display = index >= start && index < end ? 'block' : 'none';
            });

            renderPagination(visibleCards.length, pageNumber);
        }

        function renderPagination(totalItems, currentPage) {
            const totalPages = Math.ceil(totalItems / cardsPerPage);
            pagination.innerHTML = '';

            if (totalPages <= 1) return;

            const createPageButton = (text, page) => {
                const btn = document.createElement('button');
                btn.textContent = text;
                btn.className = `px-4 py-2 border rounded-md ${page === currentPage ? 'bg-blue-500 text-white border-blue-500' : 'text-gray-700 border-gray-300 hover:bg-gray-100'}`;
                btn.addEventListener('click', () => showPage(page));
                return btn;
            };

            if (currentPage > 1) {
                pagination.appendChild(createPageButton('«', currentPage - 1));
            }

            for (let i = 1; i <= totalPages; i++) {
                pagination.appendChild(createPageButton(i, i));
            }

            if (currentPage < totalPages) {
                pagination.appendChild(createPageButton('»', currentPage + 1));
            }
        }

        // Hook into filtering
        function filterAndPaginate() {
            filterCards();
            showPage(1);
        }

        // Override event listeners in previous script
        document.getElementById('search').addEventListener('input', filterAndPaginate);
        document.getElementById('category').addEventListener('change', filterAndPaginate);
        document.getElementById('sort').addEventListener('change', filterAndPaginate);

        // Initial load
        showPage(currentPage);
    });
</script>

    <!-- SCRIPT 2 -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            const categorySelect = document.getElementById('category');
            const sortSelect = document.getElementById('sort');
            const cards = [...document.querySelectorAll('.announcement-card')];

            const getDateFromCard = (card) => {
                const dateText = card.querySelector('.text-sm.text-gray-500')?.textContent.trim();
                return new Date(dateText);
            };

            function filterCards() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categorySelect.value;
                const sortOption = sortSelect.value;

                // Filter
                cards.forEach(card => {
                    const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
                    const description = card.querySelector('p')?.textContent.toLowerCase() || '';
                    const category = card.querySelector('.category-tag')?.textContent || '';

                    const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category === selectedCategory;

                    card.style.display = (matchesSearch && matchesCategory) ? 'block' : 'none';
                });

                // Sort
                const visibleCards = cards.filter(c => c.style.display !== 'none');
                visibleCards.sort((a, b) => {
                    const dateA = getDateFromCard(a);
                    const dateB = getDateFromCard(b);

                    return sortOption === 'newest' ? dateB - dateA : dateA - dateB;
                });

                const grid = document.querySelector('.grid');
                visibleCards.forEach(card => grid.appendChild(card)); // Reorder DOM
            }

            searchInput.addEventListener('input', filterCards);
            categorySelect.addEventListener('change', filterCards);
            sortSelect.addEventListener('change', filterCards);
        });
    </script>
    <!-- MOBILE -->
    <script>
        // Mobile menu toggle functionality would go here
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const content = question.nextElementSibling;
                    const icon = question.querySelector('i');
                    
                    // Toggle the content
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    }
                    
                    // Close other open items
                    faqQuestions.forEach(item => {
                        if (item !== question) {
                            item.nextElementSibling.style.maxHeight = null;
                            item.querySelector('i').style.transform = 'rotate(0deg)';
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
    </script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>