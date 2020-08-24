<article class="container  servers"  id="servers">
    <div class="row ">
        <div class="col-md-12 text-center">
            <h1>
                {{GameserverApp\Helpers\SiteHelper::name()}}
                @if(count($servers) == 1)
                    Server
                @else
                    Servers
                @endif
            </h1>
        </div>
    </div>
    <div class="row">
        <div class=" owl-theme" id="serverSlider">
            @forelse($servers as $server)
                <div class="item">
                    @include('pages.v1.partials.server', [
                        'slider' => true
                    ])
                </div>
            @empty

            @endforelse
        </div>
        @foreach($servers as $server)
            @include('pages.v1.partials.server-vote', [
                'server' => $server
            ])
        @endforeach
    </div>


    @if( GameserverApp\Helpers\RouteHelper::rules() )
        <div class="row moreinfo">

            <div class="col-md-6 center-block">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="{{GameserverApp\Helpers\RouteHelper::rules()}}" class="btn champ inverted  small ">
                            <span>
                                Server rules &raquo;
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    @endif
</article>