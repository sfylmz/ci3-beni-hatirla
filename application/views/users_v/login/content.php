<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?= base_url(""); ?>">
            <span><i class="fa fa-gg"></i></span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">Yönetim Paneli Girişi</h4>


        <!--   /* ***** Remember Me : Begin ***** */   -->
        <?
        $remember_me    = get_cookie("remember_me");
        if ($remember_me)
        {
            $member     = json_decode($remember_me);
        }
        ?>
        <!--   /* ***** Remember Me : End ***** */   -->

        <form action="<?= base_url("user_operations/do_login"); ?>" method="post">

            <div class="form-group">
                <!--   /* ***** Remember Me : Begin ***** */   -->
                <input name="user_email" id="sign-in-email" type="email" class="form-control" placeholder="E-Posta Adresi" value="<?= isset($member) ? $member->email : ""; ?>">
                <!--   /* ***** Remember Me : End ***** */   -->
                <? if (isset($form_error)){ ?>
                    <small class="input-form-error"><?= form_error('user_email'); ?></small>
                <? } ?>
            </div>

            <div class="form-group">
                <!--   /* ***** Remember Me : Begin ***** */   -->
                <input name="user_password" id="sign-in-password" type="password" class="form-control" placeholder="Şifre" value="<?= isset($member) ? $member->password : ""; ?>">
                <!--   /* ***** Remember Me : End ***** */   -->
                <? if (isset($form_error)){ ?>
                    <small class="input-form-error"><?= form_error('user_password'); ?></small>
                <? } ?>
            </div>

            <div class="form-group m-b-xl">
                <div class="checkbox checkbox-primary">
                    <!--   /* ***** Remember Me : Begin ***** */   -->
                    <input <?= isset($member) ? "checked" : ""; ?> type="checkbox" id="remember_me" name="remember_me"/>
                    <!--   /* ***** Remember Me : End ***** */   -->
                    <label for="remember_me">Beni Hatırla</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div><!-- #login-form -->

</div><!-- .simple-page-wrap -->