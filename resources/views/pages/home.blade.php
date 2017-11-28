@extends('layouts.base')

{{-- User logged in --}}
@section('content')
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                {{--@include('partials.left-sidebar')--}}

                {{-- Latest articles --}}
                <div class="col-md-6 article-list">
                    @for ($i = 0; $i < 10; $i++)
                        {{--<a href="#">--}}
                            {{--<div class="row article-preview">--}}
                                {{--<div class="article-preview-header">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<p class="date">November 8, 2017</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<p class="source">tradingview.com</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="article-image">--}}
                                    {{--<img src="{{ url('images/test.jpg') }}" alt="">--}}
                                {{--</div>--}}
                                {{--<div class="article-body">--}}
                                    {{--<p class="article-title">Wanda Group: The Chinese Conglomerate You've Never Heard Of</p>--}}
                                    {{--<p class="article-text">&emsp; Wanda Group is one of the world's largest conglomerates. It's also known as the Dalian Wanda Group and is headed bso known as the Dalian Wanda Group and is headed by CEO so known as the Dalian Wanda Group and is headed by CEO y CEO Wang Jianlin, the wealthiest individual</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    @endfor
                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('tr[data-href]').on("click", function() {
            document.location = $(this).data('href');
        });
    </script>
@endsection