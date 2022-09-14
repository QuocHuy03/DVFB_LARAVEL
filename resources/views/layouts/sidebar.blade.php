@inject('site_config', 'App\Models\site_config')
<div class="wrapper">
    <div class="wrapper-box">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <ul id="menu">
                <li>
                    <a href="javascript:;.html" class="side-menu">
                        <div class="side-menu__icon">
                            {{-- <i data-feather="home"></i> --}}
                            <lord-icon src="https://cdn.lordicon.com/gmzxduhd.json" trigger="loop"
                                colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                            </lord-icon>
                        </div>
                        <div class="side-menu__title">
                            Home
                            <div class="side-menu__sub-icon transform rotate-180">
                                <i data-feather="chevron-down"></i>

                            </div>
                        </div>
                    </a>
                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="{{ route('home') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title"> Trang Chủ</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            {{-- <i data-feather="users"></i> --}}
                            <lord-icon src="https://cdn.lordicon.com/nobciafz.json" trigger="loop"
                                colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                            </lord-icon>
                        </div>
                        <div class="side-menu__title">
                            Profile
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>

                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="{{ route('profile') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title"> Hồ Sơ</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            {{-- <i data-feather="credit-card"></i> --}}
                            <lord-icon src="https://cdn.lordicon.com/yeallgsa.json" trigger="loop"
                                colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                            </lord-icon>
                        </div>
                        <div class="side-menu__title">
                            Payment
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>

                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="{{ route('banking') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title"> Nạp Tiền</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="side-nav__devider my-6"></li>
                {{-- dịch vụ fb huycode --}}
                @if ($site_config->getValueByName('subgiare') == 'show')
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon">
                                <img src="{{ asset('huycode/images/client/facebook.png') }}" alt="facebook"
                                    width="30px" height="30px">
                            </div>
                            <div class="side-menu__title">
                                Facebook
                                <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose">
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Like Facebook
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'like-sale') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title"> Like Sale</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'like-speed') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title"> Like Speed</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'like-comment') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title"> Like Comment</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Follow Facebook
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'sub-vip') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Follow Vip</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'sub-quality') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Follow Quality</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'sub-sale') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Follow Sale</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'sub-speed') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Follow Speed</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Eyes Facebook
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'eye-live') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Eyes Live</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Comment Facebook
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'comment-sale') }}"
                                            class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Comment Sale</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'comment-speed') }}"
                                            class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Comment Speed</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Share Facebook
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'share-profile') }}"
                                            class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title"> Share Profile</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        View Video & Story
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'view-video') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">View Video</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'view-story') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">View Story</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Member Group
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.facebook-v2', 'member-group') }}"
                                            class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Member Group</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- dịch vụ ig huycode --}}
                @if ($site_config->getValueByName('subgiare') == 'show')
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon">
                                <img src="{{ asset('huycode/images/client/instagram.png') }}" alt="instagram"
                                    width="30px" height="30px">
                            </div>
                            <div class="side-menu__title">
                                Instagram
                                <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose">
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Like Instagram
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.instagram-v2', 'like-post') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Like</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Follow Instagram
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.instagram-v2', 'follow') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Follow</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- dịch vụ tiktok huycode --}}
                @if ($site_config->getValueByName('subgiare') == 'show')
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon">
                                <img src="{{ asset('huycode/images/client/tiktok.png') }}" alt="tiktok"
                                    width="30px" height="30px">
                            </div>
                            <div class="side-menu__title">
                                TikTok
                                <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose">
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Like Tiktok
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.tiktok-v2', 'like') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Tym</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Follow Tiktok
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.tiktok-v2', 'sub') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Follow</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Comment Tiktok
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.tiktok-v2', 'comment') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Comment</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        View Tiktok
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.tiktok-v2', 'view') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng View</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Share Tiktok
                                        <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('service.tiktok-v2', 'share') }}" class="side-menu">
                                            <div class="side-menu__icon">
                                                <i data-feather="zap"></i>
                                            </div>
                                            <div class="side-menu__title">Tăng Share</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- dịch vụ youtube huycode --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <img src="{{ asset('huycode/images/client/youtube.png') }}" alt="youtube"
                                width="30px" height="30px">
                        </div>
                        <div class="side-menu__title">
                            Youtube
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>
                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Watch Youtube
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Watch V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Follow Youtube
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Follow V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Comment Youtube
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Comment V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    View Youtube
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">View V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Like Youtube
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Like V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- dịch vụ Twitter huycode --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <img src="{{ asset('huycode/images/client/twitter.png') }}" alt="twitter"
                                width="30px" height="30px">
                        </div>
                        <div class="side-menu__title">
                            Twitter
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>
                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Follow Twitter
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Follow V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    View Twitter
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">View V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Like Twitter
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Like V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- dịch vụ Shopee huycode --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <img src="{{ asset('huycode/images/client/shopee.png') }}" alt="shopee" width="30px"
                                height="30px">
                        </div>
                        <div class="side-menu__title">
                            Shopee
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>
                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Follow Shopee
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Follow V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Like Shopee
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Like V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- dịch vụ Telegram huycode --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <img src="{{ asset('huycode/images/client/telegram.png') }}" alt="telegram"
                                width="30px" height="30px">
                        </div>
                        <div class="side-menu__title">
                            Telegram
                            <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                        </div>
                    </a>
                    <ul class="" id="side-menu__choose">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Member Telegram
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">Member V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    View Telegram
                                    <div class="side-menu__sub-icon "><i data-feather="chevron-down"></i></div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">View V1</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- Kết nối api --}}
                {{-- <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <img src="{{ asset('huycode/images/client/code.png') }}" alt="instagram" width="30px"
                                height="30px">
                        </div>
                        <div class="side-menu__title">
                            Kết Nối API
                        </div>
                    </a>
                </li> --}}
                {{-- admin lê quóc huy --}}
                @if (Auth::user()->level == 'admin')
                    <li class="slide">
                        <a href="{{ route('admin.index') }}" class="side-menu">
                            <div class="side-menu__icon">
                                <img src="{{ asset('huycode/images/client/user (1).png') }}" alt="admin"
                                    width="30px" height="30px">
                            </div>
                            <div class="side-menu__title">
                                Trang quản trị
                            </div>
                        </a>
                    </li>
                @endif
                {{-- end Bản Quyền Huycode !! --}}
            </ul>
        </nav>

        <!-- END: Side Menu -->
