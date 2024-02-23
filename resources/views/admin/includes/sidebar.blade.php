<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <!-- Logo -->
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <!-- End Logo -->
        <!-- User -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('adm/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <!-- End User -->
        <!-- Nav -->
        <div class="navbar-nav w-100">
            <a href="{{route('admin.index')}}" class="nav-item nav-link">
                <i class="fa fa-tachometer-alt me-2"></i>
                Main</a>
            <a href="{{route('admin.posts.index')}}" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i>
                Posts</a>
            <a href="{{route('admin.categories.index')}}" class="nav-item nav-link">
                <i class="fa fa-keyboard me-2"></i>
                Catergories</a>
            <a href="{{route('admin.tags.index')}}" class="nav-item nav-link">
                <i class="fa fa-table me-2"></i>
                Tags</a>
            </div>
        </div>
        <!-- End Nav -->
    </nav>
</div>
<!-- Sidebar End -->
