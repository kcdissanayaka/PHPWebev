function togglepopup() {
    document.getElementById("popup-1").classList.toggle("active");

}


var kandyIndex = 0, ellaIndex = 0;
var kandyImages = ["assets/images/kandy/temple-of-the-sacred.jpg",
    "assets/images/kandy/lake-mob.jpg",
    "assets/images/kandy/Peridenya-Gardens-kandy-sri-lanka1.jpg",
    "assets/images/kandy/istockphoto-169941463-612x612.jpg",
    "assets/images/kandy/Temple-Sacred-Tooth-Relic-kandy-sri-lanka.jpg",
    "assets/images/kandy/maxresdefault.jpg"];
var ellaImages = ["assets/images/Ella/ella1.jpg",
    "assets/images/Ella/ella2.jpg",
    "assets/images/Ella/ella3.jpg",
    "assets/images/Ella/ella4.jpg",
    "assets/images/Ella/ella5.jpg",
    "assets/images/Ella/ella6.jpg"];

function mySlide(param, album) {
    var currentIndex, images;
    if (album === 'kandy') {
        currentIndex = kandyIndex;
        images = kandyImages;
    } else if (album === 'ella') {
        currentIndex = ellaIndex;
        images = ellaImages;
    }

    if (param === 'next') {
        currentIndex++;
        if (currentIndex === images.length) { currentIndex = images.length - 1; }
    } else {
        currentIndex--;
        if (currentIndex < 0) { currentIndex = 0; }
    }

    if (album === 'kandy') {
        kandyIndex = currentIndex;
        document.getElementById('kandySlide').src = kandyImages[kandyIndex];
    } else if (album === 'ella') {
        ellaIndex = currentIndex;
        document.getElementById('ellaSlide').src = ellaImages[ellaIndex];
    }
}

function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
}

// Kandy
document.querySelectorAll('.image-container img').forEach(image => {
    image.onclick = () => {
        document.querySelector('.popup-image').style.display = 'block';
        document.querySelector('.popup-image img').src = image.getAttribute('src')
    }
});

document.querySelector('.popup-image span').onclick = () => {
    document.querySelector('.popup-image').style.display = 'none';
}

// Ella
document.querySelectorAll('.image-container2 img').forEach(image => {
    image.onclick = () => {
        document.querySelector('#ellaPopup').style.display = 'block';
        document.querySelector('#ellaSlide').src = image.getAttribute('src');
    }
});
