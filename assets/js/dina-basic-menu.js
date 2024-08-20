document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.dina_basic_menu-toggle');
    const menuContainer = document.querySelector('.dina_basic_menu-container');
    const subMenuLinks = document.querySelectorAll(
        '.menu-item-has-children > a'
    );

    menuToggle.addEventListener('click', function() {
        menuContainer.classList.toggle('dina_basic_menu-open');
    });

    subMenuLinks.forEach((link) => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const subMenu = this.nextElementSibling;

            if (subMenu.style.display === 'block') {
                subMenu.style.display = 'none';
                this.classList.remove('submenu-open');
            } else {
                subMenu.style.display = 'block';
                this.classList.add('submenu-open');
            }
        });
    });
});
