<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_operations extends CI_Controller {

    public $vFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->vFolder = "users_v";
        $this->load->model('user_model');
    }

    public function login()
    {
        if (activeUser())
        {
            redirect(base_url(""));
        }
        $vData = new stdClass();

        $vData->breadcrumb  = "Yönetim Paneli";
        $vData->pageDesc    = "";
        $vData->pageKeys    = "";
        $vData->vFolder     = $this->vFolder;
        $vData->sFolder     = "login";

        $this->load->view("{$vData->vFolder}/{$vData->sFolder}/index", $vData);
    }

    public function do_login()
    {
        if (activeUser())
        {
            redirect(base_url(""));
        }
        $this->form_validation->set_rules('user_email', 'E-Posta Adresi', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Şifre', 'required|trim');

        $this->form_validation->set_message(
            array(
                'required'      => '<strong>{field}</strong> Alanı Boş Olamaz',
                'valid_email'   => '<strong>{field}</strong> Geçerli Değil',
            )
        );

        $formValid = $this->form_validation->run();
        if ($formValid)
        {
            $user   = $this->user_model->getData(
                array(
                    "email"     => $this->input->post('user_email'),
                    "password"  => chiperEncode($this->input->post('user_password')),
                )
            );
            if ($user)
            {
                if ($user->isActive == 1)
                {

                    $this->session->set_userdata("user", $user);

                    $this->user_model->updateData(
                        array(
                            "id"    => $user->id
                        ),
                        array
                        (
                            'login_status'  => 1,
                        )
                    );

                    $alert = array(
                        "title"     => "İşlem Başarılıdır",
                        "text"      => "Sayın $user->full_name Hoşgeldiniz.",
                        "type"      => "success"
                    );

                    /* ***** Remember Me : Begin ***** */
                    if ($this->input->post("remember_me") == "on"){
                        $remember_me = array(
                            "email"      =>  $this->input->post("user_email"),
                            "password"   =>  $this->input->post("user_password"),
                        );

                        set_cookie("remember_me", json_encode($remember_me), time() + 60 * 60 * 24 * 30);
                    } else {
                        delete_cookie("remember_me");
                    }
                    /* ***** Remember Me : End ***** */

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("user_operations/profile/$user->id"));
                } else {
                    $alert = array(
                        "title"     => "İşlem Başarısız",
                        "text"      => "Kullanıcı Bilgileriniz Pasif",
                        "type"      => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("oturum-ac"));
                }
            } else {
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"      => "E-Posta Adresi veya Şifre Hatalı, Bilgilerinizi Kontrol Ederek Tekrar Deneyin",
                    "type"      => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("oturum-ac"));
            }
        } else {
            $vData = new stdClass();

            $vData->breadcrumb  = "Yönetim Paneli";
            $vData->vFolder     = $this->vFolder;
            $vData->sFolder     = "login";
            $vData->form_error  = true;

            $this->load->view("{$vData->vFolder}/{$vData->sFolder}/index", $vData);
        }
    }

    public function logout()
    {
        $user           = activeUser();
        $updateStatus   = $this->user_model->updateData(array("id"    => $user->id), array('login_status'  => 0));
        if ($updateStatus)
        {
            $this->session->unset_userdata("user");
            redirect(base_url("oturum-ac"));
        } else {
            redirect(base_url(""));
        }
    }

    public function profile($id)
    {
        $vData = new stdClass();

        $vData->breadcrumb  = "Profilim";
        $vData->pageDesc    = "";
        $vData->pageKeys    = "";
        $vData->vFolder     = $this->vFolder;
        $vData->sFolder     = "profile";
        $vData->item        = $this->user_model->getData(array('id' => $id));

        $this->load->view("{$vData->vFolder}/{$vData->sFolder}/index", $vData);
    }

}
