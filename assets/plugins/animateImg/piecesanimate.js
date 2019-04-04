{

    imagesLoaded(document.body, { background: true }, () => document.body.classList.remove('loading'));

    Array.from(document.querySelectorAll('.grid .pieces')).forEach((el,pos) => {
        const piecesObj = new Pieces(el, {
            pieces: {rows: 10, columns: 8},
            delay: [0,25],
            bgimage: el.dataset.imageAlt
        });
    el.addEventListener('mouseenter', () => animateOut(piecesObj, pos));
    el.addEventListener('touchstart', () => animateOut(piecesObj, pos));
    el.addEventListener('mouseleave', () => animateIn(piecesObj, pos));
    el.addEventListener('touchend', () => animateOut(piecesObj, pos));
});

    const animateOut = (instance,pos) => instance.animate({
        delay: (t,i,l) => {
        return parseInt(t.dataset.column)*parseInt(t.dataset.delay);
},
    translateX: [
        {
            value: pos % 2 === 1 ? (t,i) => {
            return anime.random(75,150)+'px';
} : (t,i) => {
    return anime.random(-150,-75)+'px';
},
    duration: 500,
        easing: 'easeOutQuad'
},
    {
        value: pos % 2 === 1 ? (t,i) => {
        return anime.random(-1000,-400)+'px';
    } : (t,i) => {
        return anime.random(400,1000)+'px';
    },
        duration: 400,
            easing: 'easeOutExpo'
    }
],
    translateY: [
        {
            value: (t,i) => {
            return anime.random(-125,-75)+'px';
},
    duration: 500,
        easing: 'easeOutQuad'
},
    {
        value: (t,i) => {
        return t.dataset.row < instance.getTotalRows()/2 ? anime.random(100,200)+'px' : anime.random(-200,-100)+'px';
    },
        duration: 400,
            easing: 'easeOutExpo'
    }
],
    opacity: {
        value: 0,
            delay: 500,
            duration: 400,
            easing: 'easeOutExpo'
    }
});

    const animateIn = (instance,pos) => instance.animate({
        duration: 500,
        easing: [0.8,1,0.3,1],
        delay: (t,i) => {
        return pos % 2 === 1 ?
            (instance.getTotalColumns() - parseInt(t.dataset.column)) * parseInt(t.dataset.delay) :
            parseInt(t.dataset.column) * parseInt(t.dataset.delay);
},
    translateX: '0px',
        translateY: '0px',
    opacity: {
    value: 1,
        duration: 500,
        easing: 'linear'
}
});
}
