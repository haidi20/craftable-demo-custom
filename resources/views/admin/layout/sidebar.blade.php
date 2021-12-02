<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            {{-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li> --}}
            <li class="nav-title">Master</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/articles') }}"><i class="nav-icon icon-plane"></i>Standard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/list-shops') }}"><i class="nav-icon icon-flag"></i>List Shops</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/posts') }}"><i class="nav-icon icon-globe"></i> #2: With media</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translatable-articles') }}"><i class="nav-icon icon-ghost"></i> #3: Translatable</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/exports') }}"><i class="nav-icon icon-drop"></i> #4: With export</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/articles-with-relationships') }}"><i class="nav-icon icon-graduation"></i> #5: With relationship</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/bulk-actions') }}"><i class="nav-icon icon-book-open"></i> #6: {{ trans('admin.bulk-action.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tags') }}"><i class="nav-icon icon-tag"></i> #7: {{ trans('admin.tag.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/list-shops') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.list-shop.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li> 
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage users') }}</a></li> --}}
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
