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
            background: linear-gradient(rgba(0, 50, 100, 0.9), rgba(0, 50, 100, 0.9)), 
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <img src="images/logo-bendahari_upsi.jpg" alt="UPSI Logo" class="h-12" />
                <span class="ml-3 text-xl font-semibold text-blue-800">Bursar Department</span>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="index.php" class="text-blue-800 hover:text-blue-600 font-medium">Home</a></li>
                    <li><a href="announcement.php" class="text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>
                    <li><a href="services.php" class="text-blue-800 font-medium border-b-2 border-blue-600">Services</a></li>
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
                <li><a href="announcement.php" class="block text-blue-800 hover:text-blue-600 font-medium">Announcements</a></li>
                <li><a href="services.php" class="block text-blue-800 hover:text-blue-600 font-medium border-b-2 border-blue-600">Services</a></li>
                <li><a href="feedback.php" class="block text-blue-800 hover:text-blue-600 font-medium">Feedback</a></li>
            </ul>
        </nav>
    </header>

    <!-- Page Header -->
    <section class="header-bg text-white py-16 text-center">
            <!-- <div class="container mx-auto px-4 text-center"> -->
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white">Our Services</h1>
            <p class="text-lg md:text-xl">Explore the financial services available to students, staff, and vendors.</p>
    </section>
    
    <!-- START HERE -->
    <!-- Services Overview -->
    <main class="container mx-auto px-4 py-12">

    <!-- NEW -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="service-card student-card bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-4xl text-green-500 mb-4">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-bold text-um-blue mb-3">Student Services</h3>
                    <p class="mb-4">Comprehensive financial services designed to support students throughout their academic journey.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Tuition fee payment processing</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Financial aid and scholarships</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Refund requests</span>
                        </div>
                    </div>
                    <a href="#student" class="inline-block bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Explore</a>
                </div>
                
                <div class="service-card staff-card bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-4xl text-blue-500 mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-bold text-um-blue mb-3">Staff Services</h3>
                    <p class="mb-4">Efficient financial solutions for university staff and faculty members.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mt-1 mr-2"></i>
                            <span>Salary and payroll management</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mt-1 mr-2"></i>
                            <span>Expense reimbursements</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mt-1 mr-2"></i>
                            <span>Research funding</span>
                        </div>
                    </div>
                    <a href="#staff" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Explore</a>
                </div>
                
                <div class="service-card vendor-card bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-4xl text-orange-500 mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="text-xl font-bold text-um-blue mb-3">Vendor Services</h3>
                    <p class="mb-4">Streamlined financial processes for vendors working with the university.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                            <span>Vendor registration</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                            <span>Invoice processing</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                            <span>Payment tracking</span>
                        </div>
                    </div>
                    <a href="#vendor" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600">Explore</a>
                </div>
            </div>

        <!-- Service Categories -->
        <h2 class="text-2xl font-semibold text-um-blue mb-6">Service Categories</h2>    

            <!-- LINK TO EXTERNAL -->
            <div class="card">
                <div class="card-header" onclick="toggleDropdown('studentDropdown')">
                    <h2>Student Services</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-content" id="studentDropdown">
                    <div class="service-card p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-blue-800">Tuition Fee Payment (ePayment)</h3>
                        <p class="text-gray-600">Manage your tuition fee payments easily through our online portal.</p>
                        <ul class="list-disc list-inside text-gray-600 mb-4">
                            <li>Convenient online payment options</li>
                            <li>Payment plans available</li>
                            <li>Secure transactions</li>
                        </ul>
                        <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Pay Now</a>
                    </div>
                    <br>
                    <div class="service-card p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-blue-800">Financial Aid</h3>
                        <p class="text-gray-600">Apply for financial assistance to support your studies.</p>
                        <ul class="list-disc list-inside text-gray-600 mb-4">
                            <li>Scholarships and grants available</li>
                            <li>Eligibility criteria apply</li>
                            <li>Application deadlines must be met</li>
                        </ul>
                        <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Apply Now</a>
                    </div>
                    <br>
                    <div class="service-card p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-blue-800">Fee Rate</h3>
                        <p class="text-gray-600">Apply for financial assistance to support your studies.</p>
                        <ul class="list-disc list-inside text-gray-600 mb-4">
                            <li>Scholarships and grants available</li>
                            <li>Eligibility criteria apply</li>
                            <li>Application deadlines must be met</li>
                        </ul>
                        <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Apply Now</a>
                    </div>
                    <br>
                    <div class="service-card p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-blue-800">Payment Method</h3>
                        <p class="text-gray-600">Apply for financial assistance to support your studies.</p>
                        <ul class="list-disc list-inside text-gray-600 mb-4">
                            <li>Scholarships and grants available</li>
                            <li>Eligibility criteria apply</li>
                            <li>Application deadlines must be met</li>
                        </ul>
                        <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Apply Now</a>
                    </div>

                </div>
            </div>

            <?php include 'staff-dropdown.php' ?>

            <div class="card">
                <div class="card-header" onclick="toggleDropdown('vendorDropdown')">
                    <h2>Vendor Services</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-content" id="vendorDropdown">
                    <div class="flex flex-col space-y-4">
                        <div class="service-card p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-semibold text-blue-800">New Registration</h3>
                            <p class="text-gray-600">Register your business to become a university vendor.</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Complete the online registration form</li>
                                <li>Provide necessary documentation</li>
                                <li>Receive confirmation upon approval</li>
                            </ul>
                            <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Register Now</a>
                        </div>
