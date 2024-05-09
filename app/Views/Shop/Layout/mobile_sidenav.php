<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    .mobile-nav-bar a {
        color: inherit;
        text-decoration: none;
    }

    ::-webkit-scrollbar {
        width: 7px;
        height: 7px;
    }

    ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
    }

    ::-webkit-scrollbar-thumb {
        background: #e1e1e1;
        border: 0px none #ffffff;
        border-radius: 0px;
    }

    ::-webkit-scrollbar-track {
        background: #666666;
        border: 0px none #ffffff;
        border-radius: 0px;
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }

    :root {
        --nav-width: 15rem;
        --gutter: 1rem;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #ffffff;
    }

    ::-webkit-scrollbar-thumb:active {
        background: #000000;
    }

    ::-webkit-scrollbar-track:hover {
        background: #666666;
    }

    ::-webkit-scrollbar-track:active {
        background: #333333;
    }

    #side-nav-img {
        width: 240px;
    }

    #side-nav {
        position: fixed;
        top: 0;
        height: 100%;
        /* width:70%; */
        min-width: var(--nav-width);
        left: calc(var(--nav-width) * -1);
        background-color: #fff;
        color: #20262e;
        margin: 0;
        transition: left ease 0.25s;
        -webkit-transition: left ease 0.25s;
        /* z-index: 1000; */
    }

    #side-nav.open {
        left: 0;
    }

    #side-nav ul {
        max-height: 100%;
        list-style-type: none;
        padding: 0;
        margin: 0;
        overflow: hidden;
    }

    #side-nav.open ul {
        overflow-y: auto;
        overflow-x: hidden;
    }

    #side-nav ul li {
        display: block;
        position: relative;
        padding: 12px;
        text-transform: capitalize;
        font-size: 12px;
    }

    #side-nav ul li::after {
        position: absolute;
        width: var(--nav-width);
        height: 100%;
        content: "";
        top: 0;
        left: calc(calc(var(--nav-width) + var(--gutter)) * -1);
        background-color: #bfbfbf;
        opacity: 0.25;
        color: #fff;
        transition: left 0.25s;
        -webkit-transition: left 0.25s;
    }

    #side-nav ul li:hover {
        cursor: pointer;
    }

    #side-nav ul li:hover::after {
        left: 0;
    }

    #side-nav ul li a {
        text-decoration: none;
        color: inherit;
    }

    /** submenu drill-downs */

    #side-nav ul li.sub-menu-link {
        text-transform: capitalize !important;
    }

    #side-nav ul li.sub-menu-link::before {
        /* font-family: "Font Awesome 5 Free";
        content: "\f105"; */
        /* display: inline-block; */
        height: 20px;
        width: 20px;
        display: block;
        position: absolute;
        top: 25%;
        right: 10px;
    }

    /* #side-nav ul li.sub-menu-link:hover::before {
        animation-duration: 1s;
        transition-timing-function: ease-in;
        animation-fill-mode: both;
        animation-name: bounce-down;
        animation-iteration-count: infinite;
    } */

    /* #side-nav ul li.sub-menu-link.active::before {
        transform: rotate(180deg);
        margin-right: 4px;
    } */
    .sidebar-subcategories::before {
        font-family: "Font Awesome 5 Free";
        content: "\f105";
    }

    .sidebar-subcategories.active::before {
        /* transform: rotate(90deg); */
        content: "\f107";
        /* animation-duration: 1s;
        transition-timing-function: ease-in;
        animation-fill-mode: both;
        animation-name: bounce-right;
        animation-iteration-count: infinite; */
    }

    #side-nav ul.side-nav-sub-menu {
        overflow-y: hidden;
        padding-left: 1rem;
        max-height: 0;
        transition: max-height ease 0.25s;
        -webkit-transition: max-height ease 0.25s;
    }

    #side-nav ul.side-nav-sub-menu.active {
        max-height: 25rem;
        transition: max-height ease 0.5s;
        -webkit-transition: max-height ease 0.5s;
    }

    #side-nav ul.side-nav-sub-menu li {
        text-transform: capitalize !important;
        font-size: 12px;
        /* letter-spacing: 2px; */
    }

    #side-nav ul.side-nav-sub-menu li:hover::after {
        left: -1rem;
    }

    #side-nav span#show-nav {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        width: 50px;
        top: 0;
        left: 100%;
    }

    #side-nav span#show-nav.open {
        transform: rotate(90deg);
    }

    #side-nav span#show-nav:hover {
        cursor: pointer;
    }

    #side-nav span#show-nav:hover i {
        cursor: pointer;
        animation-duration: 1s;
        transition-timing-function: ease-in;
        animation-fill-mode: both;
        animation-name: bounce-right;
        animation-iteration-count: infinite;
    }

    #side-nav span#show-nav.open:hover i {
        cursor: pointer;
        animation-duration: 1s;
        transition-timing-function: ease-in;
        animation-fill-mode: both;
        animation-name: bounce-left;
        animation-iteration-count: infinite;
    }

    /* animation stuff */
    @keyframes bounce-right {
        0% {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(25%, 0, 0);
        }

        100% {
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes bounce-left {
        0% {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(25%, 0, 0);
        }

        100% {
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes bounce-up {
        0% {
            transform: rotate(180deg) translate3d(0, 0, 0);
        }

        50% {
            transform: rotate(180deg) translate3d(0, 25%, 0);
        }

        100% {
            transform: rotate(180deg) translate3d(0, 0, 0);
        }
    }

    @keyframes bounce-down {
        0% {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(0, 25%, 0);
        }

        100% {
            transform: translate3d(0, 0, 0);
        }
    }
</style>
<nav id="side-nav" class='mobile-nav-bar'>
    <ul>
        <img id='side-nav-img' class='mobile-nav-bar' src='<?= base_url('uploads/website/mobile-sidebar-banner.webp'); ?>'>
        <?php foreach ($categories as $row) {
            $subcategories = get_categories($row->id);
            if ($row->parent_category == '') { ?>
                <?php if (empty($subcategories)) { ?><a href="<?= base_url($row->category_slug); ?>"> <?php } ?> <li class="sub-menu-link mobile-nav-bar <?php if (isset($subcategories) && !empty($subcategories)) {
                                                            echo ' sidebar-subcategories';
                                                        } ?>"><?= $row->category_name; ?></li>
                <?php if (empty($subcategories)) { ?> </a> <?php } ?>
            <?php }
            if (isset($subcategories) && !empty($subcategories)) { ?>
                <ul class="side-nav-sub-menu mobile-nav-bar">
                    <?php foreach ($subcategories as $row2) {
                        $subcategories2 = get_categories($row2->id); ?>
                        <?php if (empty($subcategories2)) { ?><a href="<?= base_url($row->category_slug); ?>"> <?php } ?> <li class='sub-menu-link mobile-nav-bar <?php if (isset($subcategories2) && !empty($subcategories2)) {
                                                                                                                                                                    echo ' sidebar-subcategories';
                                                                                                                                                                } ?>'> <?= $row2->category_name; ?></li>
                            <?php if (empty($subcategories2)) { ?> </a> <?php } ?>
                        <?php
                        if (isset($subcategories2) && !empty($subcategories2)) { ?>
                            <ul class="side-nav-sub-menu mobile-nav-bar">
                                <?php foreach ($subcategories2 as $row3) { ?>
                                    <?php if (empty($subcategories2)) { ?> <?php } ?><a href="<?= base_url($row3->category_slug); ?>">
                                        <li class='sub-menu-link mobile-nav-bar'><?= $row3->category_name; ?></li>
                                    </a>
                                <?php }  ?>
                            </ul>
                    <?php }
                    } ?>
                </ul>
        <?php }
        } ?>
        <!-- <li class="sub-menu-link"><a href="#">Services</a></li>
        <ul class="side-nav-sub-menu">
            <li><a href="#">Print Design</a></li>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Mobile App Development</a></li>
        </ul> -->
    </ul>
</nav>
<script>
    console.clear();

    const nav = document.getElementById('side-nav');
    const showNavBtn = document.getElementById('show-nav');
    const container = document.getElementById('container');
    const navWidth = 15; // rems
    const navGutter = 1;

    nav.addEventListener('click', (event) => {
        if (event.target.classList.contains('sub-menu-link')) {
            event.target.classList.toggle('active');
            const subMenu = event.target.nextElementSibling;
            subMenu.classList.toggle('active');
        }
    });

    showNavBtn.addEventListener('click', (event) => {
        if (nav.style.left !== '0px') {
            showNavBtn.classList.toggle('open');
            nav.classList.toggle('open');
            container.classList.toggle('nav-open');
            document.body.style.overflow = 'hidden';
        } else {
            showNavBtn.classList.toggle('open');
            nav.classList.toggle('open');
            container.classList.toggle('nav-open');
            document.body.style.overflow = 'auto';
        }
    }, nav);
</script>