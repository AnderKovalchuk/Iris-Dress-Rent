"use strict";

window.addEventListener('load', () => {
    const d = document;
    const w = window;

    (function() {
        let burger  = d.querySelector('.header__mobile-burger-iner'),
            nav     = d.querySelector('.header__nav-list');

        function toggleMobmenu() {
            burger.classList.toggle('header__mobile-burger-iner--active');
            nav.classList.toggle('header__nav-list--active');
            d.body.classList.toggle('--menu-active');
        };

        burger.addEventListener('click', toggleMobmenu);

    }());

    (function(){
        let popUpIner  = d.querySelector('.popup'),
            clocePopUP = d.querySelector('.popup__close');

            if(!popUpIner && !clocePopUP)
                return;

            function togglePopUp(){
                popUpIner.classList.toggle('popup--active');
                d.body.classList.toggle('body--hidden');
            };

            clocePopUP.addEventListener('click', togglePopUp);
    }());
});

function toggleInfoPopup(id){
    let popup = document.getElementById(id);

    if(!popup) return;

    popup.classList.toggle('popup--active');
    document.body.classList.toggle('body--hidden');
}