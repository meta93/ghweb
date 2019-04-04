var nWidth =$(window).width();

$(document).ready(function(){

    if(nWidth>=992) {

        $('.bounce').css('opacity', 0);

        $('.fadeup').css('opacity', 0);

        $('.fadein').css('opacity', 0);

        $('.fadedown').css('opacity', 0);

        $('.fadeleft').css('opacity', 0);

        $('.faderight').css('opacity', 0);

        $('.slideleft').css('opacity', 0);

        $('.slideright').css('opacity', 0);

        $('.slidedown').css('opacity', 0);

    }

});



if(nWidth>=992) {

    $('.bounce').waypoint(function () {

        $(this).addClass('bounceIn');

    }, {offset: '90%'});



    $('.fadein').waypoint(function () {

        $(this).addClass('fadeIn');

    }, {offset: '90%'});



    $('.fadeup').waypoint(function () {

        $(this).addClass('fadeInUp');
        var mySVG = $(this).find('svg').drawsvg({
            duration: 4000
        });
        mySVG.drawsvg('animate').finish();

    }, {offset: '90%'});



    $('.fadedown').waypoint(function () {

        $(this).addClass('fadeInDown');

    }, {offset: '90%'});



    $('.faderight').waypoint(function () {

        $(this).addClass('fadeInRight');

    }, {offset: '90%'});



    $('.fadeleft').waypoint(function () {

        $(this).addClass('fadeInLeft');

    }, {offset: '90%'});

    $('.slideleft').waypoint(function () {

        $(this).addClass('slideInLeft');
        $(this).css('opacity',0.08);

    }, {offset: '90%'});

    $('.slideright').waypoint(function () {

        $(this).addClass('slideInRight');

    }, {offset: '90%'});

    $('.slidedown').waypoint(function () {

        $(this).addClass('slideInDown');
        $(this).css('opacity',0.04);

    }, {offset: '90%'});

}