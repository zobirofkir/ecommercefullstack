document.getElementById('menu-toggle').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
    } else {
        mobileMenu.style.maxHeight = '0';
        setTimeout(() => mobileMenu.classList.add('hidden'), 300); // Keep in sync with duration-300
    }
});
