<head>
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

<div class="card">
    <div class="card-header" onclick="toggleDropdown('staffDropdown')">
        <h2>Staff Services</h2>
        <i class="fas fa-chevron-down"></i>
    </div>
    <div class="dropdown-content" id="staffDropdown">
        <div class="service-card p-4 border border-gray-200 rounded-lg">
            <h3 class="font-semibold text-blue-800">Payroll</h3>
            <p class="text-gray-600">Access your payroll information and manage deductions.</p>
            <ul class="list-disc list-inside text-gray-600 mb-4">
                <li>View pay stubs online</li>
                <li>Update tax information</li>
                <li>Request salary advances</li>
            </ul>
            <a href="#" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Learn More</a>
        </div>
        <br>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- to make the box by grid class -->
            <!-- BOX 1 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Payroll</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff view the date payments.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 2 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Expenses Claims</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to submit work-related expense claims.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 3 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Attendance</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to record and view attendance.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 4 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">QR Asset Inventory</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to manage and view asset inventory via QR.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 5 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Asset and Inventory Catalog</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to view and manage asset records.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 6 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">MyQRIS</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to manage work-related reimbursement claims.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 7 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Circulars</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to view circulars and payment-related notices.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 8 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Memo</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to download internal announcements and updates.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 9 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Guideline</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to follow procedures and operation guidelines.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 10 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Procedure</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to follow operational procedures.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 11 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Work Instructions</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to receive and follow work instructions.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 12 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">User MAnual</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to refer to user manuals.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 13 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Rules</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to understand institutional rules and regulations.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 14 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Quote</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to access official excerpts and notes.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 15 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Calendar</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to view the official academic or work calendar.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 16 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">UPSI PORTAL MAIN</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to access the main UPSI portal.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 17 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myHR</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to access the Human Resources system.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 18 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myFIS NEO</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to manage finance and inventory systems.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 19 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">mySTAFF(unistaff)</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to access staff-related services./p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 20 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myGURU</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to manage academic and teaching activities.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
            <!-- BOX 21 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">mySTUD (LECT ONLY)</h3>
                <p class="text-gray-600 mb-4 flex-grow">For lecturers to manage student-related academic information.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Download PDF</a>
            </div>
                        
            
            
            
            
        </div>
    <!--    
        <button>Expense Claims</button>
        <button>Leave Application</button>
        <button>HR Policies</button>
        <button>Staff Directory</button>
        
        -->
    </div>
</div>