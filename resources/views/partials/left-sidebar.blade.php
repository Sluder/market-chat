
<div class="col-md-3 left-sidebar affix">
    <div class="panel-group">
        <div class="panel-header">
            <p>Watchlist</p>
        </div>
        <div class="panel-content sidebar">
            @forelse (Auth::user()->watchlist as $i => $item)
                <a href="#">
                    <div class="row sidebar-row {{ $i % 3 == 0 ? 'green-background' : 'red-background' }}">
                        <div class="col-md-5">
                            <p class="symbol">{{ $item->ticker }}</p>
                            <p class="company-name">{{ $item->company_name }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="current-price">$2.96</p>
                        </div>
                        <div class="col-md-4 {{ $i % 3 == 0 ? 'green' : 'red' }}">
                            <p class="movement">$0.23 <i class="fa fa-angle-up" aria-hidden="true"></i></p>
                            <br>
                            <p class="movement-percent">5.23 %</p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="row sidebar-row">
                    <div class="col-md-12">
                        <p class="empty">You are not watching any markets</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Joined rooms --}}
    <div class="panel-group">
        <div class="panel-header">
            <p>Joined Rooms</p>
        </div>
        <div class="panel-content sidebar">
            @forelse (Auth::user()->rooms as $room)
                <a href="#">
                    <div class="row sidebar-row">

                    </div>
                </a>
            @empty
                <div class="row sidebar-row">
                    <div class="col-md-12">
                        <p class="empty">You have not joined any rooms</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
