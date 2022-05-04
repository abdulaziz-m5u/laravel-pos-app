<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('User Management') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Permissions') }}</a>
                        <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('Roles') }}</a>
                        <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{ __('Category') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/products') || request()->is('admin/products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{ __('Product') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/pos') || request()->is('admin/pos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pos.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{ __('POS') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/transactions') || request()->is('admin/transactions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.transactions.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{ __('Transaction') }}</span></a>
            </li>
            
            <li class="nav-item {{ request()->is('admin/reports/revenue') || request()->is('admin/reports/revenue') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.reports.revenue') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{ __('Revenue') }}</span></a>
            </li>


        </ul>