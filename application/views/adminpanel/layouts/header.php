 <header id="m_header" class="m-grid__item m-header" m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200" >
      <div class="m-container m-container--fluid m-container--full-height">
         <div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">

            <div class="m-stack__item m-brand m-brand--mobile">
               <div class="m-stack m-stack--ver m-stack--general">
                  <div class="m-stack__item m-stack__item--middle m-brand__logo">
                     <a href="javascript:;" class="m-brand__logo-wrapper">
                     <img alt="" src="<?=URL?>public/assets/demo/demo9/media/img/logo/logo.png"/>
                     </a>
                  </div>
                  <div class="m-stack__item m-stack__item--middle m-brand__tools">
                     <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                     <a href="javascript:;" id="m_aside_left_toggle_mobile" class="m-brand__icon m-brand__toggler m-brand__toggler--left">
                     <span></span>
                     </a>
                     <!-- END -->
                     <!-- BEGIN: Responsive Header Menu Toggler -->
                     <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler">
                     <span></span>
                     </a>
                     <!-- END -->
                     <!-- BEGIN: Topbar Toggler -->
                     <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon">
                     <i class="flaticon-more"></i>
                     </a>
                     <!-- BEGIN: Topbar Toggler -->
                  </div>
               </div>
            </div>

            <div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
               <div class="m-stack m-stack--ver m-stack--desktop">
                  <div class="m-stack__item m-stack__item--middle m-stack__item--fit">
                     <a href="javascript:;" id="m_aside_left_toggle" class="m-aside-left-toggler m-aside-left-toggler--left m_aside_left_toggler">
                     <span></span>
                     </a>
                  </div>
                  <div class="m-stack__item m-stack__item--fluid">
<!-- BEGIN: Top Middle Menu -->
                     <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                     <i class="la la-close"></i>
                     </button>
<!-- END: Top Middle Menu -->
                  </div>
               </div>
            </div>

            <div class="m-stack__item m-stack__item--middle m-stack__item--center">
               <!-- BEGIN: Brand -->
               <a href="{{ url('dashboard') }}" class="m-brand m-brand--desktop">
               <img alt="" src="<?=URL?>public/assets/demo/demo9/media/img/logo/logo.png"/>
               </a>
               <!-- END: Brand -->
            </div>
            <div class="m-stack__item m-stack__item--right">
<!-- BEGIN: Top Right Menu -->
               <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                  <div class="m-stack__item m-topbar__nav-wrapper">
                     <ul class="m-topbar__nav m-nav m-nav--inline">
                          <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                           <a href="#" class="m-nav__link m-dropdown__toggle">
                           <span class="m-topbar__username m--hidden-mobile">
                            <?=(isset($_SESSION["full_name"]))?$_SESSION["full_name"]:"";?>
                           </span>
                           <span class="m-topbar__userpic">
                           <img src="<?=URL?>public/assets/app/media/img/users/default.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                           </span>
                           <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                           <span class="m-nav__link-icon-wrapper">
                           <i class="flaticon-user-ok"></i>
                           </span>
                           </span>
                           </a>
                           <div class="m-dropdown__wrapper">
                              <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                              <div class="m-dropdown__inner">
                                 <div class="m-dropdown__header m--align-center">
                                    <div class="m-card-user m-card-user--skin-light">
                                       <div class="m-card-user__pic">
                                          <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                       </div>
                                       <div class="m-card-user__details">
                                          <span class="m-card-user__name m--font-weight-500">
                                           <?=(isset($_SESSION["full_name"]))?$_SESSION["full_name"]:"";?>
                                          </span>
                                          <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                           <?=(isset($_SESSION["user_name"]))?$_SESSION["user_name"]:"";?>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                       <ul class="m-nav m-nav--skin-light">
                                          <li class="m-nav__section m--hide">
                                             <span class="m-nav__section-text">
                                             Section
                                             </span>
                                          </li>
                                          <!--<li class="m-nav__item">
                                            <a href="companyprofile" class="m-nav__link">
                                              <i class="m-nav__link-icon flaticon-profile-1"></i>
                                              <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                  <span class="m-nav__link-text">
                                                    Profile
                                                  </span>
                                                  <span class="m-nav__link-badge">
                                                    <span class="m-badge m-badge--success">
                                                      2
                                                    </span>
                                                  </span>
                                                </span>
                                              </span>
                                            </a>
                                          </li>-->
                                          <li class="m-nav__separator m-nav__separator--fit"></li>
                                          <li class="m-nav__item">
                                             <a href="<?=URL?>admin_index/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                             Logout
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>

                     </ul>
                  </div>
               </div>
<!-- END: Top Right Menu -->
            </div>
         </div>
      </div>
</header>
