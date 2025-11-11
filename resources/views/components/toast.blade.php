<div class="absolute top-4 left-1/2 transform -translate-x-1/2 z-50" id="main-toast">
    <div id="toast-success"
        class="toast-success hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">Xóa thành công</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    <div id="toast-danger"
        class="toast-danger flex hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">Xóa thất bại</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
</div>

    @push('scripts')
        <script>
            class ToastPool {
                constructor(max = 5) {
                    this.max = max; // số lượng toast tối đa
                    this.pool = []; // danh sách toast đang hiển thị
                    this.poolList = []; // danh sách toast đã ẩn để tái sử dụng
                    this.container = document.getElementById('main-toast');
                }

                // Tạo hoặc lấy lại toast từ pool
                createToast(message, type = 'success') {
                    const template = document.getElementById(`toast-${type}`);
                    if (!template) return null;

                    // Tìm trong poolList xem có toast nào cùng loại đang ẩn không
                    const result = this.poolList.find(x => x.type === type);

                    let toast;
                    if (!result) {
                        toast = template.cloneNode(true);
                        toast.id = '';
                        toast.classList.remove('hidden');
                        toast.querySelector('.text-sm').textContent = message;

                        const closeBtn = toast.querySelector('button');
                        closeBtn.addEventListener('click', () => this.hideToast(toast));
                    } else {
                        toast = result.obj;
                        toast.querySelector('.text-sm').textContent = message;
                        toast.classList.remove('hidden');

                        this.poolList = this.poolList.filter(x => x.obj !== toast);
                    }
                    toast.classList.add('animate-slide-down');
                    return toast;
                }

                // Hiển thị toast
                show(message, type = 'success', duration = 3000) {
                    // Nếu đã đạt giới hạn, ẩn toast cũ nhất
                    if (this.pool.length >= this.max) {
                        const oldest = this.pool.shift();
                        this.hideToast(oldest.obj);
                    }

                    const toast = this.createToast(message, type);
                    if (!toast) return;

                    this.container.prepend(toast);
                    this.pool.push({
                        type,
                        obj: toast
                    });

                    // Tự động ẩn sau thời gian
                    setTimeout(() => this.hideToast(toast), duration);
                }

                hideToast(toast) {
                    if (!toast) return;
                    toast.classList.remove('animate-slide-down');
                    toast.classList.add('animate-fade-up');

                    setTimeout(() => {
                        toast.classList.add('hidden');
                        this.pool = this.pool.filter(t => t.obj !== toast);
                        this.poolList.push({
                            type: toast.dataset.type || 'success',
                            obj: toast
                        });
                        toast.classList.remove('animate-fade-up');
                    }, 300);
                }
            }

            const toastPool = new ToastPool(3);
        </script>
    @endpush
