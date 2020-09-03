
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			{{config('app.name', 'PERMATABELAJAR')}} | {{$page->title ?? ''}}
		</title>
		<meta name="description" content="demo project">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="{!! asset('public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{!! asset('public/assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('public/assets/demo/default/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
		<style type="text/css">
			/*menu primary*/
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			    font-weight: bold;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-icon, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-icon {
			    color: #fbfbfb;
			    font-weight: bold;
			}
			/*menu dropdone aside*/
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__link .m-menu__link-text {
			    color: #b3b3b3;
			    font-weight: bold;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__heading .m-menu__link-icon, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__link .m-menu__link-icon {
			    color: #ffffff;
			    font-weight: bold;
			}
			/*menu under dropdone aside*/
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			    font-weight: bold;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-bullet.m-menu__link-bullet--dot>span, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-bullet.m-menu__link-bullet--dot>span {
			    background-color: #fff;
			}
		</style>
	</head>
	<!-- end::Head -->
    <!-- end::Body -->    
	<body  @if(Request::route()->getName() == "Plan.index") class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize" @else class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" @endif>
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			@include('include.header')
			<!-- END: Header -->		
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					@include('include.aside')
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-subheader ">
					    <!-- BEGIN: Subheader -->
						<div class="d-flex align-items-center">
	                        <div class="mr-auto">
	                            <h3 class="m-subheader__title m-subheader__title--separator">
	                                {{$page->title ?? ''}}
	                            </h3>
	                            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
	                                <li class="m-nav__item m-nav__item--home">
	                                    <a href="{{ url('/') }}" class="m-nav__link m-nav__link--icon">
	                                        <i class="m-nav__link-icon la la-home"></i>
	                                    </a>
	                                </li>
	                                @isset ($page->breadcrumbs)
	                                    @foreach ($page->breadcrumbs as $element)
	                                        <li class="m-nav__separator">
	                                            -
	                                        </li>
	                                        <li class="m-nav__item">
	                                            <a href="{{$element['url']}}" class="m-nav__link">
	                                                <span class="m-nav__link-text">
	                                                    {{$element['title']}}
	                                                </span>
	                                            </a>
	                                        </li>
	                                    @endforeach
	                                @endisset
	                            </ul>
	                        </div>
	                    </div>
						<!-- END: Subheader -->
					</div>					
					<div class="m-content">
						@yield('content')
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2020 &copy; 
								<a href="" class="m-link">	
									Permata Belajar								
								</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">								
								<li class="m-nav__item m-nav__item">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    	<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
    	<!--begin::Base Scripts -->
		<script src="{!!  asset('public/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
		<script src="{!!  asset('public/assets/demo/default/base/scripts.bundle.js') !!}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="{!!  asset('public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') !!}" type="text/javascript"></script>
		<!--end::Page Vendors --> 
		@yield('script') 
	</body>
	<!-- end::Body -->
</html>
