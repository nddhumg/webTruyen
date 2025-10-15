<header class="bg-blue-500 dark:bg-gray-900 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('index') }}" class="flex-shrink-0">
                    <img src="https://www.toptruyentv11.com/images/logo/top-truyen.png" alt="Top Truyện"
                        class="h-10 w-auto" id="logo">
                </a>
            </div>

            <!-- Dark Mode Toggle -->
            <div class="flex items-center justify-center min-h-screen dark:bg-gray-900">
                <label class="flex items-center cursor-pointer">
                    <!-- Checkbox ẩn -->
                    <input type="checkbox" class="hidden peer">

                    <!-- Track -->
                    <span
                        class="w-12 h-6 rounded-full relative transition-colors duration-300 ease-in-out peer-checked:bg-blue-500 bg-gray-400">
                        <span
                            class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transform transition-transform duration-300 peer-checked:translate-x-6">
                        </span>


                </label>
            </div>


            <!-- Search -->
            <div class="hidden md:flex items-center bg-gray-100 dark:bg-gray-800 rounded-full px-3 py-1">
                <input type="text"
                    class="bg-transparent focus:outline-none px-2 w-64 text-sm text-gray-700 dark:text-gray-200"
                    placeholder="Nhập tên truyện, tác giả cần tìm..." autocomplete="off">
                <i class="fad fa-spinner fa-pulse text-gray-500 loading-search hidden"></i>
                <button type="submit" class="text-gray-600 hover:text-blue-500">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Icons + User -->
            <div class="flex items-center space-x-4  @if (!Auth::check()) hidden @endif">

                <!-- Notifications -->
                <a href="#" title="Thông báo" class="text-gray-600 hover:text-blue-500 dark:text-gray-300">
                    <i class="fas fa-comment text-xl"></i>
                </a>

                <!-- User Menu -->
                <div class="relative group z-50">
                    <a href="javascript:void(0);" class="flex items-center space-x-2 text-gray-700 dark:text-gray-200">
                        <img src="https://www.toptruyentv11.com/images/users/anonymous.png"
                            class="h-8 w-8 rounded-full border">
                        <span>{{Auth::user()?->name}}</span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <ul
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md opacity-0 group-hover:opacity-100 transition pointer-events-auto">
                        <li class="space-x-2">
                            <a href="{{ route('users.info')}}"
                                class="flex items-center rounded-md px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                                <i class="fa fa-user mr-2"></i> Thông tin tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.logout') }}"
                                class="flex items-center px-4 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                                <i class="fad fa-sign-out-alt mr-2"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Mobile Buttons -->
                <button type="button" class="md:hidden text-gray-600 hover:text-blue-500">
                    <i class="fas fa-search"></i>
                </button>



            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-4 @if (Auth::check()) hidden @endif">
                <!-- Link đăng ký -->
                <a href="{{ route('register') }}" class="text-white-700  font-medium text-center sm:text-left">
                    Chưa có tài khoản ?
                    <span class="block text-white-600 font-semibold mt-1">
                        Đăng ký ngay <i class="fas fa-caret-right ml-1"></i>
                    </span>
                </a>

                <button type="button" onclick="window.location='{{ route('login') }}'"
                    class="flex items-center px-4 py-2 bg-amber-400 text-gray-900 font-semibold rounded hover:bg-amber-500 transition-colors">
                    <i class="fal fa-sign-in-alt mr-2" style="font-weight: 600"></i> Đăng nhập
                </button>

            </div>

        </div>
    </div>
