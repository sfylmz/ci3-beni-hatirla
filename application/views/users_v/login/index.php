<!DOCTYPE html>
<html lang="tr">
<head>
    <? $this->load->view('inc/head'); ?>
    <? $this->load->view("{$vFolder}/{$sFolder}/page_style"); ?>
</head>

<body class="simple-page" style="background-image: url(<?= base_url("assets/images/backgrounds/1.jpg")?>);">
<!--============= start main area -->

<!-- APP MAIN ==========-->
    <? $this->load->view("{$vFolder}/{$sFolder}/content"); ?>
<!--========== END app main -->

<? $this->load->view('inc/inc_script'); ?>
</body>
</html>