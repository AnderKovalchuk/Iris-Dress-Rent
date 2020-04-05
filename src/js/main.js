"use strict";

window.addEventListener('load', () => {
    const d = document;
    const w = window;

    (function() {
        let burger  = d.querySelector('.header__mobile-burger-iner'),
            nav     = d.querySelector('.header__nav-list'),
            overlay = d.createElement('div');
            overlay.className = 'overlay';

        function toggleMobmenu() {
            burger.classList.toggle('header__mobile-burger-iner--active');
            nav.classList.toggle('header__nav-list--active');
        };

        burger.addEventListener('click', toggleMobmenu);

    }());
});