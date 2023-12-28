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
    <script>
                        function validateForm() {
                            var isValid = true;

                            // Validation for each input field
                            isValid = validateField('firstname') && isValid;
                            isValid = validateField('lastname') && isValid;
                            isValid = validatePhone() && isValid;
                            isValid = validateField('email') && isValid;
                            isValid = validateField('numberofguest') && isValid;

                            return isValid;
                        }

                        function validateField(fieldName) {
                            var field = document.getElementById(fieldName);
                            var fieldValue = field.value.trim();
                            var errorElement = document.getElementById(fieldName + '-error');

                            // Example validation: Check if the field is not empty
                            if (fieldValue === '') {
                                errorElement.innerHTML = 'This field is required';
                                return false;
                            } else {
                                errorElement.innerHTML = ''; // Clear previous error message
                                return true;
                            }
                        }

                        function validatePhone() {
                            var phoneField = document.getElementById('phone');
                            var phoneValue = phoneField.value.trim();
                            var phoneErrorElement = document.getElementById('phone-error');

                            // Example validation: Check if the phone number is in a valid format
                            var phoneRegex = /^[0-9]{10}$/; // Assuming a 10-digit phone number
                            if (!phoneRegex.test(phoneValue)) {
                                phoneErrorElement.innerHTML = 'Invalid phone number format';
                                return false;
                            } else {
                                phoneErrorElement.innerHTML = ''; // Clear previous error message
                                return true;
                            }
                        }

                        // Add blur event listeners for each input field
                        document.getElementById('firstname').addEventListener('blur', function() {
                            validateField('firstname');
                        });

                        document.getElementById('lastname').addEventListener('blur', function() {
                            validateField('lastname');
                        });

                        document.getElementById('phone').addEventListener('blur', function() {
                            validatePhone();
                        });

                        document.getElementById('email').addEventListener('blur', function() {
                            validateField('email');
                        });

                        document.getElementById('numberofguest').addEventListener('blur', function() {
                            validateField('numberofguest');
                        });
                    </script>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                                    <div class="bws-panel" ng-init="registryTooltip();"><label class="marb6 ng-binding"><b class="ng-binding">Check-in:</b> Tuesday, December 29, 2023 from 14:00</label><label class="ng-binding"><b class="ng-binding">Check-out:</b> Wednesday, December 30, 2023 until 12:00</label><label class="mart8 marb0"><a class="bws-font11 ng-binding" ng-click="backToRooomPage()">(Travelling on different dates?)</a></label></div>
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
                                            <form action="../controllers/BookingController.php" method="POST">
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
                                                            <div class="bws-column bws-large-4 bws-medium-4 bws-small-12 text-field" id="firstname"><label class="ng-binding">First name<span> *</span></label><input type="text" name="guest_first_name" id="guest_first_name" maxlength="100" ng-blur="checkRequireField('guest_first_name');traveller_change_info()" required="" ng-model="form.data.guest.guest_first_name" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_first_name || (checkout.guest_first_name.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_first_name"></label></div>
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12" id="lastname"><label class="ng-binding">Last name<span> *</span></label><input type="text" name="guest_last_name" required="" id="guest_last_name" maxlength="100" ng-model="form.data.guest.guest_last_name" ng-blur="checkRequireField('guest_last_name');traveller_change_info()" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_last_name || (checkout.guest_last_name.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_last_name"></label></div>
                                                        </div>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12 text-field" id="email"><label class="ng-binding">Email<span> *</span></label><input type="text" name="guest_email" id="guest_email" required="" ng-model="form.data.guest.guest_email" ng-blur="checkRequireField('guest_email');traveller_change_info()" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_email || (checkout.guest_email.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_email"></label></div>
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12"><label class="ng-binding">Retype email<span> *</span></label><input type="text" name="guest_confirm" id="guest_confirm" required="" ng-model="form.data.guest.guest_confirm" ng-blur="checkRequireField('guest_confirm')" class="ng-pristine ng-invalid ng-invalid-required"><label class="error ng-binding ng-hide" style="color:red" ng-show="form.errors.guest_confirm || (checkout.guest_confirm.$error.required &amp;&amp; isSubmitFrom) || traveller_error.guest_confirm"></label></div>
                                                        </div>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-6 bws-medium-6 bws-small-12 text-field" id="phone"><label class="ng-binding">Contact phone<span ng-show="form.data.hotel_info.CollectGuestPhone == 1" class=""> *</span><small ng-show="form.data.hotel_info.CollectGuestPhone == 0" class="ng-binding ng-hide"> (optional)</small></label>
                                                                <div class="iti iti--allow-dropdown iti--show-flags">
                                                                    <div class="iti__flag-container">
                                                                    </div><input name="guest_phone" id="guest_phone" class="phoneInt ng-pristine ng-valid" ng-blur="updatePhone();traveller_change_info()" type="tel" ng-change="resetCheckPhone()" ng-model="form.data.guest.guest_phone" autocomplete="off" placeholder="+1 201-555-5555" data-intl-tel-input-id="0">
                                                                </div><label class="error ng-binding ng-hide" style="color:red" ng-show="requiredPhone"></label><label class="error ng-binding ng-hide" style="color:red" ng-show="invalidPhone"></label>
                                                            </div>
                                                        </div><!-- ngIf: form.data.hotel_info.includeAddressQuestion==1 --><!-- ngIf: form.data.hotel_info.includeAddressQuestion==1 --><label class="ng-binding">Additional comments <small class="ng-binding">(optional)</small></label>
                                                        <div class="bws-row">
                                                            <div class="bws-column bws-large-12 bws-medium-12 bws-small-12"><textarea class="txtarea_checkout ng-pristine ng-valid" name="guest_comment" id="guest_comment" ng-model="form.data.guest.guest_comment"></textarea></div>
                                                        </div><!-- ngRepeat: question in form.data.list_question -->
                                                        <button type="button" id="btnSubmit">Confirm and book</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
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
                    margin-top:50px;
                    height:100px;
                    border: none;
                    background-color: #a71218;
                    color: white;
                    padding: 7px 12px;
                    font-size: 2rem;
                    cursor: pointer;
                }
            </style>
        </section>
    </div>
</body>

</html>