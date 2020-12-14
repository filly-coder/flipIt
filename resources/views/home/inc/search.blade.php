<?php
// Init.
$sForm = [
    'enableFormAreaCustomization' => '0',
    'hideTitles' => '0',
    'title' => t('Sell and buy near you'),
    'subTitle' => t('Simple, fast and efficient'),
    'bigTitleColor' => '', // 'color: #FFF;',
    'subTitleColor' => '', // 'color: #FFF;',
    'backgroundColor' => '', // 'background-color: #444;',
    'backgroundImage' => '', // null,
    'height' => '', // '450px',
    'parallax' => '0',
    'hideForm' => '0',
    'formBorderColor' => '', // 'background-color: #333;',
    'formBorderSize' => '', // '5px',
    'formBtnBackgroundColor' => '', // 'background-color: #4682B4; border-color: #4682B4;',
    'formBtnTextColor' => '', // 'color: #FFF;',
];

// Get Search Form Options
if (isset($searchFormOptions)) {
    if (isset($searchFormOptions['enable_form_area_customization']) and !empty($searchFormOptions['enable_form_area_customization'])) {
        $sForm['enableFormAreaCustomization'] = $searchFormOptions['enable_form_area_customization'];
    }
    if (isset($searchFormOptions['hide_titles']) and !empty($searchFormOptions['hide_titles'])) {
        $sForm['hideTitles'] = $searchFormOptions['hide_titles'];
    }
    if (isset($searchFormOptions['title_' . config('app.locale')]) and !empty($searchFormOptions['title_' . config('app.locale')])) {
        $sForm['title'] = $searchFormOptions['title_' . config('app.locale')];
        $sForm['title'] = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $sForm['title']);
        if (\Illuminate\Support\Str::contains($sForm['title'], '{count_ads}')) {
            try {
                $countPosts = \App\Models\Post::currentCountry()->unarchived()->count();
            } catch (\Exception $e) {
                $countPosts = 0;
            }
            $sForm['title'] = str_replace('{count_ads}', $countPosts, $sForm['title']);
        }
        if (\Illuminate\Support\Str::contains($sForm['title'], '{count_users}')) {
            try {
                $countUsers = \App\Models\User::count();
            } catch (\Exception $e) {
                $countUsers = 0;
            }
            $sForm['title'] = str_replace('{count_users}', $countUsers, $sForm['title']);
        }
    }
    if (isset($searchFormOptions['sub_title_' . config('app.locale')]) and !empty($searchFormOptions['sub_title_' . config('app.locale')])) {
        $sForm['subTitle'] = $searchFormOptions['sub_title_' . config('app.locale')];
        $sForm['subTitle'] = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $sForm['subTitle']);
        if (\Illuminate\Support\Str::contains($sForm['subTitle'], '{count_ads}')) {
            try {
                $countPosts = \App\Models\Post::currentCountry()->unarchived()->count();
            } catch (\Exception $e) {
                $countPosts = 0;
            }
            $sForm['subTitle'] = str_replace('{count_ads}', $countPosts, $sForm['subTitle']);
        }
        if (\Illuminate\Support\Str::contains($sForm['subTitle'], '{count_users}')) {
            try {
                $countUsers = \App\Models\User::count();
            } catch (\Exception $e) {
                $countUsers = 0;
            }
            $sForm['subTitle'] = str_replace('{count_users}', $countUsers, $sForm['subTitle']);
        }
    }
    if (isset($searchFormOptions['parallax']) and !empty($searchFormOptions['parallax'])) {
        $sForm['parallax'] = $searchFormOptions['parallax'];
    }
    if (isset($searchFormOptions['hide_form']) and !empty($searchFormOptions['hide_form'])) {
        $sForm['hideForm'] = $searchFormOptions['hide_form'];
    }
}

