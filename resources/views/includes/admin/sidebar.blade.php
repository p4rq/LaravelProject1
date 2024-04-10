<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Posts
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.post.create')}}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Create
                </p>
            </a>
        </li>
    </ul>
</nav>
{{--<div>--}}
{{--    <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Add one</a>--}}
{{--</div>--}}
