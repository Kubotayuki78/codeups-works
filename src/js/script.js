jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  let topBtn = $(".js-to-top");
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

  //ドロワーメニュー
  $(".js-drawer").click(function () {
    if ($(".js-drawer").hasClass("is-checked")) {
      $(".js-drawer").removeClass("is-checked");
      // $("html").toggleClass("is-fixed");
      $(".js-sp-nav").fadeOut(300);
    } else {
      $(".js-drawer").addClass("is-checked");
      // $("html").toggleClass("is-fixed");
      $(".js-sp-nav").fadeIn(300);
    }
  });

  // ハンバーガーメニューボタンがクリックされたときのイベントハンドラを設定
  $(".drawer-icon").click(function () {
    // 現在のbodyタグのoverflowスタイルを確認
    if ($("body").css("overflow") === "hidden") {
      // もしoverflowがhiddenなら、bodyのスタイルを元に戻す
      $("body").css({ height: "", overflow: "" });
    } else {
      // そうでなければ、bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
      $("body").css({ height: "100%", overflow: "hidden" });
    }
  });

  $(".drawer-icon").on("click", function () {
    $(".header__inner").toggleClass("active", $(this).hasClass("is-checked"));
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ sscrollTop: targetY }, time, "swing");
    return false;
  });

  const swiper = new Swiper(".js-fvSwiper", {
    loop: true,
    allowTouchMove: false,
    clickable: false,
    autoplay: {
      delay: 2000,
    },
    effect: "fade", //追加 フェード機能をONにする
    speed: 2000, //追加
  });

  const swiper2 = new Swiper(".js-cardSwiper", {
    slidesPerView: "1.264",
    spaceBetween: 20,
    loop: true,
    centeredSlidesBounds: false, //アクティブなスライドを中央に配置
    centeredSlides: false, //スライダーの最初と最後に余白を追加せずスライドが真ん中に配置される

    pagination: {
      // el: ".swiper-pagination",
      // clickable: true,
    },
    breakpoints: {
      768: {
        loop: true, //繰り返し指定
        spaceBetween: 42, //スライド感の余白
        slidesPerView: "3", //一度に表示するスライド枚数

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
      1200: {
        loop: true, //繰り返し指定
        spaceBetween: 42, //スライド感の余白
        slidesPerView: "3.97", //一度に表示するスライド枚数

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    },
  });

  //要素の取得とスピードの設定
  var box = $(".js-colorbox"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;

    image.css("opacity", "0");
    color.css("width", "0%");
    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this)
          .delay(200)
          .animate({ width: "100%" }, speed, function () {
            image.css("opacity", "1");
            $(this).css({ left: "0", right: "auto" });
            $(this).animate({ width: "0%" }, speed);
          });
        counter = 1;
      }
    });
  });

  //モーダルウィンドウ
  $(document).ready(function () {
    // 変数に要素を格納
    var trigger = $(".js-modal__trigger"),
      wrapper = $(".modal__wrapper"),
      layer = $(".modal__layer"),
      container = $(".modal__container"),
      content = $(".modal__content");

    // 『ギャラリーの画像』をクリックしたら、モーダルを開く
    $(trigger).click(function () {
      let imgSrc = $(this).find("img").attr("src"); // クリックした画像の src を取得
      let imgAlt = $(this).find("img").attr("alt"); // alt テキストを取得（アクセシビリティ向上）

      // モーダルに挿入する画像のHTMLを作成
      let modalImage = `<img src="${imgSrc}" alt="${imgAlt}" class="modal__image">`;

      // モーダル内に画像を挿入
      $(content).html(modalImage);

      $(wrapper).fadeIn(400); // モーダルを表示

      // スクロール位置を戻す
      $(container).scrollTop(0);

      // サイトのスクロールを禁止にする
      $("html, body").css("overflow", "hidden");
    });

    // 『背景部分（モーダルのレイヤー）』をクリックしたら、モーダルを閉じる
    $(layer).click(function () {
      $(wrapper).fadeOut(400); // モーダルを非表示

      // サイトのスクロール禁止を解除
      $("html, body").css("overflow", "");
    });
  });

  //アコーディオン
  $(function () {
    // タイトルをクリックすると開閉する
    $(".js-accordion-title").on("click", function () {
      // クリックしたタイトルの直後の要素（コンテンツ）を開閉
      $(this).next(".faq-accordion__content").slideToggle(300);

      // タイトルに `open` クラスを付け外しして矢印の向きを変更
      $(this).toggleClass("open");
    });
  });

  //Informationタブの切替
  $(document).ready(function () {
    // タブ切り替え処理
    function switchTab(selectedTab) {
      // タグのアクティブクラスをリセット
      $(".info-tags__tag").removeClass("tag-active");
      $(".info-tags__tag[data-tab='" + selectedTab + "']").addClass(
        "tag-active"
      );

      // カードの表示切り替え
      $(".page-info__cards").hide();
      $(".page-info__cards[data-content='" + selectedTab + "']").fadeIn(300);
    }

    // タブのクリックイベント
    $(".info-tags__tag").on("click", function (event) {
      event.preventDefault();
      const selectedTab = $(this).attr("data-tab");

      switchTab(selectedTab);

      // ローカルストレージにアクティブタブを保存
      localStorage.setItem("activeTab", selectedTab);
    });

    // 初期状態の設定
    function initTab() {
      let activeTab =
        localStorage.getItem("activeTab") || getParameterByName("tab");

      if (!activeTab) {
        activeTab = $(".info-tags__tag").first().attr("data-tab"); // 最初のタブを選択
      }

      switchTab(activeTab);

      // 一度切り替えたら、ローカルストレージを削除して次回以降の影響を防ぐ
      localStorage.removeItem("activeTab");
    }

    // URL パラメータを取得する関数
    function getParameterByName(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    // 初期タブの適用
    initTab();

    // フッターのリンクのクリックイベント（タブを指定して遷移）
    $(".footer a[data-tab]").on("click", function (event) {
      event.preventDefault();
      const selectedTab = $(this).attr("data-tab");

      // ローカルストレージにタブ情報を保存
      localStorage.setItem("activeTab", selectedTab);

      // ページ遷移
      window.location.href = "page-info.html";
    });
  });

  //アーカイブの年をクリックしたら表示切り替え
  $(document).ready(function () {
    $(".side-archive__year").click(function () {
      $(this).toggleClass("open"); // 三角の向きを変更
      $(this).next(".side-archive__list").slideToggle(); // リストの表示・非表示
    });
  });
});
