@php
    $currentLink = request()->path();
@endphp

<li class="@foreach ($active_links as $active_link){{ $active_link == $currentLink ? 'mm-active' : '' }} @endforeach">
    <a class="has-arrow active" href="#"
        aria-expanded="@foreach ($active_links as $active_link){{ $active_link == $currentLink ? 'true' : 'false' }} @endforeach">
        <div class="nav_icon_small">
            <img src={{ asset('website/img/menu-icon/dashboard.svg') }} alt="">
        </div>
        <div class="nav_title">
            <span>{{ $title }} </span>
        </div>
    </a>
    <ul class="@foreach ($active_links as $active_link){{ $active_link == $currentLink ? 'mm-collapse mm-show' : '' }} @endforeach">
        @if ($links)
            @foreach ($links as $link)
                <li>
                    <a href="{{ route($link['route']) }}" class="{{ request()->is($link['link']) ? 'active' : '' }}">
                        {{ $link['title'] }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</li>
