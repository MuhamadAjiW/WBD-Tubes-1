<div class="top-bar">
    <nav class="top-bar-contents">
        <button class="cluster-h cluster-logo"
        onclick="location.href='/home'">
            <img src="storage/assets/logo.svg" alt="Logo of company" style="width: 55px; height: 55px; background: transparent">
            </img>
            <p class="web-title">
                Baca.a
            </p>
        </button>
        
        <div class="cluster-h cluster-search">
            <div class="search-container search-container-sm">
                <div class="search-bar search-bar-sm">
                    <input searchdata type="text" class="input" placeholder="Search...">
                </div>
                <div class="search-result-sm">
                    <!-- generated by search result -->
                    <!-- <div class="search-entry-sm">
                        Test1
                    </div>
                    <div class="search-entry-sm">
                        Test1
                    </div>
                    <div class="search-entry-sm">
                        Test1
                    </div>
                    <div class="search-entry-sm">
                        Test1
                    </div> -->
                </div>
            </div>
    <!-- TODO: make template -->
            <div class="cluster-h cluster-login">
                <button class="btn btn-sm btn-grey"
                    onclick="location.href='/login'">
                    Log in
                </button>
                <button class="btn btn-sm btn-yellow" onclick="location.href='/register'">
                    Sign up
                </button>
            </div>
    <!-- make template -->
        </div>
    <!-- TODO: implement onclick -->
        <button class="btn btn-menu-sm"
            onclick=showSmallMenu()>
            <img src="storage/assets/menu3line.svg" alt="Menu button" style="width:100%; height:100%;">
            </img>
        </button>
    </nav>
    <div id="popup-menu" class="menu-popup-sm">
        <button class="btn popup-btn-sm"
            onclick="location.href='/login'">
            <img class="popup-btn-icn" src="storage/assets/menu3line.svg" alt="Menu button">
            Login
        </button>
        <button class="btn popup-btn-sm"
            onclick="location.href='/login'">
            <img class="popup-btn-icn" src="storage/assets/menu3line.svg" alt="Menu button">
            Login
        </button>
        <button class="btn popup-btn-sm"
            onclick="location.href='/login'">
            <img class="popup-btn-icn" src="storage/assets/menu3line.svg" alt="Menu button">
            Login
        </button>
    </div>

    <script src="public/js/topbar.js"></script>

</div>