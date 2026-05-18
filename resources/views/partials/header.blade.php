<header class="banner">
    <div class="container">
        <a class="brand" href="{{ route('home') }}">
            <img src="{{ $globalSettings['site_logo'] ?? 'https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/logo.png' }}" alt="{{ $globalSettings['site_name'] ?? 'Ngôi nhà Đức' }}">
            <h1>{{ $globalSettings['site_name'] ?? 'Ngôi nhà Đức - Trung tâm Đức ngữ tại Đà Nẵng' }}</h1>
        </a>
        <nav class="nav-primary">
            <a href="#" id="btn-toggleMenu">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="menu-menu-chinh-container">
                <ul id="menu-menu-chinh" class="nav">
                    @if(!empty($primaryMenu) && $primaryMenu->items->isNotEmpty())
                        @foreach($primaryMenu->items as $item)
                            @if($item->is_active)
                                @php
                                    $itemPath = ltrim(parse_url($item->url, PHP_URL_PATH) ?? '', '/');
                                    $isActive = ($itemPath && request()->is($itemPath . '*')) || ($item->url != '#' && request()->url() == $item->url);
                                    $activeChildren = $item->children->where('is_active', true);
                                @endphp
                                <li id="menu-item-{{ $item->id }}"
                                    class="menu-item menu-item-type-post_type menu-item-object-page {{ $activeChildren->isNotEmpty() ? 'menu-item-has-children' : '' }} {{ $isActive ? 'current-menu-ancestor current-menu-parent current-menu-item' : '' }}">
                                    <a href="{{ $item->url == '#' ? 'javascript:void(0);' : $item->url }}">{{ $item->title }}</a>
                                    @if($activeChildren->isNotEmpty())
                                        <ul class="sub-menu">
                                            @foreach($activeChildren as $child)
                                                @php
                                                    $childPath = ltrim(parse_url($child->url, PHP_URL_PATH) ?? '', '/');
                                                    $isChildActive = ($childPath && request()->is($childPath)) || ($child->url != '#' && request()->url() == $child->url);
                                                @endphp
                                                <li id="menu-item-{{ $child->id }}"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page {{ $isChildActive ? 'current-menu-item' : '' }}">
                                                    <a href="{{ $child->url == '#' ? 'javascript:void(0);' : $child->url }}">{{ $child->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </nav>
        <div class="clearfix"></div>
    </div>
</header>