<!-- SPACE OR DIVIDER -->
                        <div class="flex flex-col space-y-4"></div>
                        <div class="service-card p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-semibold text-blue-800">Payment (Invoice)</h3>
                            <p class="text-gray-600">Submit invoices for prompt payment processing.</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Submit invoices through our portal</li>
                                <li>Track payment status online</li>
                                <li>Clear guidelines for submission</li>
                            </ul>
                            <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Submit Invoice</a>
                        </div>
<!-- SPACE OR DIVIDER -->
                        <div class="flex flex-col space-y-4"></div>
                        <div class="service-card p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-semibold text-blue-800">Tender</h3>
                            <p class="text-gray-600">Submit invoices for prompt payment processing.</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Submit invoices through our portal</li>
                                <li>Track payment status online</li>
                                <li>Clear guidelines for submission</li>
                            </ul>
                            <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Submit Invoice</a>
                        </div>
<!-- SPACE OR DIVIDER -->
                        <div class="flex flex-col space-y-4"></div>
                        <div class="service-card p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-semibold text-blue-800">View Payment</h3>
                            <p class="text-gray-600">Submit invoices for prompt payment processing.</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Submit invoices through our portal</li>
                                <li>Track payment status online</li>
                                <li>Clear guidelines for submission</li>
                            </ul>
                            <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Submit Invoice</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Forms Section -->
    <section id="forms" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Forms & Documents</h2>
            <div class="max-w-3xl mx-auto">
                <div class="relative mb-8">
                    <input type="text" placeholder="Search forms..." class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button class="absolute right-3 top-3 text-gray-400 hover:text-blue-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">Tuition Fee Forms</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-pdf text-red-500 mr-2"></i> Tuition Fee Payment Form (PDF)</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-word text-blue-500 mr-2"></i> Installment Payment Request (DOC)</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-excel text-green-500 mr-2"></i> Fee Structure 2023 (XLS)</a></li>
                        </ul>
                    </div>
                    
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">Financial Aid Forms</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-pdf text-red-500 mr-2"></i> Scholarship Application Form (PDF)</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-pdf text-red-500 mr-2"></i> Financial Aid Checklist (PDF)</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-word text-blue-500 mr-2"></i> Income Declaration Form (DOC)</a></li>
                        </ul>
                    </div>
                    
                    <div class="pb-4">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">Vendor Forms</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-pdf text-red-500 mr-2"></i> Vendor Registration Form (PDF)</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 flex items-center"><i class="fas fa-file-invoice-dollar text-purple-500 mr-2"></i> Invoice Template (DOC)</a></li>
                        </ul>
                    </div>
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
            const isVisible = dropdown.style.display === 'block';
            dropdown.style.display = isVisible ? 'none' : 'block';
        }
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
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

                // Optional: close menu when a link is clicked
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html>