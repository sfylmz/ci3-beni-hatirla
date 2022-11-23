<script>
    (function ($) {
        $.extend({
            playSound: function () {
                return $(
                    '<audio class="sound-player" autoplay="autoplay" style="display:none;">'
                    + '<source src="' + arguments[0] + '" />'
                    + '<embed src="' + arguments[0] + '" hidden="true" autostart="true" loop="false"/>'
                    + '</audio>'
                ).appendTo('body');
            },
            stopSound: function () {
                $(".sound-player").remove();
            }
        });
    })(jQuery);



</script>

    <? $alert = $this->session->userdata('alert');
    if ($alert) {
        if ($alert["type"] === "success") { ?>
            <script>
                Swal.fire({
                    position: 'bottom-center',
                    icon: 'success',
                    title: "<h4 class='bold'><?= $alert["title"]; ?></h4>",
                    html: "<h5><?= $alert["text"]; ?></h5>",
                    showConfirmButton: true,
                    confirmButtonText: "<i class='zmdi zmdi-check mr-2'></i>Tamam",
                    confirmButtonColor: "#a5dc86"
                })
                $.playSound("https://cdn.systeknoloji.com/notifications/bell-101.wav");
            </script>
        <? } else { ?>
            <script>
                Swal.fire({
                    position: 'bottom-center',
                    icon: 'error',
                    title: "<h4 class='bold'><?= $alert["title"]; ?></h4>",
                    html: "<h5><?= $alert["text"]; ?></h5>",
                    showConfirmButton: true,
                    confirmButtonText: "<i class='zmdi zmdi-close mr-2'></i>Tekrar Deneyin",
                    confirmButtonColor: "#f27474"
                })
                $.playSound("https://cdn.systeknoloji.com/notifications/bell-101.wav");
            </script>
        <? } ?>
    <? } ?>