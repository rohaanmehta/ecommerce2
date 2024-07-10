    
        //top bar 
        // window.onscroll = function() {
        //     myFunction()
        // };
        var btn = $('#back-to-top');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '500');
        });

        $(document).ready(function() {
            load_sliders();
            $('.login-form').submit(function(e) {
                e.preventDefault();
                $('.login_Input_submit').attr('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('login-user') ?>",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        $('#loginmsg').css('display', 'none');
                        $('.login_Input_submit').attr('disabled', false);

                        if (data.error == true) {
                            $.each(data, function(key, value) {
                                if (value) {
                                    $("#" + key).addClass("border-danger");
                                } else {
                                    $("#" + key).removeClass("border-danger");
                                }
                            });
                            return false;
                        }
                        if (data.loggedin == false) {
                            $('#loginmsg').css('display', 'block');
                            return false;
                        }

                        if (data.error == false && data.loggedin == true) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 500);
                        }
                    }
                });
            });

            // setTimeout(function() {
            if ($(window).width() > 768) {
                $('.single-product-slider').css('display', 'block');
                $('.mobile-product-slider').css('display', 'none');
                load_product_sliders();
            } else {
                $('.single-product-slider').css('display', 'none');
                $('.mobile-product-slider').css('display', 'block');
            }
            // }, 500);

            $('.main-product-slider').hover(
                function() {
                    // $('.product-slider-image').css('display','block !important');
                    $(this).find('.single-product-slider').slick('play')
                },

                function() {
                    $(this).find('.single-product-slider').slick('slickGoTo', '0');
                    $(this).find('.single-product-slider').slick('pause');
                }
            );

            $('.addtowishlist').click(function(e) {
                e.preventDefault();
                if ($(this).attr('data-target') == '') {
                    if ($(this).children().attr('class') == 'fa fa-heart') {
                        $(this).children().attr('class', 'fa fa-heart-o');
                    } else {
                        $(this).children().attr('class', 'fa fa-heart');
                    }

                    // console.log($(this).children().attr('class'));
                    // return false;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('add-to-wishlist') ?>",
                        data: {
                            productid: $(this).attr('id')
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 200) {
                                alert('product added to wishlist');
                            } else {
                                alert('something went wrong');
                            }
                        }
                    });
                }
            });

            $('.add-to-wishlist').click(function(e) {
                e.preventDefault();
                if ($(this).attr('data-target') == '') {
                    if ($(this).children().attr('class') == 'fa fa-heart mr-1') {
                        $(this).children().attr('class', 'fa fa-heart-o mr-1');
                    } else {
                        $(this).children().attr('class', 'fa fa-heart mr-1');
                    }

                    // console.log($(this).children().attr('class'));
                    // return false;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('add-to-wishlist') ?>",
                        data: {
                            productid: $(this).attr('id')
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 200) {
                                alert('product added to wishlist');
                            } else {
                                alert('something went wrong');
                            }
                        }
                    });
                }
            });

            $('.search-box').keyup(function() {
                if ($('.search-box').val().length >= 4) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('search-product') ?>",
                        data: {
                            search: $('.search-box').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            $('.search-results').html('');
                            for (var i = 0; i < data.product.length; i++) {
                                var html = "<a class='exit-search' style='text-decoration:none' href='<?= base_url('products/') ?>" + data.product[i]['product_slug'] + "'><div class='search-item row p-2 exit-search'><div class='col-3 text-center exit-search'><img height='50px' src='<?= base_url('uploads/product_images/') ?>" + data.product[i]['image_name1'] + "'></div><div class='col-8 p-0 exit-search'><p class='mb-0 search-product-title exit-search'>" + data.product[i]['title'] + "</p></div></div></a>";
                                $('.search-results').append(html);
                            }
                            // console.log(data);
                            // console.log(data.product.length);
                        }
                    });
                }
            });
            // myFunction();
            $('#itemslider').carousel({
                interval: 3000,
                interval: false
            });

            $('.carousel-showmanymoveone .item').each(function() {
                var itemToClone = $(this);

                for (var i = 1; i < 5; i++) {
                    itemToClone = itemToClone.next();

                    if (!itemToClone.length) {
                        itemToClone = $(this).siblings(':first');
                    }

                    itemToClone.children(':first-child').clone()
                        .addClass("cloneditem-" + (i))
                        .appendTo($(this));
                }
            });
        });

        $('body').mouseover(function(evnt) {
            if (!$(evnt.target).hasClass('hover_category') && !$(evnt.target).hasClass('allcategories') && !$(evnt.target).hasClass('allcategories-show')) {
                // setTimeout(function() {
                $('.allcategories').css('display', 'none');
                $('.hover_category').css('border-bottom', 'none');
                // }, 1000);
            }

            if (!$(evnt.target).hasClass('nav_Categories_Btn_out') && !$(evnt.target).hasClass('hover_category') && !$(evnt.target).hasClass('allcategories') && !$(evnt.target).hasClass('allcategories-show')) {
                $('.blocker').css('display', 'none');
                $('.nav_Categories_Btn_out_box').css('display', 'none');
            };

        });

        $('body').click(function(evnt) {
            if ($(evnt.target).hasClass('exit-search')) {
                // $('.search-results').html('');
            } else {
                $('.search-results').html('');
            }

            if (!$(evnt.target).hasClass('mobile-nav-bar') && $('#show-nav').hasClass('open')) {
                $('#show-nav').trigger('click');
                $('.mobileblocker').css('display', 'none');
                document.body.style.overflow = 'auto';
            }
        });

        $('.show-nav').click(function() {
            $('.mobileblocker').css('display', 'block');
        });

        $('.hover_category').hover(
            function () {
                hover_category();
            }
        );

        $('.nav_Categories_Btn_out').hover(
            function() {
                $('.blocker').css('display', 'block');
                $('.nav_Categories_Btn_out_box').css('display', 'block');
            }
        );


        function load_product_sliders() {
            $('.single-product-slider').slick({
                dots: true,
                autoplay: false,
                lazyLoad: 'ondemand',
                autoplaySpeed: 1000,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                // adaptiveHeight: true,
                prevArrow: "",
                nextArrow: "",
                pauseOnHover: false,
                pauseOnFocus: false,
            });
        }

        