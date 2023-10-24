<div class="wpb_raw_code wpb_content_element wpb_raw_html home-booking">
                                <div class="wpb_wrapper">
                                    <section id="hbe-bws-wrapper-widget-code" ng-app="widgetApp" class="ng-scope">
                                        <div ng-controller="SearchWidgetCodeCtrl" class="ng-scope">
                                            <div ng-include="loadTemplate()" class="ng-scope">
                                                <div class="hbe-bws ng-scope">
                                                    <div id="search-widget-panel">
                                                        <form id="searchWidgetForm" name="searchWidgetForm" method="post" action="/reservation" target="_self" ng-init="setUrlSearchWidget('searchWidgetForm')" class="ng-pristine ng-valid"><!-- ngIf: is_mobile == 0 && load_completed -->
                                                            <div ng-if="is_mobile == 0 &amp;&amp; load_completed" ng-class="options.Layout==0?'clearfix swp-horizontal':'clearfix'" class="ng-scope clearfix">
                                                                <div class="bws-swp-col swp-col1">
                                                                    <div class="bws-ipt-calendar">
                                                                        <div id="check_in_show" ng-init="initSearchCalendar()" ng-mousedown="show_calendar('check_in_show')" class="show-date"><span class="picker-date ng-binding" ng-bind="data.checkin_show">25 Oct 2023</span>, <span class="picker-weekday ng-binding" ng-bind="data.checkin_show_weekday">Wednesday</span></div><input type="hidden" id="check_in" name="check_in" value="25 Oct 2023"> <input type="hidden" id="check_in_gregorian" value=""> <input type="hidden" readonly="readonly" id="check_date_min"> <span class="bws-icon-calendar bws-gray-color"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="bws-swp-col swp-col2">
                                                                    <div class="bws-ipt-calendar">
                                                                        <div id="check_out_show" ng-mousedown="show_calendar('check_out_show')" class="show-date"><span class="picker-date ng-binding" ng-bind="data.checkout_show">26 Oct 2023</span>, <span class="picker-weekday ng-binding" ng-bind="data.checkout_show_weekday">Thursday</span></div><input type="hidden" id="check_out" name="check_out" value="26 Oct 2023"> <input type="hidden" id="check_out_gregorian" value=""> <span class="bws-icon-calendar bws-gray-color"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="bws-swp-col swp-col3">
                                                                    <div class="contain-box">
                                                                        <div class="btn-box"><a class="bws-button" ng-click="submitSearchWidget()" id="bws-button-search" style="cursor: pointer"><span class="ng-binding">Book Now</span></a></div><!-- ngIf: options.ShowBestRate -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <link type="text/css" rel="stylesheet" href="//book.securebookings.net/css/search-wdg.css">
                                    <script type="text/javascript" src="//book.securebookings.net/js/widget.search.js"></script>
                                    <script type="text/javascript" src="//book.securebookings.net/searchWidgetCustomize?lang=en&amp;id=ce952715-a608-1636943552-45f2-bdfc-5c5cc1f3b3f7&amp;ajax=true"></script>
                                </div>
                            </div>