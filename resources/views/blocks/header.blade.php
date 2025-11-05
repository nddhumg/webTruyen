@vite(['resources/js/header.js'])
<div class="">
    <header class="bg-blue-500 dark:bg-gray-900 shadow-md">
        <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl w-screen">

            <!-- Logo -->
            <div class="">
                <a href="{{ route('index') }}" class="flex-shrink-0">
                    <img src="https://www.toptruyentv11.com/images/logo/top-truyen.png" alt="Top Truyện"
                        class="h-10 w-auto" id="logo">
                </a>
            </div>

            <!-- Dark Mode Toggle -->
            <div class="dark:bg-gray-900">
                <label class="flex cursor-pointer">
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
            <div class="hidden md:flex bg-gray-100 dark:bg-gray-800 rounded-full px-3 py-1 flex-grow max-w-md mx-4">
                <input type="text"
                    class="bg-transparent focus:outline-none px-2 flex-1 text-sm text-gray-700 dark:text-gray-200"
                    placeholder="Nhập tên truyện, tác giả cần tìm..." autocomplete="off">
                <button type="submit" class="text-gray-600 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path d=" M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0
    1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </div>

            <!-- Icons + User -->
            <div class="space-x-4 @if (Auth::check()) md:block @endif hidden">

                <!-- User Menu -->
                <div class="relative group z-50 ">
                    <button class="flex items-center space-x-2 text-gray-700 dark:text-gray-200 cursor-pointer"
                        id ="userMenuBtn">
                        <img src="https://www.toptruyentv11.com/images/users/anonymous.png"
                            class="h-8 w-8 rounded-full borqder">
                        <span>{{ Auth::user()?->name }}</span>
                        <i class="fa fa-caret-down"></i>
                    </button>

                    <ul class="absolute left-0 right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md opacity-0 transition pointer-events-auto"
                        id ="userMenu">
                        <li class="space-x-2">
                            <a href="{{ route('users.info') }}"
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
            </div>

            <div
                class="hidden @if (!Auth::check()) md:flex @endif flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}" class="text-white-700 font-medium text-center sm:text-left">
                    Chưa có tài khoản ?
                    <span class="block text-white-600 font-semibold mt-1">
                        Đăng ký ngay <i class="fas fa-caret-right ml-1"></i>
                    </span>
                </a>

                <button type="button" onclick="window.location='{{ route('login') }}'"
                    class="flex items-center w px-4 py-2 bg-amber-400 text-gray-900 font-semibold rounded hover:bg-amber-500 transition-colors">
                    <i class="fal fa-sign-in-alt mr-2" style="font-weight: 600"></i> Đăng nhập
                </button>

            </div>
            <button class="p-1 md:hidden block bg-yellow-300 m-4 w-12 rounded-sm" id="mb_BtnMenu">Menu</button>
        </div>
    </header>
    <div class="md:flex justify-center items-center h-16 bg-gray-200 hidden" id="navbar">
        <ul
            class="flex justify-center items-center space-x-4 bg-gray-200 p-2 rounded-md max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 ">
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
    <div class="fixed inset-0 bg-black/50 z-50 w-screen flex flex-col bg-neutral-900 mt-16 hidden overflow-auto"
        id="mb_Menu">
        <div class="bg-gray-100 dark:bg-gray-800 rounded-full px-3 py-1 mx-4 m-8 shrink flex justify-between">
            <input type="text"
                class="bg-transparent focus:outline-none px-2 flex-1 text-sm text-gray-700 dark:text-gray-200"
                placeholder="Nhập tên truyện, tác giả cần tìm..." autocomplete="off">
            <button type="submit" class="text-gray-600 hover:text-blue-500 order-last">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d=" M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 01.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </div>
        <ul class="flex flex-col mx-8 text-slate-50">
            <li class="my-1">
                <div class="text-red-600 font-bold"><a href="{{ route('index') }}">
                        Trang chủ
                    </a>
                </div>
            </li>
            <li class=" my-1">
                <div class="hover:text-red-600 "><a href="https://www.toptruyentv11.com/hot" class=" ">Hot</a>
                </div>
            </li>
            <li class=" my-1">
                <div class=""><a class="  category-mobile">Thể loại <i class="fas fa-caret-down"></i></a>
                    <ul class="grid grid-cols-2 sm:grid-cols-3 m-4 hidden">
                        <li class="hover:text-red-600 "><a href="https://www.toptruyentv11.com/tim-truyen"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Tất cả</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại này thường có nội dung về đánh nhau, bạo lực, hỗn loạn, với diễn biến nhanh"
                                href="https://www.toptruyentv11.com/tim-truyen/action" target="_self"><strong
                                    class="font-normal">Action</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại Adult đề cập đến vấn đề nhạy cảm, chỉ dành cho tuổi 17+"
                                href="https://www.toptruyentv11.com/tim-truyen/truong-thanh"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Adult</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại phiêu lưu, mạo hiểm, thường là hành trình của các nhân vật"
                                href="https://www.toptruyentv11.com/tim-truyen/phieu-luu" target="_self"><strong
                                    class="font-normal">Adventure</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Truyện đã được chuyển thể thành film Anime"
                                href="https://www.toptruyentv11.com/tim-truyen/anime" target="_self"><strong
                                    class="font-normal">Anime</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại này là những câu chuyện về người ở một thế giới này xuyên đến một thế giới khác, có thể là thế giới mang phong cách trung cổ với kiếm sĩ và ma thuật, hay thế giới trong game, hoặc có thể là bạn chết ở nơi này và được chuyển sinh đến nơi khác"
                                href="https://www.toptruyentv11.com/tim-truyen/chuyen-sinh" target="_self"><strong
                                    class="font-normal">Chuyển Sinh</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại có nội dung trong sáng và cảm động, thường có các tình tiết gây cười, các xung đột nhẹ nhàng"
                                href="https://www.toptruyentv11.com/tim-truyen/comedy" target="_self"><strong
                                    class="font-normal">Comedy</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/nau-an"
                                target="_self"><strong class="font-normal">Cooking</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/comic"
                                target="_self"><strong class="font-normal">Comic</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại truyện phóng tác do fan hay có thể cả những Mangaka khác với tác giả truyện gốc. Tác giả vẽ Doujinshi thường dựa trên những nhân vật gốc để viết ra những câu chuyện theo sở thích của mình"
                                href="https://www.toptruyentv11.com/tim-truyen/co-dai" target="_self"><strong
                                    class="font-normal">Cổ
                                    Đại</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/drama"
                                target="_self"><strong class="font-normal">Drama</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a data-title="Truyện tình cảm giữa nam và nam."
                                href="https://www.toptruyentv11.com/tim-truyen/dam-my"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Đam Mỹ</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/ecchi"
                                target="_self"><strong class="font-normal">Ecchi</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/fantasy"
                                target="_self"><strong class="font-normal">Fantasy</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/harem"
                                target="_self"><strong class="font-normal">Harem</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a data-title="Thể loại có liên quan đến thời xa xưa"
                                href="https://www.toptruyentv11.com/tim-truyen/historical" target="_self"><strong
                                    class="font-normal">Historical</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a ref="https://www.toptruyentv11.com/tim-truyen/horror"
                                target="_self"><strong class="font-normal">Horror</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a data-title="Truyện đã được chuyển thể thành phim"
                                href="https://www.toptruyentv11.com/tim-truyen/live-action" target="_self"><strong
                                    class="font-normal">Live action</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Truyện tranh của Nhật Bản"
                                href="https://www.toptruyentv11.com/tim-truyen/manga" target="_self"><strong
                                    class="font-normal">Manga</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Truyện tranh của Trung Quốc"
                                href="https://www.toptruyentv11.com/tim-truyen/manhua"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Manhua</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/manhwa"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Manhwa</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/martial-arts"
                                target="_self"><strong class="font-normal">Martial Arts</strong
                                    class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/mature"
                                target="_self"><strong class="font-normal">Mature</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/mystery"
                                target="_self"><strong class="font-normal">Mystery</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/mecha"
                                target="_self"><strong class="font-normal">Mecha</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/ngon-tinh"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Ngôn Tình</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a data-title="Những truyện ngắn, thường là 1 chapter"
                                href="https://www.toptruyentv11.com/tim-truyen/one-shot" target="_self"><strong
                                    class="font-normal">One
                                    shot</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                href="https://www.toptruyentv11.com/tim-truyen/psychological" target="_self"><strong
                                    class="font-normal">Psychological</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/romance"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Romance</strong class="font-normal"></a>
                        </li>
                        <li class="hover:text-red-600"><a href="https://www.toptruyentv11.com/tim-truyen/school-life"
                                target="_self"><strong class="font-normal">School Life</strong
                                    class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Đối tượng hướng tới của thể loại này là phái nữ. Nội dung của những bộ manga này thường liên quan đến tình cảm lãng mạn, chú trọng đầu tư cho nhân vật (tính cách,...)"
                                href="https://www.toptruyentv11.com/tim-truyen/shoujo" target="_self"><strong
                                    class="font-normal">Shoujo</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại quan hệ hoặc liên quan tới đồng tính nữ, thể hiện trong các mối quan hệ trên mức bình thường giữa các nhân vật nữ trong các manga, anime"
                                href="https://www.toptruyentv11.com/tim-truyen/shoujo-ai" target="_self"><strong
                                    class="font-normal">Shoujo Ai</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Đối tượng hướng tới của thể loại này là phái nam. Nội dung của những bộ manga này thường liên quan đến đánh nhau và/hoặc bạo lực (ở mức bình thường, không thái quá)"
                                href="https://www.toptruyentv11.com/tim-truyen/shounen" target="_self"><strong
                                    class="font-normal">Shounen</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Nói về cuộc sống đời thường"
                                href="https://www.toptruyentv11.com/tim-truyen/slice-of-life" target="_self"><strong
                                    class="font-normal">Slice of Life</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại của manga thường nhằm vào những đối tượng nam 18 đến 30 tuổi, nhưng người xem có thể lớn tuổi hơn, với một vài bộ truyện nhắm đến các doanh nhân nam quá 40. Thể loại này có nhiều phong cách riêng biệt , nhưng thể loại này có những nét riêng biệt, thường được phân vào những phong cách nghệ thuật rộng hơn và phong phú hơn về chủ đề, có các loại từ mới mẻ tiên tiến đến khiêu dâm."
                                href="https://www.toptruyentv11.com/tim-truyen/seinen" target="_self"><strong
                                    class="font-normal">Seinen</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Những truyện có nội dung hơi nhạy cảm, đặc biệt là liên quan đến tình dục"
                                href="https://www.toptruyentv11.com/tim-truyen/smut" target="_self"><strong
                                    class="font-normal">Smut</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Bao gồm những chuyện khoa học viễn tưởng, đa phần chúng xoay quanh nhiều hiện tượng mà liên quan tới khoa học, công nghệ, tuy vậy thường thì những câu chuyện đó không gắn bó chặt chẽ với các thành tựu khoa học hiện thời, mà là do con người tưởng tượng ra."
                                href="https://www.toptruyentv11.com/tim-truyen/sci-fi" target="_self"><strong
                                    class="font-normal">Sci-fi</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Boy x Boy"
                                href="https://www.toptruyentv11.com/tim-truyen/soft-yaoi" target="_self"><strong
                                    class="font-normal">Soft
                                    Yaoi</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Girl x Girl"
                                href="https://www.toptruyentv11.com/tim-truyen/soft-yuri" target="_self"><strong
                                    class="font-normal">Soft
                                    Yuri</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Đúng như tên gọi, những môn thể thao như bóng đá, bóng chày, bóng chuyền, đua xe, cầu lông,... là một phần của thể loại này"
                                href="https://www.toptruyentv11.com/tim-truyen/sports" target="_self"><strong
                                    class="font-normal">Sports</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể hiện những sức mạnh đáng kinh ngạc và không thể giải thích được, chúng thường đi kèm với những sự kiện trái ngược hoặc thách thức với những định luật vật lý"
                                href="https://www.toptruyentv11.com/tim-truyen/supernatural" target="_self"><strong
                                    class="font-normal">Supernatural</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại của manga hay anime được sáng tác chủ yếu bởi phụ nữ cho những độc giả nữ từ 18 đến 30. Josei manga có thể miêu tả những lãng mạn thực tế , nhưng trái ngược với hầu hết các kiểu lãng mạn lí tưởng của Shoujo manga với cốt truyện rõ ràng, chín chắn"
                                href="https://www.toptruyentv11.com/tim-truyen/josei" target="_self"><strong
                                    class="font-normal">Josei</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Truyện tranh dành cho lứa tuổi thiếu nhi"
                                href="https://www.toptruyentv11.com/tim-truyen/thieu-nhi" target="_self"><strong
                                    class="font-normal">Thiếu
                                    Nhi</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Các truyện có nội dung về các vụ án, các thám tử cảnh sát điều tra..."
                                href="https://www.toptruyentv11.com/tim-truyen/trinh-tham" target="_self"><strong
                                    class="font-normal">Trinh Thám</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a data-title="Tổng hợp truyện tranh màu, rõ, đẹp"
                                href="https://www.toptruyentv11.com/tim-truyen/truyen-mau" target="_self"><strong
                                    class="font-normal">Truyện Màu</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Thể loại chứa đựng những sự kiện mà dẫn đến kết cục là những mất mát hay sự rủi ro to lớn."
                                href="https://www.toptruyentv11.com/tim-truyen/tragedy" target="_self"><strong
                                    class="font-normal">Tragedy</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Là truyện tranh được đăng dài kỳ trên internet của Hàn Quốc chứ không xuất bản theo cách thông thường"
                                href="https://www.toptruyentv11.com/tim-truyen/webtoon" target="_self"><strong
                                    class="font-normal">Webtoon</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Xuyên Không, Xuyên Việt là thể loại nhân vật chính vì một lý do nào đó mà bị đưa đến sinh sống ở một không gian hay một khoảng thời gian khác. Nhân vật chính có thể trực tiếp xuyên qua bằng thân xác mình hoặc sống lại bằng thân xác người khác."
                                href="https://www.toptruyentv11.com/tim-truyen/xuyen-khong"
                                style="color: #cd3507;font-weight: 600" target="_self"><strong
                                    class="font-normal">Xuyên
                                    Không</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Là một thể loại trong đó giới tính của nhân vật bị lẫn lộn: nam hoá thành nữ, nữ hóa thành nam..."
                                href="https://www.toptruyentv11.com/tim-truyen/gender-bender" target="_self"><strong
                                    class="font-normal">Gender Bender</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Yuri - Truyện tranh đồng tính nữ có nói về quan hệ thể xác"
                                href="https://www.toptruyentv11.com/tim-truyen/yuri" target="_self"><strong
                                    class="font-normal">Yuri</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Hệ Thống - Nhân vật được trang bị hệ thống hỗ trợ tu luyện, tăng cấp, mạnh lên theo thời gian"
                                href="https://www.toptruyentv11.com/tim-truyen/he-thong" target="_self"><strong
                                    class="font-normal">Hệ
                                    Thống</strong class="font-normal"></a></li>
                        <li class="hover:text-red-600"><a
                                data-title="Yaoi - Thể loại truyện nhẹ nhàng, che bộ phận nhạy cảm"
                                href="https://www.toptruyentv11.com/tim-truyen/yaoi" target="_self"><strong
                                    class="font-normal">Yaoi</strong class="font-normal"></a></li>
                    </ul>
                </div>
            </li>
            <li class=" my-1">
                <div class=" "><a href="https://www.toptruyentv11.com/history" class="hover:text-red-600 ">Lịch
                        sử <i class="fal fa-history"></i></a></div>
            </li>
            <li class=" my-1">
                <div class=" "><a href="https://www.toptruyentv11.com/follow" class="hover:text-red-600 ">Theo
                        dõi</a>
                </div>
            </li>
            <li class=" my-1">
                <div><a class="hover:text-red-600">Xếp hạng</a>
                    <ul class="hidden">
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen?sort=2"
                                rel="nofollow"><i class="fas fa-eye mr-2 ml-2" style="color: #e9e9e9"></i>Top all</a>
                        </li>
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen?sort=3"
                                rel="nofollow"><i class="fas fa-eye mr-2 ml-2" style="color: #e9e9e9"></i>Top
                                tháng</a></li>
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen?sort=5"
                                rel="nofollow"><i class="fas fa-eye mr-2 ml-2" style="color: #e9e9e9"></i>Top
                                tuần</a></li>
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen?sort=6"
                                rel="nofollow"><i class="fas fa-eye mr-2 ml-2" style="color: #e9e9e9"></i>Top
                                ngày</a></li>
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen"><i
                                    class="fal fa-redo mr-2 ml-2" style="color: #e9e9e9"></i>Mới cập nhật</a></li>
                        <li><a class="hover:text-red-600"
                                href="https://www.toptruyentv11.com/tim-truyen?status=1&amp;sort=2" rel="nofollow"><i
                                    class="fal fa-check-square mr-2 ml-2" style="color: #e9e9e9"></i>Đã hoàn thành</a>
                        </li>
                        <li><a class="hover:text-red-600" href="https://www.toptruyentv11.com/tim-truyen?sort=9"
                                rel="nofollow"><i class="far fa-thumbs-up mr-2 ml-2" style="color: #e9e9e9"></i>Yêu
                                thích</a></li>
                    </ul>
                </div>
            </li>
            <li class=" my-1">
                <div class=" "><a href="https://www.toptruyentv11.com/truyen-con-trai"
                        class="hover:text-red-600 ">Con trai
                        <i class="fal fa-mars"></i></a></div>
            </li>
            <li class=" my-1">
                <div class=" "><a href="https://www.toptruyentv11.com/truyen-con-gai"
                        class="hover:text-red-600 ">Con gái
                        <i class="fal fa-venus"></i></a></div>
            </li>
            <li class=" my-1">
                <div class=" "><a class=" hover:text-red-600" target="_blank"
                        href="//doctruyen3qui14.pro/tim-truyen/18" class=" ">Manhwa 18</a></div>
            </li>
            <li class=" my-1">
                <div class=" "><a href="#" rel="nofollow" class=" hover:text-red-600" target="_blank"><i
                            class="fab fa-facebook-f" style="color: lightskyblue"></i> Group</a></div>
            </li>
            <div class="mt-6 @if (Auth::check()) hidden @endif">
                <ul>
                    <li class=" mt-1">
                        <div class=" ">
                            <a href="{{ route('login') }}" class="hover:text-red-600 ">
                                Đăng nhập
                            </a>
                        </div>
                    </li>
                    <li class=" my-1">
                        <div class=" "><a href="{{ route('register') }}" class="hover:text-red-600 ">
                                Đăng ký
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="relative mt-6 @if (!Auth::check()) hidden @endif">
                <button class="flex items-center text-gray-700 dark:text-gray-200 cursor-pointer">
                    <img src="https://www.toptruyentv11.com/images/users/anonymous.png" class="h-8 w-8">
                    <span class="text-white mx-1">{{ Auth::user()?->name }}</span>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-down text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                    </svg> --}}
                </button>

                <ul
                    class="absolute left-0 right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md sopacity-0 transition pointer-events-auto">
                    <li class="space-x-2">
                        <a href="{{ route('users.info') }}"
                            class="flex text-gray-950 items-center rounded-md px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            <p class="">Thông tin tài khoản</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.logout') }}"
                            class="flex text-gray-950 items-center px-4 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                            <svg class="w-10" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg> Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
            </li>
        </ul>
    </div>
</div>