// Country Map status (shown/hidden)
$showMap = false;
if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
    if (isset($citiesOptions) and isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
        $showMap = true;
    }
}
?>
@if (isset($sForm['enableFormAreaCustomization']) and $sForm['enableFormAreaCustomization'] == '1')

    @if (isset($firstSection) and !$firstSection)
        <div class="h-spacer"></div>
    @endif

    <?php $parallax = (isset($sForm['parallax']) and $sForm['parallax'] == '1') ? 'parallax' : ''; ?>
    <div class="wide-intro {{ $parallax }}">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">

                    @if ($sForm['hideTitles'] != '1')
                        <div class="text-center my-5">
                            <h1 class="text-center">Selling Online Has Never Been Easier</h1>
                            <a href="" class="btn btn-primary">Register Here</a>
                        </div>
                    @endif

                    @if ($sForm['hideForm'] != '1')
                        <div class="search-row animated fadeInUp">
                            <?php $attr = ['countryCode' => config('country.icode')]; ?>
                            <form id="search" name="search" action="{{ lurl(trans('routes.v-search', $attr), $attr) }}"
                                  method="GET">
                                <div class="row m-0">
                                    <div class="col-sm-5 col-xs-12 search-col relative">
                                        <i class="icon-docs icon-append"></i>
                                        <input type="text" name="q" class="form-control keyword has-icon"
                                               placeholder="{{ t('What?') }}" value="">
                                    </div>

                                    <div class="col-sm-5 col-xs-12 search-col relative locationicon">
                                        <i class="icon-location-2 icon-append"></i>
                                        <input type="hidden" id="lSearch" name="l" value="">
                                        @if ($showMap)
                                            <input type="text" id="locSearch" name="location"
                                                   class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
                                                   placeholder="{{ t('Where?') }}" value="" title=""
                                                   data-placement="bottom"
                                                   data-toggle="tooltip"
                                                   data-original-title="{{ t('Enter a city name OR a state name with the prefix ":prefix" like: :prefix', ['prefix' => t('area:')]) . t('State Name') }}">
                                        @else
                                            <input type="text" id="locSearch" name="location"
                                                   class="form-control locinput input-rel searchtag-input has-icon"
                                                   placeholder="{{ t('Where?') }}" value="">
                                        @endif
                                    </div>

                                    <div class="col-sm-2 col-xs-12 search-col">
                                        <button class="btn btn-primary btn-search btn-block">
                                            <i class="icon-search"></i> <strong>{{ t('Find') }}</strong>
                                        </button>
                                    </div>
                                    {!! csrf_field() !!}
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@else

    @include('home.inc.spacer')
    <div class="container">
        <div class="intro">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">

                        <div class="search-row fadeInUp">
                            <?php $attr = ['countryCode' => config('country.icode')]; ?>
                            <form id="search" name="search" action="{{ lurl(trans('routes.v-search', $attr), $attr) }}"
                                  method="GET">
                                <div class="row m-0">
                                    <div class="col-sm-5 col-xs-12 search-col relative">
                                        <i class="icon-docs icon-append"></i>
                                        <input type="text" name="q" class="form-control keyword has-icon"
                                               placeholder="{{ t('What?') }}" value="">
                                    </div>

                                    <div class="col-sm-5 col-xs-12 search-col relative locationicon">
                                        <i class="icon-location-2 icon-append"></i>
                                        <input type="hidden" id="lSearch" name="l" value="">
                                        @if ($showMap)
                                            <input type="text" id="locSearch" name="location"
                                                   class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
                                                   placeholder="{{ t('Where?') }}" value="" title=""
                                                   data-placement="bottom"
                                                   data-toggle="tooltip" type="button"
                                                   data-original-title="{{ t('Enter a city name OR a state name with the prefix ":prefix" like: :prefix', ['prefix' => t('area:')]) . t('State Name') }}">
                                        @else
                                            <input type="text" id="locSearch" name="location"
                                                   class="form-control locinput input-rel searchtag-input has-icon"
                                                   placeholder="{{ t('Where?') }}" value="">
                                        @endif
                                    </div>

                                    <div class="col-sm-2 col-xs-12 search-col">
                                        <button class="btn btn-primary btn-search btn-block">
                                            <i class="icon-search"></i> <strong>{{ t('Find') }}</strong>
                                        </button>
                                    </div>
                                    {!! csrf_field() !!}
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endif


