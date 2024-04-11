import Barba from 'barba.js';
import {gsap} from "gasp";

Barbar.Dispatcher.on('newPageReady', function(currentStatus, olStatus,containerBarba){
    const olPage = olStatus.containerBarba;
    const newPage=containerBarba;
    // srte
    gsap.fromTo(olPage,{x: '-100%', duration : 5, ease: 'power3.inOut'});
    // entrer
    gsap.fromTo(newPage,{x: '0%', duration : 5, ease: 'power3.inOut'});

});
