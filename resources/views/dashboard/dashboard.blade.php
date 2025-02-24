@if (Auth::check())
    @if (Auth::user()->type == 'artist')
        @include('dashboard.artist')
    @else
        @include('dashboard.client')
    @endif
@endif
