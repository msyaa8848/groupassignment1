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
        <div class="p-4 border border-gray-200 rounded-lg">
            <h3 class="font-semibold text-blue-800">Favourite Apps</h3>
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
                <p class="text-gray-600 mb-4 flex-grow">Access your payroll information and manage deductions</p>
                <ul class="list-disc list-inside text-gray-600 mb-4">
                    <li>View pay stubs online</li>
                    <li>Update tax information</li>
                    <li>Request salary advances</li>
                </ul>

                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
            <!-- BOX 2 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Expenses Claims</h3>
                <p class="text-gray-600 mb-4 flex-grow">Application form for staff and lecturer.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
            <!-- BOX 3 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">QR Attendance</h3>
                <p class="text-gray-600 mb-4 flex-grow">especially if the qris is not working properly.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
            <!-- BOX 4 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Asset & Inventory Catalogue</h3>
                <p class="text-gray-600 mb-4 flex-grow">View the registered stock.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
            <!-- BOX 5 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">QR Asset Inventory</h3>
                <p class="text-gray-600 mb-4 flex-grow">For staff to view and manage asset records.</p>
                <a href="#" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
            <!-- BOX 6 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">MyQRIS (Staff Edition)</h3>
                <p class="text-gray-600 mb-4 flex-grow">Related with additional myCPD / myCHAMP points </p>
                <a href="https://play.google.com/store/apps/details?id=upsi.com.myqris" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Click Me</a>
            </div>
        </div>

        <!-- ROW 2: STAFF SECTION  -->
        <br>
        <div class="p-4 border border-gray-200 rounded-lg">
            <h3 class="font-semibold text-blue-800">ONLY STAFF</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- BOX 1 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">PEKELILING BENDAHARI</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-1</p>
                <a href="https://bendahari.upsi.edu.my/pekeliling-bendahari" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 2 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">MEMO BENDAHARI</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-2</p>
                <a href="https://bendahari.upsi.edu.my/memo-bendahari" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 3 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">GARIS PANDUAN</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-3</p>
                <a href="https://bendahari.upsi.edu.my/garis-panduan" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 4 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">PROSEDUR ALIRAN KERJA</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-4</p>
                <a href="https://bendahari.upsi.edu.my/prosedur" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 5 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">ARAHAN KERJA</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-5</p>
                <a href="https://bendahari.upsi.edu.my/arahan-kerja" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 6 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">MANUAL PENGGUNA</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-6</p>
                <a href="https://bendahari.upsi.edu.my/manual-pengguna" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 7 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">PERATURAN KEWANGAN & PERAKAUNAN UPSI</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-7</p>
                <a href="https://bendahari.upsi.edu.my/peraturan-kewangan-perakaunan-upsi" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 8 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">PETIKAN BERKAITAN KEWANGAN YANG DILULUSKAN OLEH LPU/JKTK/JKPU
MANUAL </h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-8</p>
                <a href="https://bendahari.upsi.edu.my/jawatankuasa-tetap-kewangan-jktk" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            <!-- BOX 9 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">TAKWIM</h3>
                <p class="text-gray-600 mb-4 flex-grow">MEMO-9</p>
                <a href="https://online.pubhtml5.com/nqvb/jszd/#p=1" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Discover Me</a>
            </div>
            
        </div>

        <!-- ROW 3: UPSI SYSTEM -->

        <br>
        <div class="p-4 border border-gray-200 rounded-lg">
            <h3 class="font-semibold text-blue-800">UPSI SYSTEM</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- BOX 1 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">UPSI PORTAL (MAIN)</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://login.upsi.edu.my/" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
            </div>
            <!-- BOX 2 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myHRIS</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://unihris.upsi.edu.my/login" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
            </div>
            <!-- BOX 3 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myFIS NEO</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://myfisneo.upsi.edu.my/" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
            </div>
            <!-- BOX 4 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">mySTAFF</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://unistaff.upsi.edu.my/login" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
            </div>
            <!-- BOX 5 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myGURU</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://myguru.upsi.edu.my/users/auth/logindigitalID" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
            </div>
            <!-- BOX 6 -->
            <div class="service-card bg-white p-6 rounded-lg shadow-md flex flex-col">
                <div class="text-4xl text-um-blue mb-4">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">myStd Attendance</h3>
                <p class="text-gray-600 mb-4 flex-grow"></p>
                <a href="https://unisis.upsi.edu.my/login" class="inline-block bg-um-yellow text-um-blue px-4 py-2 rounded-lg hover:bg-yellow-500 text-center">Visit</a>
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