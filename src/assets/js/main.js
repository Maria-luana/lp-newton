$('.owl-banner-intro').owlCarousel({
    loop:true,
    margin:10,
    nav: false,
    dots: true,
    items:1
})


$('.owl-banner-espaco').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots: false,
    items:1,
    onChanged: function(e){
        $('.customNextBtn').removeAttr('disabled');
        $('.customPrevBtn').removeAttr('disabled');
        if ( (e.item.index + 1) >= e.item.count ){
            $('.customNextBtn').attr('disabled', 'disabled');
        } else {
            $('.customNextBtn').removeAttr('disabled');
        }

        if(e.item.index <= 0){
            $('.customPrevBtn').attr('disabled', 'disabled');
        } else {
            $('.customPrevBtn').removeAttr('disabled');
        }
    }
});

var owl = $('.owl-banner-espaco');
owl.owlCarousel();
// Go to the next item
$('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.customPrevBtn').click(function() {
    owl.trigger('prev.owl.carousel', [300]);
})


// Scroll Menu
$(document).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.header').addClass('header-small');
    }
    else {
        $('.header').removeClass('header-small');
    }
});



// Scroll Nav
function sectionScroll(index) {
    var targetOffset = $(index).offset().top;
    var variacao = 80;
    $('html, body').animate({
        scrollTop: targetOffset - variacao
    }, 3000);
}

$(document).ready(function () {
    var hashName = location.hash;
    if ($(hashName).length > 0) {
        sectionScroll(hashName);
    }
})

// Scroll Menu Header
$('#menu-principal a').on('click', function (e) {
    var href = ($(this).attr('href')).split('#');
    if (href.length == 2) {
        var id = '#' + href[1];
        if ($(id).length > 0) {
            e.preventDefault();
            sectionScroll(id);
        }
    }
});



