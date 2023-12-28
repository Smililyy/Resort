<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <link rel="stylesheet" href="../../assets/css/checkout.css" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Checkout</title>
</head>

<body>
    <div class="layout-container">
        <section id="hbe-bws-page">
            <section id="bws-page-logo">
                <a class="small-only-hide" id="banner_widget" href="https://saigonhotel.com.vn" style="cursor: pointer;" bis_size="{&quot;x&quot;:168,&quot;y&quot;:0,&quot;w&quot;:1200,&quot;h&quot;:200,&quot;abs_x&quot;:168,&quot;abs_y&quot;:0}"><img src="https://s3-cdn.hotellinksolutions.com./data/ce952715-a608-1636943552-45f2-bdfc-5c5cc1f3b3f7/booking_widget/sm_1200x200_1637829525.png" style="width: 100%;" bis_size="{&quot;x&quot;:168,&quot;y&quot;:0,&quot;w&quot;:1200,&quot;h&quot;:200,&quot;abs_x&quot;:168,&quot;abs_y&quot;:0}" bis_id="bn_oz8yjl54hbq2x782wx4k4o"> </a>
            </section>
            <section id="bws-page-body">
                <div ng-app="checkoutApp" class="ng-scope">
                    <div ng-controller="CheckoutCtrl" class="ng-scope">
                        <!-- ngInclude: loadTemplate() -->
                        <div ng-include="loadTemplate()" onload="template_loaded()" class="ng-scope"><!-- ngIf: form.errors.id --><!-- ngIf: form.errors.exception --><!-- ngIf: form.errors.csrf -->
                            <div ng-show="form.data.room_sold_out" class="ng-scope ng-binding ng-hide"></div>
                            <form id="checkout" name="checkout" action="" class="checkout-form-custom ng-scope ng-pristine ng-invalid ng-invalid-required" novalidate="" method="post" ng-show="!form.data.room_sold_out">
                                <input type="hidden" name="id" value="ce952715-a608-1636943552-45f2-bdfc-5c5cc1f3b3f7">
                                <input type="hidden" name="csrf" value="">
                                <input type="hidden" name="call_by_ajax" id="call_by_ajax" value="0">
                                <input type="hidden" name="key_session_id" value="3c4f26ea-0627-1703510060-4b79-803d-4caa07939bbf">
                                <section id="bws-page-body-content">
                                    <div class="loading-mask" style="display: none"></div>
                                    <div id="tab_loading_rate" ng-init="setWidthLoading()" style="display: none; margin-top: -16px; opacity: 0.4; position: fixed; text-align: center; top: 50%; z-index: 9999; width: 1200px;"><img src="https://book.securebookings.net/checkout/../img/img_loading.gif"></div>
                                    <h3 class="bws-page-title ng-binding">
                                        Saigon Hotel
                                    </h3>
                                    <div class="bws-panel" ng-init="registryTooltip();"><label class="marb6 ng-binding"><b class="ng-binding">Check-in:</b> Tuesday, December 26, 2023 from 14:00</label><label class="ng-binding"><b class="ng-binding">Check-out:</b> Wednesday, December 27, 2023 until 12:00</label><label class="mart8 marb0"><a class="bws-font11 ng-binding" ng-click="backToRooomPage()">(Travelling on different dates?)</a></label></div>
                                    <h5 class="bws-page-subtitle"><b class="ng-binding">Accommodation Booking</b></h5>
                                    <div class="room-booking-wrapper marb20"><!-- ngRepeat: room in form.data.list_rooms -->
                                        <div class="room-booking-item bws-row ng-scope" ng-repeat="room in form.data.list_rooms" ng-init="setCssCustome();">
                                            <div class="bws-row">
                                                <div class="bws-column bws-large-10 bws-medium-10 bws-small-12"><span class="ckb-rooms-name"><b class="ng-binding">Superior Room</b></span>
                                                    <div class="bws-row ckb-rooms-content">
                                                        <div class="left-content bws-column bws-large-6 bws-medium-6 bws-small-12">
                                                            <div class="clearfix marb15">
                                                                <ul class="room-name-desc">
                                                                    <li ng-class="room.cancel_shortcut[0]" class="ng-binding">Flexible cancellation</li>
                                                                    <li ng-show="room.meals" class="ng-binding">Breakfast included</li><!-- ngRepeat: special in room.special_offer_title -->
                                                                    <li class="bws-green-color ng-binding ng-hide" ng-show="room.inclusions_title"> <span ng-show="room.inclusions_desc" class="bws-icon-stars bws-green-icon-color has-tip ng-hide" ng-attr-title="{{room.inclusions_desc}}" title=""></span></li>
                                                                </ul>
                                                            </div><label class="marb0 ng-binding"><b class="ng-binding">Details:</b> 1 room, 1 night, 2 adults included in price</label>
                                                        </div>
                                                        <div class="middle-content bws-column bws-large-2 bws-medium-6 bws-small-12 sm-mrgt-10">
                                                            <div><!-- ngIf: room.arr_details.num_room==1 --><label ng-if="room.arr_details.num_room==1" class="ng-scope ng-binding">Number of units</label><!-- end ngIf: room.arr_details.num_room==1 --><!-- ngIf: room.arr_details.num_room>1 -->
                                                                <div class="bws-row">
                                                                    <div class="bws-column text-field-wrapper"><select id="changeRoom_91004e98-e319-1703510061334-4d7d-8dd2-a796500238f0" ng-disabled="room.arr_details.num_room==1" ng-model="room.arr_details.num_room" ng-change="changeNumberRoom(room)" class="ng-pristine ng-valid" disabled="disabled"><!-- ngRepeat: (key, val) in room.room_list_num -->
                                                                            <option ng-repeat="(key, val) in room.room_list_num" ng-selected="key+1==room.arr_details.num_room" value="1" class="ng-scope ng-binding" selected="selected">1 room</option><!-- end ngRepeat: (key, val) in room.room_list_num -->
                                                                        </select></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right-content bws-column bws-large-4 bws-medium-6 bws-small-12 sm-mrgt-10"><!-- ngRepeat: indexRoom in getNumber(room.arr_details.num_room,1) --><!-- ngIf: room.arr_details.person>1 -->
                                                            <div ng-if="room.arr_details.person>1" ng-repeat="indexRoom in getNumber(room.arr_details.num_room,1)" class="ng-scope"><!-- ngIf: room.arr_details.num_room==1 --><label ng-if="room.arr_details.num_room==1" class="ng-scope ng-binding">Number of guests <span ng-show="form.data.tooltipGuestsDetails!='' &amp;&amp; room.arr_details.person_child!=1000" class="bws-icon-info bws-gray-color has-tip" data-options="disable_for_touch:true" ng-attr-title="{{form.data.tooltipGuestsDetails}}" data-hasqtip="21" oldtitle="Child age 2 - 11. Guests 0 - 1 years old stay for free if using existing bedding." title=""></span></label><!-- end ngIf: room.arr_details.num_room==1 --><!-- ngIf: room.arr_details.num_room>1 -->
                                                                <div class="bws-row num-guest">
                                                                    <div class="left-item bws-column bws-large-6 bws-medium-4 bws-small-5" style="width: 48% !important"><select ng-model="room.number_guest_details_selected[$index]" ng-options="guestType.id as guestType.name for guestType in room.number_guest_details" ng-change="changeNumberGuestDetails(room)" class="ng-pristine ng-valid">
                                                                            <option value="0" selected="selected">2 adults</option>
                                                                            <option value="1">1 adult, 1 child</option>
                                                                            <option value="2">1 adult</option>
                                                                        </select><input type="hidden" name="numberGuestDetails[311a1128-3105-1636962287-4fd3-b809-f92836f0debf][]" ng-value="room.number_guest_details_selected[$index]" value="2-0"></div><!-- ngIf: room.extra_details_selected[$index]['extra_adult']+room.extra_details_selected[$index]['extra_child']>0 --><!-- ngIf: room.extra_details_selected[$index]['extra_adult']+room.extra_details_selected[$index]['extra_child']>0 -->
                                                                </div>
                                                            </div><!-- end ngIf: room.arr_details.person>1 --><!-- end ngRepeat: indexRoom in getNumber(room.arr_details.num_room,1) -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bws-column bws-large-2 bws-medium-2 bws-small-12 large-only-text-right medium-only-text-right ckb-rooms-price text-right">
                                                    <div class="marb15 small-only-hide">
                                                        <div class="bws-font15" data-options="disable_for_touch:true"><b class="has-tip font-w-700 ng-binding" ng-attr-title="{{room.price_preview}}" data-hasqtip="22" oldtitle="Prices include 8% VAT  and  5% Service charge.<br/><b>Base rate</b>: ₫ 1.450.000" title="">₫ 1.450.000</b></div>
                                                        <div class="bws-gray-color ng-binding ng-hide" style="margin-top: 7px" ng-show="form.data.currency_hotel!=form.data.currency">₫ 1.450.000</div>
                                                    </div>
                                                    <div class="marb15 small-only-show" style="overflow: auto">
                                                        <div class="bws-font16 marr10 left" data-options="disable_for_touch:true"><b class="has-tip ng-binding" ng-attr-title="{{room.price_preview}}" data-hasqtip="23" oldtitle="Prices include 8% VAT  and  5% Service charge.<br/><b>Base rate</b>: ₫ 1.450.000" title="">₫ 1.450.000</b></div>
                                                        <div class="bws-gray-color left mart4 ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 1.450.000</div>
                                                    </div><label class="ckb-policies marb6 ng-binding">Booking Policies <span class="bws-icon-info bws-gray-color has-tip" data-options="disable_for_touch:true" ng-attr-title="{{room.policies}}" data-hasqtip="24" oldtitle="<p><b> Cancellation:  </b> If cancelled, modified or in case of no-show, the first night   will be charged.</p><p><b>Payment:  </b> First night deposit will be charged. Balance due on arrival.</p><p><b>Meal included:</b> Breakfast included</p><p><b>Check-in:</b> 14:00</p><p><b>Check-out:</b> 12:00</p><p></p>" title=""></span></label>
                                                    <div class="bws-remove-room"><!-- ngIf: form.data.list_rooms.length > 1 --></div>
                                                </div>
                                            </div>
                                        </div><!-- end ngRepeat: room in form.data.list_rooms -->
                                    </div>
                                    <h5 ng-init="is_view_all_extra = true; " ng-show="form.data.count_service_extra>0" class="bws-page-subtitle marb15"><b class="ng-binding">Extras Booking</b> <span ng-show="!is_view_all_extra" ng-click="is_view_all_extra = true;" class="view-hide-extra ng-binding ng-hide">View<span class="bws-icon-angle-double-down"></span></span> <span ng-show="is_view_all_extra" ng-click="is_view_all_extra = false;" class="view-hide-extra ng-binding">Hide<span class="bws-icon-angle-double-up"></span></span></h5>
                                    <div ng-show="form.data.count_service_extra>0 &amp;&amp; is_view_all_extra" class="marb20 extra-booking-wrapper"><!-- ngRepeat: extra in form.data.list_extra -->
                                        <div class="extra-booking-item bws-row ng-scope" ng-repeat="extra in form.data.list_extra" ng-init="setCssCustome();dropdown_extra = form.data.dropdown_extra[extra.Eid];extra.is_show_detail = 0;">
                                            <div class="bws-row row-booking-extra">
                                                <div class="bws-column bws-large-12">
                                                    <div class="bws-row">
                                                        <div class="bws-column bws-large-8 bws-medium-8 bws-small-8">
                                                            <div class="marb20"><span class="bws-font15"><b class="font-w-700 ng-binding">AIRPORT DROP OFF 16-SEAT CAR</b></span></div>
                                                        </div>
                                                        <div class="bws-column bws-large-4 bws-medium-4 bws-small-4 large-only-text-right medium-only-text-right text-right">
                                                            <div class="marb15 small-only-hide"><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --> <span class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></span></div>
                                                            <div class="marb15 small-only-show">
                                                                <div class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></div><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="ckb-no-items small-only-hide items-extra-for-post ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                    <div class="small-only-right small-only-text-center"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[6285ebce-c7bf-1637907354-44d4-bd77-7d5b46ab9e7d][]" id="cbo_6285ebce-c7bf-1637907354-44d4-bd77-7d5b46ab9e7d" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                            <option value="0" selected="selected">0 items</option>
                                                            <option value="1">1 items</option>
                                                        </select></div>
                                                </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="bws-column bws-small-12 small-only-show bws-select-extra items-extra-for-post"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-row ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                        <div class="bws-column bws-small-6 mb-ckb-no-items"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[6285ebce-c7bf-1637907354-44d4-bd77-7d5b46ab9e7d][]" id="cbo_6285ebce-c7bf-1637907354-44d4-bd77-7d5b46ab9e7d" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                                <option value="0" selected="selected">0 items</option>
                                                                <option value="1">1 items</option>
                                                            </select></div>
                                                        <div class="bws-column bws-small-6 text-right"><span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></div>
                                                    </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                </div>

                                                <div class="small-only-hide"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label class="per-lbl inline"><span class="bws-font15 marr10 span50 left"><b class="font-w-700 ng-binding">₫ 1.550.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --> <span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end hide ng-hide" style="margin-top: 10px" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 16-SEAT CAR</p>
                                                    </div>
                                                </div><!-- ngIf: extra.images.length>0 -->
                                                <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                    <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 16-SEAT CAR</p>
                                                </div>
                                                <div class="hide extra-mobile" id="iconMobileDetail_6285ebce-c7bf-1637907354-44d4-bd77-7d5b46ab9e7d"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label><span class="bws-font14 marr10 left"><b class="ng-binding">₫ 1.550.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <div ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 16-SEAT CAR</div>
                                                    </div><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 16-SEAT CAR</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end ngRepeat: extra in form.data.list_extra -->
                                        <div class="extra-booking-item bws-row ng-scope" ng-repeat="extra in form.data.list_extra" ng-init="setCssCustome();dropdown_extra = form.data.dropdown_extra[extra.Eid];extra.is_show_detail = 0;">
                                            <div class="bws-row row-booking-extra">
                                                <div class="bws-column bws-large-12">
                                                    <div class="bws-row">
                                                        <div class="bws-column bws-large-8 bws-medium-8 bws-small-8">
                                                            <div class="marb20"><span class="bws-font15"><b class="font-w-700 ng-binding">AIRPORT PICK UP SERVICE - 07-SEAT CAR</b></span></div>
                                                        </div>
                                                        <div class="bws-column bws-large-4 bws-medium-4 bws-small-4 large-only-text-right medium-only-text-right text-right">
                                                            <div class="marb15 small-only-hide"><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --> <span class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></span></div>
                                                            <div class="marb15 small-only-show">
                                                                <div class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></div><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="ckb-no-items small-only-hide items-extra-for-post ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                    <div class="small-only-right small-only-text-center"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[9f1a93a5-bab8-1637907174-43b6-90c6-7b875452162b][]" id="cbo_9f1a93a5-bab8-1637907174-43b6-90c6-7b875452162b" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                            <option value="0" selected="selected">0 items</option>
                                                            <option value="1">1 items</option>
                                                        </select></div>
                                                </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="bws-column bws-small-12 small-only-show bws-select-extra items-extra-for-post"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-row ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                        <div class="bws-column bws-small-6 mb-ckb-no-items"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[9f1a93a5-bab8-1637907174-43b6-90c6-7b875452162b][]" id="cbo_9f1a93a5-bab8-1637907174-43b6-90c6-7b875452162b" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                                <option value="0" selected="selected">0 items</option>
                                                                <option value="1">1 items</option>
                                                            </select></div>
                                                        <div class="bws-column bws-small-6 text-right"><span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></div>
                                                    </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                </div>
                                                <div class="small-only-hide"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label class="per-lbl inline"><span class="bws-font15 marr10 span50 left"><b class="font-w-700 ng-binding">₫ 850.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --> <span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end hide ng-hide" style="margin-top: 10px" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 7-seat car</p>
                                                    </div>
                                                </div><!-- ngIf: extra.images.length>0 -->
                                                <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                    <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 7-seat car</p>
                                                </div>
                                                <div class="hide extra-mobile" id="iconMobileDetail_9f1a93a5-bab8-1637907174-43b6-90c6-7b875452162b"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label><span class="bws-font14 marr10 left"><b class="ng-binding">₫ 850.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <div ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 7-seat car</div>
                                                    </div><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 7-seat car</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end ngRepeat: extra in form.data.list_extra -->
                                        <div class="extra-booking-item bws-row ng-scope" ng-repeat="extra in form.data.list_extra" ng-init="setCssCustome();dropdown_extra = form.data.dropdown_extra[extra.Eid];extra.is_show_detail = 0;">
                                            <div class="bws-row row-booking-extra">
                                                <div class="bws-column bws-large-12">
                                                    <div class="bws-row">
                                                        <div class="bws-column bws-large-8 bws-medium-8 bws-small-8">
                                                            <div class="marb20"><span class="bws-font15"><b class="font-w-700 ng-binding">AIRPORT PICK UP - 16-SEAT CAR</b></span></div>
                                                        </div>
                                                        <div class="bws-column bws-large-4 bws-medium-4 bws-small-4 large-only-text-right medium-only-text-right text-right">
                                                            <div class="marb15 small-only-hide"><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --> <span class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></span></div>
                                                            <div class="marb15 small-only-show">
                                                                <div class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></div><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="ckb-no-items small-only-hide items-extra-for-post ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                    <div class="small-only-right small-only-text-center"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[55ba6802-1e25-1637907256-4f68-97e4-93ce192c4a93][]" id="cbo_55ba6802-1e25-1637907256-4f68-97e4-93ce192c4a93" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                            <option value="0" selected="selected">0 items</option>
                                                            <option value="1">1 items</option>
                                                        </select></div>
                                                </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="bws-column bws-small-12 small-only-show bws-select-extra items-extra-for-post"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-row ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                        <div class="bws-column bws-small-6 mb-ckb-no-items"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[55ba6802-1e25-1637907256-4f68-97e4-93ce192c4a93][]" id="cbo_55ba6802-1e25-1637907256-4f68-97e4-93ce192c4a93" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                                <option value="0" selected="selected">0 items</option>
                                                                <option value="1">1 items</option>
                                                            </select></div>
                                                        <div class="bws-column bws-small-6 text-right"><span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></div>
                                                    </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                </div>

                                                <div class="small-only-hide"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label class="per-lbl inline"><span class="bws-font15 marr10 span50 left"><b class="font-w-700 ng-binding">₫ 1.600.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --> <span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end hide ng-hide" style="margin-top: 10px" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 16-seat car</p>
                                                    </div>
                                                </div><!-- ngIf: extra.images.length>0 -->
                                                <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                    <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 16-seat car</p>
                                                </div>
                                                <div class="hide extra-mobile" id="iconMobileDetail_55ba6802-1e25-1637907256-4f68-97e4-93ce192c4a93"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label><span class="bws-font14 marr10 left"><b class="ng-binding">₫ 1.600.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <div ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 16-seat car</div>
                                                    </div><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">By 16-seat car</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end ngRepeat: extra in form.data.list_extra -->
                                        <div class="extra-booking-item bws-row ng-scope" ng-repeat="extra in form.data.list_extra" ng-init="setCssCustome();dropdown_extra = form.data.dropdown_extra[extra.Eid];extra.is_show_detail = 0;">
                                            <div class="bws-row row-booking-extra">
                                                <div class="bws-column bws-large-12">
                                                    <div class="bws-row">
                                                        <div class="bws-column bws-large-8 bws-medium-8 bws-small-8">
                                                            <div class="marb20"><span class="bws-font15"><b class="font-w-700 ng-binding">AIRPORT DROP OFF 07-SEAT CAR</b></span></div>
                                                        </div>
                                                        <div class="bws-column bws-large-4 bws-medium-4 bws-small-4 large-only-text-right medium-only-text-right text-right">
                                                            <div class="marb15 small-only-hide"><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --> <span class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></span></div>
                                                            <div class="marb15 small-only-show">
                                                                <div class="bws-font15 has-tip" data-options="disable_for_touch:true" ng-attr-title="{{extra.tooltip}}" title=""><!-- ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><b class="font-w-700 ng-scope" ng-if="!(extra.num_extra>0 || extra.num_extra_child>0)">--</b><!-- end ngIf: !(extra.num_extra>0 || extra.num_extra_child>0) --><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 --></div><!-- ngIf: extra.num_extra>0 || extra.num_extra_child>0 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="ckb-no-items small-only-hide items-extra-for-post ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                    <div class="small-only-right small-only-text-center"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[cb6aafa5-0560-1637907418-4d22-b562-f74b6f07eedb][]" id="cbo_cb6aafa5-0560-1637907418-4d22-b562-f74b6f07eedb" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                            <option value="0" selected="selected">0 items</option>
                                                            <option value="1">1 items</option>
                                                        </select></div>
                                                </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                <div class="bws-column bws-small-12 small-only-show bws-select-extra items-extra-for-post"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-row ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night">
                                                        <div class="bws-column bws-small-6 mb-ckb-no-items"><select ng-options="item.id as item.name for item in dropdown_extra" ng-change="loadDataNewTemplate(extra,0)" name="cbo_extra[cb6aafa5-0560-1637907418-4d22-b562-f74b6f07eedb][]" id="cbo_cb6aafa5-0560-1637907418-4d22-b562-f74b6f07eedb" ng-model="extra.num_extra" class="ng-pristine ng-valid">
                                                                <option value="0" selected="selected">0 items</option>
                                                                <option value="1">1 items</option>
                                                            </select></div>
                                                        <div class="bws-column bws-small-6 text-right"><span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></div>
                                                    </div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                </div>

                                                <div class="small-only-hide"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label class="per-lbl inline"><span class="bws-font15 marr10 span50 left"><b class="font-w-700 ng-binding">₫ 700.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --> <span class="bws-bk-img-list-title bws-lowercase ng-binding" ng-click="show_more_detail_extra(extra)">More details<span ng-class="extra.is_show_detail == 0?'bws-icon-angle-down':'bws-icon-angle-up'" class="bws-icon-angle-down"></span></span></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end hide ng-hide" style="margin-top: 10px" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 07-SEAT CAR</p>
                                                    </div>
                                                </div><!-- ngIf: extra.images.length>0 -->
                                                <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                    <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 07-SEAT CAR</p>
                                                </div>
                                                <div class="hide extra-mobile" id="iconMobileDetail_cb6aafa5-0560-1637907418-4d22-b562-f74b6f07eedb"><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_booking || extra.Type==form.data.list_type_bk_extra.per_night --><!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night -->
                                                    <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 left ckb-guest-details bws-per-bk-extra ng-scope" ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night"><label><span class="bws-font14 marr10 left"><b class="ng-binding">₫ 700.000</b></span> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --><span ng-if="extra.Type==form.data.list_type_bk_extra.per_quantity" class="span42 span-per left ng-scope ng-binding">per item</span><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity --> <!-- ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --></label></div><!-- end ngIf: extra.Type==form.data.list_type_bk_extra.per_quantity || extra.Type==form.data.list_type_bk_extra.per_quantity_per_night --><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 end ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <div ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 07-SEAT CAR</div>
                                                    </div><!-- ngIf: extra.images.length>0 -->
                                                    <div class="bws-column bws-large-12 bws-medium-8 bws-small-12 bk-extra-desc ng-hide" ng-show="extra.is_show_detail == 1">
                                                        <p ng-bind-html="asHtmlDesc(extra.Desc)" class="ng-binding">AIRPORT DROP OFF 07-SEAT CAR</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end ngRepeat: extra in form.data.list_extra -->
                                    </div>
                                    <div class="bws-guest-payment-wrapper">
                                        <div class="bws-guest-payment-left bws-large-5 bws-medium-5 bws-small-12">
                                            <h5 class="bws-page-subtitle"><b class="ng-binding">Price Summary</b></h5>
                                            <div class="bws-row ckb-payment-details">
                                                <div class="clearfix">
                                                    <div class="bws-panel">
                                                        <div class="marb12">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column bws-large-5 bws-medium-5 bws-small-12 ckb-payment-policy-name bws-section-payment ng-binding">Accommodation charges <!-- ngIf: form.data.total_room_tooltip --><span ng-if="form.data.total_room_tooltip" ng-attr-title="{{form.data.total_room_tooltip}}" class="bws-icon-info bws-gray-color has-tip ng-scope" data-hasqtip="37" oldtitle="Prices include 8% VAT  and  5% Service charge." title=""></span><!-- end ngIf: form.data.total_room_tooltip --></div>
                                                                <div class="bws-column bws-large-4 bws-medium-4 bws-font14 large-text-right medium-text-right ckb-main-price font-w-600 ng-binding">₫ 1.450.000</div>
                                                                <div class="bws-column bws-large-3 bws-medium-3 large-text-right medium-text-right ckb-sub-price bws-section-payment ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 1.450.000</div>
                                                            </div>
                                                        </div>
                                                        <div ng-show="form.data.count_service_extra>0" class="marb12">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column bws-large-5 bws-medium-5 bws-small-12 ckb-payment-policy-name bws-section-payment ng-binding">Booking extras</div>
                                                                <div class="bws-column bws-large-4 bws-medium-4 bws-font14 large-text-right medium-text-right ckb-main-price font-w-600 ng-binding">₫ 0</div>
                                                                <div class="bws-column bws-large-3 bws-medium-3 large-text-right medium-text-right ckb-sub-price bws-section-payment ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 0</div>
                                                            </div>
                                                        </div><!-- ngRepeat: taxfee in form.data.list_tax_fee_booking_all | taxOnBooking --><!-- ngIf: form.data.list_cal_tax_fee.taxFee == 1 || taxfee.extratype --><!-- end ngRepeat: taxfee in form.data.list_tax_fee_booking_all | taxOnBooking --><!-- ngIf: form.data.list_cal_tax_fee.taxFee == 1 || taxfee.extratype --><!-- end ngRepeat: taxfee in form.data.list_tax_fee_booking_all | taxOnBooking -->
                                                        <div ng-show="form.data.payment_surcharge_total>0" class="marb20 ng-hide">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column bws-large-5 bws-medium-5 bws-small-12 ckb-payment-policy-name bws-section-payment ng-binding">Payment convenience fee</div>
                                                                <div class="bws-column bws-large-4 bws-medium-4 bws-font14 large-text-right medium-text-right ckb-main-price font-w-600 ng-binding">₫ 0</div>
                                                                <div class="bws-column bws-large-3 bws-medium-3 large-text-right medium-text-right ckb-sub-price bws-section-payment ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 0</div>
                                                            </div>
                                                        </div>
                                                        <div class="bws-line-top-custom padt20 marb20 mart20">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column bws-large-5 bws-medium-5 bws-small-12 ckb-payment-policy-name bws-section-payment"><strong style="font-size: 13px; font-weight: 700 !important" class="ng-binding">Total price</strong></div>
                                                                <div class="bws-column bws-large-4 bws-medium-4 bws-font14 large-text-right medium-text-right ckb-main-price"><b class="has-tip font-w-700 ng-binding" ng-attr-title="{{form.data.total_final_tooltip}}" data-hasqtip="38" oldtitle="Prices include 8% VAT  and  5% Service charge." title="">₫ 1.450.000</b></div>
                                                                <div class="bws-column bws-large-3 bws-medium-3 large-text-right medium-text-right ckb-sub-price bws-section-payment ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 1.450.000</div>
                                                            </div>
                                                        </div>
                                                        <div class="small-text">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column custom-line-height ng-binding">Prices include 8% VAT and 5% Service charge.</div>
                                                            </div>
                                                        </div>
                                                    </div><!-- ngIf: form.data.on_request==0 -->
                                                    <div class="bws-panel ng-scope" ng-if="form.data.on_request==0">
                                                        <div class="marb12">
                                                            <div class="bws-row ckb-payment-policy">
                                                                <div class="bws-column bws-large-5 bws-medium-5 bws-small-12 ckb-payment-policy-name bws-section-payment"><strong class="ng-binding">Deposit due now</strong></div>
                                                                <div class="bws-column bws-large-4 bws-medium-4 bws-font14 large-text-right medium-text-right ckb-main-price font-w-600 ng-binding">₫ 1.450.000</div>
                                                                <div class="bws-column bws-large-3 bws-medium-3 large-text-right medium-text-right ckb-sub-price bws-section-payment ng-binding ng-hide" ng-show="form.data.currency_hotel!=form.data.currency">₫ 1.450.000</div>
                                                            </div>
                                                        </div>
                                                        <div class="marb12"><!-- ngRepeat: balance_item in form.data.listBalanceDue --><!-- ngIf: form.data.payment.payment_type_selected=='paydock' || form.data.payment.payment_type_selected=='kovena' --><!-- ngIf: (form.data.payment.payment_type_selected=='paydock' || form.data.payment.payment_type_selected=='kovena') && form.data.charge_currency != form.data.currency_hotel --><!-- ngIf: notePayment.note && form.data.charge_currency != form.data.currency_hotel -->
                                                            <div class="ckb-taxes-info custom-line-height small-only-show ng-binding" style="padding-bottom: 0; margin-top: 20px; padding-left: 0">Prices include 8% VAT and 5% Service charge.<!-- ngIf: form.data.tax_fee_arrival --></div><!-- ngRepeat: balance_item in form.data.listBalanceDue -->
                                                        </div>
                                                    </div><!-- end ngIf: form.data.on_request==0 -->
                                                </div>
                                            </div>
                                            <h5 class="bws-page-subtitle"><b class="ng-binding">Booking Policies</b></h5>
                                            <div class="clearfix booking-policies-wrapper">
                                                <div class="bws-panel">
                                                    <div class="bws-row ckb-payment-details">
                                                        <div class="bws-column marb20 ng-hide" style="padding: 0 !important" ng-show="form.data.list_rooms.length+form.data.num_extra_selected>1 &amp;&amp; (form.data.show_difference_policy==1 || form.data.show_difference_policy==2)"><label class="marb0 ng-binding"><b class="ng-binding">NOTE:</b> Your booking includes items with different booking policies.</label></div>
                                                        <div class="section-policies-container"><!-- ngRepeat: room in form.data.list_rooms -->
                                                            <div class="bws-column section-policies ng-scope" ng-repeat="room in form.data.list_rooms"><label class="section_name_policies"><b class="ng-binding">Superior Room</b></label><label ng-show="room.policies_arr.cancelation!=''" class="ng-binding"><b class="ng-binding"> Cancellation: </b> If cancelled, modified or in case of no-show, the first night will be charged.</label><label ng-show="room.policies_arr.payment" class="ng-binding"><b class="ng-binding">Payment: </b> First night deposit will be charged. Balance due on arrival.</label><!-- ngIf: room.policies_arr.size_meal==1 --><label ng-if="room.policies_arr.size_meal==1" class="ng-scope ng-binding"><b class="ng-binding">Meal included:</b> Breakfast included</label><!-- end ngIf: room.policies_arr.size_meal==1 --><!-- ngIf: room.policies_arr.size_meal>1 --><label ng-show="room.policies_arr.additional!=''" class="ng-hide"><b class="ng-binding">Other policies: </b> <span ng-bind-html="replace_br_note(room.policies_arr.additional)" class="ng-binding"></span></label></div><!-- end ngRepeat: room in form.data.list_rooms --><!-- ngRepeat: bk_extra in form.data.list_extra --><!-- ngIf: form.data.num_extra_selected>0 --><!-- end ngRepeat: bk_extra in form.data.list_extra --><!-- ngIf: form.data.num_extra_selected>0 --><!-- end ngRepeat: bk_extra in form.data.list_extra --><!-- ngIf: form.data.num_extra_selected>0 --><!-- end ngRepeat: bk_extra in form.data.list_extra --><!-- ngIf: form.data.num_extra_selected>0 --><!-- end ngRepeat: bk_extra in form.data.list_extra -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bws-guest-payment-right bws-large-7 bws-medium-7 bws-small-12">
                                            <h5 class="bws-page-subtitle"><b class="ng-binding">Guest Details</b></h5>
                                            <div class="bws-row ckb-payment-details first-child">
                                                <div class="clearfix">
                                                    <div class="bws-panel">
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-2 bws-medium-2 bws-small-6 text-field"><label class="ng-binding">Title</label><select name="guest_title" id="guest_title" ng-model="form.data.guest.guest_title" class="ng-pristine ng-valid">
                                                                    <option value="Mr" class="ng-binding">Mr.</option>
                                                                    <option value="Mrs" class="ng-binding">Mrs.</option>
                                                                    <option value="Miss" class="ng-binding">Ms.</option>
                                                                    <option value="Dr" class="ng-binding">Dr.</option>
                                                                </select></div>
                                                            <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 text-field"><label class="ng-binding">First name<span> *</span></label><input type="text" name="guest_first_name" id="guest_first_name" maxlength="100" ng-blur="checkRequireField('guest_first_name');traveller_change_info()" required="" ng-model="form.data.guest.guest_first_name" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_first_name || (checkout.guest_first_name.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_first_name">Invalid first name</label></div>
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12"><label class="ng-binding">Last name<span> *</span></label><input type="text" name="guest_last_name" required="" id="guest_last_name" maxlength="100" ng-model="form.data.guest.guest_last_name" ng-blur="checkRequireField('guest_last_name');traveller_change_info()" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_last_name || (checkout.guest_last_name.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_last_name">Invalid last name</label></div>
                                                        </div>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12 text-field"><label class="ng-binding">Email<span> *</span></label><input type="text" name="guest_email" id="guest_email" required="" ng-model="form.data.guest.guest_email" ng-blur="checkRequireField('guest_email');traveller_change_info()" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_email || (checkout.guest_email.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_email">Invalid email</label></div>
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12"><label class="ng-binding">Retype email<span> *</span></label><input type="text" name="guest_confirm" id="guest_confirm" required="" ng-model="form.data.guest.guest_confirm" ng-blur="checkRequireField('guest_confirm')" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_confirm || (checkout.guest_confirm.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_confirm">Invalid email</label></div>
                                                        </div>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12 text-field"><label class="ng-binding">Contact phone<span ng-show="form.data.hotel_info.CollectGuestPhone == 1" class=""> *</span><small ng-show="form.data.hotel_info.CollectGuestPhone == 0" class="ng-binding ng-hide"> (optional)</small></label>
                                                                <div class="iti iti--allow-dropdown iti--show-flags">
                                                                    <div class="iti__flag-container">
                                                                        <div class="iti__selected-flag" role="combobox" aria-haspopup="listbox" aria-controls="iti-0__country-listbox" aria-expanded="false" aria-label="Telephone country code" tabindex="0" title="United States: +1">
                                                                            <div class="iti__flag iti__us"></div>
                                                                            <div class="iti__arrow"></div>
                                                                        </div>
                                                                        <ul class="iti__country-list iti__hide" id="iti-0__country-listbox" role="listbox" aria-label="List of countries">
                                                                            <li class="iti__country iti__preferred iti__active" tabindex="-1" id="iti-0__item-us-preferred" role="option" data-dial-code="1" data-country-code="us" aria-selected="true">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__us"></div>
                                                                                </div><span class="iti__country-name">United States</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__preferred" tabindex="-1" id="iti-0__item-gb-preferred" role="option" data-dial-code="44" data-country-code="gb" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gb"></div>
                                                                                </div><span class="iti__country-name">United Kingdom</span><span class="iti__dial-code">+44</span>
                                                                            </li>
                                                                            <li class="iti__divider" role="separator" aria-disabled="true"></li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-af" role="option" data-dial-code="93" data-country-code="af" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__af"></div>
                                                                                </div><span class="iti__country-name">Afghanistan (‫افغانستان‬‎)</span><span class="iti__dial-code">+93</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-al" role="option" data-dial-code="355" data-country-code="al" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__al"></div>
                                                                                </div><span class="iti__country-name">Albania (Shqipëri)</span><span class="iti__dial-code">+355</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-dz" role="option" data-dial-code="213" data-country-code="dz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__dz"></div>
                                                                                </div><span class="iti__country-name">Algeria (‫الجزائر‬‎)</span><span class="iti__dial-code">+213</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-as" role="option" data-dial-code="1" data-country-code="as" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__as"></div>
                                                                                </div><span class="iti__country-name">American Samoa</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ad" role="option" data-dial-code="376" data-country-code="ad" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ad"></div>
                                                                                </div><span class="iti__country-name">Andorra</span><span class="iti__dial-code">+376</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ao" role="option" data-dial-code="244" data-country-code="ao" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ao"></div>
                                                                                </div><span class="iti__country-name">Angola</span><span class="iti__dial-code">+244</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ai" role="option" data-dial-code="1" data-country-code="ai" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ai"></div>
                                                                                </div><span class="iti__country-name">Anguilla</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ag" role="option" data-dial-code="1" data-country-code="ag" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ag"></div>
                                                                                </div><span class="iti__country-name">Antigua and Barbuda</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ar" role="option" data-dial-code="54" data-country-code="ar" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ar"></div>
                                                                                </div><span class="iti__country-name">Argentina</span><span class="iti__dial-code">+54</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-am" role="option" data-dial-code="374" data-country-code="am" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__am"></div>
                                                                                </div><span class="iti__country-name">Armenia (Հայաստան)</span><span class="iti__dial-code">+374</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-aw" role="option" data-dial-code="297" data-country-code="aw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__aw"></div>
                                                                                </div><span class="iti__country-name">Aruba</span><span class="iti__dial-code">+297</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ac" role="option" data-dial-code="247" data-country-code="ac" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ac"></div>
                                                                                </div><span class="iti__country-name">Ascension Island</span><span class="iti__dial-code">+247</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-au" role="option" data-dial-code="61" data-country-code="au" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__au"></div>
                                                                                </div><span class="iti__country-name">Australia</span><span class="iti__dial-code">+61</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-at" role="option" data-dial-code="43" data-country-code="at" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__at"></div>
                                                                                </div><span class="iti__country-name">Austria (Österreich)</span><span class="iti__dial-code">+43</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-az" role="option" data-dial-code="994" data-country-code="az" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__az"></div>
                                                                                </div><span class="iti__country-name">Azerbaijan (Azərbaycan)</span><span class="iti__dial-code">+994</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bs" role="option" data-dial-code="1" data-country-code="bs" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bs"></div>
                                                                                </div><span class="iti__country-name">Bahamas</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bh" role="option" data-dial-code="973" data-country-code="bh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bh"></div>
                                                                                </div><span class="iti__country-name">Bahrain (‫البحرين‬‎)</span><span class="iti__dial-code">+973</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bd" role="option" data-dial-code="880" data-country-code="bd" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bd"></div>
                                                                                </div><span class="iti__country-name">Bangladesh (বাংলাদেশ)</span><span class="iti__dial-code">+880</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bb" role="option" data-dial-code="1" data-country-code="bb" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bb"></div>
                                                                                </div><span class="iti__country-name">Barbados</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-by" role="option" data-dial-code="375" data-country-code="by" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__by"></div>
                                                                                </div><span class="iti__country-name">Belarus (Беларусь)</span><span class="iti__dial-code">+375</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-be" role="option" data-dial-code="32" data-country-code="be" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__be"></div>
                                                                                </div><span class="iti__country-name">Belgium (België)</span><span class="iti__dial-code">+32</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bz" role="option" data-dial-code="501" data-country-code="bz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bz"></div>
                                                                                </div><span class="iti__country-name">Belize</span><span class="iti__dial-code">+501</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bj" role="option" data-dial-code="229" data-country-code="bj" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bj"></div>
                                                                                </div><span class="iti__country-name">Benin (Bénin)</span><span class="iti__dial-code">+229</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bm" role="option" data-dial-code="1" data-country-code="bm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bm"></div>
                                                                                </div><span class="iti__country-name">Bermuda</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bt" role="option" data-dial-code="975" data-country-code="bt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bt"></div>
                                                                                </div><span class="iti__country-name">Bhutan (འབྲུག)</span><span class="iti__dial-code">+975</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bo" role="option" data-dial-code="591" data-country-code="bo" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bo"></div>
                                                                                </div><span class="iti__country-name">Bolivia</span><span class="iti__dial-code">+591</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ba" role="option" data-dial-code="387" data-country-code="ba" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ba"></div>
                                                                                </div><span class="iti__country-name">Bosnia and Herzegovina (Босна и Херцеговина)</span><span class="iti__dial-code">+387</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bw" role="option" data-dial-code="267" data-country-code="bw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bw"></div>
                                                                                </div><span class="iti__country-name">Botswana</span><span class="iti__dial-code">+267</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-br" role="option" data-dial-code="55" data-country-code="br" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__br"></div>
                                                                                </div><span class="iti__country-name">Brazil (Brasil)</span><span class="iti__dial-code">+55</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-io" role="option" data-dial-code="246" data-country-code="io" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__io"></div>
                                                                                </div><span class="iti__country-name">British Indian Ocean Territory</span><span class="iti__dial-code">+246</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-vg" role="option" data-dial-code="1" data-country-code="vg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__vg"></div>
                                                                                </div><span class="iti__country-name">British Virgin Islands</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bn" role="option" data-dial-code="673" data-country-code="bn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bn"></div>
                                                                                </div><span class="iti__country-name">Brunei</span><span class="iti__dial-code">+673</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bg" role="option" data-dial-code="359" data-country-code="bg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bg"></div>
                                                                                </div><span class="iti__country-name">Bulgaria (България)</span><span class="iti__dial-code">+359</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bf" role="option" data-dial-code="226" data-country-code="bf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bf"></div>
                                                                                </div><span class="iti__country-name">Burkina Faso</span><span class="iti__dial-code">+226</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bi" role="option" data-dial-code="257" data-country-code="bi" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bi"></div>
                                                                                </div><span class="iti__country-name">Burundi (Uburundi)</span><span class="iti__dial-code">+257</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kh" role="option" data-dial-code="855" data-country-code="kh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kh"></div>
                                                                                </div><span class="iti__country-name">Cambodia (កម្ពុជា)</span><span class="iti__dial-code">+855</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cm" role="option" data-dial-code="237" data-country-code="cm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cm"></div>
                                                                                </div><span class="iti__country-name">Cameroon (Cameroun)</span><span class="iti__dial-code">+237</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ca" role="option" data-dial-code="1" data-country-code="ca" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ca"></div>
                                                                                </div><span class="iti__country-name">Canada</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cv" role="option" data-dial-code="238" data-country-code="cv" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cv"></div>
                                                                                </div><span class="iti__country-name">Cape Verde (Kabu Verdi)</span><span class="iti__dial-code">+238</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bq" role="option" data-dial-code="599" data-country-code="bq" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bq"></div>
                                                                                </div><span class="iti__country-name">Caribbean Netherlands</span><span class="iti__dial-code">+599</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ky" role="option" data-dial-code="1" data-country-code="ky" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ky"></div>
                                                                                </div><span class="iti__country-name">Cayman Islands</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cf" role="option" data-dial-code="236" data-country-code="cf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cf"></div>
                                                                                </div><span class="iti__country-name">Central African Republic (République centrafricaine)</span><span class="iti__dial-code">+236</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-td" role="option" data-dial-code="235" data-country-code="td" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__td"></div>
                                                                                </div><span class="iti__country-name">Chad (Tchad)</span><span class="iti__dial-code">+235</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cl" role="option" data-dial-code="56" data-country-code="cl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cl"></div>
                                                                                </div><span class="iti__country-name">Chile</span><span class="iti__dial-code">+56</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cn" role="option" data-dial-code="86" data-country-code="cn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cn"></div>
                                                                                </div><span class="iti__country-name">China (中国)</span><span class="iti__dial-code">+86</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cx" role="option" data-dial-code="61" data-country-code="cx" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cx"></div>
                                                                                </div><span class="iti__country-name">Christmas Island</span><span class="iti__dial-code">+61</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cc" role="option" data-dial-code="61" data-country-code="cc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cc"></div>
                                                                                </div><span class="iti__country-name">Cocos (Keeling) Islands</span><span class="iti__dial-code">+61</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-co" role="option" data-dial-code="57" data-country-code="co" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__co"></div>
                                                                                </div><span class="iti__country-name">Colombia</span><span class="iti__dial-code">+57</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-km" role="option" data-dial-code="269" data-country-code="km" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__km"></div>
                                                                                </div><span class="iti__country-name">Comoros (‫جزر القمر‬‎)</span><span class="iti__dial-code">+269</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cd" role="option" data-dial-code="243" data-country-code="cd" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cd"></div>
                                                                                </div><span class="iti__country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</span><span class="iti__dial-code">+243</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cg" role="option" data-dial-code="242" data-country-code="cg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cg"></div>
                                                                                </div><span class="iti__country-name">Congo (Republic) (Congo-Brazzaville)</span><span class="iti__dial-code">+242</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ck" role="option" data-dial-code="682" data-country-code="ck" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ck"></div>
                                                                                </div><span class="iti__country-name">Cook Islands</span><span class="iti__dial-code">+682</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cr" role="option" data-dial-code="506" data-country-code="cr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cr"></div>
                                                                                </div><span class="iti__country-name">Costa Rica</span><span class="iti__dial-code">+506</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ci" role="option" data-dial-code="225" data-country-code="ci" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ci"></div>
                                                                                </div><span class="iti__country-name">Côte d’Ivoire</span><span class="iti__dial-code">+225</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-hr" role="option" data-dial-code="385" data-country-code="hr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__hr"></div>
                                                                                </div><span class="iti__country-name">Croatia (Hrvatska)</span><span class="iti__dial-code">+385</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cu" role="option" data-dial-code="53" data-country-code="cu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cu"></div>
                                                                                </div><span class="iti__country-name">Cuba</span><span class="iti__dial-code">+53</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cw" role="option" data-dial-code="599" data-country-code="cw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cw"></div>
                                                                                </div><span class="iti__country-name">Curaçao</span><span class="iti__dial-code">+599</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cy" role="option" data-dial-code="357" data-country-code="cy" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cy"></div>
                                                                                </div><span class="iti__country-name">Cyprus (Κύπρος)</span><span class="iti__dial-code">+357</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-cz" role="option" data-dial-code="420" data-country-code="cz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__cz"></div>
                                                                                </div><span class="iti__country-name">Czech Republic (Česká republika)</span><span class="iti__dial-code">+420</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-dk" role="option" data-dial-code="45" data-country-code="dk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__dk"></div>
                                                                                </div><span class="iti__country-name">Denmark (Danmark)</span><span class="iti__dial-code">+45</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-dj" role="option" data-dial-code="253" data-country-code="dj" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__dj"></div>
                                                                                </div><span class="iti__country-name">Djibouti</span><span class="iti__dial-code">+253</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-dm" role="option" data-dial-code="1" data-country-code="dm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__dm"></div>
                                                                                </div><span class="iti__country-name">Dominica</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-do" role="option" data-dial-code="1" data-country-code="do" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__do"></div>
                                                                                </div><span class="iti__country-name">Dominican Republic (República Dominicana)</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ec" role="option" data-dial-code="593" data-country-code="ec" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ec"></div>
                                                                                </div><span class="iti__country-name">Ecuador</span><span class="iti__dial-code">+593</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-eg" role="option" data-dial-code="20" data-country-code="eg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__eg"></div>
                                                                                </div><span class="iti__country-name">Egypt (‫مصر‬‎)</span><span class="iti__dial-code">+20</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sv" role="option" data-dial-code="503" data-country-code="sv" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sv"></div>
                                                                                </div><span class="iti__country-name">El Salvador</span><span class="iti__dial-code">+503</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gq" role="option" data-dial-code="240" data-country-code="gq" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gq"></div>
                                                                                </div><span class="iti__country-name">Equatorial Guinea (Guinea Ecuatorial)</span><span class="iti__dial-code">+240</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-er" role="option" data-dial-code="291" data-country-code="er" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__er"></div>
                                                                                </div><span class="iti__country-name">Eritrea</span><span class="iti__dial-code">+291</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ee" role="option" data-dial-code="372" data-country-code="ee" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ee"></div>
                                                                                </div><span class="iti__country-name">Estonia (Eesti)</span><span class="iti__dial-code">+372</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sz" role="option" data-dial-code="268" data-country-code="sz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sz"></div>
                                                                                </div><span class="iti__country-name">Eswatini</span><span class="iti__dial-code">+268</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-et" role="option" data-dial-code="251" data-country-code="et" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__et"></div>
                                                                                </div><span class="iti__country-name">Ethiopia</span><span class="iti__dial-code">+251</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fk" role="option" data-dial-code="500" data-country-code="fk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fk"></div>
                                                                                </div><span class="iti__country-name">Falkland Islands (Islas Malvinas)</span><span class="iti__dial-code">+500</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fo" role="option" data-dial-code="298" data-country-code="fo" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fo"></div>
                                                                                </div><span class="iti__country-name">Faroe Islands (Føroyar)</span><span class="iti__dial-code">+298</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fj" role="option" data-dial-code="679" data-country-code="fj" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fj"></div>
                                                                                </div><span class="iti__country-name">Fiji</span><span class="iti__dial-code">+679</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fi" role="option" data-dial-code="358" data-country-code="fi" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fi"></div>
                                                                                </div><span class="iti__country-name">Finland (Suomi)</span><span class="iti__dial-code">+358</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fr" role="option" data-dial-code="33" data-country-code="fr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fr"></div>
                                                                                </div><span class="iti__country-name">France</span><span class="iti__dial-code">+33</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gf" role="option" data-dial-code="594" data-country-code="gf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gf"></div>
                                                                                </div><span class="iti__country-name">French Guiana (Guyane française)</span><span class="iti__dial-code">+594</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pf" role="option" data-dial-code="689" data-country-code="pf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pf"></div>
                                                                                </div><span class="iti__country-name">French Polynesia (Polynésie française)</span><span class="iti__dial-code">+689</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ga" role="option" data-dial-code="241" data-country-code="ga" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ga"></div>
                                                                                </div><span class="iti__country-name">Gabon</span><span class="iti__dial-code">+241</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gm" role="option" data-dial-code="220" data-country-code="gm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gm"></div>
                                                                                </div><span class="iti__country-name">Gambia</span><span class="iti__dial-code">+220</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ge" role="option" data-dial-code="995" data-country-code="ge" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ge"></div>
                                                                                </div><span class="iti__country-name">Georgia (საქართველო)</span><span class="iti__dial-code">+995</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-de" role="option" data-dial-code="49" data-country-code="de" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__de"></div>
                                                                                </div><span class="iti__country-name">Germany (Deutschland)</span><span class="iti__dial-code">+49</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gh" role="option" data-dial-code="233" data-country-code="gh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gh"></div>
                                                                                </div><span class="iti__country-name">Ghana (Gaana)</span><span class="iti__dial-code">+233</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gi" role="option" data-dial-code="350" data-country-code="gi" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gi"></div>
                                                                                </div><span class="iti__country-name">Gibraltar</span><span class="iti__dial-code">+350</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gr" role="option" data-dial-code="30" data-country-code="gr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gr"></div>
                                                                                </div><span class="iti__country-name">Greece (Ελλάδα)</span><span class="iti__dial-code">+30</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gl" role="option" data-dial-code="299" data-country-code="gl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gl"></div>
                                                                                </div><span class="iti__country-name">Greenland (Kalaallit Nunaat)</span><span class="iti__dial-code">+299</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gd" role="option" data-dial-code="1" data-country-code="gd" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gd"></div>
                                                                                </div><span class="iti__country-name">Grenada</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gp" role="option" data-dial-code="590" data-country-code="gp" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gp"></div>
                                                                                </div><span class="iti__country-name">Guadeloupe</span><span class="iti__dial-code">+590</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gu" role="option" data-dial-code="1" data-country-code="gu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gu"></div>
                                                                                </div><span class="iti__country-name">Guam</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gt" role="option" data-dial-code="502" data-country-code="gt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gt"></div>
                                                                                </div><span class="iti__country-name">Guatemala</span><span class="iti__dial-code">+502</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gg" role="option" data-dial-code="44" data-country-code="gg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gg"></div>
                                                                                </div><span class="iti__country-name">Guernsey</span><span class="iti__dial-code">+44</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gn" role="option" data-dial-code="224" data-country-code="gn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gn"></div>
                                                                                </div><span class="iti__country-name">Guinea (Guinée)</span><span class="iti__dial-code">+224</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gw" role="option" data-dial-code="245" data-country-code="gw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gw"></div>
                                                                                </div><span class="iti__country-name">Guinea-Bissau (Guiné Bissau)</span><span class="iti__dial-code">+245</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gy" role="option" data-dial-code="592" data-country-code="gy" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gy"></div>
                                                                                </div><span class="iti__country-name">Guyana</span><span class="iti__dial-code">+592</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ht" role="option" data-dial-code="509" data-country-code="ht" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ht"></div>
                                                                                </div><span class="iti__country-name">Haiti</span><span class="iti__dial-code">+509</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-hn" role="option" data-dial-code="504" data-country-code="hn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__hn"></div>
                                                                                </div><span class="iti__country-name">Honduras</span><span class="iti__dial-code">+504</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-hk" role="option" data-dial-code="852" data-country-code="hk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__hk"></div>
                                                                                </div><span class="iti__country-name">Hong Kong (香港)</span><span class="iti__dial-code">+852</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-hu" role="option" data-dial-code="36" data-country-code="hu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__hu"></div>
                                                                                </div><span class="iti__country-name">Hungary (Magyarország)</span><span class="iti__dial-code">+36</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-is" role="option" data-dial-code="354" data-country-code="is" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__is"></div>
                                                                                </div><span class="iti__country-name">Iceland (Ísland)</span><span class="iti__dial-code">+354</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-in" role="option" data-dial-code="91" data-country-code="in" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__in"></div>
                                                                                </div><span class="iti__country-name">India (भारत)</span><span class="iti__dial-code">+91</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-id" role="option" data-dial-code="62" data-country-code="id" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__id"></div>
                                                                                </div><span class="iti__country-name">Indonesia</span><span class="iti__dial-code">+62</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ir" role="option" data-dial-code="98" data-country-code="ir" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ir"></div>
                                                                                </div><span class="iti__country-name">Iran (‫ایران‬‎)</span><span class="iti__dial-code">+98</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-iq" role="option" data-dial-code="964" data-country-code="iq" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__iq"></div>
                                                                                </div><span class="iti__country-name">Iraq (‫العراق‬‎)</span><span class="iti__dial-code">+964</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ie" role="option" data-dial-code="353" data-country-code="ie" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ie"></div>
                                                                                </div><span class="iti__country-name">Ireland</span><span class="iti__dial-code">+353</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-im" role="option" data-dial-code="44" data-country-code="im" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__im"></div>
                                                                                </div><span class="iti__country-name">Isle of Man</span><span class="iti__dial-code">+44</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-il" role="option" data-dial-code="972" data-country-code="il" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__il"></div>
                                                                                </div><span class="iti__country-name">Israel (‫ישראל‬‎)</span><span class="iti__dial-code">+972</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-it" role="option" data-dial-code="39" data-country-code="it" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__it"></div>
                                                                                </div><span class="iti__country-name">Italy (Italia)</span><span class="iti__dial-code">+39</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-jm" role="option" data-dial-code="1" data-country-code="jm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__jm"></div>
                                                                                </div><span class="iti__country-name">Jamaica</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-jp" role="option" data-dial-code="81" data-country-code="jp" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__jp"></div>
                                                                                </div><span class="iti__country-name">Japan (日本)</span><span class="iti__dial-code">+81</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-je" role="option" data-dial-code="44" data-country-code="je" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__je"></div>
                                                                                </div><span class="iti__country-name">Jersey</span><span class="iti__dial-code">+44</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-jo" role="option" data-dial-code="962" data-country-code="jo" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__jo"></div>
                                                                                </div><span class="iti__country-name">Jordan (‫الأردن‬‎)</span><span class="iti__dial-code">+962</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kz" role="option" data-dial-code="7" data-country-code="kz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kz"></div>
                                                                                </div><span class="iti__country-name">Kazakhstan (Казахстан)</span><span class="iti__dial-code">+7</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ke" role="option" data-dial-code="254" data-country-code="ke" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ke"></div>
                                                                                </div><span class="iti__country-name">Kenya</span><span class="iti__dial-code">+254</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ki" role="option" data-dial-code="686" data-country-code="ki" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ki"></div>
                                                                                </div><span class="iti__country-name">Kiribati</span><span class="iti__dial-code">+686</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-xk" role="option" data-dial-code="383" data-country-code="xk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__xk"></div>
                                                                                </div><span class="iti__country-name">Kosovo</span><span class="iti__dial-code">+383</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kw" role="option" data-dial-code="965" data-country-code="kw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kw"></div>
                                                                                </div><span class="iti__country-name">Kuwait (‫الكويت‬‎)</span><span class="iti__dial-code">+965</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kg" role="option" data-dial-code="996" data-country-code="kg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kg"></div>
                                                                                </div><span class="iti__country-name">Kyrgyzstan (Кыргызстан)</span><span class="iti__dial-code">+996</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-la" role="option" data-dial-code="856" data-country-code="la" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__la"></div>
                                                                                </div><span class="iti__country-name">Laos (ລາວ)</span><span class="iti__dial-code">+856</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lv" role="option" data-dial-code="371" data-country-code="lv" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lv"></div>
                                                                                </div><span class="iti__country-name">Latvia (Latvija)</span><span class="iti__dial-code">+371</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lb" role="option" data-dial-code="961" data-country-code="lb" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lb"></div>
                                                                                </div><span class="iti__country-name">Lebanon (‫لبنان‬‎)</span><span class="iti__dial-code">+961</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ls" role="option" data-dial-code="266" data-country-code="ls" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ls"></div>
                                                                                </div><span class="iti__country-name">Lesotho</span><span class="iti__dial-code">+266</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lr" role="option" data-dial-code="231" data-country-code="lr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lr"></div>
                                                                                </div><span class="iti__country-name">Liberia</span><span class="iti__dial-code">+231</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ly" role="option" data-dial-code="218" data-country-code="ly" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ly"></div>
                                                                                </div><span class="iti__country-name">Libya (‫ليبيا‬‎)</span><span class="iti__dial-code">+218</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-li" role="option" data-dial-code="423" data-country-code="li" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__li"></div>
                                                                                </div><span class="iti__country-name">Liechtenstein</span><span class="iti__dial-code">+423</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lt" role="option" data-dial-code="370" data-country-code="lt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lt"></div>
                                                                                </div><span class="iti__country-name">Lithuania (Lietuva)</span><span class="iti__dial-code">+370</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lu" role="option" data-dial-code="352" data-country-code="lu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lu"></div>
                                                                                </div><span class="iti__country-name">Luxembourg</span><span class="iti__dial-code">+352</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mo" role="option" data-dial-code="853" data-country-code="mo" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mo"></div>
                                                                                </div><span class="iti__country-name">Macau (澳門)</span><span class="iti__dial-code">+853</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mg" role="option" data-dial-code="261" data-country-code="mg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mg"></div>
                                                                                </div><span class="iti__country-name">Madagascar (Madagasikara)</span><span class="iti__dial-code">+261</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mw" role="option" data-dial-code="265" data-country-code="mw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mw"></div>
                                                                                </div><span class="iti__country-name">Malawi</span><span class="iti__dial-code">+265</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-my" role="option" data-dial-code="60" data-country-code="my" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__my"></div>
                                                                                </div><span class="iti__country-name">Malaysia</span><span class="iti__dial-code">+60</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mv" role="option" data-dial-code="960" data-country-code="mv" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mv"></div>
                                                                                </div><span class="iti__country-name">Maldives</span><span class="iti__dial-code">+960</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ml" role="option" data-dial-code="223" data-country-code="ml" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ml"></div>
                                                                                </div><span class="iti__country-name">Mali</span><span class="iti__dial-code">+223</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mt" role="option" data-dial-code="356" data-country-code="mt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mt"></div>
                                                                                </div><span class="iti__country-name">Malta</span><span class="iti__dial-code">+356</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mh" role="option" data-dial-code="692" data-country-code="mh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mh"></div>
                                                                                </div><span class="iti__country-name">Marshall Islands</span><span class="iti__dial-code">+692</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mq" role="option" data-dial-code="596" data-country-code="mq" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mq"></div>
                                                                                </div><span class="iti__country-name">Martinique</span><span class="iti__dial-code">+596</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mr" role="option" data-dial-code="222" data-country-code="mr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mr"></div>
                                                                                </div><span class="iti__country-name">Mauritania (‫موريتانيا‬‎)</span><span class="iti__dial-code">+222</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mu" role="option" data-dial-code="230" data-country-code="mu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mu"></div>
                                                                                </div><span class="iti__country-name">Mauritius (Moris)</span><span class="iti__dial-code">+230</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-yt" role="option" data-dial-code="262" data-country-code="yt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__yt"></div>
                                                                                </div><span class="iti__country-name">Mayotte</span><span class="iti__dial-code">+262</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mx" role="option" data-dial-code="52" data-country-code="mx" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mx"></div>
                                                                                </div><span class="iti__country-name">Mexico (México)</span><span class="iti__dial-code">+52</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-fm" role="option" data-dial-code="691" data-country-code="fm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__fm"></div>
                                                                                </div><span class="iti__country-name">Micronesia</span><span class="iti__dial-code">+691</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-md" role="option" data-dial-code="373" data-country-code="md" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__md"></div>
                                                                                </div><span class="iti__country-name">Moldova (Republica Moldova)</span><span class="iti__dial-code">+373</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mc" role="option" data-dial-code="377" data-country-code="mc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mc"></div>
                                                                                </div><span class="iti__country-name">Monaco</span><span class="iti__dial-code">+377</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mn" role="option" data-dial-code="976" data-country-code="mn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mn"></div>
                                                                                </div><span class="iti__country-name">Mongolia (Монгол)</span><span class="iti__dial-code">+976</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-me" role="option" data-dial-code="382" data-country-code="me" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__me"></div>
                                                                                </div><span class="iti__country-name">Montenegro (Crna Gora)</span><span class="iti__dial-code">+382</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ms" role="option" data-dial-code="1" data-country-code="ms" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ms"></div>
                                                                                </div><span class="iti__country-name">Montserrat</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ma" role="option" data-dial-code="212" data-country-code="ma" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ma"></div>
                                                                                </div><span class="iti__country-name">Morocco (‫المغرب‬‎)</span><span class="iti__dial-code">+212</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mz" role="option" data-dial-code="258" data-country-code="mz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mz"></div>
                                                                                </div><span class="iti__country-name">Mozambique (Moçambique)</span><span class="iti__dial-code">+258</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mm" role="option" data-dial-code="95" data-country-code="mm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mm"></div>
                                                                                </div><span class="iti__country-name">Myanmar (Burma) (မြန်မာ)</span><span class="iti__dial-code">+95</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-na" role="option" data-dial-code="264" data-country-code="na" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__na"></div>
                                                                                </div><span class="iti__country-name">Namibia (Namibië)</span><span class="iti__dial-code">+264</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nr" role="option" data-dial-code="674" data-country-code="nr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nr"></div>
                                                                                </div><span class="iti__country-name">Nauru</span><span class="iti__dial-code">+674</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-np" role="option" data-dial-code="977" data-country-code="np" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__np"></div>
                                                                                </div><span class="iti__country-name">Nepal (नेपाल)</span><span class="iti__dial-code">+977</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nl" role="option" data-dial-code="31" data-country-code="nl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nl"></div>
                                                                                </div><span class="iti__country-name">Netherlands (Nederland)</span><span class="iti__dial-code">+31</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nc" role="option" data-dial-code="687" data-country-code="nc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nc"></div>
                                                                                </div><span class="iti__country-name">New Caledonia (Nouvelle-Calédonie)</span><span class="iti__dial-code">+687</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nz" role="option" data-dial-code="64" data-country-code="nz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nz"></div>
                                                                                </div><span class="iti__country-name">New Zealand</span><span class="iti__dial-code">+64</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ni" role="option" data-dial-code="505" data-country-code="ni" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ni"></div>
                                                                                </div><span class="iti__country-name">Nicaragua</span><span class="iti__dial-code">+505</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ne" role="option" data-dial-code="227" data-country-code="ne" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ne"></div>
                                                                                </div><span class="iti__country-name">Niger (Nijar)</span><span class="iti__dial-code">+227</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ng" role="option" data-dial-code="234" data-country-code="ng" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ng"></div>
                                                                                </div><span class="iti__country-name">Nigeria</span><span class="iti__dial-code">+234</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nu" role="option" data-dial-code="683" data-country-code="nu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nu"></div>
                                                                                </div><span class="iti__country-name">Niue</span><span class="iti__dial-code">+683</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-nf" role="option" data-dial-code="672" data-country-code="nf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__nf"></div>
                                                                                </div><span class="iti__country-name">Norfolk Island</span><span class="iti__dial-code">+672</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kp" role="option" data-dial-code="850" data-country-code="kp" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kp"></div>
                                                                                </div><span class="iti__country-name">North Korea (조선 민주주의 인민 공화국)</span><span class="iti__dial-code">+850</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mk" role="option" data-dial-code="389" data-country-code="mk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mk"></div>
                                                                                </div><span class="iti__country-name">North Macedonia (Северна Македонија)</span><span class="iti__dial-code">+389</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mp" role="option" data-dial-code="1" data-country-code="mp" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mp"></div>
                                                                                </div><span class="iti__country-name">Northern Mariana Islands</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-no" role="option" data-dial-code="47" data-country-code="no" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__no"></div>
                                                                                </div><span class="iti__country-name">Norway (Norge)</span><span class="iti__dial-code">+47</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-om" role="option" data-dial-code="968" data-country-code="om" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__om"></div>
                                                                                </div><span class="iti__country-name">Oman (‫عُمان‬‎)</span><span class="iti__dial-code">+968</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pk" role="option" data-dial-code="92" data-country-code="pk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pk"></div>
                                                                                </div><span class="iti__country-name">Pakistan (‫پاکستان‬‎)</span><span class="iti__dial-code">+92</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pw" role="option" data-dial-code="680" data-country-code="pw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pw"></div>
                                                                                </div><span class="iti__country-name">Palau</span><span class="iti__dial-code">+680</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ps" role="option" data-dial-code="970" data-country-code="ps" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ps"></div>
                                                                                </div><span class="iti__country-name">Palestine (‫فلسطين‬‎)</span><span class="iti__dial-code">+970</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pa" role="option" data-dial-code="507" data-country-code="pa" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pa"></div>
                                                                                </div><span class="iti__country-name">Panama (Panamá)</span><span class="iti__dial-code">+507</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pg" role="option" data-dial-code="675" data-country-code="pg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pg"></div>
                                                                                </div><span class="iti__country-name">Papua New Guinea</span><span class="iti__dial-code">+675</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-py" role="option" data-dial-code="595" data-country-code="py" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__py"></div>
                                                                                </div><span class="iti__country-name">Paraguay</span><span class="iti__dial-code">+595</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pe" role="option" data-dial-code="51" data-country-code="pe" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pe"></div>
                                                                                </div><span class="iti__country-name">Peru (Perú)</span><span class="iti__dial-code">+51</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ph" role="option" data-dial-code="63" data-country-code="ph" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ph"></div>
                                                                                </div><span class="iti__country-name">Philippines</span><span class="iti__dial-code">+63</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pl" role="option" data-dial-code="48" data-country-code="pl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pl"></div>
                                                                                </div><span class="iti__country-name">Poland (Polska)</span><span class="iti__dial-code">+48</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pt" role="option" data-dial-code="351" data-country-code="pt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pt"></div>
                                                                                </div><span class="iti__country-name">Portugal</span><span class="iti__dial-code">+351</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pr" role="option" data-dial-code="1" data-country-code="pr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pr"></div>
                                                                                </div><span class="iti__country-name">Puerto Rico</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-qa" role="option" data-dial-code="974" data-country-code="qa" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__qa"></div>
                                                                                </div><span class="iti__country-name">Qatar (‫قطر‬‎)</span><span class="iti__dial-code">+974</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-re" role="option" data-dial-code="262" data-country-code="re" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__re"></div>
                                                                                </div><span class="iti__country-name">Réunion (La Réunion)</span><span class="iti__dial-code">+262</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ro" role="option" data-dial-code="40" data-country-code="ro" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ro"></div>
                                                                                </div><span class="iti__country-name">Romania (România)</span><span class="iti__dial-code">+40</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ru" role="option" data-dial-code="7" data-country-code="ru" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ru"></div>
                                                                                </div><span class="iti__country-name">Russia (Россия)</span><span class="iti__dial-code">+7</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-rw" role="option" data-dial-code="250" data-country-code="rw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__rw"></div>
                                                                                </div><span class="iti__country-name">Rwanda</span><span class="iti__dial-code">+250</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bl" role="option" data-dial-code="590" data-country-code="bl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__bl"></div>
                                                                                </div><span class="iti__country-name">Saint Barthélemy</span><span class="iti__dial-code">+590</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sh" role="option" data-dial-code="290" data-country-code="sh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sh"></div>
                                                                                </div><span class="iti__country-name">Saint Helena</span><span class="iti__dial-code">+290</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kn" role="option" data-dial-code="1" data-country-code="kn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kn"></div>
                                                                                </div><span class="iti__country-name">Saint Kitts and Nevis</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lc" role="option" data-dial-code="1" data-country-code="lc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lc"></div>
                                                                                </div><span class="iti__country-name">Saint Lucia</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-mf" role="option" data-dial-code="590" data-country-code="mf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__mf"></div>
                                                                                </div><span class="iti__country-name">Saint Martin (Saint-Martin (partie française))</span><span class="iti__dial-code">+590</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-pm" role="option" data-dial-code="508" data-country-code="pm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__pm"></div>
                                                                                </div><span class="iti__country-name">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</span><span class="iti__dial-code">+508</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-vc" role="option" data-dial-code="1" data-country-code="vc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__vc"></div>
                                                                                </div><span class="iti__country-name">Saint Vincent and the Grenadines</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ws" role="option" data-dial-code="685" data-country-code="ws" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ws"></div>
                                                                                </div><span class="iti__country-name">Samoa</span><span class="iti__dial-code">+685</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sm" role="option" data-dial-code="378" data-country-code="sm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sm"></div>
                                                                                </div><span class="iti__country-name">San Marino</span><span class="iti__dial-code">+378</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-st" role="option" data-dial-code="239" data-country-code="st" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__st"></div>
                                                                                </div><span class="iti__country-name">São Tomé and Príncipe (São Tomé e Príncipe)</span><span class="iti__dial-code">+239</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sa" role="option" data-dial-code="966" data-country-code="sa" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sa"></div>
                                                                                </div><span class="iti__country-name">Saudi Arabia (‫المملكة العربية السعودية‬‎)</span><span class="iti__dial-code">+966</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sn" role="option" data-dial-code="221" data-country-code="sn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sn"></div>
                                                                                </div><span class="iti__country-name">Senegal (Sénégal)</span><span class="iti__dial-code">+221</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-rs" role="option" data-dial-code="381" data-country-code="rs" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__rs"></div>
                                                                                </div><span class="iti__country-name">Serbia (Србија)</span><span class="iti__dial-code">+381</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sc" role="option" data-dial-code="248" data-country-code="sc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sc"></div>
                                                                                </div><span class="iti__country-name">Seychelles</span><span class="iti__dial-code">+248</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sl" role="option" data-dial-code="232" data-country-code="sl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sl"></div>
                                                                                </div><span class="iti__country-name">Sierra Leone</span><span class="iti__dial-code">+232</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sg" role="option" data-dial-code="65" data-country-code="sg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sg"></div>
                                                                                </div><span class="iti__country-name">Singapore</span><span class="iti__dial-code">+65</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sx" role="option" data-dial-code="1" data-country-code="sx" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sx"></div>
                                                                                </div><span class="iti__country-name">Sint Maarten</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sk" role="option" data-dial-code="421" data-country-code="sk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sk"></div>
                                                                                </div><span class="iti__country-name">Slovakia (Slovensko)</span><span class="iti__dial-code">+421</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-si" role="option" data-dial-code="386" data-country-code="si" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__si"></div>
                                                                                </div><span class="iti__country-name">Slovenia (Slovenija)</span><span class="iti__dial-code">+386</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sb" role="option" data-dial-code="677" data-country-code="sb" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sb"></div>
                                                                                </div><span class="iti__country-name">Solomon Islands</span><span class="iti__dial-code">+677</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-so" role="option" data-dial-code="252" data-country-code="so" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__so"></div>
                                                                                </div><span class="iti__country-name">Somalia (Soomaaliya)</span><span class="iti__dial-code">+252</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-za" role="option" data-dial-code="27" data-country-code="za" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__za"></div>
                                                                                </div><span class="iti__country-name">South Africa</span><span class="iti__dial-code">+27</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-kr" role="option" data-dial-code="82" data-country-code="kr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__kr"></div>
                                                                                </div><span class="iti__country-name">South Korea (대한민국)</span><span class="iti__dial-code">+82</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ss" role="option" data-dial-code="211" data-country-code="ss" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ss"></div>
                                                                                </div><span class="iti__country-name">South Sudan (‫جنوب السودان‬‎)</span><span class="iti__dial-code">+211</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-es" role="option" data-dial-code="34" data-country-code="es" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__es"></div>
                                                                                </div><span class="iti__country-name">Spain (España)</span><span class="iti__dial-code">+34</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-lk" role="option" data-dial-code="94" data-country-code="lk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__lk"></div>
                                                                                </div><span class="iti__country-name">Sri Lanka (ශ්‍රී ලංකාව)</span><span class="iti__dial-code">+94</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sd" role="option" data-dial-code="249" data-country-code="sd" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sd"></div>
                                                                                </div><span class="iti__country-name">Sudan (‫السودان‬‎)</span><span class="iti__dial-code">+249</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sr" role="option" data-dial-code="597" data-country-code="sr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sr"></div>
                                                                                </div><span class="iti__country-name">Suriname</span><span class="iti__dial-code">+597</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sj" role="option" data-dial-code="47" data-country-code="sj" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sj"></div>
                                                                                </div><span class="iti__country-name">Svalbard and Jan Mayen</span><span class="iti__dial-code">+47</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-se" role="option" data-dial-code="46" data-country-code="se" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__se"></div>
                                                                                </div><span class="iti__country-name">Sweden (Sverige)</span><span class="iti__dial-code">+46</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ch" role="option" data-dial-code="41" data-country-code="ch" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ch"></div>
                                                                                </div><span class="iti__country-name">Switzerland (Schweiz)</span><span class="iti__dial-code">+41</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sy" role="option" data-dial-code="963" data-country-code="sy" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__sy"></div>
                                                                                </div><span class="iti__country-name">Syria (‫سوريا‬‎)</span><span class="iti__dial-code">+963</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tw" role="option" data-dial-code="886" data-country-code="tw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tw"></div>
                                                                                </div><span class="iti__country-name">Taiwan (台灣)</span><span class="iti__dial-code">+886</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tj" role="option" data-dial-code="992" data-country-code="tj" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tj"></div>
                                                                                </div><span class="iti__country-name">Tajikistan</span><span class="iti__dial-code">+992</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tz" role="option" data-dial-code="255" data-country-code="tz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tz"></div>
                                                                                </div><span class="iti__country-name">Tanzania</span><span class="iti__dial-code">+255</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-th" role="option" data-dial-code="66" data-country-code="th" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__th"></div>
                                                                                </div><span class="iti__country-name">Thailand (ไทย)</span><span class="iti__dial-code">+66</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tl" role="option" data-dial-code="670" data-country-code="tl" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tl"></div>
                                                                                </div><span class="iti__country-name">Timor-Leste</span><span class="iti__dial-code">+670</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tg" role="option" data-dial-code="228" data-country-code="tg" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tg"></div>
                                                                                </div><span class="iti__country-name">Togo</span><span class="iti__dial-code">+228</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tk" role="option" data-dial-code="690" data-country-code="tk" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tk"></div>
                                                                                </div><span class="iti__country-name">Tokelau</span><span class="iti__dial-code">+690</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-to" role="option" data-dial-code="676" data-country-code="to" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__to"></div>
                                                                                </div><span class="iti__country-name">Tonga</span><span class="iti__dial-code">+676</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tt" role="option" data-dial-code="1" data-country-code="tt" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tt"></div>
                                                                                </div><span class="iti__country-name">Trinidad and Tobago</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tn" role="option" data-dial-code="216" data-country-code="tn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tn"></div>
                                                                                </div><span class="iti__country-name">Tunisia (‫تونس‬‎)</span><span class="iti__dial-code">+216</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tr" role="option" data-dial-code="90" data-country-code="tr" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tr"></div>
                                                                                </div><span class="iti__country-name">Turkey (Türkiye)</span><span class="iti__dial-code">+90</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tm" role="option" data-dial-code="993" data-country-code="tm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tm"></div>
                                                                                </div><span class="iti__country-name">Turkmenistan</span><span class="iti__dial-code">+993</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tc" role="option" data-dial-code="1" data-country-code="tc" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tc"></div>
                                                                                </div><span class="iti__country-name">Turks and Caicos Islands</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-tv" role="option" data-dial-code="688" data-country-code="tv" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__tv"></div>
                                                                                </div><span class="iti__country-name">Tuvalu</span><span class="iti__dial-code">+688</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-vi" role="option" data-dial-code="1" data-country-code="vi" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__vi"></div>
                                                                                </div><span class="iti__country-name">U.S. Virgin Islands</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ug" role="option" data-dial-code="256" data-country-code="ug" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ug"></div>
                                                                                </div><span class="iti__country-name">Uganda</span><span class="iti__dial-code">+256</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ua" role="option" data-dial-code="380" data-country-code="ua" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ua"></div>
                                                                                </div><span class="iti__country-name">Ukraine (Україна)</span><span class="iti__dial-code">+380</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ae" role="option" data-dial-code="971" data-country-code="ae" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ae"></div>
                                                                                </div><span class="iti__country-name">United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</span><span class="iti__dial-code">+971</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-gb" role="option" data-dial-code="44" data-country-code="gb" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__gb"></div>
                                                                                </div><span class="iti__country-name">United Kingdom</span><span class="iti__dial-code">+44</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-us" role="option" data-dial-code="1" data-country-code="us" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__us"></div>
                                                                                </div><span class="iti__country-name">United States</span><span class="iti__dial-code">+1</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-uy" role="option" data-dial-code="598" data-country-code="uy" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__uy"></div>
                                                                                </div><span class="iti__country-name">Uruguay</span><span class="iti__dial-code">+598</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-uz" role="option" data-dial-code="998" data-country-code="uz" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__uz"></div>
                                                                                </div><span class="iti__country-name">Uzbekistan (Oʻzbekiston)</span><span class="iti__dial-code">+998</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-vu" role="option" data-dial-code="678" data-country-code="vu" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__vu"></div>
                                                                                </div><span class="iti__country-name">Vanuatu</span><span class="iti__dial-code">+678</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-va" role="option" data-dial-code="39" data-country-code="va" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__va"></div>
                                                                                </div><span class="iti__country-name">Vatican City (Città del Vaticano)</span><span class="iti__dial-code">+39</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ve" role="option" data-dial-code="58" data-country-code="ve" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ve"></div>
                                                                                </div><span class="iti__country-name">Venezuela</span><span class="iti__dial-code">+58</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-vn" role="option" data-dial-code="84" data-country-code="vn" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__vn"></div>
                                                                                </div><span class="iti__country-name">Vietnam (Việt Nam)</span><span class="iti__dial-code">+84</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-wf" role="option" data-dial-code="681" data-country-code="wf" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__wf"></div>
                                                                                </div><span class="iti__country-name">Wallis and Futuna (Wallis-et-Futuna)</span><span class="iti__dial-code">+681</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-eh" role="option" data-dial-code="212" data-country-code="eh" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__eh"></div>
                                                                                </div><span class="iti__country-name">Western Sahara (‫الصحراء الغربية‬‎)</span><span class="iti__dial-code">+212</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ye" role="option" data-dial-code="967" data-country-code="ye" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ye"></div>
                                                                                </div><span class="iti__country-name">Yemen (‫اليمن‬‎)</span><span class="iti__dial-code">+967</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-zm" role="option" data-dial-code="260" data-country-code="zm" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__zm"></div>
                                                                                </div><span class="iti__country-name">Zambia</span><span class="iti__dial-code">+260</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-zw" role="option" data-dial-code="263" data-country-code="zw" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__zw"></div>
                                                                                </div><span class="iti__country-name">Zimbabwe</span><span class="iti__dial-code">+263</span>
                                                                            </li>
                                                                            <li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-ax" role="option" data-dial-code="358" data-country-code="ax" aria-selected="false">
                                                                                <div class="iti__flag-box">
                                                                                    <div class="iti__flag iti__ax"></div>
                                                                                </div><span class="iti__country-name">Åland Islands</span><span class="iti__dial-code">+358</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div><input name="guest_phone" id="guest_phone" class="phoneInt ng-pristine ng-valid" ng-blur="updatePhone();traveller_change_info()" type="tel" ng-change="resetCheckPhone()" ng-model="form.data.guest.guest_phone" autocomplete="off" placeholder="+1 201-555-5555" data-intl-tel-input-id="0">
                                                                </div><label class="error ng-binding ng-hide" style="color:red" ng-show="requiredPhone">Invalid phone number</label><label class="error ng-binding ng-hide" style="color:red" ng-show="invalidPhone">Invalid phone number</label>
                                                            </div>
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12"><label class="ng-binding">Country<span> *</span></label><select name="guest_country" id="guest_country" ng-model="form.data.guest.guest_country" ng-options="country.code as country.name for country in form.data.list_country" ng-change="checkRequireFieldDropdown('guest_country')" class="ng-pristine ng-valid">
                                                                    <option value="0" selected="selected">--Select--</option>
                                                                    <option value="1">Afghanistan</option>
                                                                    <option value="2">Aland Islands</option>
                                                                    <option value="3">Albania</option>
                                                                    <option value="4">Algeria</option>
                                                                    <option value="5">American Samoa</option>
                                                                    <option value="6">Andorra</option>
                                                                    <option value="7">Angola</option>
                                                                    <option value="8">Anguilla</option>
                                                                    <option value="9">Antarctica</option>
                                                                    <option value="10">Antigua and Barbuda</option>
                                                                    <option value="11">Argentina</option>
                                                                    <option value="12">Armenia</option>
                                                                    <option value="13">Aruba</option>
                                                                    <option value="14">Australia</option>
                                                                    <option value="15">Austria</option>
                                                                    <option value="16">Azerbaijan</option>
                                                                    <option value="17">Bahamas</option>
                                                                    <option value="18">Bahrain</option>
                                                                    <option value="19">Bangladesh</option>
                                                                    <option value="20">Barbados</option>
                                                                    <option value="21">Belarus</option>
                                                                    <option value="22">Belgium</option>
                                                                    <option value="23">Belize</option>
                                                                    <option value="24">Benin</option>
                                                                    <option value="25">Bermuda</option>
                                                                    <option value="26">Bhutan</option>
                                                                    <option value="27">Bolivia</option>
                                                                    <option value="28">Bosnia and Herzegovina</option>
                                                                    <option value="29">Botswana</option>
                                                                    <option value="30">Bouvet Island</option>
                                                                    <option value="31">Brazil</option>
                                                                    <option value="32">British Indian Ocean Territory</option>
                                                                    <option value="33">Brunei Darussalam</option>
                                                                    <option value="34">Bulgaria</option>
                                                                    <option value="35">Burkina Faso</option>
                                                                    <option value="36">Burundi</option>
                                                                    <option value="37">Cambodia</option>
                                                                    <option value="38">Cameroon</option>
                                                                    <option value="39">Canada</option>
                                                                    <option value="40">Cape Verde</option>
                                                                    <option value="41">Cayman Islands</option>
                                                                    <option value="42">Central African Republic</option>
                                                                    <option value="43">Chad</option>
                                                                    <option value="44">Chile</option>
                                                                    <option value="45">China</option>
                                                                    <option value="46">Christmas Island</option>
                                                                    <option value="47">Cocos (Keeling) Islands</option>
                                                                    <option value="48">Colombia</option>
                                                                    <option value="49">Comoros</option>
                                                                    <option value="50">Congo (Brazzaville)</option>
                                                                    <option value="51">Cook Islands</option>
                                                                    <option value="52">Costa Rica</option>
                                                                    <option value="53">Cote d'Ivoire (Ivory Coast)</option>
                                                                    <option value="54">Croatia</option>
                                                                    <option value="55">Cuba</option>
                                                                    <option value="56">Cyprus</option>
                                                                    <option value="57">Czech Republic</option>
                                                                    <option value="58">Denmark</option>
                                                                    <option value="59">Djibouti</option>
                                                                    <option value="60">Dominica</option>
                                                                    <option value="61">Dominican Republic</option>
                                                                    <option value="62">Ecuador</option>
                                                                    <option value="63">Egypt</option>
                                                                    <option value="64">El Salvador</option>
                                                                    <option value="65">Equatorial Guinea</option>
                                                                    <option value="66">Eritrea</option>
                                                                    <option value="67">Estonia</option>
                                                                    <option value="68">Ethiopia</option>
                                                                    <option value="69">Falkland Islands (Malvinas)</option>
                                                                    <option value="70">Faroe Islands</option>
                                                                    <option value="71">Fiji</option>
                                                                    <option value="72">Finland</option>
                                                                    <option value="73">France</option>
                                                                    <option value="74">French Guiana</option>
                                                                    <option value="75">French Polynesia</option>
                                                                    <option value="76">French Southern Territories</option>
                                                                    <option value="77">Gabon</option>
                                                                    <option value="78">Gambia</option>
                                                                    <option value="79">Georgia</option>
                                                                    <option value="80">Germany</option>
                                                                    <option value="81">Ghana</option>
                                                                    <option value="82">Gibraltar</option>
                                                                    <option value="83">Greece</option>
                                                                    <option value="84">Greenland</option>
                                                                    <option value="85">Grenada</option>
                                                                    <option value="86">Guadeloupe</option>
                                                                    <option value="87">Guam</option>
                                                                    <option value="88">Guatemala</option>
                                                                    <option value="89">Guernsey</option>
                                                                    <option value="90">Guinea</option>
                                                                    <option value="91">Guinea-Bissau</option>
                                                                    <option value="92">Guyana</option>
                                                                    <option value="93">Haiti</option>
                                                                    <option value="94">Heard Island and McDonald Islands</option>
                                                                    <option value="95">Holy See (Vatican City State)</option>
                                                                    <option value="96">Honduras</option>
                                                                    <option value="97">Hong Kong</option>
                                                                    <option value="98">Hungary</option>
                                                                    <option value="99">Iceland</option>
                                                                    <option value="100">India</option>
                                                                    <option value="101">Indonesia</option>
                                                                    <option value="102">Iran</option>
                                                                    <option value="103">Iraq</option>
                                                                    <option value="104">Ireland</option>
                                                                    <option value="105">Isle of Man</option>
                                                                    <option value="106">Israel</option>
                                                                    <option value="107">Italy</option>
                                                                    <option value="108">Jamaica</option>
                                                                    <option value="109">Japan</option>
                                                                    <option value="110">Jersey</option>
                                                                    <option value="111">Jordan</option>
                                                                    <option value="112">Kazakhstan</option>
                                                                    <option value="113">Kenya</option>
                                                                    <option value="114">Kiribati</option>
                                                                    <option value="115">Korea</option>
                                                                    <option value="116">Kuwait</option>
                                                                    <option value="117">Kyrgyzstan</option>
                                                                    <option value="118">Lao People's Democratic Republic</option>
                                                                    <option value="119">Latvia</option>
                                                                    <option value="120">Lebanon</option>
                                                                    <option value="121">Lesotho</option>
                                                                    <option value="122">Liberia</option>
                                                                    <option value="123">Libyan Arab Jamahiriya</option>
                                                                    <option value="124">Liechtenstein</option>
                                                                    <option value="125">Lithuania</option>
                                                                    <option value="126">Luxembourg</option>
                                                                    <option value="127">Macao</option>
                                                                    <option value="128">Macedonia</option>
                                                                    <option value="129">Madagascar</option>
                                                                    <option value="130">Malawi</option>
                                                                    <option value="131">Malaysia</option>
                                                                    <option value="132">Maldives</option>
                                                                    <option value="133">Mali</option>
                                                                    <option value="134">Malta</option>
                                                                    <option value="135">Marshall Islands</option>
                                                                    <option value="136">Martinique</option>
                                                                    <option value="137">Mauritania</option>
                                                                    <option value="138">Mauritius</option>
                                                                    <option value="139">Mayotte</option>
                                                                    <option value="140">Mexico</option>
                                                                    <option value="141">Micronesia</option>
                                                                    <option value="142">Moldova</option>
                                                                    <option value="143">Monaco</option>
                                                                    <option value="144">Mongolia</option>
                                                                    <option value="145">Montenegro</option>
                                                                    <option value="146">Montserrat</option>
                                                                    <option value="147">Morocco</option>
                                                                    <option value="148">Mozambique</option>
                                                                    <option value="149">Myanmar</option>
                                                                    <option value="150">Namibia</option>
                                                                    <option value="151">Nauru</option>
                                                                    <option value="152">Nepal</option>
                                                                    <option value="153">Netherlands</option>
                                                                    <option value="154">Netherlands Antilles</option>
                                                                    <option value="155">New Caledonia</option>
                                                                    <option value="156">New Zealand</option>
                                                                    <option value="157">Nicaragua</option>
                                                                    <option value="158">Niger</option>
                                                                    <option value="159">Nigeria</option>
                                                                    <option value="160">Niue</option>
                                                                    <option value="161">Norfolk Island</option>
                                                                    <option value="162">Northern Mariana Islands</option>
                                                                    <option value="163">Norway</option>
                                                                    <option value="164">Oman</option>
                                                                    <option value="165">Pakistan</option>
                                                                    <option value="166">Palau</option>
                                                                    <option value="167">Palestinian Territory</option>
                                                                    <option value="168">Panama</option>
                                                                    <option value="169">Papua New Guinea</option>
                                                                    <option value="170">Paraguay</option>
                                                                    <option value="171">People's Republic of Korea</option>
                                                                    <option value="172">Peru</option>
                                                                    <option value="173">Philippines</option>
                                                                    <option value="174">Pitcairn</option>
                                                                    <option value="175">Poland</option>
                                                                    <option value="176">Portugal</option>
                                                                    <option value="177">Puerto Rico</option>
                                                                    <option value="178">Qatar</option>
                                                                    <option value="179">Republic Democratic of Congo</option>
                                                                    <option value="180">Reunion</option>
                                                                    <option value="181">Romania</option>
                                                                    <option value="182">Russian Federation</option>
                                                                    <option value="183">Rwanda</option>
                                                                    <option value="184">Saint Helena</option>
                                                                    <option value="185">Saint Kitts and Nevis</option>
                                                                    <option value="186">Saint Lucia</option>
                                                                    <option value="187">Saint Martin</option>
                                                                    <option value="188">Saint Pierre and Miquelon</option>
                                                                    <option value="189">Saint Vincent and the Grenadines</option>
                                                                    <option value="190">Samoa</option>
                                                                    <option value="191">San Marino</option>
                                                                    <option value="192">Sao Tome and Principe</option>
                                                                    <option value="193">Saudi Arabia</option>
                                                                    <option value="194">Senegal</option>
                                                                    <option value="195">Serbia</option>
                                                                    <option value="196">Seychelles</option>
                                                                    <option value="197">Sierra Leone</option>
                                                                    <option value="198">Singapore</option>
                                                                    <option value="199">Slovakia</option>
                                                                    <option value="200">Slovenia</option>
                                                                    <option value="201">Solomon Islands</option>
                                                                    <option value="202">Somalia</option>
                                                                    <option value="203">South Africa</option>
                                                                    <option value="204">South Georgia and the South Sandwich Islands</option>
                                                                    <option value="205">Spain</option>
                                                                    <option value="206">Sri Lanka</option>
                                                                    <option value="207">Sudan</option>
                                                                    <option value="208">Suriname</option>
                                                                    <option value="209">Svalbard and Jan Mayen</option>
                                                                    <option value="210">Swaziland</option>
                                                                    <option value="211">Sweden</option>
                                                                    <option value="212">Switzerland</option>
                                                                    <option value="213">Syrian Arab Republic</option>
                                                                    <option value="214">Taiwan</option>
                                                                    <option value="215">Tajikistan</option>
                                                                    <option value="216">Tanzania</option>
                                                                    <option value="217">Thailand</option>
                                                                    <option value="218">Timor-Leste</option>
                                                                    <option value="219">Togo</option>
                                                                    <option value="220">Tokelau</option>
                                                                    <option value="221">Tonga</option>
                                                                    <option value="222">Trinidad and Tobago</option>
                                                                    <option value="223">Tunisia</option>
                                                                    <option value="224">Turkey</option>
                                                                    <option value="225">Turkmenistan</option>
                                                                    <option value="226">Turks and Caicos Islands</option>
                                                                    <option value="227">Tuvalu</option>
                                                                    <option value="228">Uganda</option>
                                                                    <option value="229">Ukraine</option>
                                                                    <option value="230">United Arab Emirates</option>
                                                                    <option value="231">United Kingdom</option>
                                                                    <option value="232">United States</option>
                                                                    <option value="233">United States Minor Outlying Islands</option>
                                                                    <option value="234">Uruguay</option>
                                                                    <option value="235">Uzbekistan</option>
                                                                    <option value="236">Vanuatu</option>
                                                                    <option value="237">Venezuela</option>
                                                                    <option value="238">Viet Nam</option>
                                                                    <option value="239">Virgin Islands</option>
                                                                    <option value="240">Virgin Islands</option>
                                                                    <option value="241">Wallis and Futuna</option>
                                                                    <option value="242">Western Sahara</option>
                                                                    <option value="243">Yemen</option>
                                                                    <option value="244">Zambia</option>
                                                                    <option value="245">Zimbabwe</option>
                                                                </select><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_country || (invalidCountry &amp;&amp; isSubmitFrom) || traveller_error.guest_country">Invalid country</label></div>
                                                        </div><!-- ngIf: form.data.hotel_info.includeAddressQuestion==1 --><!-- ngIf: form.data.hotel_info.includeAddressQuestion==1 --><label class="ng-binding">Additional comments <small class="ng-binding">(optional)</small></label>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-12 bws-medium-12 bws-small-12"><textarea class="txtarea_checkout ng-pristine ng-valid" name="guest_comment" id="guest_comment" ng-model="form.data.guest.guest_comment"></textarea></div>
                                                        </div><!-- ngRepeat: question in form.data.list_question -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                            <!-- <div id="dlg_error_pg" class="reveal-modal small ng-scope" data-reveal="" ng-init="showErrorPG()">
                                <div id="hbe-popout">
                                    <div class="title">
                                        <div class="columns large-12 ng-binding">Error</div>
                                    </div>
                                    <div class="content">
                                        <div class="columns large-12">
                                            <div class="clearfix"><span id="content_notify"></span></div>
                                        </div>
                                    </div>
                                    <div class="title" style="text-align: right;background-color: #eeeeee">
                                        <div class="columns large-12"><a class="bws-button ng-binding" ng-click="closeDialog('dlg_error_pg')">Close</a></div>
                                    </div>
                                </div>
                            </div>
                            <div id="confirm_check_phone" class="reveal-modal small ng-scope" data-reveal="">
                                <div id="hbe-popout">
                                    <div class="title">
                                        <div class="columns large-12 ng-binding">Confirmation</div>
                                    </div>
                                    <div class="content">
                                        <div class="columns large-12">
                                            <div class="clearfix"><span id="message_confirm_phone"></span></div>
                                        </div>
                                    </div>
                                    <div class="title" style="text-align: right; background-color: #eeeeee">
                                        <div class="columns large-12"><a class="bws-button btn-close ng-binding" ng-click="closeDialog('confirm_check_phone')">Close </a><a class="bws-button ng-binding" style="margin-left: 10px" ng-click="ignoreCheckPhone()">Yes</a></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div id="form_submit_payment_online"></div>
                    <input type="hidden" id="lang_current" value="en">
                </div>
                <!--<div id="geo-trust-hide" style="display: none">
                <script type="text/javascript" src="https://seal.geotrust.com/getgeotrustsslseal?host_name=book.securebookings.net&amp;size=M&amp;lang=en"></script>
            </div>-->
            </section>
            <!-- <div id="dlg_notify" class="reveal-modal small" data-reveal="" data-options="close_on_background_click:false">
                <div id="hbe-popout">
                    <div class="title">
                        <div class="columns large-12">Alert</div>
                    </div>
                    <div class="content">
                        <div class="columns large-12">
                            <div class="clearfix">
                                <span id="content_notify"></span>
                            </div>
                        </div>
                    </div>
                    <div class="title" style="text-align: right;background-color: #eeeeee">
                        <div class="columns large-12">
                            <a class="bws-button ng-binding" href="javascript:;" onclick="history.go(-1);">
                                Back </a>
                        </div>
                    </div>

                </div>
            </div>
            <div id="dlg_notify_close" class="reveal-modal small" data-reveal="" data-options="close_on_background_click:false">
                <div id="hbe-popout">
                    <div class="title">
                        <div class="columns large-12">Alert</div>
                    </div>
                    <div class="content">
                        <div class="columns large-12">
                            <div class="clearfix">
                                <span class="content_notify"></span>
                            </div>
                        </div>
                    </div>
                    <div class="title" style="text-align: right;background-color: #eeeeee">
                        <div class="columns large-12">
                            <a class="bws-button ng-binding" onclick="closeDialog('dlg_notify_close')">
                                Close </a>
                        </div>
                    </div>

                </div>
            </div>
            <div id="dlg_notify_exception" class="reveal-modal small" data-reveal="" data-options="close_on_background_click:false">
                <div id="hbe-popout">
                    <div class="title">
                        <div class="columns large-12">Alert</div>
                    </div>
                    <div class="content">
                        <div class="columns large-12">
                            <div class="clearfix">
                                <span class="content_notify"></span>
                            </div>
                        </div>
                    </div>
                    <div class="title" style="text-align: right;background-color: #eeeeee">
                        <div class="columns large-12">
                            <a class="bws-button ng-binding close-button_dlg">
                                Close </a>
                        </div>
                    </div>

                </div>
            </div> -->
            <!--<script src="https://pay.sandbox.datatrans.com/upp/payment/js/secure-fields-2.0.0.js"></script>
            <script>
                var secureFields = new SecureFields();
            </script>-->
            <style>
                /* The following styles are NOT required */
                html,
                body {
                    font-family: Arial, Helvetica, sans-serif;
                }

                label {
                    font-weight: bold;
                    font-size: 0.9rem;
                    line-height: 1.5rem;
                }

                button {
                    border: none;
                    background-color: #06bd6e;
                    color: white;
                    padding: 7px 12px;
                    font-size: 1rem;
                    cursor: pointer;
                }
            </style>
        </section>
    </div>
</body>

</html>