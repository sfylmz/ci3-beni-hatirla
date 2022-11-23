<? $currentUser = getActiveUser(); ?>
<!-- app-user -->
<div class="app-user">
    <div class="media">
        <div class="media-left">
            <div class="avatar avatar-md avatar-circle">
                <a href="javascript:void(0)"><i class="zmdi zmdi-account-circle mr-2 zmdi-hc-4x"></i> </a>
            </div><!-- .avatar -->
        </div>
        <div class="media-body">
            <div class="foldable">
                <h5><a href="javascript:void(0)" class="username"><?= $currentUser->full_name; ?></a></h5>
                <ul>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <small>System Engineer</small>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li>
                                <a class="text-color" href="<?= base_url(""); ?>">
                                    <span class="m-r-xs"><i class="zmdi zmdi-email-open"></i></span>
                                    <span>Mesajlar</span>
                                </a>
                            </li>
                            <li>
                                <a class="text-color" href="<?= base_url(""); ?>">
                                    <span class="m-r-xs"><i class="zmdi zmdi-accounts-list"></i></span>
                                    <span>Profilim</span>
                                </a>
                            </li>
                            <li>
                                <a class="text-color" href="<?= base_url(""); ?>">
                                    <span class="m-r-xs"><i class="zmdi zmdi-settings"></i></span>
                                    <span>Ayarlarım</span>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a class="text-color" href="<?= base_url(""); ?>">
                                    <span class="m-r-xs"><i class="zmdi zmdi-lock-outline"></i></span>
                                    <span>Kilitle</span>
                                </a>
                            </li>
                            <li>
                                <a class="text-color" href="<?= base_url("oturum-kapat"); ?>">
                                    <span class="m-r-xs"><i class="zmdi zmdi-power-setting"></i></span>
                                    <span>Oturumu Kapat</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- .media-body -->
    </div>
    <!-- .media -->
</div>
<!-- .app-user -->

<div class="menubar-scroll">
    <div class="menubar-scroll-inner">
        <ul class="app-menu">

        </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
</div><!-- .menubar-scroll -->