"use strict";

let priceItems = new Map();
let packagePrice = '';

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

    (function(){
        let checkboxEl  = d.querySelectorAll('.calc__argument-row');
        if(checkboxEl.length <= 0)
            return;
        console.log(checkboxEl);
        for(let i = 0; i < checkboxEl.length; i++){
            let checkbox = checkboxEl[i].querySelector('input[type=checkbox]');
            let label = checkboxEl[i].querySelector('.calc__checkbox');
            let number = checkboxEl[i].querySelector('input[type=number]');
            
            priceItems.set(
                checkbox.getAttribute('id'), 
                new PriceItem(
                    checkbox.getAttribute('data-price'),
                    checkbox.getAttribute('data-count'),
                    checkbox.checked,
                    checkbox.getAttribute('data-depend')
                )
            );

            checkbox.addEventListener('change', e => {
                updateCheckbox(checkbox, number, label);
            });

            if(!number)
                continue;

            number.value = checkbox.getAttribute('data-count');
            if(checkbox.checked)
                number.disabled = false;
            else
                number.disabled = true;
            number.addEventListener('change', e => {
                updateCheckbox(checkbox, number, label);
            });

            let pulse = checkboxEl[i].querySelector('.calc__pulse');
            let minuse = checkboxEl[i].querySelector('.calc__minuse');

            pulse.addEventListener('click', e => {
                updateNumber(number, true);
                updateCheckbox(checkbox, number, label);
            });
            minuse.addEventListener('click', e => {
                updateNumber(number, false);
                updateCheckbox(checkbox, number, label);
            });
        }

        updatePackage();
        let packageEl  = d.querySelector('.calc__package-row');
        packageEl.addEventListener('change', e => {
            updatePackage();
        });
    }());

    (function(){
        let gallery = d.querySelector('.gallery__iner');
        if(!gallery) 
            return;
        
        gallery.addEventListener('click', e => {
            let thumbnail = e.target.closest('a');
            if(!thumbnail)
                return;
            console.log(thumbnail);
            openGalleryPopup(thumbnail.href);
            e.preventDefault();
        });

        let close = document.querySelector('.gallery__close');
        close.addEventListener('click', e => {
            openGalleryPopup('');
        });

            // thumbs.onclick = function(event) {
            //     let thumbnail = event.target.closest('a');
          
            //     if (!thumbnail) return;
            //     showThumbnail(thumbnail.href, thumbnail.title);
            //     event.preventDefault();
            //   }
          
            //   function showThumbnail(href, title) {
            //     largeImg.src = href;
            //     largeImg.alt = title;
            //   }
    }());
});

function PriceItem(price, count, isActive, isDepend){
    this.price = price;
    if(count)
        this.count = count;
    else
        this.count = 1;
    this.isActive = isActive;
    this.isDepend = isDepend;

    this.getPrice = function(){
        if(!this.isActive)
            return 0
        if(isDepend)
            return this.price * this.count * packagePrice;
        return this.price * this.count;
    }
}
function updateCheckbox(checkbox, number, checkboxLabel){
    if(number){
        checkbox.setAttribute('data-count', number.value);
        if(checkbox.checked)
            number.disabled = false;
        else
            number.disabled = true;
    }
    if(checkbox.checked)
        checkboxLabel.classList.add('active');
    else
        checkboxLabel.classList.remove('active');

    priceItems.set(
        checkbox.getAttribute('id'), 
        new PriceItem(
            checkbox.getAttribute('data-price'),
            checkbox.getAttribute('data-count'),
            checkbox.checked,
            checkbox.getAttribute('data-depend')
        )
    );
    updatePrice();
}
function updatePackage(){
    let packageEl = document.querySelectorAll('.calc__package');

    for(let i = 0; i < packageEl.length; i++){
        let radio = packageEl[i].querySelector('input[type=radio]');
        if(radio.checked){
            packagePrice = radio.value;
            packageEl[i].classList.add('calc__package--active');
        } else {
            packageEl[i].classList.remove('calc__package--active');
        }
    }

    updatePrice();
}
function updatePrice(){
    let price = 0;
    for(let priceItem of priceItems.values()){
        price += priceItem.getPrice();
    }
    let priceEl  = document.getElementById('price');
    if(!priceEl)
        return;
    priceEl.innerHTML = price + '<span> грн. </span>';
}

function updateNumber(number, isPluse){
    let num = number.value;
    if(isPluse)
        num++;
    else
        num--;
    if(num >= 1 && num <= 10)
        number.value = num;
}

function toggleInfoPopup(id){
    let popup = document.getElementById(id);

    if(!popup) return;

    popup.classList.toggle('popup--active');
    document.body.classList.toggle('body--hidden');
}

function send(){
    let checkboxEl  = document.querySelectorAll('.calc__argument-row');
    let string = "";
    if(!checkboxEl)
        return;

    if(package_1.checked)
        string += "Вибрано пакет Light \n";
    else
        string += "Вибрано пакет GOLD \n";

    string += "\nВибрані послуги: \n";

    for(let i = 0; i < checkboxEl.length; i++){
        let checkbox = checkboxEl[i].querySelector('input[type=checkbox]');
        if( checkbox.checked ){
            let label = checkboxEl[i].querySelector('.calc__checkbox');
            string += "* " +
                label.textContent.trim() +
                " : " + 
                priceItems.get(checkbox.getAttribute('id')).getPrice() +
                " грн. \n";
        }
    }
    console.log( string );
}

function openGalleryPopup(image){
    let galleryPopup = document.querySelector('.gallery__popup');
    galleryPopup.classList.toggle('active');
    galleryPopup.querySelector('img').setAttribute('src', image);
    document.body.classList.toggle('body--hidden');
}


