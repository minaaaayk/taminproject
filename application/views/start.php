<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



      <link rel="stylesheet" href="<?php echo base_url();?>includes/uikit/css/uikit-rtl.min.css">


      <!-- Material Design Bootstrap -->
      <link href="<?php echo base_url();?>includes/MDB/css/mdb.min.css" rel="stylesheet">
      <!-- Your custom styles (optional) -->
      <link href="<?php echo base_url();?>includes/MDB/css/style.css" rel="stylesheet">

      <link rel="stylesheet" href="<?php echo base_url();?>includes/custom/css/style.css">
  </head>

  <style>
      .Blink {
          animation: blinker 0.5s cubic-bezier(.5, 0, 1, 1) infinite alternate;
      }

      @keyframes blinker {
          from { opacity: 1; }
          to { opacity: 0; }
      }
  </style>
  <body>


  <!--Main Navigation-->
  <header>

      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
          <div class="container">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse float-right" id="navbarSupportedContent-7" style="padding-right: 0px; right: 0px; margin-right: 0px; margin-left: auto;">


                  <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="<?php echo base_url();?>">
                              <i class="fa fa-home" >
                              </i> <span class="clearfix d-none d-sm-inline-block">صفحه اصلی <span class="sr-only">(current)</span></span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">
                              <i class="fa fa-search-plus"></i>
                              </i> <span class="clearfix d-none d-sm-inline-block">جست و جوی پیشرفته</span>
                          </a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="<?php echo base_url();?>users/login">
                              <i class="fa fa-sign-in"></i>
                              </i> <span class="clearfix d-none d-sm-inline-block">ورود</span>
                          </a>
                      </li>
                  </ul>
                  <form class="form-inline">
                      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="جست و جو">
                  </form>
              </div>
              <a class="navbar-brand" href="#"><strong>سامانه قوانین</strong></a>
          </div>
      </nav>

  </header>
  <!--Main Navigation-->

    <!-- container -->


    <div class="parallax1"></div>

    <div class="uk-overlay uk-light uk-position-center-left uk-padding-large">
        <h1>سامانه تنقیح قوانین</h1>
        <h3>مربوط به سازمان تامین اجتماعی</h3>
    </div>
    <!--<div class="uk-position-bottom uk-overlay uk-overlay-default uk-text-center">-->
    <div class="uk-position-bottom uk-text-center">
        <a href="#STE" uk-scroll="duration:1000" class="Blink" uk-icon="icon: chevron-down; ratio: 3.5" style="color: white;"></a>
    </div>

    <div class="txtparallax" style="position:relative; min-height: 800px;" dir="rtl" id="STE">
        <!--<div style="color:#ddd;background-color:#282E34;text-align:center;text-align: justify;" class="txtparallax">-->

        <div style="color: #777;background-color:white;text-align:center;text-align: justify;margin: auto; padding-top: 120px; padding-bottom: 100px;" dir="rtl" >

               <div style="padding-bottom: 100px; text-align:center;" >
                  <!-- <img src="<?php /*echo base_url();*/?>includes/pic/Tamin_logo.png" style="width: 60px;height: 70px;"  id="target">-->
                   <h3 style="display: inline">سازمان تامین اجتماعی</h3>
               </div>
            <hr class="uk-divider-icon">
            <div class="uk-child-width-1-5@m " uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true">
                <div>
                    <div class="uk-card uk-box-shadow-hover-large uk-padding" style=" text-align:center; margin: auto; /*box-shadow: 7px 10px 20px #888888;*/">
                        <img src="<?php echo base_url();?>includes/svg/044-school.svg" width="200px" height="200px"/>
                        <h6 class=""><div class="uk-button uk-button-text " uk-toggle="target: #modal-example"> درباره سازمان  </div></h6>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-box-shadow-hover-large uk-padding" style="text-align:center; margin: auto; /*box-shadow: 7px 10px 20px #888888;*/">
                        <img src="<?php echo base_url();?>includes/svg/049-archive.svg" width="200px" height="200px" />
                        <h6 class=""><div  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><a class="uk-button uk-button-text" href="#collapseExample" uk-scroll>تاریخچه سازمان</a> </div></h6>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-box-shadow-hover-large uk-padding" style="text-align:center/*;box-shadow: 7px 10px 20px #888888;*/">
                        <img src="<?php echo base_url();?>includes/svg/018-pantone.svg" width="200px" height="200px"/>
                        <h6 class=""><div style="" class="uk-button uk-button-text">معرفی نشانه سازمان</div></h6>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-box-shadow-hover-large uk-padding" style="text-align:center;/*box-shadow: 7px 10px 20px #888888;*/">
                        <img src="<?php echo base_url();?>includes/svg/032-business-1.svg" width="200px" height="200px"/>
                        <h6 class=""><div style="" class="uk-button uk-button-text">مهم ترین تعهدات</div></h6>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-box-shadow-hover-large uk-padding" style=" text-align:center;/*box-shadow: 7px 10px 20px #888888;*/">
                        <img src="<?php echo base_url();?>includes/svg/002-teamwork-1.svg" width="200px" height="200px"/>
                        <h6 class=""><div style="" class="uk-button uk-button-text">میثاق نامه کارکنان</div></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card-body uk-padding" style="padding-top: 50px" >
                <p>در روزهاي ابتدايي بهمن سال 1331 اعلاميه تاسيس سازمان تامين اجتماعي صادر شد. آنچه مي خوانيد مروري است بر تاريخچه تامين اجتماعي در جهان و ايران. سده هفدهم ميلادي، آغازگر تاريخ پرسابقه نظام تامين اجتماعي محسوب مي شود. با شروع اين سده، مساله فقر و عدم تامين اقتصادي افراد، ابعاد گسترده تري يافت. به همين دليل، اقداماتي از جانب دولت هاي اروپايي در حمايت از قشر كم درآمد شاغلان صورت پذيرفت. اولين مصاديق اين مساله را مي توان در اقدام هنري چهارم (پادشاه انگلستان) در سال 1604 يافت كه دستور داد مبلغي از درآمد هر معدن در انگلستان را كسر كرده و براي خريد دارو و مداواي كارگران مصدوم شده در همان معادن اختصاص دهند. با اين حال، از اواخر قرن 19 و اوايل قرن 20 به بعد بود كه به تدريج قوانين و مقرراتي به منظور بهبود رفاه كارگران وضع شد. در سال 1881 و همزمان با امپراتوري ويلهلم اول و صدارت بيسمارك در آلمان، براي نخستين بار، قانون بيمه هاي اجتماعي به تصويب رسيد. دولت آلمان در سال هاي بعد، انواع بيمه هاي بيماري، حوادث ناشي از كار، ازكارافتادگي و پيري را به تصويب رساند و به اين ترتيب، اولين نظام بيمه هاي اجتماعي در آلمان پايه گذاري شد و به سرعت به ديگر كشورهاي صنعتي اروپا تسري يافت. بعد از سال 1898، قوانين مصوب در اروپا به تدريج دامنه جبران خسارت وارده ناشي از كار را به گروه هاي مختلف مزدبگير توسعه دادند كه از آن جمله مي توان به قانون حوادث ناشي از كشاورزي مكانيزه (در سال 1899)، بيمه كاركنان موسسات تجاري كه با موتور سرو كار دارند (به موجب قانون سال 1906) و بيمه مستخدمان منازل در برابر حوادث ناشي از كار (در سال 1914) اشاره کرد. در اين ميان، جنگ جهاني اول، نقطه عطفي در تاريخ تامين اجتماعي به حساب مي آيد كه با توسعه بيمه بيماري ها همراه شد. پس از جنگ جهاني اول و به ويژه در سال هاي پس از بحران اقتصادي آمريكا و اروپا (فاصله سال هاي 1929 تا 1933)، دوره نوين تامين اجتماعي آغاز شد. اصطلاح تامين اجتماعي براي اولين بار در لايحه سال 1935 دولت فدرال آمريكا به كار گرفته شد. سپس در سال 1948 در ماده 22 اعلاميه جهاني حقوق بشر مصوب مجمع عمومي سازمان ملل متحد، اين جمله گنجانيده شد كه «همه افراد به عنوان عضو جامعه حق برخورداري از تامين اجتماعي را دارند.» افزون بر اين، به منظور پايداري جنبه بين المللي امور تامين اجتماعي، سازمان ملل متحد، سازمان بين المللي كار (ILO) و اتحاديه بين المللي تامين اجتماعي (ISSA)، تمهيداتي را در اين زمينه پذيرفتند و ملزم به نظارت و اجراي آن شدند. </p>
                <p> تامين اجتماعي در ايران
                    سابقه تامين اجتماعي در ايران به تصويب اولين قانون استخدامي كشوري در سال 1301 باز مي گردد كه طي آن، نظامي براي بازنشستگي به وجود آمد. در اين قانون، سه اصل تامين اجتماعي كه عبارت بودند از فراهم کردن «حقوق و تامين خاص» براي كساني كه پس از خدمت، توانايي فعاليت خود را از دست مي دهند، «مقرري خاص» براي كساني كه به علت حادثه اي، عليل و از كار افتاده شوند و «حمايت كارفرمايان» از خانواده هر مستخدم كه فوت شود، به چشم مي خورد. در اولين اقدام، طرح تشكيل «صندوق احتياط كارگران راه آهن» در سال 1309 به تصويب دولت رسيد. در اين مصوبه، دولت تسهيلات خاصي را براي كارگران ضايعه ديده يا فوت شده در حين احداث راه آهن پيش بيني كرد. در سال 1315 «نظام نامه كارخانجات و موسسات صنعتي» براي كارگران بخش صنعت به تصويب هيات دولت رسيد.
                    در سال 1325، قانون كار از تصويب هيات دولت گذشت. طبق اين قانون، كارفرمايان، علاوه بر اينكه مكلف به رعايت قانون بيمه كارگران بودند، بايد دو صندوق شامل صندوق بهداشت (براي كمك به كارگر در مورد بيما ري هايي كه ناشي از كار نباشد) و صندوق تعاون (براي كمك در امور ازدواج، عائله مندي، بيكاري، از كار افتادگي، بازنشستگي، حاملگي و غيره) را در هر كارگاه تشكيل مي دادند. در سال 1328، وزارت كار رسما تاسيس گرديد و طبق ماده 16 قانون كار مصوب 17 خرداد 1328، مقرر شد صندوقي به نام «صندوق تعاون و بيمه كارگران» براي معالجه و پرداخت غرامت كارگران تشكيل شود. در ادامه در اواخر سال 1331 و در دوره نخست وزيري دكتر محمد مصدق، «لايحه قانوني بيمه هاي اجتماعي كارگران» براي اولين بار به تصويب رسيد و طبق آن سازمان مستقلي به نام «سازمان بيمه هاي اجتماعي كارگران» تاسيس شد. اين سازمان مكلف و متعهد شد كمك ها و مزاياي مقرر در لايحه را در مورد كارگران و كارمنداني كه بيمه مي شدند، اعمال كند. درپي مجموعه تحولات يادشده، به موجب تصويب نامه اي كه در فروردين 1342 به تصويب هيات وزيران رسيد، سازمان بيمه هاي اجتماعي كارگران به «سازمان بيمه هاي اجتماعي» تغيير نام يافت تا زير نظر وزارت كار و امور اجتماعي به فعاليت خود ادامه دهد. «بيمه هاي اجتماعي روستاييان» در سال 1347 به تصويب رسيد كه در سال 1354 در سازمان تامين اجتماعي ادغام شد. در سال 1351 با تصويب قانون تامين خدمات درماني مستخدمان دولت، «سازمان تامين خدمات درماني» تشكيل شد.تشكيل وزارت رفاه اجتماعي، تحول ديگري بود كه در سال 1353 روي داد. اين وزارتخانه، تقريبا تمامي امور مربوط به بيمه درمان و رفاه اقشار مختلف جامعه را تحت پوشش خود قرار داد. در اين ميان، تصويب «قانون تامين اجتماعي» در تيرماه 1354 و تشكيل «سازمان تامين اجتماعي» را مي توان آغازگر تحولي نو در نظام تامين اجتماعي كشور دانست. در سال 1355 با تصويب قانوني كه منجر به انحلال وزارت رفاه و تشكيل وزارت بهداري و بهزيستي شد، سازمان تامين اجتماعي به «صندوق تامين اجتماعي» تغيير نام داد و تعهدات و امكانات درماني آن به وزارت بهداري و بهزيستي محول شد. اما اين تغيير، چندان دوام نياورد و با تصويب لايحه اي در شوراي انقلاب در سال 1358، سازمان تامين اجتماعي دوباره احيا شد.
                    منبع : روزنامه دنیای اقتصاد - شماره 2839 - 1391/11/02 - صفحه 31</p>
            </div>
            <button  type="button" class="uk-button uk-button-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" href="#STE" uk-scroll="duration:1000">بستن</button>
        </div>
    </div>

    <!-- This is the modal -->
    <div id="modal-example" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">درباره سازمان</h2>
            <p>سازمان تأمین اجتماعی یک سازمان بیمه‌گر اجتماعی است که مأموریت اصلی آن پوشش کارگران مزد و حقوق بگیر (به صورت اجباری) و صاحبان حرف و مشاغل آزاد (به صورت اختیاری) است. جمعیت تحت پوشش این سازمان، شامل حدود 12میلیون نفر بیمه شده و بیش از 2 میلیون نفر مستمری‌بگیر است که با درنظر گرفتن افراد خانواده بیمه‌شدگان، جمعیت تحت پوشش این سازمان برای خدمات درمانی به بیش از 37 میلیون نفر می‌رسد. براساس قانون، سازمان تأمین اجتماعی یک سازمان عمومی غیردولتی است که بخش عمده منابع مالی آن از محل حق بیمه‌ها (با مشارکت بیمه شده و کارفرما) تأمین می‌شود و متکی به منابع دولتی نیست. به همین دلیل، دارایی‌ها و سرمایه‌های آن متعلق به اقشار تحت پوشش در نسل‌های متوالی است و نمی‌تواند قابل ادغام با هیچ یک از سازمان‌ها و مؤسسات دولتی یا غیردولتی باشد. تکیه‌گاه اصلی این سازمان مشارکت سه‌جانبه کارفرمایان، بیمه‌شدگان و دولت در عرصه‌های مختلف سیاستگذاری، تصمیم‌گیری‌های کلان و تأمین منابع مالی است.</p>
            <p>اصول و مبانی بیمه‌گری این سازمان به نحوی تنظیم شده که بین اهداف اصلی آن با اهداف کلان نظام اقتصادی کشور همسویی کامل وجود دارد. از یک سو رونق فعالیت‌های تولیدی و صنعتی موجب افزایش جمعیت تحت پوشش بیمه و تقویت منابع مالی این سازمان می‌شود و از سوی دیگر پوشش بیمه‌ای کارگران به افزایش اطمینان خاطر، ایجاد امنیت روحی و سلامت جسمی و در نهایت ارتقای بهره‌وری نیروی کار منجر می‌گردد. همچنین همه عواملی که فعالیت‌های اقتصادی و صنعتی را تحت تأثیر قرار دهد بر منابع و مصارف سازمان تأمین اجتماعی نیز اثرگذار است. از جمله این عوامل می‌توان به بحران بیکاری، افزایش نرخ سالمندی، بی‌ثباتی در فعالیت‌های اقتصادی، افزایش حوادث و سوانح در کشور و رشد روزافزون هزینه‌های درمان اشاره کرد. </p>
            <p>تعهدات این سازمان برابر استانداردهای تعیین شده به وسیله سازمان بین‌المللی کار و سازمان بین‌المللی تأمین اجتماعی تنظیم شده و بالاترین حد این استانداردها را در بر می‌گیرد. چگونگی تحقق این تعهدات و ارایه خدمات به وسیله این سازمان را قانون معین کرده است.</p>
            <p class="uk-text-right">
                <button class="uk-button uk-button-primary uk-modal-close" type="button">خروج</button>
            </p>
        </div>
    </div>


    <div class="parallax2"></div>

    <div style="color: #777;background-color:white;text-align:center;text-align: justify;"  dir="rtl">
        <div uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500;repeat: true" class="txtparallax">
            <div>
                <h3 class="uk-card-title">ساختار سازمانی</h3>
                <p>ماده یک قانون تأمین اجتماعی می‌گوید:
                    به منظور اجرا و تعمیم و گسترش انواع بیمه‌های اجتماعی و استقرار نظام هماهنگ و متناسب با برنامه‌های تأمین اجتماعی، همچنین موضوع قانون تأمین اجتماعی و سرمایه‌گذاری و بهره‌برداری از محل وجوه و ذخائر، سازمان مستقلی به نام «سازمان تأمین اجتماعی» وابسته به وزارت تعاون، کار و رفاه اجتماعی که در این قانون سازمان نامیده می‌شود، تشکیل می‌گردد. سازمان دارای شخصیت حقوقی و استقلال مالی و اداری و امور آن منحصراً طبقق اساسنامه‌ای که به تصویب هیئت وزیران می‌رسد اداره می‌شود.</p>
            </div>
        </div>
    </div>
    <div class="parallax3"></div>

    <div style="color: #777;background-color:white;text-align:center;text-align: justify; min-height: 800px;"  dir="rtl">

    </div>

    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Holder.js for placeholder images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>

    <script src="<?php echo base_url();?>includes/uikit/js/uikit.min.js"></script>
    <script src="<?php echo base_url();?>includes/uikit/js/uikit-icons.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>includes/MDB/js/jquery-3.2.1.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url();?>includes/MDB/js/mdb.min.js"></script>

  </body>
</html>
