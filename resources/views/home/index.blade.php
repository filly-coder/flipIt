{{--
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')
@section('after_styles')
<link href="{{ url('assets/css/jquery.hotspot.css') }}" rel="stylesheet">
<style type="text/css">
    @media (max-width: 600px) {
        #hotspotImg .hot-spot .tooltip p {
            font-size: 13px !important;
        }
        #hotspotImg .hot-spot .tooltip {
            width: 260px !important;
        }

        .mecari{
            margin-left: -90px !important;
        }
        .nextdoor{
            margin-right: -40px !important;
        }
        .offerup{
            margin-left: -60px !important;
        }
        .ebay{
            margin-right: -60px !important;
        }
        .amazon{
            margin-left: -90px !important;
        }
    }
</style>
@endsection
@section('search')
    @parent
@endsection

@section('content')
    <div class="main-container" id="homepage">

        @if (Session::has('flash_notification'))
            @include('common.spacer')
            <?php $paddingTopExists = true; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        @include('flash::message')
                    </div>
                </div>
            </div>
        @endif

        <div class="h-spacer"></div>
        <div class="container my-5">
            <div class="row justify-centent-center responsive-hotspot-wrap mb-5" id="hotspotImg">
                <div class="col-xl-12 col-md-12 col-sm-12 text-center" >
                    <img src="{{asset('images/RevDiagramBlueTextNew.png')}}" class="img-fluid img-responsive">
                    <!-- Facebook Marketplace -->
                    <div class="hot-spot" x="500" y="15">
                        <div class="circle"></div>
                        <div class="tooltip">
                            <div class="text-row">
                                <h4>Facebook Marketplace</h4>
                                <p>Buy or sell new and used items on Facebook Marketplace, locally or nationally. Find great deals on new items shipped from stores to your door. Facebook marketplace offers a wide range of categories and products. <br>
                                <span class="font-weight-bold">User Count: </span> 800+ Million Monthly
                                <br>
                                <span class="font-weight-bold">Founded: </span>2016</p>
                            </div>
                        </div>
                    </div>
                    <!-- OfferUp -->
                    <div class="hot-spot" x="200" y="400">
                        <div class="circle"></div>
                        <div class="tooltip offerup">
                            <div class="text-row">
                                <h4>OfferUp</h4>
                                <p>Buy and sell everything from cars and trucks, electronics, furniture, and more. Offerup has new and used items, and it has many categories which makes it a broad platform. Through Offerup, sellers do local meetups and ship items. <br>
                                <span class="font-weight-bold">User Count: </span> 20+ Million Monthly
                                <br>
                                <span class="font-weight-bold">Founded: </span>2011</p>
                            </div>
                        </div>
                    </div>
                    <!-- eBay -->
                    <div class="hot-spot" x="700" y="660">
                        <div class="circle"></div>
                        <div class="tooltip ebay">
                            <div class="text-row">
                                <h4>eBay</h4>
                                <p>Ebay is a widespread categorized marketplace for new and used items. Unlike the other platforms, Ebay has a bidding system option and a buy it now option. Ebay is a great marketplace for items that need to be shipped. <br>
                                <span class="font-weight-bold">User Count: </span> 169+ Million Monthly
                                <br>
                                <span class="font-weight-bold">Founded: </span>1996</p>
                            </div>
                        </div>
                    </div>
                    <!-- Amazon -->
                    <div class="hot-spot" x="300" y="660">
                        <div class="circle"></div>
                        <div class="tooltip amazon">
                            <div class="text-row">
                                <h4>Amazon</h4>
                                <p>Amazon carries most categories and has an enormous customer base. Amazon focuses more on new items, however, they do carry few used items. Amazon is perfect for selling items nationwide. <br>
                                <span class="font-weight-bold">User Count: </span> 214+ Million Monthly
                                <br>
                                <span class="font-weight-bold">Founded: </span>1994</p>
                            </div>
                        </div>
                    </div>
                    <!-- Mercari -->
                    <div class="hot-spot" x="280" y="150">
                        <div class="circle"></div>
                        <div class="tooltip mecari">
                            <div class="text-row">
                                <h4>Mercari</h4>
                                <p>Mercari is a broad marketplace that covers many categories. It is a convenient platform because shipping labels and payments are integrated through their app. Through Mercari, sellers ship items nationally. <br>
                                <span class="font-weight-bold">User Count: </span class="font-weight-bold"> 17+ Million Monthly
                                <br>
                                <span>Founded: </span>2013</p>
                            </div>
                        </div>
                    </div>
                    <!-- Craigslist -->
                    <div class="hot-spot" x="800" y="400">
                        <div class="circle"></div>
                        <div class="tooltip">
                            <div class="text-row">
                                <h4>Craigslist</h4>
                                <p>Craigslist provides local classifieds and forums for jobs, housing, for sale, services, local community, and events. Craigslist accommodates many categories and is a broad marketplace. Through Craigslist, sellers perform local meetups. <br>
                                <span class="font-weight-bold">User Count: </span class="font-weight-bold"> 55+ Million Monthly
                                <br>
                                <span>Founded: </span>1995</p>
                            </div>
                        </div>
                    </div>
                    <!-- Nextdoor -->
                    <div class="hot-spot" x="700" y="150">
                        <div class="circle"></div>
                        <div class="tooltip nextdoor">
                            <div class="text-row">
                                <h4>Nextdoor</h4>
                                <p>Nextdoor is a platform focused on the surrounding community. Nextdoor has an announcement section and a marketplace section. Nextdoor offers a variety of categories and is a local platform meant for meetups and not shipping. <br>
                                <span class="font-weight-bold">User Count: </span class="font-weight-bold"> 27+ Million Monthly
                                <br>
                                <span>Founded: </span>2008</p>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>            
        </div>


        @if (isset($sections) and $sections->count() > 0)
            @foreach($sections as $section)
                @if (view()->exists($section->view))
                    @include($section->view, ['firstSection' => $loop->first])
                @endif
            @endforeach
        @endif

    </div>
@endsection

@section('after_scripts')
<script src="{{ url('assets/js/jquery.hotspot.js')}}" defer></script>
    <script>
        @if (config('settings.optimization.lazy_loading_activation') == 1)
        $(document).ready(function () {
            $('#postsList').each(function () {
                var $masonry = $(this);
                var update = function () {
                    $.fn.matchHeight._update();
                };
                $('.item-list', $masonry).matchHeight();
                this.addEventListener('load', update, true);
            });
        });
        @endif

    </script>
    <script>        
        $(document).ready(function () {
           if ($('#hotspotImg').length > 0) {
                    $('#hotspotImg').hotSpot({
                bindselector: 'hover'
              });
            }
        });        
    </script>
@endsection

            