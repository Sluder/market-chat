
<div class="col-md-3">
    {{-- Market watchlist --}}
    <table class="table table-striped watchlist">
        <tr class="header">
            <th>Market Watchlist</th>
        </tr>
        @for ($i = 0; $i < 5; $i++)
            <tr data-href="#" class="clickable">
                <td>dsd</td>
            </tr>
        @endfor
    </table>

    {{-- Joined rooms --}}
    <table class="table table-striped joined-rooms">
        <tr class="header">
            <th>Joined Rooms</th>
        </tr>
        @for ($i = 0; $i < 5; $i++)
            <tr data-href="#" class="clickable">
                <td>The best room ever</td>
            </tr>
        @endfor
    </table>
</div>