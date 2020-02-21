<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('FL') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Cookforme') }}</a>
        </div>
        <ul class="nav custom-navcl">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#user_management">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="user_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Users') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'reviews') class="active " @endif>
                            <a href="{{ route('user-reviews')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Reviews') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#category_management">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >{{ __('Categories Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="category_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'category') class="active " @endif>
                            <a href="{{ route('category.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li>
                <a data-toggle="collapse" href="#ingredent_management">
                    <i class="tim-icons icon-tv-2"></i>
                    <span class="nav-link-text" >{{ __('Ingredent Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="ingredent_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'ingredent') class="active " @endif>
                            <a href="{{ route('ingredents.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Ingredents') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li>
                <a data-toggle="collapse" href="#menu_management">
                    <i class="tim-icons icon-tv-2"></i>
                    <span class="nav-link-text" >{{ __('Menu Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="menu_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'menus') class="active " @endif>
                            <a href="{{ route('menus.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Menus') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
           <!--  <li>
                <a data-toggle="collapse" href="#plan_management" >
                    <i class="tim-icons icon-molecule-40"></i>
                    <span class="nav-link-text" >{{ __('Plan Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="plan_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'plans') class="active " @endif>
                            <a href="{{ route('plans.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Plans') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>-->
            <li> 
                <a data-toggle="collapse" href="#nutrician_management" >
                    <i class="tim-icons icon-molecule-40"></i>
                    <span class="nav-link-text" >{{ __('Nutrition Facts Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="nutrician_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'nutrician') class="active " @endif>
                            <a href="{{ route('nutricians.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Nutrition Facts') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#order_management" >
                    <i class="tim-icons icon-gift-2"></i>
                    <span class="nav-link-text" >{{ __('Order Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="order_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'orders') class="active " @endif>
                            <a href="{{ route('orders.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Orders') }}</p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <div class="collapse" id="order_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'giftcard') class="active " @endif>
                            <a href="{{ route('giftcards.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Gift Cards') }}</p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#content_management" >
                    <i class="tim-icons icon-gift-2"></i>
                    <span class="nav-link-text" >{{ __('Content Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="content_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'contents') class="active " @endif>
                            <a href="{{ route('contents.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Contents') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'faqs') class="active " @endif>
                            <a href="{{ route('faqs.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __("Faq's") }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'experts') class="active " @endif>
                            <a href="{{ route('experts.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __("Eperts") }}</p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
              <li>
                <a data-toggle="collapse" href="#delivery_management" >
                    <i class="tim-icons icon-lock-circle"></i>
                    <span class="nav-link-text" >{{ __('Set Delivery Locations') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="delivery_management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'deliver') class="active " @endif>
                            <a href="{{ route('deliverylocation.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Delivery Locations') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'deliverydays') class="active " @endif>
                            <a href="{{ route('deliverydays.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Delivery Days Slots') }}</p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
             <li>
                <a data-toggle="collapse" href="#coupons" >
                    <i class="fa fa-cog fa-1x"></i>
                    <span class="nav-link-text" >{{ __('Coupon Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="coupons">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'addcoupon') class="active " @endif>
                            <a href="{{ route('addcoupon.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Coupons Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse" id="coupons">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'addcoupontouser') class="active " @endif>
                            <a href="{{ route('assign-coupon-to-user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Coupons Assigning') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#settings" >
                    <i class="fa fa-cog fa-1x"></i>
                    <span class="nav-link-text" >{{ __('Settings') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="settings">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'settings') class="active " @endif>
                            <a href="{{ route('settings.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('All Privates') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!--li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li-->
        </ul>
    </div>
</div>