<div class="container text-center">

    <div class="col-xl-12 content-box layout-section mt-4" style="border: none!important;">
        <div class="row row-featured row-featured-category justify-content-between"  style="font-size: 18px !important; line-height: 2em;">
            <div class="col-xl-12 box-title no-border">
                <div class="inner">

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 px-4">
               <div class="my-4">
                    <img src="{{asset('images/US Outline Clipart.jpg')}}" class="img-fluid" style="width: 350px; height: unset;">
                    <h3 style="font-size: 25px;">Easy to Use</h3>

                    <ul class="text-left">
                        <li style="list-style: disc!important;">Sell items with our all-in-one system</li>
                        <li style="list-style: disc!important;"> Choose to post at a local or national level</li>
                        <li style="list-style: disc!important;">Easily manage and edit your listings on one platform</li>

                    </ul>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 px-4" style="border: none!important;">
                <div class="my-4">
                    <img src="{{asset('images/No Scam Zone Graphic.png')}}"  style="width: 250px; height: unset;">
                    <h3  style="font-size: 25px;" class="mt-2">Minimize Time</h3>

                    <ul class="text-left">

                        <li style="list-style: disc!important;">Filters low offers and passive buyers</li>
                        <li style="list-style: disc!important;">Avoid potential scammers</li>
                        <li style="list-style: disc!important;"> Conveniently monitors your offers</li>
                        <li style="list-style: disc!important;">Automatically lower the price after a custom duration</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 px-4 pt-4" style="border: none!important;">
                <div class="my-4">
                    <img src="{{asset('images/Magnifying glass clipart.png')}}">

                    <h3  style="font-size: 25px;" class="mt-2">Maximize Profits</h3>

                    <ul class="text-left">

                        <li style="list-style: disc!important;">Post items on 4+ targeted marketplace platforms to reach
                            different audiences
                        </li>
                        <li style="list-style: disc!important;"> Maximize your online presence</li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 px-4 pt-4" style="border: none!important;">
                <div class="my-4">
                    <img src="{{asset('images/open-book-clipart-15-300x300.png')}}" style="width: 210px; height: unset;">

                    <h3  style="font-size: 25px;">Market Research</h3>

                    <ul class="text-left">

                        <li style="list-style: disc!important;"> Flip It will research your item and find comparables in the
                            market to help price your item
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="text-center mb-5 mt-5">
        <div class="col-xl-12 box-title no-border">
            <div class="inner" style="background: #737373;">
                <h1 class="text-center">Do you live in the Greater Boston area? </h1>
            </div>
        </div>
    </div>
    <div class="col-xl-12 layout-section">
        <div class="row row-featured row-featured-category justify-content-between"  style="font-size: 17px !important; line-height: 1.9em;">


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 px-5"
                 style="background: #1685d7;text-align: left!important;">

                <h3 class="pt-5" style="font-size: 25px;">Sit back, relax, and have your items posted for you!</h3>
                <h5>In-person service include: </h5>
                <ul style="font-size: larger">
                    <li style="list-style: disc!important;">Meet at your location of preference</li>
                    <li style="list-style: disc!important;">Make suggestions to have your items sold quicker</li>
                    <li style="list-style: disc!important;">Perform market research</li>
                    <li style="list-style: disc!important;">Price your items</li>
                    <li style="list-style: disc!important;">Take photos</li>
                    <li style="list-style: disc!important;">Post on the Flip It platform</li>
                    <li style="list-style: disc!important;">Mail your items</li>
                    <li style="list-style: disc!important;">Perform in-person "meetups"</li>

                </ul>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <img src="{{asset('images/AlexFlipItCharacterTransparent.png')}}" style="width: 60%"/>
            </div>
            <div class="col-lg-12 mt-3">
                <h4 style="text-align: center">
                    <a href="https://meetings.hubspot.com/flipittoday20191" target="_blank">Click Here</a>
                    to schedule an in-person consultation
                </h4>
            </div>


        </div>
    </div>
</div>
<div class="h-spacer"></div>
<div class="container text-center">
    <h2>What Our Customers Say</h2>
    <img src="{{asset('images/FlipItJettaTestimonialV2.png')}}" class="px-3">

</div>
