<?php

/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_theme_enqueue_styles_and_scripts()
{
	// Google Fonts
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap',
		[],
		null
	);

	// Swiper CSS
	wp_enqueue_style(
		'swiper-css',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
		[],
		null
	);

	// Theme CSS
	wp_enqueue_style(
		'theme-style',
		get_template_directory_uri() . '/assets/css/style.css',
		[],
		filemtime(get_template_directory() . '/assets/css/style.css')
	);

	// jQuery (CDN)
	wp_enqueue_script(
		'jquery-cdn',
		'https://code.jquery.com/jquery-3.6.0.js',
		[],
		null,
		true
	);

	// jQuery inView Plugin
	wp_enqueue_script(
		'jquery-inview',
		get_template_directory_uri() . '/assets/js/jquery.inview.min.js',
		['jquery-cdn'],
		filemtime(get_template_directory() . '/assets/js/jquery.inview.min.js'),
		true
	);

	// Swiper JS
	wp_enqueue_script(
		'swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		[],
		null,
		true
	);

	// Custom JS
	wp_enqueue_script(
		'theme-script',
		get_template_directory_uri() . '/assets/js/script.js',
		['jquery-cdn', 'swiper-js'],
		filemtime(get_template_directory() . '/assets/js/script.js'),
		true
	);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles_and_scripts');


// メインメニューの「投稿」部分を変更
function change_post_menu_label()
{
	global $menu;
	global $submenu;

	$menu[5][0] = 'ブログ';

	// サブメニューの「投稿一覧」や「新規追加」も変更
	$submenu['edit.php'][5][0] = 'ブログ一覧';
	$submenu['edit.php'][10][0] = '新しいブログを書く';
	$submenu['edit.php'][15][0] = 'ブログカテゴリー'; // カテゴリー
	$submenu['edit.php'][16][0] = 'ブログタグ'; // タグ
}
add_action('admin_menu', 'change_post_menu_label');


// カスタム投稿タイプの追加(人気記事)
function set_post_views($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '1');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
function track_post_views($post_id)
{
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

//投稿数を制限
function my_preget_posts($query)
{
	// 管理画面、またはメインクエリでない場合は処理を中断
	if (is_admin() || ! $query->is_main_query()) {
		return;
	}

	// 「キャンペーンのページ」の最大表示件数を4に設定
	if ($query->is_post_type_archive('campaign')) {
		$query->set('posts_per_page', 4);
		return;
	}

	// 「ボイスのページ（お客様の声）」の最大表示件数を6に設定
	if ($query->is_post_type_archive('voice')) {
		$query->set('posts_per_page', 6);
		return;
	}
}
add_action('pre_get_posts', 'my_preget_posts');


// カスタム投稿タイプの追加(Voice)
// function create_voice_post_type()
// {
// 	register_post_type(
// 		'voice',
// 		array(
// 			'labels'      => array(
// 				'name'          => __('口コミ'),
// 				'singular_name' => __('口コミ')
// 			),
// 			'public'      => true,
// 			'has_archive' => true,
// 			'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
// 			'menu_position' => 5,
// 			'menu_icon'   => 'dashicons-testimonial'
// 		)
// 	);
// }
// add_action('init', 'create_voice_post_type');


//カスタム投稿タイプの追加(Campaign)
// function create_custom_post_type()
// {
// 	register_post_type(
// 		'campaign',
// 		array(
// 			'labels'      => array(
// 				'name'          => __('キャンペーン'),
// 				'singular_name' => __('キャンペーン')
// 			),
// 			'public'      => true,
// 			'has_archive' => true,
// 			'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
// 			'menu_position' => 5,
// 			'menu_icon'   => 'dashicons-tickets-alt',
// 		)
// 	);
// }
// add_action('init', 'create_custom_post_type');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

	if (is_home()) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif (is_category()) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title('', false) . '';
	} elseif (is_tag()) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title('', false) . '';
	} elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title('', false) . '';
	} elseif (is_tax()) { /* タームアーカイブの場合 */
		$title = '' . single_term_title('', false);
	} elseif (is_search()) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
	} elseif (is_author()) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif (is_date()) { /* 日付アーカイブの場合 */
		$title = '';
		if (get_query_var('year')) {
			$title .= get_query_var('year') . '年';
		}
		if (get_query_var('monthnum')) {
			$title .= get_query_var('monthnum') . '月';
		}
		if (get_query_var('day')) {
			$title .= get_query_var('day') . '日';
		}
	}
	return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
// function my_excerpt_length($length)
// {
// 	return 80;
// }
// add_filter('excerpt_length', 'my_excerpt_length', 999);


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more($more)
{
	return '';
}
add_filter('excerpt_more', 'my_excerpt_more');

/* -------------------------------------------------
  Contact Form 7で自動挿入されるPタグ、brタグを削除
-------------------------------------------------- */
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
	return false;
}

// キャンペーンと口コミの詳細ページのURLを変更（404）
add_filter('campaign_rewrite_rules', '__return_empty_array');
add_filter('voice_rewrite_rules', '__return_empty_array');



// Contact Form7の送信ボタンをクリックした後の遷移先設定
add_action('wp_footer', 'add_origin_thanks_page');
function add_origin_thanks_page()
{
	$thanks = home_url('/contact-thanks/');
	echo <<< EOC
     <script>
       var thanksPage = {
         218: '{$thanks}',
       };
     document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = thanksPage[event.detail.contactFormId];
     }, false );
     </script>
   EOC;
}

// ダッシュボードにオリジナルウィジェットを追加する
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets()
{
	wp_add_dashboard_widget('my_theme_options_widget', '編集ページ', 'my_dashboard_widget_function');
}
// ダッシュボードのオリジナルウィジェット内に情報を掲載する
function my_dashboard_widget_function()
{
	// 管理画面に表示される内容を以下に書く
	echo '<ul class="custom_widget">
					<li>
						<a href="post.php?post=28&action=edit">
							<div class="dashicons dashicons-format-image"></div>
							<p>トップページ画像編集</p>
						</a>
					</li>
					<li>
						<a href="post.php?post=198&action=edit">
							<div class="dashicons dashicons-editor-help"></div>
							<p>よくある質問</p>
						</a>
					</li>
					<li>
						<a href="post.php?post=16&action=edit">
							<div class="dashicons dashicons-cart"></div>
							<p>料金一覧</p>
						</a>
					</li>
					<li>
						<a href="post.php?post=9&action=edit">
							<div class="dashicons dashicons-format-gallery"></div>
							<p>gallery画像編集</p>
						</a>
					</li>
				</ul>';
}
// ダッシュボードにスタイルシートを読み込む
function custom_admin_enqueue($hook)
{
	// ダッシュボードページのときだけ読み込む（任意）
	if ($hook === 'index.php') {
		wp_enqueue_style('custom_admin_enqueue', get_stylesheet_directory_uri() . '/my-widgets.css');
	}
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue');
