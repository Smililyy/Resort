<footer class="footer-wrapper">
    <div class="footer-container">
        <div class="footer-widget-bar">
            <div class="container">
                <div class="footer-content">
                    <div class="widget">
                        <h4 class="heading-font">Sign Up For Special Offers</h4>
                        <div class="textwidget">
                            <div role="form" class="wpcf7" id="wpcf7-f2063-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <form action="/#wpcf7-f2063-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="2063">
                                        <input type="hidden" name="_wpcf7_version" value="5.1.7">
                                        <input type="hidden" name="_wpcf7_locale" value="vi">
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f2063-o1">
                                        <input type="hidden" name="_wpcf7_container_post" value="0">
                                    </div>
                                    <p>
                                        <span class="email-input-wrapper">
                                            <input type="email" name="your-email" value="" size="40" class="email-input" placeholder="Enter your email">
                                            <input type="submit" value="Send" class="email-submit">
                                        </span>
                                        <span class="ajax-loader"></span>
                                    </p>
                                    <input type="hidden" class="wpcf7-pum" value="{&quot;closepopup&quot;:false,&quot;closedelay&quot;:0,&quot;openpopup&quot;:false,&quot;openpopup_id&quot;:0}">
                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                </form>
                            </div>
                            <p class="ft-text" id="side_about"></p>
                            <p>FOLLOW OUR SOCIAL MEDIA CHANNELS</p>
                            <p><a target="_blank" rel="noopener noreferrer" id="fb"><img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" class="alignnone wp-image-3205 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" alt="" width="27" height="27" data-was-processed="true"><noscript><img class="alignnone wp-image-3205 size-full" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" alt="" width="27" height="27" /></noscript></a>&nbsp; &nbsp;<a id="tpv" target="_blank" rel="noopener noreferrer"><img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" class="alignnone wp-image-3204 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" alt="" width="30" height="30" data-was-processed="true"><noscript><img class="alignnone wp-image-3204 size-full" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" alt="" width="30" height="30" /></noscript></a></p>
                            <div class="ft-social">Website: <p class="ft-text" id="website"></p>
                            </div>
                            <div class="ft-social">Email: <p class="ft-text" id="email"> </p>
                            </div>
                            <div class="ft-social">Address: <p class="ft-text" id="address"></p>
                            </div>
                            <div class="ft-social">Hotline: <p id="pn1"></p>
                            </div>
                            <div class="ft-social">Tel: <p id="pn2"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <script>
        let general_data, contacts_data;

        function get_contacts() {
            let contacts_p_id = ['address', 'website', 'pn1', 'pn2', 'email', 'fb', 'tpv'];
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);
                for (let i = 0; i < contacts_p_id.length; i++) {
                    if (contacts_p_id[i] === "fb" || contacts_p_id[i] === "tpv") {
                        document.getElementById(contacts_p_id[i]).href = contacts_data[i + 1];
                    } else {
                        document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
                    }

                }
                contacts_inp(contacts_data);
            }
            xhr.send('get_contacts');
        }

        function contacts_inp(data) {
            let contacts_inp_id = ['address_inp', 'website_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'tpv_inp'];
            for (let i = 0; i < contacts_inp_id.length; i++) {
                document.getElementById(contacts_inp_id[i]).value = data[i + 1];

            }
        }

        function maintenanceAlert(type, msg) {
            let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
            let element = document.createElement('div');
            element.innerHTML = `
            <div class="custom-alert">
             <img id="img360" src="data:image/png;base64,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">
                <h1>Sorry we're down for maintenance.</h1>
                <h2>We'll be back shortly.</h2>
            </div>
               
            `;
            // <div class=" ${bs_class} custom-alert" role="alert">
            //         <strong> Sorry message</strong> 
            //     </div>
            document.querySelector(".layout-wrapper").appendChild(element);
        }

        function get_general() {
            let side_about = document.getElementById("side_about");
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                general_data = JSON.parse(this.responseText);
                side_about.innerText = general_data.side_about;
                if (general_data.shutdown == 1) {
                    maintenanceAlert('error', "No Changes made!");
                }
            }
            xhr.send('get_general');
        }
        window.onload = function() {
            get_contacts();
            get_general();
        }
    </script>
</footer>