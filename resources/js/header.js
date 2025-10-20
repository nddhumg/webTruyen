document.addEventListener('DOMContentLoaded', function () {
    setupMenuUser();
    setupMbMenu();
});

function setupMenuUser() {
    const btn = document.getElementById('userMenuBtn');
    const menu = document.getElementById('userMenu');
    const app = document.getElementById('app');
    if (!btn || !menu) return;

    function toggleMenu(isOpen) {
        if (isOpen) {
            menu.classList.remove('opacity-100', 'scale-100');
            menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        } else {
            menu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            menu.classList.add('opacity-100', 'scale-100');
        }
    }

    btn.addEventListener('click', function (e) {
        e.stopPropagation();
        const isOpen = menu.classList.contains('opacity-100');
        toggleMenu(isOpen);
    });

    document.addEventListener('click', function (e) {
        if (!menu.contains(e.target) && !btn.contains(e.target) ) {
            toggleMenu(true);
        }
    });
    toggleMenu(true);
}

function setupMbMenu(){
    const btn = document.getElementById('mb_BtnMenu');
    const menu = document.getElementById('mb_Menu');
    let isOpening = false;
    let postionY;
    if(!menu || !btn) return;

    btn.addEventListener('click', function (e){
        isOpening = !isOpening;
        if(isOpening){
            postionY = window.pageYOffset;
            menu.classList.remove('hidden');
            btn.textContent = "X";
            app.classList.add('overflow-hidden')
            window.scrollTo(0, 0);
        }
        else{
            menu.classList.add('hidden');
            btn.textContent = 'Menu';
            app.classList.remove('overflow-hidden')
            window.scrollTo(0, postionY);
        }
    });
}
