new Vue({
    el: '#carousel',
    data: {
        slides: 7
    },
    components: {
        'carousel-3d': Carousel3d.Carousel3d,
        'slide': Carousel3d.Slide
    }
});