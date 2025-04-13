<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- all plugins here -->
<script src="/assets/js/vendor.js?v=<?=VERSION?>"></script>
<!-- main js  -->
<script src="/assets/js/main.js?v=<?=VERSION?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        function delayReload(delayInMilliseconds) {
            setTimeout(() => {
                location.reload();
            }, delayInMilliseconds);
        }

        $("button#nl-submit").click(function (e) {
            e.preventDefault();
            let logRoot = $("#nl");
            let err = 0;

            let nl_email = logRoot.find("input#side_subscribe_email").val();

            if (nl_email === "") {
                err = 1;
                logRoot.find("input#side_subscribe_email").addClass("is-invalid");
            } else {
                logRoot.find("input#side_subscribe_email").removeClass("is-invalid");
            }

            if (err === 0) {
                let data = "e=" + nl_email;
                $.ajax({
                    url: "/bin/newsletter.php",
                    type: "POST",
                    data: data,
                    success: function (data) {
                        if (data === "1") {
                            logRoot.find("input#side_subscribe_email").val("");
                            logRoot.find("input#side_subscribe_email").parent().append("Successfully subscribed!");
                            delayReload(3000);
                        } else if (data === "0") {
                            logRoot.find("input#side_subscribe_email").parent().append("Error! Please check your data.");
                        } else if (data === "-1") {
                            logRoot.find("input#side_subscribe_email").parent().append("Please check the email entered.");
                        } else if (data === "2") {
                            logRoot.find("input#side_subscribe_email").parent().append("You already subscribed! Thank you.");
                            delayReload(3000);
                        } else {
                            logRoot.find("input#side_subscribe_email").parent().append("Notice! "+data);
                        }
                    }
                });
            } else {
                console.log("Oops - please verify your information");
            }


        });

    });
</script>