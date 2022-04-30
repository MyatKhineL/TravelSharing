require('./bootstrap');
import ScrollReveal from 'scrollreveal';

ScrollReveal().reveal('.post',{
    origin: 'top',
    distance: '30px',
    duration: 1000,
    interval : 500
});

new VenoBox({
    selector: '.venobox',
    numeration: true,
    infinigall: true,
    share: true,
    spinner: 'rotating-plane'
});
