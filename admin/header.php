<?php
include'config.php';

session_start();
if (!isset($_SESSION['admin_name'])) {
    echo '<script> window.location.href = "login.php";</script>';
}

?>
<header id="page-topbar">
    <div class="navbar-header bg-soft-danger">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark"> <span class="logo-sm">
                                    <img src="../images/sda%20logo%20black.png" alt="ngo-logo" height="30">
                                </span> <span class="logo-lg">
                                    <img src="../images/east%20kampala%20logo.png" alt="ngo-logo" height="50"> </span>
                </a>
                <a href="index.php" class="logo logo-light"> <span class="logo-sm">
                                    <img src="../images/sda%20logo%20black.png" alt="ngo-logo" height="30">
                                </span> <span class="logo-lg">
                                    <img src="../images/east%20kampala%20logo.png" alt="ngo-logo" height="50">  </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>

        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i data-feather="search" class="icon-lg"></i> </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn"> <i data-feather="moon" class="icon-lg layout-mode-dark"></i> <i data-feather="sun" class="icon-lg layout-mode-light"></i> </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2"> <i data-feather="settings" class="icon-lg"></i> </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <i data-feather="users"></i> <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION['admin_name']; ?></span> <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i> </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="new-admin.php"><i data-feather="user-plus"></i>Add Admin User</a>
                    <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="vertical-menu ">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="index.php"> <i data-feather="home"></i> <span data-key="t-dashboard">Dashboard</span> </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="file-minus"></i> <span data-key="t-apps">Announcements</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="all-announcements.php"> <span data-key="t-calendar">All Announcements</span> </a>
                        </li>
                        <li>
                            <a href="add-announcement.php"> <span data-key="t-chat">Add Announcements</span> </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="file"></i> <span data-key="t-apps">Sabbath Bulletin</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#"> <span data-key="t-calendar">All Bulletin content</span> </a>
                        </li>
                        <li>
                            <a href="add-songs.php"> <span data-key="t-chat"></span>Add Hymns</a>
                        </li>
                        <li>
                            <a href="add-serving-team.php"> <span data-key="t-chat"></span>Add Serving Team</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="box"></i> <span data-key="t-apps">Church Events</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="event-list.php"> <span data-key="t-calendar">All Events</span> </a>
                        </li>
                        <li>
                            <a href="add-event.php"> <span data-key="t-chat">Add Events</span> </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="layout"></i> <span data-key="t-authentication">Devotions</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="news-list.php" data-key="t-login">All Devotions</a></li>
                        <li><a href="add-news.php" data-key="t-register">Add New Devotion</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="grid"></i> <span data-key="t-authentication">Image Gallery</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="image-gallery.php" data-key="t-login">All Images</a></li>
                        <li><a href="add-gallery-img.php" data-key="t-register">Add Images</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="video"></i> <span data-key="t-authentication">Video Sermons</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="video-list.php" data-key="t-login">All Videos</a></li>
                        <li><a href="add-video.php" data-key="t-register">Add Video</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="users"></i> <span data-key="t-authentication">Church Body</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="member-list.php" data-key="t-login">All Members</a></li>
                        <li><a href="add-member.php" data-key="t-register">Add New Member</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="file-text"></i> <span data-key="t-pages">Contact Inquiry</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="inquiry-list.php" data-key="t-starter-page">All Inquiries</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="image"></i> <span data-key="t-pages">Banners</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="banner-list.php" data-key="t-starter-page">Banners List</a></li>
                        <li><a href="add-banner.php" data-key="t-maintenance">Add Banners</a></li>
                    </ul>
                </li>
                <!-- Added Qrcode section -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="image"></i> <span data-key="t-apps">Qrcodes</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#"> <span data-key="t-calendar">All Qrcodes</span> </a>
                        </li>
                        <li>
                            <a href="add-bulletin-qrcode.php"> <span data-key="t-chat">Add Sabbath Bulletin Qrcode</span> </a>
                        </li>
                    </ul>
                </li>
<!--                Added for file uploads-->
                <li>
                    <a href="javascript: void(0);" class="has-arrow"> <i data-feather="file"></i> <span data-key="t-pages">Upload Files</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add-inverse.php" data-key="t-maintenance">Add Inverse Lesson</a></li>
                        <li><a href="add-audio.php" data-key="t-maintenance">Add Audio Sermons</a></li>
                        <li><a href="#" data-key="t-maintenance">Add Bulletins</a></li>
                        <li><a href="add-prayer.php" data-key="t-maintenance">Add Today's Prayer</a></li>
                    </ul>
                </li>

            </ul>
            <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body"> <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">All For God's Glory</h5>
                        <p class="font-size-13">All Changes made to this website are for the magnification of God"</p> <a href="#!" class="btn btn-primary mt-2">Visit EKC Site</a> </div>
                </div>

            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>


