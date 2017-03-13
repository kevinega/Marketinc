<div class="sidenav">
    <h6 class="sidenav-header">Welcome, <strong>{{ Auth::guard()->user()->brand_name }}</strong></h6>
    
    <div class="sidenav-menu">
        <a href="#">
            <div class="sidenav-package">
                <img src="{{ asset('img/sidebar-brandhome/basic.png') }}" class="sidenav-icon">
                BASIC
            </div>
        <a href="#promotions">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/promotion.png') }}" class="sidenav-icon">
                Promotions
            </div>
        </a>
        <a href="#details">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/details.png') }}" class="sidenav-icon">
                Details
            </div>
        </a>
        <a href="#pictures">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/picture.png') }}" class="sidenav-icon">
                Image
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/promotion.png') }}" class="sidenav-icon">
                Video
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/menu.png') }}" class="sidenav-icon">
                Menu
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/branches.png') }}" class="sidenav-icon">
                Branches
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/review.png') }}" class="sidenav-icon">
                Review
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/music.png') }}" class="sidenav-icon">
                Music
            </div>
        </a>
    </div>

    <div class="sidenav-preview">
        <a href="#" id="preview">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/preview.png') }}" class="sidenav-icon">
                Preview
            </div>
        </a>
    </div>
</div>