
<div class="col-md-3 left-sidebar">
    <div class="panel-group">
        <div class="panel-header">
            <p>Watchlist</p>
        </div>
        <div class="panel-content sidebar">
            @forelse (Auth::user()->watchlist as $i => $item)
                <a href="#">
                    <div class="row sidebar-row {{ $i % 3 == 0 ? 'green-background' : 'red-background' }}">
                        <div class="col-md-6">
                            <p class="symbol">{{ $item->ticker }}</p>
                            <p class="company-name">{{ $item->company_name }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="current-price">$2.96</p>
                        </div>
                        <div class="col-md-3 {{ $i % 3 == 0 ? 'green' : 'red' }}">
                            <p class="movement">$0.23 <i class="fa fa-angle-up" aria-hidden="true"></i></p>
                            <p class="movement-percent">5.23 %</p>
                        </div>
                    </div>
                </a>
            @empty

            @endforelse
        </div>
    </div>

<!--
    {{-- Joined rooms --}}
    <table class="table">
        <thead>
            <tr>
                <th>Joined Rooms</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr data-href="#" class="clickable">
                <td class="room-item">This is a joined room</td>
            </tr>
        @endfor
        </tbody>
    </table> -->
</div>
