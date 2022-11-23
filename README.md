## Codeigniter 3 İle Beni Hatırla Uygulaması

Bu Uygulamada Codeigniter Framework' ü Kullanılarak Beni Hatırla Uygulaması Yapıldı. Kodları ve Veritabanını Tamamen Alarak Uygulamayı Aktif Olarak Çalıştırabilir veya Aşağıdaki Dosya Yollarındaki Kod Bloklarını Alarak Projenize Dahil Edebilirsiniz.

![This is an image](https://github.com/sfylmz/ci3-beni-hatirla/blob/master/beni-hatirla.gif)

### Cookie Helper Tanımı Klasör Yolu
<ul>
  <li>application
    <ul>
      <li>config
        <ul>
          <li>autoload.php</li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

Orjinal Kod;
```
$autoload['helper'] = array();
```
Düzenlenmiş Kod;
```
$autoload['helper'] = array('cookie');
```

### Cookie Controllers Tanımı Klasör Yolu
<ul>
  <li>application
    <ul>
      <li>controllers
        <ul>
          <li>user_operations.php</li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

Eklenecek Satırlar;
```
  if ($this->input->post("remember_me") == "on"){
      $remember_me = array(
          "email"      =>  $this->input->post("user_email"),
          "password"   =>  $this->input->post("user_password"),
      );

      set_cookie("remember_me", json_encode($remember_me), time() + 60 * 60 * 24 * 30);
  } else {
      delete_cookie("remember_me");
  }
```

### Cookie Views Tanımı Klasör Yolu
<ul>
  <li>application
    <ul>
      <li>views
        <ul>
          <li>users_v
            <ul>
              <li>login
                <ul>
                  <li>content.php
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

Eklenecek Satırlar;
```
  <?
  $remember_me    = get_cookie("remember_me");
  if ($remember_me)
  {
      $member     = json_decode($remember_me);
  }
  ?>
  
  <input value="<?= isset($member) ? $member->email : ""; ?>">
  <input value="<?= isset($member) ? $member->password : ""; ?>">
  
  <input <?= isset($member) ? "checked" : ""; ?> type="checkbox" id="remember_me" name="remember_me"/>
```

### Demo

> Demo      : [Görmek İçin Tıklayın](https://github.com/sfylmz/ci3-beni-hatirla/blob/master/beni-hatirla.gif).

### Veritabanı Bilgileri

> E-Posta   : admin@admin.com

> Parola    : Admin123!
