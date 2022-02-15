/* CAROUSEL */
let arrows = ".arrow";
let slidesContent = "content-blogs";

let initial = "on";
let prev = "prev";

let dotsCarousel = ".progress-bar";
let dotsAll = "progress-bar";
let dots = "bar";
let filled = "filled";

function slidesID() {
    return document.getElementsByClassName(slidesContent);
}

function dotsID() {
    return document.getElementsByClassName(dots);
}

function actualNumberID() {
    return document.getElementById("actual-post");
}

function totalNumberID() {
    return document.getElementById("total-post");
}

$(arrows).on("click", function () {
    let isStartLenght = false;
    let isFinalLenght = false;
    let carouselId = slidesID();
    if ($(this).hasClass(prev)) {
        for (i = 0; i < carouselId.length; i++) {
            if ($(carouselId[i]).hasClass(initial)) {
                if (carouselId[i - 1] == null) {
                    !$(carouselId[carouselId.length - 1]).hasClass(initial) ? $(carouselId[carouselId.length - 1]).addClass(initial) : "";
                    $(carouselId[0]).hasClass(initial) ? $(carouselId[0]).removeClass(initial) : "";
                    isStartLenght =! isStartLenght;
                }
                else {
                    if (!isStartLenght) {
                        $(carouselId[i - 1]).addClass(initial);
                        $(carouselId[i]).removeClass(initial);
                    }
                }
            }
        }
    }
    else {
        for (i = 0; i < carouselId.length; i++) {
            if ($(carouselId[i]).hasClass(initial)) {
                if (carouselId[i + 1] != null && !isFinalLenght) {
                    $(carouselId[i + 1]).addClass(initial);
                    $(carouselId[i]).removeClass(initial);
                    isFinalLenght =! isFinalLenght;
                }
                else {
                    if(!isFinalLenght) {
                        !$(carouselId[0]).hasClass(initial) ? $(carouselId[0]).addClass(initial) : "";
                        $(carouselId[carouselId.length - 1]).hasClass(initial) ? $(carouselId[carouselId.length - 1]).removeClass(initial) : ""; 
                    }
                }
            }
        }
    }
    dot = dotsID();
    for(i = 0; i < dot.length; i++) {
        if($(carouselId[i]).hasClass(initial)) {
            $(dot[i]).addClass(filled);
            actualNumberID() == 0 ? actualNumberID().innerHTML = 1 : actualNumberID().innerHTML = i + 1;
        }
        else {
            $(dot[i]).removeClass(filled);
        }
    }
});

//Conditions to count dots
(function countingDots() {
    let carouselItems = slidesID();
    for (i = 0; i < carouselItems.length; i++) {
        //start with one initial slide
        !$(carouselItems[0]).hasClass(initial) ? $(carouselItems[0]).addClass(initial) : "";

        if ($(dotsCarousel)[0]) {
            carouselDotsSpan = document.createElement("span");
            carouselDots = document.getElementsByClassName(dotsAll);
            $(carouselDotsSpan).addClass(dots);
            $(carouselDots).append(carouselDotsSpan);
            //carouselDots[0].appendChild(carouselDotsSpan);
        }
    }
    dot = dotsID();
    $(dot[0]).addClass(filled);
    actualNumberID().innerHTML = 1;
    totalNumberID().innerHTML = dot.length;
})();
