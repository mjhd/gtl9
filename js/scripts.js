window.onload = function() {

    'use strict';

    // DOM ready, take it away


    /* ------ PREVENT SCRIPTS (Always run first)------ */

        var social_drawer_links = document.querySelectorAll("#social-connect li > a");
        var social_drawer_links_count = social_drawer_links.length;

        while (social_drawer_links_count--) {
            social_drawer_links[social_drawer_links_count].addEventListener('click', function (event) {
                event.preventDefault();
                if(! this.classList.contains('active')) {
                    var activeNode = document.querySelector("#social-connect li > a.active");
                    console.log(activeNode.parentNode)
                    TweenMax.to(this.parentNode, 0.4, { width: '64%' });
                    TweenMax.to(activeNode.parentNode, 0.4, { width: '18%' });
                    activeNode.classList.remove('active');
                    this.classList.add('active');
                }
            });
        }

    !function(d,s,id){var js,ajs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://assets.tumblr.com/share-button.js";ajs.parentNode.insertBefore(js,ajs);}}(document, "script", "tumblr-js");



    /* ------ GLOBAL SCRIPTS ------ */
    var nav = document.querySelector('nav');
    var submit = document.querySelector('nav button');
    var tag_search = document.querySelector('#tag-search');
    var tag_drawer = document.querySelector('#tag-drawer');

    var i = 0;

    nav.addEventListener('mouseenter', function( event ) {
        TweenMax.to(nav, 0.4, { outlineColor: '#f68002' });
        TweenMax.to(submit, 0.4, { backgroundColor: '#fff', borderColor: '#f68002' });
        TweenMax.to(submit.querySelector('svg > path'), 0.4, { fill: '#78ee2a' });
        TweenMax.to(tag_search, 0.4, { borderColor: '#f68002', backgroundColor: '#f68002', color: '#fff' });
    });

    nav.addEventListener('mouseleave', function( event ) {
        TweenMax.to(nav, 0.4, { outlineColor: '#dcdcdc' });
        TweenMax.to(submit, 0.4, { backgroundColor: '#f68002', borderColor: '#f68002' });
        TweenMax.to(submit.querySelector('svg > path'), 0.4, { fill: '#fff' });
        TweenMax.to(tag_search, 0.4, { borderColor: '#dcdcdc', backgroundColor: '#fff', color: '#f68002' });
    });

    submit.addEventListener('mouseenter', function( event ) {
        TweenMax.to(submit, 0.4, { backgroundColor: '#fff', borderColor: '#78ee2a' });
        TweenMax.to(submit.querySelector('svg > path'), 0.4, { fill: '#f68002' });
    });

    submit.addEventListener('mouseleave', function( event ) {
        TweenMax.to(submit, 0.4, { backgroundColor: '#fff', borderColor: '#f68002' });
        TweenMax.to(submit.querySelector('svg > path'), 0.4, { fill: '#78ee2a' });
    });

    tag_search.addEventListener('mouseenter', function( event ) {
        TweenMax.to(tag_search, 0.4, { borderColor: '#78ee2a' });
        TweenMax.to(nav, 0.4, { outlineColor: '#78ee2a' });
    });

    tag_search.addEventListener('mouseleave', function( event ) {
        TweenMax.to(tag_search, 0.4, {  borderColor: '#f68002' });
        TweenMax.to(nav, 0.4, { outlineColor: '#f68002' });
    });

    tag_search.addEventListener('click', function(){
        if(this.classList.contains('active')) {
            nav.style.outlineColor = '#f68002';
            TweenMax.to(nav, 0.8, { height: '50px' });
            TweenMax.to(tag_drawer, 0.2, { opacity: '0', onComplete: (function(){ tag_drawer.style.display = 'none'; }) });
            this.classList.remove('active');
        }
        else{
            nav.style.outlineColor = '#78ee2a';
            tag_drawer.style.display = 'block';
            TweenMax.to(nav, 0.8, {height: '100px'});
            TweenMax.to(tag_drawer, 0.5, { css: { opacity: '1.0' }, delay: 0.5 });
            this.classList.add('active');
        }
    });

    // url (required), options (optional)
    /*function fetch_tag() {
     return fetch(ajaxUrl, {
     method: 'get',
     'action' : 'tag_fetch'
     }).then(function (response) {
     return response.text();
     //var responded = response.text();
     //responded = responded.results;
     //console.log(responded);
     //console.log(responded.resolved);
     }).catch(function (err) {
     console.log('Nope')
     // Error :(
     });
     }

     fetch_tag().then(function(response){
     console.log(response)
     });
     */



    /* ------ HOMEPAGE SCRIPTS ------ */



    if (document.body.classList.contains('home') || document.body.classList.contains('search-results')) {
        var swiperArray = [];
        var elementArray = document.getElementsByClassName('swiper-container');
        i = 0;
        while (elementArray[i]) {
            var idVal = '#swiper-container_' + i;
            var leftId = '#feat_left_' + i;
            var rightId = '#feat_right_' + i;
            swiperArray.push(new Swiper(idVal, {
                spaceBetween: 25,
                slidesPerView: 3,
                freeModeSticky: true,
                nextButton: rightId,
                prevButton: leftId,
                loop: true
            }));

            i++;
        }


        if (document.querySelector('.home'))
            var tiles =  document.querySelector('.home > section').children;
        else if(document.querySelector('.search-results'))
            var tiles =  document.querySelector('.search-results > section').children;

        i = 0;
        while(tiles[i]) {

            tiles[i].addEventListener('mouseenter', function( event ) {

                TweenMax.to(this, 0.4, { borderColor: '#f68002' });

                if(this.querySelector('h2')) {
                    TweenMax.to(this.querySelector('h2'), 0.4, { borderColor: '#f68002', color: '#78ee2a' });
                    TweenMax.to(this.querySelectorAll('aside.star path'), 0.4, { fill: '#78ee2a' });
                }
                else if(this.querySelector('.swiper-wrapper')){
                    TweenMax.to(this.querySelectorAll('aside'), 0.4, { borderColor: '#f68002' });
                    TweenMax.to(this.querySelectorAll('aside > svg path'), 0.4, { fill: '#78ee2a' });
                    TweenMax.to(this.querySelectorAll('.swiper-wrapper a'), 0.4, { borderColor: '#f68002' });
                    TweenMax.to(this.querySelectorAll('.swiper-wrapper a h4'), 0.4, { color: '#78ee2a' });
                }
            });

            tiles[i].addEventListener('mouseleave', function( event ) {

                TweenMax.to(this, 0.4, {borderColor: '#dcdcdc'});

                if(this.querySelector('h2')) {
                    TweenMax.to(this.querySelector('h2'), 0.4, { borderColor: '#dcdcdc', color: '#5e5d63' });
                    TweenMax.to(this.querySelectorAll('aside.star path'), 0.4, { fill: '#868686' });
                }
                else if(this.querySelector('.swiper-wrapper')) {
                    TweenMax.to(this.querySelectorAll('aside'), 0.4, { borderColor: '#dcdcdc', fill: '#5e5d63' });
                    TweenMax.to(this.querySelectorAll('aside > svg path'), 0.4, { fill: '#5e5d63' });
                    TweenMax.to(this.querySelectorAll('.swiper-wrapper a'), 0.4, { borderColor: '#dcdcdc' });
                    TweenMax.to(this.querySelectorAll('.swiper-wrapper a h4'), 0.4, { color: '#5e5d63' });
                }
            });

            if(tiles[i].querySelector('.swiper-wrapper')) {

                tiles[i].querySelectorAll('aside')[0].addEventListener('mouseenter', function( event ) {
                    TweenMax.to(this, 0.4, { borderColor: '#78ee2a' });
                    TweenMax.to(this.querySelectorAll('svg > path'), 0.4, { fill: '#f68002' });
                });
                tiles[i].querySelectorAll('aside')[1].addEventListener('mouseenter', function( event ) {
                    TweenMax.to(this, 0.4, { borderColor: '#78ee2a' });
                    TweenMax.to(this.querySelectorAll('svg > path'), 0.4, { fill: '#f68002' });
                });

                tiles[i].querySelectorAll('aside')[0].addEventListener('mouseleave', function (event) {
                    TweenMax.to(this, 0.4, { borderColor: '#f68002' });
                    TweenMax.to(this.querySelectorAll('svg > path'), 0.4, {fill: '#78ee2a'});
                });
                tiles[i].querySelectorAll('aside')[1].addEventListener('mouseleave', function (event) {
                    TweenMax.to(this, 0.4, { borderColor: '#f68002' });
                    TweenMax.to(this.querySelectorAll('svg > path'), 0.4, {fill: '#78ee2a'});
                });
            }

            i++;
        }


    }




    /* ------ SINGLE GIDGET SCRIPTS ------ */




    if (document.body.classList.contains('single-gidget')) {


        var gidget_img = document.getElementById('gidget_img');
        var gidget_purchase_button = document.getElementById('purchase_amazon');

        gidget_img.addEventListener("mouseenter", function( event ) {
            TweenMax.to(gidget_purchase_button, 0.4, { backgroundColor: '#fff', color: '#78ee2a' });
        });

        gidget_img.addEventListener("mouseleave", function( event ) {
            TweenMax.to(gidget_purchase_button, 0.4, { backgroundColor: '#f68002', borderColor: '#f68002', color: '#fff' });
        });

        gidget_purchase_button.addEventListener("mouseenter", function( event ) {
            TweenMax.to(gidget_purchase_button, 0.4, { borderColor: '#78ee2a', color: '#f68002' });
        });

        gidget_purchase_button.addEventListener("mouseleave", function( event ) {
            TweenMax.to(gidget_purchase_button, 0.4, { borderColor: '#f68002', color: '#78ee2a' });
        });



        var add_img_container = document.getElementById('additional_images');
        var add_img = document.getElementById('swiper-container_add_img');
        var add_img_buttons = [];

        add_img_buttons.push(document.getElementById('add_img_left'));
        add_img_buttons.push(document.getElementById('add_img_right'));

        if(add_img) {

            add_img_container.addEventListener('mouseenter', function( event ) {
                TweenMax.to(add_img_buttons, 0.4, { borderColor: '#f68002', fill: '#78ee2a' });
            });

            add_img_container.addEventListener('mouseleave', function( event ) {
                TweenMax.to(add_img_buttons, 0.4, { borderColor: '#dcdcdc', fill: '#5e5d63' });
            });

            i = 0;

            while(add_img_buttons[i])
            {
                add_img_buttons[i].addEventListener('mouseenter', function( event ) {
                    TweenMax.to(this, 0.4, { borderColor: '#78ee2a', fill: '#f68002' });
                });

                add_img_buttons[i].addEventListener('mouseleave', function( event ) {
                    TweenMax.to(this, 0.4, { borderColor: '#f68002', fill: '#78ee2a' });
                });
                i++;
            }

            var add_imgSwiper = new Swiper(add_img, {
                spaceBetween: 25,
                slidesPerView: 3,
                freeModeSticky: true,
                nextButton: '#add_img_right',
                prevButton: '#add_img_left',
                loop: true
            });
        }




        var main_container = document.getElementById('content-wrapper');
        var description_open = main_container.querySelector('#description > p:nth-of-type(1)');
        var main_ad = document.getElementById('main-ad');
        var pros_cons = document.getElementById('pros-cons');
        var pros = pros_cons.querySelector('ul:nth-of-type(1)');
        var cons = pros_cons.querySelector('ul:nth-of-type(2)');
        var pros_entries = pros.querySelectorAll('li');
        var pros_h2 = pros.querySelector('h2');
        var cons_entries = cons.querySelectorAll('li');
        var cons_h2 = cons.querySelector('h2');
        var rating_container = document.getElementById('rating');
        var details_items = document.getElementById('details').querySelectorAll('li');
        var links = document.getElementById('links').querySelectorAll('li');
        var sidebar_sections = document.getElementById('sidebar').querySelectorAll('section');



        main_container.addEventListener('mouseenter', function( event ) {

            if(event.clientX < (main_container.offsetWidth + main_container.offsetLeft)) {
                TweenMax.to(this, 0.4, { borderColor: '#f68002' });
                TweenMax.to(description_open, 0.4, { borderColor: '#78ee2a' });
                TweenMax.to([pros, cons], 0.4, { borderColor: '#f68002' });
                TweenMax.to(cons_h2, 0.4, { backgroundColor: '#f68002', outlineColor: '#f68002', color: '#fff' });
                TweenMax.to(pros_h2, 0.4, { backgroundColor: '#78ee2a', outlineColor: '#78ee2a' });

                function pros_cons_exec_enter(item, index) {
                    TweenMax.to(item, 0.4, { borderColor: '#78ee2a', outlineColor: '#78ee2a', backgroundColor: '#f7f7f7' });
                    TweenMax.to(item.querySelector('p'), 0.4, { color: '#5e5d63' });
                }
                pros_entries.forEach(pros_cons_exec_enter);
                cons_entries.forEach(pros_cons_exec_enter);

                TweenMax.to(rating_container, 0.4, { outlineColor: '#f68002' });
                TweenMax.to(rating_container.querySelectorAll('aside.star path'), 0.4, { fill: '#78ee2a' });

                function details_items_exec_enter(item, index) {
                    if(index == 0)
                        TweenMax.to(item, 0.4, { borderTopColor: '#f68002' });
                    else
                        TweenMax.to(item, 0.4, { borderTopColor: '#78ee2a' });
                    if(index + 1 == details_items.length)
                        TweenMax.to(item, 0.4, { borderBottomColor: '#f68002' });
                    else
                        TweenMax.to(item, 0.4, { borderBottomColor: '#78ee2a' });

                    TweenMax.to(item, 0.4, { color: '#5e5d63', backgroundColor: '#f7f7f7', borderLeftColor: '#f68002', borderRightColor: '#f68002' });
                    TweenMax.to(item.querySelector('aside'), 0.4, { color: '#f68002' });
                }
                details_items.forEach(details_items_exec_enter);

                function links_items_exec_enter(item, index){
                    TweenMax.to([item, item.querySelector('a')], 0.4, { color: '#868686', borderColor: '#f68002' });
                }
                links.forEach(links_items_exec_enter);
            }


            else
                TweenMax.to(main_ad, 0.4, { outlineColor: '#f68002' });

        });


        main_container.addEventListener("mouseleave", function( event ) {
            TweenMax.to([this, description_open], 0.4, { borderColor: '#dcdcdc' });
            TweenMax.to(main_ad, 0.4, { outlineColor: '#dcdcdc' });

            TweenMax.to([pros, cons], 0.4, { borderColor: '#868686' });

            TweenMax.to(cons_h2, 0.4, { backgroundColor: '#dcdcdc', outlineColor: '#868686', color: '#5e5d63' });
            TweenMax.to(pros_h2, 0.4, { backgroundColor: '#868686', outlineColor: '#868686' });

            function pros_exec_leave(item, index){
                TweenMax.to(item, 0.4, { borderColor: '#868686', outlineColor: '#868686', backgroundColor: '#f7f7f7' });
                TweenMax.to(item.querySelector('p'), 0.4, { color: '#5e5d63' });
                if(index % 2 != 0) {
                    TweenMax.to(item, 0.4, { backgroundColor: '#868686' });
                    TweenMax.to(item.querySelector('p'), 0.4, { color: '#fff' });
                }
                else
                    TweenMax.to(item, 0.4, { backgroundColor: '#dcdcdc' });
            }
            function cons_exec_leave(item, index){
                TweenMax.to(item, 0.4, { borderColor: '#868686', outlineColor: '#868686', backgroundColor: '#f7f7f7' });
                TweenMax.to(item.querySelector('p'), 0.4, { color: '#5e5d63' });
                if(index % 2 == 0) {
                    TweenMax.to(item, 0.4, {backgroundColor: '#868686'});
                    TweenMax.to(item.querySelector('p'), 0.4, {color: '#fff'});
                }
                else
                    TweenMax.to(item, 0.4, { backgroundColor: '#dcdcdc' });
            }
            pros_entries.forEach(pros_exec_leave);
            cons_entries.forEach(cons_exec_leave);

            TweenMax.to(rating_container, 0.4, { outlineColor: '#dcdcdc' });
            TweenMax.to(rating_container.querySelectorAll('aside.star path'), 0.4, { fill: '#868686' });

            function details_items_exec_leave(item, index) {
                TweenMax.to(item, 0.4, { borderColor: '#868686' });
                if(index % 2 != 0) {
                    TweenMax.to(item, 0.4, { color: '#fff', backgroundColor: '#868686' });
                    TweenMax.to(item.querySelector('aside'), 0.4, { color: '#fff' });
                }
                else {
                    TweenMax.to(item, 0.4, { color: '#5e5d63', backgroundColor: '#dcdcdc' });
                    TweenMax.to(item.querySelector('aside'), 0.4, { color: '#5e5d63' });
                }
            }
            details_items.forEach(details_items_exec_leave);

            function links_items_exec_leave(item, index){
                TweenMax.to([item, item.querySelector('a')], 0.4, { borderColor: '#dcdcdc', color: '#5e5d63' });
            }
            links.forEach(links_items_exec_leave);

        });

        function links_items_mouse_listener(item, index) {
            item.addEventListener('mouseenter', function(event) {
                TweenMax.to([item, item.querySelector('a')], 0.4, { borderColor: '#78ee2a', color: '#f68002' });
                TweenMax.to(item, 0.2, { outlineWidth: '1px' });
            });
            item.addEventListener('mouseleave', function(event) {
                TweenMax.to([item, item.querySelector('a')], 0.4, { color: '#868686', borderColor: '#f68002' });
                TweenMax.to(item, 0.2, { outlineWidth: '0px' });
            });
        }
        links.forEach(links_items_mouse_listener);


        function sidebar_arrows_event_listener(item, index) {

            item.addEventListener('mouseenter', function (event) {
                TweenMax.to(item, 0.4, {outlineColor: '#78ee2a', fill: '#f68002'});
            });

            item.addEventListener('mouseleave', function (event) {
                TweenMax.to(item, 0.4, {outlineColor: '#f68002', fill: '#78ee2a'});
            });
        }

        function sidebar_sections_mouse_listener(item, index) {
            item.addEventListener('mouseenter', function(event) {
                TweenMax.to([item, item.querySelectorAll('aside')],
                    0.4, { borderColor: '#f68002', outlineColor: '#f68002', fill: '#78ee2a' });
            });
            item.addEventListener('mouseleave', function(event) {
                TweenMax.to([item, item.querySelectorAll('aside')],
                    0.4, { borderColor: '#dcdcdc', outlineColor: '#dcdcdc', fill: '#5e5d63' });
            });

            var sidebar_arrows = item.querySelectorAll('aside');
            sidebar_arrows.forEach(sidebar_arrows_event_listener);

        }
        sidebar_sections.forEach(sidebar_sections_mouse_listener);


        var featured = document.getElementById('swiper-container_feat');

        var featSwiper = new Swiper(featured, {
            spaceBetween: 1,
            slidesPerView: 2,
            freeModeSticky: true,
            nextButton: '#feat_right',
            prevButton: '#feat_left',
            loop: true,
            autoplay: 2500,
            //onImagesReady: function(swiper) {  }
        });


        var complimentary = document.getElementById('swiper-container_complimentary');

        if(complimentary) {
            var complimentarySwiper = new Swiper(complimentary, {
                spaceBetween: 1,
                slidesPerView: 2,
                freeModeSticky: true,
                nextButton: '#complimentary_right',
                prevButton: '#complimentary_left',
            });
        }

        var related = document.getElementById('swiper-container_related');

        if(related) {
            var complimentarySwiper = new Swiper(related, {
                spaceBetween: 1,
                slidesPerView: 2,
                freeModeSticky: true,
                nextButton: '#related_right',
                prevButton: '#related_left',
            });
        }



        var add_img_wrapper = document.getElementById('additional_images');

        add_img_wrapper.addEventListener("mouseenter", function( event ) {
            TweenMax.to(add_img_wrapper, 0.4, { borderColor: '#f68002' });
        });

        add_img_wrapper.addEventListener("mouseleave", function( event ) {
            TweenMax.to(add_img_wrapper, 0.4, { borderColor: '#dcdcdc' });
        });


        var rating_link = document.querySelector('section#rating a');

        rating_link.addEventListener("mouseenter", function( event ) {
            TweenMax.to(rating_link, 0.4, { backgroundColor: '#fff', borderColor: '#78ee2a', color: '#f68002' });
        });

        rating_link.addEventListener("mouseleave", function( event ) {
            TweenMax.to(rating_link, 0.4, { backgroundColor: '#f68002', borderColor: '#f68002',color: '#fff' });
        });

        var social_cubes = document.querySelectorAll('#Layer_1 .social-cube');
        var social_cubes_count = social_cubes.length;
        while (social_cubes_count--) {
            var inactive = true;
            var current_color = social_cubes[social_cubes_count].style.fill;
            social_cubes[social_cubes_count].addEventListener('mouseenter', function(event){
                if(inactive) {
                    inactive = false;
                    TweenMax.to(event.target, 1.2, {fill: '#ffffff', repeat: -1, yoyo: true});
                }
            });
            social_cubes[social_cubes_count].addEventListener('mouseleave', function(event){
                    inactive = true;
                    TweenMax.to(event.target, 0.4, { fill: current_color });
            });
        }
    }



    /* ---------------------- SEARCHBAR TEXT TYPING ------------------------------ */


    var txt = "What are you Searching for?";
    var timeOut;
    var txtLen = txt.length;
    var char = 0;


    var search_input = document.getElementById('search_input');
    search_input.setAttribute('placeholder', '|');
    (function typeIt() {
        var humanize = Math.round(Math.random() * (254 - 38)) + 38;
            timeOut = setTimeout(function () {
                char++;
                var type = txt.substring(0, char);
                search_input.setAttribute('placeholder', type + '|');
                typeIt();

                if (char == txtLen) {
                    search_input.setAttribute('placeholder', search_input.getAttribute('placeholder').slice(0, -1)) // remove the '|'
                    clearTimeout(timeOut);
                }
            }, humanize);
        }());

} // onload end
