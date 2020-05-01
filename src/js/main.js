"use strict";

let priceItems = new Map();
let packagePrice = '';
let packageName = 'light';

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
        priceItems.set(
            'base-price', 
            new PriceItem(
                800, 1, true, false
            )
        );
        for(let i = 0; i < checkboxEl.length; i++){
            let checkbox = checkboxEl[i].querySelector('input[type=checkbox]');
            let label = checkboxEl[i].querySelector('.calc__checkbox');
            let number = checkboxEl[i].querySelector('input[type=number]');
            let item = new PriceItem();

            item.price = checkbox.getAttribute('data-price');
            item.priseGold = checkbox.getAttribute('data-price-gold');

            checkbox.addEventListener('change', e => {
                updateCheckbox(item, checkbox, label, number);
            });

            if(number){
                if(checkbox.checked)
                    number.disabled = false;
                else
                    number.disabled = true;
                item.count = number.value;

                let pulse = checkboxEl[i].querySelector('.calc__pulse');
                let minuse = checkboxEl[i].querySelector('.calc__minuse');

                pulse.addEventListener('click', e => {
                    if(checkbox.checked)
                        updateNumber(item, number, true);
                });
                minuse.addEventListener('click', e => {
                    if(checkbox.checked)
                        updateNumber(item, number, false);
                });
            }
            priceItems.set(checkbox.getAttribute('id'), item); 
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

function PriceItem(price, count, isActive, priseGold){
    this.price = price;
    if(count)
        this.count = count;
    else
        this.count = 1;
    this.isActive = isActive;
    this.priseGold = priseGold;

    this.getPrice = function(){
        if(!this.isActive)
            return 0
        if(packageName == 'gold' && this.priseGold)
            return this.priseGold * this.count;
        return this.price * this.count;
    }
}
function updateCheckbox(item, checkbox, checkboxLabel, number){
    if(checkbox.checked)
        checkboxLabel.classList.add('active');
    else
        checkboxLabel.classList.remove('active');
    if(number){
        if(checkbox.checked)
            number.disabled = false;
        else
            number.disabled = true;
    }
    item.isActive = checkbox.checked;

    updatePrice();
}
function updateNumber(item, number, isPluse){
    let num = number.value;
    if(isPluse)
        num++;
    else
        num--;
    if(num >= 1 && num <= 10){
        number.value = num;
        item.count = num;
    }
    updatePrice();
}
function updatePackage(){
    let packageEl = document.querySelectorAll('.calc__package');

    for(let i = 0; i < packageEl.length; i++){
        let radio = packageEl[i].querySelector('input[type=radio]');
        if(radio.checked){
            packageName = radio.value;
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
    console.log(priceItems);
    console.log(price);
    let priceEl  = document.getElementById('price');
    if(!priceEl)
        return;
    priceEl.innerHTML = price + '<span> грн. </span>';
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
        let item = priceItems.get(checkbox.getAttribute('id'));
        if( checkbox.checked ){
            let label = checkboxEl[i].querySelector('label span');
            string += "* " +
                label.textContent.trim() +
                " : " + 
                item.getPrice() +
                " грн.";
            if(item.count > 1)
                string += " - Кількість: " + item.count;
            string += "\n";
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


