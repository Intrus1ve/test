<?php
require_once 'header.php';

$slid=$baglanti->prepare("SELECT * FROM hero where id=:id");
$slid->execute(array(
        'id'=>1
));
$slidcek=$slid->fetch(PDO::FETCH_ASSOC);
?>

<?php
if (!empty($seocek['anasayfa_title'])) {?>

    <title><?php echo $seocek['anasayfa_title'] ?></title>


    <?php
}
?>

<?php
if (!empty($seocek['anasayfa_description'])) {?>

    <meta name="description" content="<?php echo $seocek['anasayfa_description'] ?>">


    <?php
}
?>


<?php
if (!empty($seocek['anasayfa_keyword'])) {?>

    <meta name="keywords" content="<?php echo $seocek['anasayfa_keyword'] ?>">


    <?php
}
?>

  <div class="cs-height_90 cs-height_lg_80"></div>

<!-- Start Hero -->
<section class="cs-hero cs-style4 cs-bg cs-center" data-src="assets/img/hero_bg4.jpeg">
    <div class="container-fluid">
      <div class="cs-hero_in">
        <div class="cs-hero_in_left">
          <div class="cs-hero_text">
            <h1 class="cs-hero_title cs-white_color">Localhost</h1>
            <div class="cs-hero_subtitle cs-medium cs-white_color">Uygun fiyatlı ve
                      kaliteli random
                      hesap dünyası</div>
            <div class="cs-hero_btns">
              <a href="https://localhosy/" class="cs-hero_btn cs-style1 cs-color3"><span>Mağazaya Git</span></a>
            </div>
          </div>
        </div>


      </div>
    </div>

          <?php
          $market=$baglanti->prepare("SELECT * FROM magaza where slider=:slider order by rand() limit 15");
          $market->execute(array(
		  'slider'=>1
		  ));
          $saytut=$market->rowCount();

          if ($saytut < 4) {

          }else{
          ?>
        <div class="cs-hero_in_right">
          <div class="cs-slider cs-style1">
            <div class="cs-slider_container" data-autoplay="1" data-loop="2" data-speed="300" data-center="1" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="3" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
              <div class="cs-slider_wrapper">
                  <?php
                  while ($marketcek=$market->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                <div class="cs-slide">
                  <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
                    <span class="cs-card_like cs-primary_color">
            <i class="fa fa-box-open"></i>
              <?php
              $dizi = explode (",",$marketcek['hesap']);
              echo count($dizi);
              ?>
          </span>
                      <a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>" class="cs-card_thumb cs-zoom_effect">
                          <img src="admin/resimler/magaza/<?php echo $marketcek['resim'] ?>" alt="Image" class="cs-zoom_item">
                      </a>
                      <div class="cs-card_info">
                          <?php
                          $kullanici=$baglanti->prepare("SELECT * FROM kullanici where id=:id");
                          $kullanici->execute(array(
                              'id'=>$marketcek['kid']
                          ));
                          $kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
                          ?>
                          <a  class="cs-avatar cs-white_bg">
                              <img src="admin/resimler/uyeler/logo/<?php echo $kullanicicek['resim'] ?>" alt="Avatar">
                              <span><?php echo $kullanicicek['ad']." ".$kullanicicek['soyad']; ?></span>
                          </a>
                          <h3 class="cs-card_title"><a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>"><?php echo $marketcek['baslik'] ?></a></h3>
                          <div class="cs-card_price">Güncel Fiyat: <b class="cs-primary_color"><?php echo $marketcek['fiyat'] ?></b></div>
                          <hr>
                          <div class="cs-card_footer">
                              <a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>"><span class="cs-card_btn_1" >
                <i class="fa fa-eye"></i>
                Ürüne Git
              </span></a>
                              <a href="odeme?id=<?php echo $marketcek['id'] ?>"><span class="cs-card_btn_2" ><span>Satın Al</span></span></a>
                          </div>
                    </div>
                  </div>
                </div><!-- .cs-slide -->

                      <?php
                  }
                      ?>

              </div>
            </div><!-- .cs-slider_container -->
            <div class="cs-slider_arrows cs-style1 cs-center cs-hidden_mobile">
              <div class="cs-left_arrow cs-center cs-box_shadow">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.0269 7.55957H0.817552" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.92188 1.45508L0.817222 7.55973L6.92188 13.6644" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="cs-right_arrow cs-center cs-box_shadow">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.816895 7.55957H13.0262" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.92188 1.45508L13.0265 7.55973L6.92188 13.6644" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>
            <div class="cs-pagination cs-style1 cs-hidden"></div>
          </div><!-- .cs-slider -->
        </div>

              <?php
          }
              ?>

      </div>
    </div>
  </section>
  <!-- End Hero -->




  <div class="cs-height_70 cs-height_lg_40"></div>

  <!-- Start New Items -->
  <section>
    <div class="container">
      <div class="cs-section_heading cs-style2">
        <div class="cs-section_left">
          <h2 class="cs-section_title">Mağaza</h2>
        </div>
        <div class="cs-section_right">
          <a href="magaza" class="cs-btn cs-style1"><span>Daha Fazla</span></a>
        </div>
      </div>

      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="cs-isotop cs-style1 cs-isotop_col_5 cs-has_gutter_30">
        <div class="cs-grid_sizer"></div>
          <?php
          $market=$baglanti->prepare("SELECT * FROM magaza order by id DESC limit 10");
          $market->execute();
          while ($marketcek=$market->fetch(PDO::FETCH_ASSOC)) {
              $kateg=$baglanti->prepare("SELECT * FROM kategori where id=:id");
              $kateg->execute(array(
                  'id'=>$marketcek['catid']
              ));
              $kategcek=$kateg->fetch(PDO::FETCH_ASSOC);
              ?>

              <div class="cs-isotop_item <?php echo $kategcek['id'] ?>">
                  <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
          <span class="cs-card_like cs-primary_color">
            <i class="fa fa-box-open"></i>
              <?php
              $dizi = explode (",",$marketcek['hesap']);
              echo count($dizi);
              ?>
          </span>
                      <a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>" class="cs-card_thumb cs-zoom_effect">
                          <img src="admin/resimler/magaza/<?php echo $marketcek['resim'] ?>" alt="Image" class="cs-zoom_item">
                      </a>
                      <div class="cs-card_info">
                          <?php
                          $kullanici=$baglanti->prepare("SELECT * FROM kullanici where id=:id");
                          $kullanici->execute(array(
                              'id'=>$marketcek['kid']
                          ));
                          $kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
                          ?>
                          <a  class="cs-avatar cs-white_bg">
                              <img src="admin/resimler/uyeler/logo/<?php echo $kullanicicek['resim'] ?>" alt="Avatar">
                              <span><?php echo $kullanicicek['ad']." ".$kullanicicek['soyad']; ?></span>
                          </a>
                          <h3 class="cs-card_title"><a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>"><?php echo $marketcek['baslik'] ?></a></h3>
                          <div class="cs-card_price">Güncel Fiyat: <b class="cs-primary_color"><?php echo $marketcek['fiyat'] ?></b></div>
                          <hr>
                          <div class="cs-card_footer">
                              <a href="urun-detay-<?=seolink($marketcek['baslik']).'-'.$marketcek['id'] ?>"><span class="cs-card_btn_1" >
                <i class="fa fa-eye"></i>
                Ürüne Git
              </span></a>
                              <a href="odeme?id=<?php echo $marketcek['id'] ?>"><span class="cs-card_btn_2" ><span>Satın Al</span></span></a>
                          </div>
                      </div>
                  </div>
              </div><!-- .cs-isotop_item -->

              <?php
          }
          ?>
      </div>
    </div>
  </section>
  <!-- End New Items -->

  <div class="cs-height_95 cs-height_lg_70"></div>

  <!-- Start Category -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center">Kategori</h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="cs-slider cs-style1 cs-gap-30">
        <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="6">
          <div class="cs-slider_wrapper">
              <?php
              $cat=$baglanti->prepare("SELECT * FROM kategori order by id DESC");
              $cat->execute();
              while ($catcek=$cat->fetch(PDO::FETCH_ASSOC)) {
              ?>
            <div class="cs-slide">
              <a href="magaza?cat=<?php echo $catcek['id'] ?>" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="admin/resimler/kategori/<?php echo $catcek['resim'] ?>" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title"><?php echo $catcek['baslik'] ?></h3>
                  <div class="cs-card_subtitle">Tıkla ve Kategoride ki Ürünleri Görüntüle</div>
                </div>
              </a>
            </div><!-- .cs-slide -->

              <?php
              }
              ?>

          </div>
        </div><!-- .cs-slider_container -->
        <div class="cs-height_10 cs-height_lg_10"></div>
        <div class="cs-pagination cs-style1"></div>
      </div><!-- .cs-slider -->
    </div>
  </section>
  <!-- End Category -->

  <div class="cs-height_95 cs-height_lg_70"></div>



  <div class="cs-height_100 cs-height_lg_70"></div>

  <!-- Start Live Action -->
  <section>
    <div class="container">
      <div class="cs-section_heading cs-style2">
        <div class="cs-section_left">
          <h2 class="cs-section_title">Blog</h2>
        </div>
        <div class="cs-section_right">
          <a href="blog" class="cs-btn cs-style1"><span>Daha Fazla</span></a>
        </div>
      </div>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="cs-slider cs-style1 cs-gap-20">
        <div class="cs-slider_container" data-autoplay="1" data-loop="1" data-speed="300" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
          <div class="cs-slider_wrapper">

              <?php
              $blog=$baglanti->prepare("SELECT * FROM blog order by id DESC limit 18");
              $blog->execute();
              while ($blogcek=$blog->fetch(PDO::FETCH_ASSOC)) {
              ?>

            <div class="cs-slide">
              <div class="cs-card cs-style4 cs-type1 cs-box_shadow cs-white_bg">
                <span class="cs-card_like cs-primary_color">
                  <i class="fa fa-comment"></i>
                  <?php
                  $yorum=$baglanti->prepare("SELECT * FROM byorum where bid=:bid");
                  $yorum->execute(array(
                          'bid'=>$blogcek['id']
                  ));
                  $yorumsayi=$yorum->rowCount();
                  echo $yorumsayi;
                  ?>
                </span>
                <a href="yazi-<?=seolink($blogcek['baslik']).'-'.$blogcek['id'] ?>" class="cs-card_thumb cs-zoom_effect">
                  <img src="admin/resimler/blog/<?php echo $blogcek['resim'] ?>" alt="Image" class="cs-zoom_item">
                </a>
                  <?php
                  $yazar=$baglanti->prepare("SELECT * FROM kullanici where id=:id");
                  $yazar->execute(array(
                          'id'=>$blogcek['yazar']
                  ));
                  $yazarcek=$yazar->fetch(PDO::FETCH_ASSOC);
                  ?>

                <div class="cs-card_info">
                  <a class="cs-avatar cs-white_bg">
                    <div class="cs-post-avatar">
                      <img src="admin/resimler/uyeler/logo/<?php echo $yazarcek['resim'] ?>" alt="Avatar">

                    </div>
                    <span><?php echo $yazarcek['ad']." ".$yazarcek['soyad']; ?></span>
                  </a>
                  <div class="cs-height_10 cs-height_lg_10"></div>

                  <h3 class="cs-card_title"><a href="yazi-<?=seolink($blogcek['baslik']).'-'.$blogcek['id'] ?>"><?php echo $blogcek['baslik'] ?></a></h3>
                  <div class="cs-card_price"><a class="cs-primary_color"><?php echo $blogcek['ozet'] ?></a></div>
                  <hr>
                  <div class="cs-card_footer">
                      <a href="yazi-<?=seolink($blogcek['baslik']).'-'.$blogcek['id'] ?>"><span class="cs-card_btn_1" data-modal="#history_1">
                <i class="fa fa-eye"></i>
                      Yazıya Git
                    </span></a>
                      <a href="yazi-<?=seolink($blogcek['baslik']).'-'.$blogcek['id'] ?>"><span class="cs-card_btn_2" ><span>Yorum Yap</span></span></a>
                  </div>
                </div>
              </div>
            </div>

                  <?php
              }
                  ?>

          </div>
        </div><!-- .cs-slider_container -->
        <div class="cs-height_10 cs-height_lg_10"></div>
        <div class="cs-pagination cs-style1"></div>
      </div><!-- .cs-slider -->
    </div>
  </section>
  <!-- End Live Action -->

  <div class="cs-height_95 cs-height_lg_70"></div>

  <!-- Start Logo Carousel -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center">Sponsor / İşbirliği</h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
    </div>
    <div class="cs-moving_carousel_1">
        <?php
        $cek=$baglanti->prepare("SELECT * FROM sponsor");
        $cek->execute();
        $ceksayi=$cek->rowCount();

        $baslangic=0;
        $bol=$ceksayi / 2;

        $adet=floor($bol);

        $spons=$baglanti->prepare("SELECT * FROM sponsor order by id DESC limit {$baslangic}, {$adet}");
        $spons->execute();

        while ($sponscek=$spons->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="cs-single_moving_item">
                <div class="cs-partner">
                    <div class="cs-partner_in cs-center cs-white_bg"><img width="233" height="70" src="admin/resimler/sponsor/<?php echo $sponscek['resim'] ?>" alt="Partner logo"></div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <div class="cs-height_30 cs-height_lg_30"></div>
    <div class="cs-moving_carousel_2">


        <?php



        $spons=$baglanti->prepare("SELECT * FROM sponsor order by id DESC limit {$adet}, {$ceksayi}");
        $spons->execute();

        while ($sponscek=$spons->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="cs-single_moving_item">
                <div class="cs-partner">
                    <div class="cs-partner_in cs-center cs-white_bg"><img width="233" height="70" src="admin/resimler/sponsor/<?php echo $sponscek['resim'] ?>" alt="Partner logo"></div>
                </div>
            </div>

            <?php
        }
        ?>


    </div>
  </section>
  <!-- End Logo Carousel -->

  <div class="cs-height_95 cs-height_lg_70"></div>

  <!-- Start Icon Boxes -->
  <section>
    <div class="container">
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.71431 0.123112C1.85102 0.33329 1.06898 0.951317 0.621071 1.77739L0.273926 2.41758V16.8057C0.273926 30.1828 0.286738 31.2653 0.455836 32.2106C1.46778 37.8655 4.55853 42.44 9.98462 46.314C12.9501 48.4312 16.4617 50.1281 20.9155 51.5961C23.0438 52.2976 23.5931 52.2244 27.6155 50.7031C36.9293 47.1806 43.1717 41.2725 45.113 34.1426C45.7553 31.7837 45.7261 32.6085 45.7261 16.8057V2.41758L45.3786 1.77688C44.8372 0.778152 43.9532 0.180461 42.8469 0.0648477C41.9747 -0.0263616 41.328 0.20395 40.0143 1.07364C38.7 1.94374 37.2761 2.5454 35.7103 2.89234C34.7923 3.0958 34.3718 3.12824 32.7107 3.12377C30.9938 3.11919 30.6525 3.08889 29.6451 2.85227C28.1312 2.49659 26.736 1.89819 25.5293 1.08706C23.4193 -0.331105 22.5807 -0.331105 20.4708 1.08706C19.264 1.89819 17.8688 2.49659 16.3549 2.85227C15.3475 3.08889 15.0062 3.11919 13.2893 3.12377C11.6282 3.12824 11.2077 3.0958 10.2897 2.89234C8.72498 2.5457 7.29989 1.94364 5.98829 1.07537C4.52335 0.105521 3.73195 -0.124587 2.71431 0.123112ZM24.3662 13.1964C26.2201 13.589 27.9432 14.9226 28.7755 16.6088C29.3863 17.8463 29.5038 18.5265 29.506 20.836L29.5077 22.7819L29.9406 22.8467C31.0173 23.0082 31.9753 23.7282 32.4443 24.7282L32.7107 25.2962V29.3126V33.3291L32.4443 33.8971C32.1057 34.6192 31.5604 35.1645 30.8383 35.5031L30.2703 35.7695H23H15.7297L15.1617 35.5031C14.4396 35.1645 13.8943 34.6192 13.5557 33.8971L13.2893 33.3291V29.3126V25.2962L13.5557 24.7282C14.0247 23.7282 14.9827 23.0082 16.0594 22.8467L16.4923 22.7819L16.494 20.836C16.4962 18.5265 16.6137 17.8463 17.2245 16.6088C18.5052 14.0142 21.4912 12.5874 24.3662 13.1964ZM22.0137 16.4804C21.2787 16.743 20.7169 17.1574 20.3548 17.704C19.8379 18.4846 19.7462 18.9801 19.7462 20.9932V22.805H23.0076H26.2691L26.2361 20.7967C26.2044 18.8775 26.1912 18.7633 25.9366 18.2205C25.238 16.7308 23.4867 15.9541 22.0137 16.4804ZM22.3268 27.8262C22.1523 27.9053 21.8777 28.1426 21.7167 28.3538C21.4738 28.672 21.4239 28.8357 21.4239 29.3126C21.4239 29.7804 21.4751 29.9548 21.6979 30.2468C22.2702 30.9972 23.2444 31.1409 23.9762 30.5829C25.1523 29.6857 24.6084 27.8357 23.1346 27.7207C22.848 27.6983 22.5122 27.7422 22.3268 27.8262Z" fill="url(#paint0_linear_1448_22264)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22264" x1="0.273926" y1="0.0234375" x2="57.526" y2="25.3596" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#FC466B"/>
                <stop offset="1" stop-color="#3F5EFB"/>
                </linearGradient>
                </defs>
              </svg>
            </div>
            <h2 class="cs-iconbox_title">Güvenlik Odaklı</h2>
            <div class="cs-iconbox_subtitle">Yaptığınız tüm işlemler hata bırakmadan kodlanmaya çalışılmaktadır.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="64" height="53" viewBox="0 0 64 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19269 0.857312C2.86134 1.18469 1.59468 2.294 1.0703 3.59191L0.789062 4.28792V26.6867V49.0854L1.08348 49.8178C1.49471 50.8406 2.60159 51.9382 3.59641 52.31C3.9991 52.4603 4.6995 52.6146 5.15273 52.6526L5.97678 52.7217L5.97886 33.9977C5.98117 13.4034 5.9481 14.3409 6.72882 12.7968C7.19803 11.8686 8.31016 10.6251 9.15703 10.0817C9.49869 9.86246 10.145 9.54033 10.5934 9.36578L11.4086 9.04841L20.4898 8.98738L29.5709 8.92635L27.1573 5.93578C24.189 2.25775 23.6039 1.6445 22.5802 1.13879L21.7896 0.748065L13.3033 0.725971C6.8344 0.709005 4.66874 0.740253 4.19269 0.857312ZM12.202 11.4462C10.7866 11.6805 9.43436 12.7185 8.8238 14.0396L8.47909 14.7854L8.44748 33.7376L8.41574 52.6897L34.0199 52.6575C58.1292 52.6271 59.656 52.6127 60.1732 52.4103C60.9805 52.0945 61.881 51.3647 62.3985 50.6068C63.2767 49.3206 63.2327 50.3662 63.1963 31.6165L63.1637 14.7802L62.7633 13.9669C62.0847 12.5885 60.8549 11.6852 59.3187 11.4367C58.313 11.2741 13.1875 11.2832 12.202 11.4462ZM46.964 19.7382C47.4435 19.9053 47.7227 20.3316 47.7227 20.8967C47.7227 21.3016 47.5834 21.4822 46.1358 22.9546C45.2631 23.8423 44.549 24.5979 44.549 24.6337C44.549 24.6694 45.0845 25.1045 45.7391 25.6004C47.1272 26.6522 48.7968 28.2249 50.2616 29.8603C52.0672 31.8763 52.1112 32.0782 51.0379 33.4226C48.0362 37.1829 43.7752 40.4185 40.0911 41.7351C36.5278 43.0084 32.9556 42.8291 29.1993 41.1885L28.3144 40.8019L26.4369 42.6549C24.7057 44.3637 24.5248 44.508 24.1135 44.508C23.2426 44.508 22.659 43.7388 22.9461 42.9693C23.0186 42.7749 23.7682 41.9221 24.612 41.074L26.1463 39.5321L24.9416 38.6416C23.668 37.7001 20.3169 34.4271 19.4224 33.251C18.5157 32.0588 18.5827 31.8535 20.6392 29.5289C24.2008 25.5028 28.438 22.7833 32.6065 21.8485C33.8951 21.5595 36.7529 21.5551 37.9575 21.8402C39.2037 22.1353 40.6765 22.6278 41.5576 23.044L42.2891 23.3897L44.0599 21.6256C45.5776 20.1136 46.1381 19.6544 46.5143 19.6146C46.5546 19.6105 46.757 19.666 46.964 19.7382ZM33.0888 24.1832C30.5717 24.7504 28.0187 26.0988 25.507 28.1879C24.4081 29.1019 21.9124 31.5817 21.7091 31.9615C21.6066 32.153 21.86 32.4577 23.3952 33.9884C24.3888 34.9792 25.8053 36.2412 26.543 36.7928L27.8841 37.7957L28.7653 36.9101L29.6463 36.0246L29.161 35.048C27.3743 31.4528 29.094 27.1266 32.9069 25.6243C33.6578 25.3283 33.9071 25.2931 35.2721 25.289C36.9173 25.2841 37.7909 25.4929 38.8044 26.1326L39.2659 26.424L39.8923 25.7896L40.5187 25.1554L39.6348 24.8236C38.0259 24.2196 37.3644 24.0934 35.5773 24.0496C34.3942 24.0205 33.6285 24.0617 33.0888 24.1832ZM41.8124 27.2871L40.9743 28.1317L41.2868 28.6649C42.0386 29.9477 42.3739 31.8214 42.1124 33.2781C41.883 34.555 41.1106 36.0105 40.1671 36.9433C37.9765 39.1091 34.8721 39.5798 32.093 38.1676L31.3289 37.7792L30.7379 38.3613C30.4129 38.6815 30.1878 38.9785 30.2377 39.0212C30.6936 39.4122 33.1571 40.0636 34.6079 40.1769C38.7966 40.5038 43.8792 37.839 48.1926 33.0542L49.0805 32.0693L47.6462 30.5925C46.8575 29.7801 45.7693 28.7406 45.2279 28.2825C44.2602 27.4636 42.8713 26.4425 42.725 26.4425C42.684 26.4425 42.2734 26.8225 41.8124 27.2871ZM34.5673 27.6768C32.5222 28.0174 31.0025 29.7385 30.8992 31.8312C30.8549 32.7293 31.1017 34.0301 31.345 34.1805C31.3987 34.2137 32.81 32.8727 34.4813 31.2005L37.5198 28.1601L36.9758 27.9259C36.291 27.6311 35.3974 27.5388 34.5673 27.6768ZM36.1258 32.9758C32.8422 36.2638 32.9644 36.0499 34.1644 36.4067C36.147 36.9961 38.3741 35.9708 39.3308 34.0283C39.6631 33.3534 39.7325 33.0641 39.7586 32.2435C39.7897 31.2615 39.5203 30.1098 39.2385 30.0207C39.171 29.9993 37.7703 31.3291 36.1258 32.9758Z" fill="url(#paint0_linear_1448_22255)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22255" x1="0.789062" y1="0.72168" x2="69.4526" y2="42.4529" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#FC466B"/>
                <stop offset="1" stop-color="#3F5EFB"/>
                </linearGradient>
                </defs>
              </svg>
            </div>
            <h2 class="cs-iconbox_title">Bilgileriniz Paylaşılmaz</h2>
            <div class="cs-iconbox_subtitle">Bilgileriniz ödeme şirketleri hariç hiç kimse ile paylaşılmaz ve şifreli olarak tutulur.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="54" height="53" viewBox="0 0 54 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.5459 0.389513C28.1281 0.538039 26.9221 1.69532 20.3563 8.24874C11.9205 16.6685 12.1918 16.3559 12.198 17.6457C12.2038 18.8617 12.2454 18.9138 16.9795 23.6351C19.802 26.45 21.4749 28.038 21.7947 28.2059C22.469 28.5599 23.7179 28.571 24.3536 28.2286C24.6078 28.0917 27.9909 24.7817 32.4755 20.2821C40.8107 11.9194 40.4149 12.3745 40.4149 11.1548C40.4149 9.96876 40.5229 10.104 35.687 5.23924C33.0353 2.57166 31.0376 0.648018 30.7813 0.515281C30.2099 0.219319 29.1864 0.161716 28.5459 0.389513ZM18.2558 3.70684C17.795 3.9697 15.6933 6.15326 15.5848 6.48211C15.4249 6.96689 15.564 7.23138 16.4245 8.07789L17.1708 8.81213L18.9645 7.01611L20.7581 5.21997L19.9929 4.4548C19.1855 3.64739 18.7151 3.44485 18.2558 3.70684ZM33.6087 21.7721L31.8685 23.5147L40.4156 32.0643C46.3338 37.9842 49.1038 40.6826 49.4215 40.8373C50.0121 41.1247 50.9136 41.1315 51.5427 40.8531C52.8078 40.2936 53.3894 38.6699 52.7687 37.4303C52.5774 37.0481 35.6489 20.0293 35.46 20.0293C35.399 20.0293 34.5658 20.8135 33.6087 21.7721ZM9.43573 31.9881C9.13629 32.0934 7.33536 33.0765 5.4336 34.1724C1.71883 36.3134 1.44769 36.5243 1.15696 37.4987C0.920448 38.2915 0.923062 45.7663 1.16022 46.5647C1.45074 47.5431 1.83 47.8347 5.66096 50.0248C7.59746 51.1319 9.36147 52.0876 9.58099 52.1486C10.1088 52.2952 10.6545 52.2825 11.1295 52.1127C11.589 51.9484 17.8502 48.3836 18.4756 47.9302C18.7141 47.7574 19.0561 47.3503 19.2358 47.0256L19.5625 46.4351V42.0795V37.7239L19.2545 37.0969C19.0852 36.752 18.7912 36.3514 18.6012 36.2068C17.9614 35.7197 11.5093 32.0818 11.0245 31.9349C10.3991 31.7453 10.0968 31.7554 9.43573 31.9881ZM11.1393 34.2274C11.6701 34.417 16.4071 37.0953 16.8072 37.4321C16.981 37.5782 17.2555 37.9486 17.4172 38.2553L17.7114 38.8128V42.025C17.7114 45.1642 17.7056 45.2489 17.4589 45.7497C17.3201 46.0315 17.0475 46.4018 16.853 46.5726C16.5363 46.8507 12.7785 49.036 11.5724 49.6436C10.9653 49.9494 10.0859 50.0435 9.53308 49.8619C8.76965 49.611 4.12311 46.9111 3.64944 46.4431C2.92369 45.7261 2.84791 45.3086 2.84791 42.025C2.84791 38.7542 2.91716 38.3716 3.64269 37.6306C4.09785 37.1657 8.59064 34.5429 9.46894 34.2293C9.98029 34.0467 10.6314 34.046 11.1393 34.2274ZM7.53027 37.37C5.77018 38.3646 4.93445 38.8974 4.83972 39.085C4.73997 39.2825 4.70175 40.1105 4.70066 42.1006C4.69903 44.7938 4.70349 44.849 4.94403 45.1151C5.23107 45.4327 9.73823 48.0027 10.1557 48.0868C10.4923 48.1545 10.5291 48.1368 13.386 46.5192C15.0292 45.589 15.6352 45.1898 15.7544 44.9592C15.8821 44.7122 15.9147 44.1315 15.9147 42.1011C15.9147 40.54 15.8686 39.4209 15.7958 39.212C15.6624 38.8294 15.5391 38.7483 12.4808 37.0304C11.4008 36.4236 10.4194 35.9272 10.3002 35.9272C10.1809 35.9272 8.9344 36.5764 7.53027 37.37Z" fill="url(#paint0_linear_1448_22282)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22282" x1="0.980957" y1="0.25" x2="63.3538" y2="31.8515" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#FC466B"/>
                <stop offset="1" stop-color="#3F5EFB"/>
                </linearGradient>
                </defs>
              </svg>
            </div>
            <h2 class="cs-iconbox_title">Uygun Fiyat</h2>
            <div class="cs-iconbox_subtitle">Ürünler yapabildiğimiz en uygun fiyattan satışa koyulmaktadır. Herhangi bir gizli ücret yoktur.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3609 1.13138C27.6679 1.49733 27.5724 1.84714 27.5724 4.02065C27.5724 5.71207 27.5936 5.95001 27.7769 6.30927C28.0069 6.76006 28.5922 7.11942 29.0963 7.11942C29.6005 7.11942 30.1858 6.76006 30.4158 6.30927C30.5991 5.95001 30.6203 5.71207 30.6203 4.02065C30.6203 2.32923 30.5991 2.09128 30.4158 1.73203C30.0409 0.997163 29.1232 0.728941 28.3609 1.13138ZM19.5477 4.58208C19.0945 4.68836 18.5631 5.26534 18.4722 5.74946C18.3386 6.46136 18.5314 6.77591 19.9749 8.20297C21.4271 9.63857 21.7337 9.81911 22.4464 9.65828C23.3516 9.45416 23.8862 8.34663 23.4659 7.54613C23.2241 7.08559 20.6208 4.57944 20.3841 4.57944C20.2676 4.57944 20.1113 4.56136 20.037 4.53921C19.9625 4.51716 19.7423 4.53636 19.5477 4.58208ZM37.8452 4.58005C37.5934 4.63939 37.1488 5.01114 36.1872 5.96647C35.4647 6.68437 34.808 7.39526 34.7281 7.54613C34.3052 8.34409 34.8403 9.45396 35.7463 9.65828C36.459 9.81911 36.7655 9.63857 38.2178 8.20297C39.6676 6.76982 39.8543 6.46299 39.7181 5.73726C39.6342 5.28982 38.9892 4.57944 38.6669 4.57944C38.5532 4.57944 38.3992 4.56136 38.3248 4.53921C38.2503 4.51716 38.0346 4.53545 37.8452 4.58005ZM28.0096 10.5633C27.8311 10.6755 27.6105 10.881 27.5194 11.02C27.4283 11.159 27.1762 12.1492 26.9591 13.2203C26.3092 16.4277 25.8504 17.7872 24.9655 19.1275C24.1062 20.4292 23.0592 21.1831 19.5968 22.9931C18.3675 23.6359 16.8725 24.4306 16.2744 24.759L15.5489 25.1577C15.3327 25.2766 15.2159 25.5198 15.2585 25.7628C15.2977 25.9864 15.3297 31.4498 15.3297 37.9039V48.8128C15.3297 49.3602 15.2475 49.9046 15.0858 50.4276C14.9516 50.8617 14.8622 51.2371 14.8871 51.262C14.912 51.2868 15.7305 51.5113 16.7058 51.7608C18.7334 52.2795 21.1901 52.6824 23.2544 52.8348C25.3746 52.9913 40.6895 52.9756 41.2256 52.8164C41.4769 52.7417 41.8274 52.5086 42.1039 52.2322C43.0479 51.2882 43.0479 50.021 42.1039 49.077C41.493 48.466 41.1163 48.3686 39.3674 48.3686C37.6672 48.3686 37.2664 48.2359 36.9208 47.5585C36.6636 47.0544 36.6616 46.639 36.9136 46.1449C37.3075 45.373 37.2844 45.3776 40.9326 45.3206C44.0463 45.272 44.2017 45.2603 44.6057 45.0442C45.3445 44.6492 45.8602 43.823 45.8602 43.0347C45.8602 42.1551 45.099 41.118 44.2736 40.8728C43.9859 40.7874 42.931 40.7487 40.8914 40.7487C38.1213 40.7487 37.9011 40.7353 37.5264 40.5442C37.0756 40.3142 36.7163 39.7288 36.7163 39.2247C36.7163 38.8036 37.0467 38.1818 37.3962 37.9449C37.6576 37.7677 37.9535 37.7473 40.9326 37.7007C44.0463 37.6521 44.2017 37.6404 44.6057 37.4243C45.3445 37.0293 45.8602 36.2031 45.8602 35.4147C45.8602 34.5352 45.099 33.4981 44.2736 33.2529C43.9859 33.1675 42.931 33.1288 40.8914 33.1288C38.1213 33.1288 37.9011 33.1154 37.5264 32.9242C37.0756 32.6942 36.7163 32.1089 36.7163 31.6048C36.7163 31.1837 37.0467 30.5619 37.3962 30.3249C37.6576 30.1478 37.9535 30.1273 40.9326 30.0808C44.0463 30.0321 44.2017 30.0204 44.6057 29.8043C45.3445 29.4093 45.8602 28.5831 45.8602 27.7948C45.8602 26.9153 45.099 25.8782 44.2736 25.633C43.963 25.5407 42.1696 25.5088 37.301 25.5088H31.6936C31.2339 25.5088 30.9146 25.0513 31.0733 24.6198C31.2531 24.131 31.6418 23.1594 31.9372 22.4609C33.271 19.306 33.602 18.0947 33.6029 16.3649C33.6036 14.9081 33.4352 14.2642 32.7488 13.099C31.67 11.2677 29.0878 9.88606 28.0096 10.5633ZM0.929135 22.6704C0.696981 22.793 0.469806 23.0267 0.344941 23.2714C0.143165 23.667 0.140625 23.8469 0.140625 37.7007C0.140625 51.5602 0.143063 51.7343 0.345144 52.1304C0.476816 52.3886 0.692612 52.6044 0.950776 52.7361C1.32852 52.9288 1.54472 52.9406 4.6947 52.9406C6.5436 52.9406 8.28196 52.8942 8.58442 52.8368C10.4091 52.4908 11.8827 51.0172 12.2288 49.1925C12.3707 48.4442 12.3707 26.9572 12.2288 26.209C11.8827 24.3842 10.4091 22.9106 8.58442 22.5646C8.2781 22.5065 6.55803 22.4628 4.67336 22.4653C1.52471 22.4696 1.28463 22.4827 0.929135 22.6704ZM8.47439 44.0012C8.92518 44.2312 9.28454 44.8165 9.28454 45.3206C9.28454 45.8248 8.92518 46.4101 8.47439 46.6401C8.25392 46.7526 7.93266 46.8446 7.76055 46.8446C6.98748 46.8446 6.23657 46.0937 6.23657 45.3206C6.23657 44.8321 6.59613 44.2326 7.02508 44.0062C7.51529 43.7474 7.97381 43.7459 8.47439 44.0012Z" fill="url(#paint0_linear_1448_22273)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22273" x1="0.140625" y1="0.944336" x2="57.6183" y2="26.5299" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#FC466B"/>
                <stop offset="1" stop-color="#3F5EFB"/>
                </linearGradient>
                </defs>
              </svg>
            </div>
            <h2 class="cs-iconbox_title">Hızlı Teslimat</h2>
            <div class="cs-iconbox_subtitle">Aldığınız dijital kod sistem tarafından otomatik olarak teslim edilmektedir.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Icon Boxes -->

  <div class="cs-height_70 cs-height_lg_40"></div>

  <!-- Start CTA -->
  <section>
    <div class="container">
      <div class="cs-cta cs-style2 text-center cs-accent_bg">
        <h2 class="cs-cta_title cs-white_color_8">Bize Katıl</h2>
        <div class="cs-cta_subtitle cs-white_color_8">Bir çok dijital ürünü ucuz ve güvenli bir şekilde teslim <br> ediyoruz. Hizmetimizden faydalanmak için hemen kayıt ol!</div>
        <a href="kayit" class="cs-btn cs-style1 cs-btn_lg cs-color2"><span>Kayıt Ol</span></a>
      </div>
    </div>
  </section>
  <!-- End CTA -->

  <div class="cs-height_100 cs-height_lg_70"></div>

<?php

require_once 'footer.php';