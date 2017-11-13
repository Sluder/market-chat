
<div class="col-md-3 left-sidebar">
    {{-- Market watchlist --}}
    <table class="table">
        <thead>
            <tr>
                <th>Watchlist</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr data-href="#" class="clickable {{ $i % 3 == 0 ? 'green-background' : 'red-background' }}">
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="symbol">{{ $i % 3 == 0 ? 'PLUG' : 'ACERW' }}</p>
                            <p class="company-name">Plug Power Inc.</p>
                        </div>
                        <div class="col-md-3">
                            <p class="current-price">$2.96</p>
                        </div>
                        <div class="col-md-3 {{ $i % 3 == 0 ? 'green' : 'red' }}">
                            <p class="movement">$0.23 <i class="fa fa-angle-up" aria-hidden="true"></i></p>
                            <p class="movement-percent">5.23 %</p>
                        </div>
                    </div>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

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
    </table>
</div>
