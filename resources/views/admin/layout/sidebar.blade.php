<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-file-text"></i> Pages <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/newPage') }}">Create New Page</a></li>
                    <li><a href="{{ url('/admin/listPages') }}">Edit Pages</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-file-image-o"></i> Images <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/newImage') }}">Add Images</a></li>
                    <li><a href="{{ url('/admin/listImage') }}">Edit Images</a></li>
                </ul>
            </li>
            <li><a href="/admin/contacts"><i class="fa fa-user"></i> <span>Contacts</span></a></li>
            <li><a href="/admin/MOTS"><i class="fa fa-car"></i> <span>MOT's</span></a></li>
        </ul>
    </section>
</aside>