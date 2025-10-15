<header class="bg-blue-500 dark:bg-gray-900 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="flex-shrink-0">
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
            <div class="flex items-center space-x-4">

                <!-- Notifications -->
                <a href="#" title="Thông báo" class="text-gray-600 hover:text-blue-500 dark:text-gray-300">
                    <i class="fas fa-comment text-xl"></i>
                </a>

                <!-- User Menu -->
                <div class="relative group">
                    <a href="javascript:void(0);" class="flex items-center space-x-2 text-gray-700 dark:text-gray-200">
                        <img src="https://www.toptruyentv11.com/images/users/anonymous.png"
                            class="h-8 w-8 rounded-full border">
                        <span>D</span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <ul
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md opacity-0 group-hover:opacity-100 transition pointer-events-auto">
                        <li>
                            <a href="https://www.toptruyentv11.com/user/account-information"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                                <i class="fa fa-user mr-2"></i> Thông tin tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="https://www.toptruyentv11.com/user/comic-follow"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                                <i class="fad fa-book mr-2"></i> Truyện theo dõi
                            </a>
                        </li>
                        <li>
                            <a href="https://www.toptruyentv11.com/logout"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
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
        </div>
    </div>
</header>

<script async>
    $("#login").load('https://www.toptruyentv11.com/header-login');
</script>