</header>
<div class="flex justify-center items-center h-16 bg-gray-200 " id="navbar">
    <ul class="flex justify-center items-center space-x-4 bg-gray-200 p-2 rounded-md max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Home -->
        <li class="border-r border-gray-200   ">
            <a href="{{ route('index') }}"
                class="flex items-center px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                <i class="fa fa-home mr-1"></i> Trang chủ
            </a>
        </li>

        <!-- Hot -->
        <li class="border-r border-gray-200  ">
            <a href="https://www.toptruyentv11.com/hot"
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                Hot
            </a>
        </li>

        <!-- Thể loại -->
        <li class="relative group border-r border-gray-200  ">
            <button class="flex items-center px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                <i class="fa fa-tags mr-1 text-sm"></i> Thể loại <i class="fas fa-caret-down ml-1"></i>
            </button>
            <div
                class="absolute left-0 top-full mt-1 hidden group-hover:block bg-white shadow-lg border rounded-md w-64 z-50">
                <div class="grid grid-cols-2 gap-2 p-2">
                    <a href="https://www.toptruyentv11.com/tim-truyen/action"
                        class="block px-2 py-1 hover:bg-gray-50 rounded">Action</a>
                    <a href="https://www.toptruyentv11.com/tim-truyen/adventure"
                        class="block px-2 py-1 hover:bg-gray-50 rounded">Adventure</a>
                    <a href="https://www.toptruyentv11.com/tim-truyen/romance"
                        class="block px-2 py-1 hover:bg-gray-50 rounded text-red-600 font-semibold">Romance</a>
                    <a href="https://www.toptruyentv11.com/tim-truyen/comedy"
                        class="block px-2 py-1 hover:bg-gray-50 rounded">Comedy</a>
                </div>
            </div>
        </li>

        <!-- Lịch sử -->
        <li class="border-r border-gray-200  ">
            <a href="https://www.toptruyentv11.com/history"
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                Lịch sử <i class="fal fa-history ml-1"></i>
            </a>
        </li>

        <!-- Theo dõi -->
        <li class="border-r border-gray-200  ">
            <a href="https://www.toptruyentv11.com/follow"
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                Theo dõi
            </a>
        </li>

        <!-- Xếp hạng -->
        <li class="relative group border-r border-gray-200  ">
            <button class="px-3 py-2 rounded-md flex items-center hover:bg-gray-50 active:bg-gray-300">
                Xếp hạng <i class="fas fa-caret-down ml-1"></i>
            </button>
            <div
                class="absolute left-0 top-full mt-1 hidden group-hover:block bg-white shadow-lg border rounded-md w-48 z-50 p-2">
                <a href="https://www.toptruyentv11.com/tim-truyen?sort=2"
                    class="block px-2 py-1 hover:bg-gray-50 rounded">Top all</a>
                <a href="https://www.toptruyentv11.com/tim-truyen?sort=3"
                    class="block px-2 py-1 hover:bg-gray-50 rounded">Top tháng</a>
                <a href="https://www.toptruyentv11.com/tim-truyen?sort=5"
                    class="block px-2 py-1 hover:bg-gray-50 rounded">Top tuần</a>
                <a href="https://www.toptruyentv11.com/tim-truyen?sort=6"
                    class="block px-2 py-1 hover:bg-gray-50 rounded">Top ngày</a>
            </div>
        </li>

        <!-- Con trai / Con gái / Manhwa 18 / Group -->
        <li class="border-r border-gray-200  ">
            <a href="https://www.toptruyentv11.com/truyen-con-trai"
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">Con trai</a>
        </li>
        <li class="border-r border-gray-200   ">
            <a href="https://www.toptruyentv11.com/truyen-con-gai "
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">Con gái</a>
        </li>
        <li class="border-r border-gray-200  ">
            <a href="//doctruyen3qui14.pro/tim-truyen/18" target="_blank"
                class="px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">ManhWa 18</a>
        </li>
        <li class = "border-r border-gray-200  ">
            <a href="https://www.facebook.com/toptruyenz" target="_blank"
                class="flex items-center px-3 py-2 rounded-md hover:bg-gray-50 active:bg-gray-300">
                <i class="fab fa-facebook-f mr-1"></i> Group
            </a>
        </li>
    </ul>
</div>

<script>
    function checkDisplayNavBar() {
        console.log(document.siz)
        const menuItems = document.getElementById('navbar');
        if (window.innerWidth < 768) {
            menuItems.style.display = 'none';
        } else {
            menuItems.style.display = 'block';
        }
    }

    function displayItem() {

    }

    checkDisplayNavBar();

    // Lắng nghe khi thay đổi kích thước cửa sổ
    window.addEventListener('resize', checkDisplayNavBar);
</script>
