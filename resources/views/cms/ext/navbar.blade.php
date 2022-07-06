
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Categories
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="fas fa-list-ul nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.create') }}" class="nav-link">
                            <i class="fas fa-plus-square nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
            </ul>
        </li>
    </ul>
</nav>
