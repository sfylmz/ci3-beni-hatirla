<!DOCTYPE html>
<html lang="tr">
<head>
    <? $this->load->view('inc/head'); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
    <? $this->load->view('inc/navbar'); ?>
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
    <? $this->load->view('inc/aside'); ?>
</aside>
<!--========== END app aside -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <? $this->load->view("{$vFolder}/{$sFolder}/content"); ?>

    <!-- APP FOOTER -->
    <? $this->load->view('inc/footer'); ?>
    <!-- /#app-footer -->
</main>
<!--========== END app main -->

<? $this->load->view('inc/inc_script'); ?>

</body>
</html>