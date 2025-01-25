$(document).ready(function() {
    const scrollingWrapper = $('.scrolling-wrapper');
    const cardWidth = $('.card').outerWidth(true);
    const totalCards = scrollingWrapper.children().length;

    // Duplicate cards to ensure continuous scrolling
    for (let i = 0; i < 5; i++) {
        scrollingWrapper.append(scrollingWrapper.children().clone());
    }

    function animateCards() {
        scrollingWrapper.animate({
            scrollLeft: '-=' + cardWidth
        }, 3000, 'linear', function() {
            scrollingWrapper.children().last().prependTo(scrollingWrapper);
            scrollingWrapper.scrollLeft(scrollingWrapper.prop('scrollWidth') - scrollingWrapper
                .width());
            animateCards();
        });
    }

    scrollingWrapper.scrollLeft(scrollingWrapper.prop('scrollWidth') - scrollingWrapper.width());
    animateCards();
});
