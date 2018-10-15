<?php
/**
 * Plugin Name: Mk Short Code
 * Plugin URI: http://www.mayankpatel104.blogspot.in/
 * Description: Place this code to your required file : if(function_exists('fnDisplayFollowusLinks')){ fnDisplayFollowusLinks();}
 * Version: 1.0
 * Author: Mayank Patel
 * Author URI: http://www.mayankpatel104.blogspot.in/
 * License: A "mk-shortcode"
 */
define( 'PLUGIN_HTTP_PATH' , WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) );
define( 'PLUGIN_ABSPATH' , WP_PLUGIN_DIR . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) );
add_action('admin_menu', 'fnFollowusPlugin');
function fnFollowusPlugin() 
{
	add_menu_page('Follow US','Follow Us',7,'mk_follow_us','fnFollowus');
}
function fnFollowus()
{
	include_once "mk_follow_us_settings.php";
}

function fnDisplayFollowusLinks()
{
	$strHtml = "";
	
	$strFacebookUrl = "";
	$strTwitterUrl = "";
	$strLinkedinUrl = "";
	$strGoogleplusUrl = "";
	$strPinterestUrl = "";
	$strStumbleuponUrl = "";
	$strInstagramUrl = "";
	$strTumblrUrl = "";
	$strRedditUrl = "";
	
	$strFacebookUrl = get_option("mk_facebook_url");
	$strTwitterUrl = get_option("mk_twitter_url");
	$strLinkedinUrl = get_option("mk_linkedin_url");
	$strGoogleplusUrl = get_option("mk_googleplus_url");
	$strPinterestUrl = get_option("mk_pinterest_url");
	$strStumbleuponUrl = get_option("mk_stumbleupon_url");
	$strInstagramUrl = get_option("mk_instagram_url");
	$strTumblrUrl = get_option("mk_tumblr_url");
	$strRedditUrl = get_option("mk_reddit_url");
	
	$strImage = PLUGIN_HTTP_PATH."images/";
	
	$strHtml .= "<style>
	.wrapper-followus{float:right;}
	ul li{list-style:none;float:left;margin-right:10px;}
	ul li img{width:32px;height:32px;}
	</style>";
	
	$strHtml .= "<div class='wrapper-followus'>";
	$strHtml .= "<ul>";
		if(isset($strFacebookUrl) && $strFacebookUrl != "")
		{
			$strHtml .= "<li><a href=".$strFacebookUrl." target='_blank'><img src='".$strImage."facebook.png"."' /></a></li>";
		}
		if(isset($strTwitterUrl) && $strTwitterUrl != "")
		{
			$strHtml .= "<li><a href=".$strTwitterUrl." target='_blank'><img src='".$strImage."twitter.png"."' /></a></li>";
		}
		if(isset($strLinkedinUrl) && $strLinkedinUrl != "")
		{
			$strHtml .= "<li><a href=".$strLinkedinUrl." target='_blank'><img src='".$strImage."inicon.png"."' /></a></li>";
		}
		if(isset($strGoogleplusUrl) && $strGoogleplusUrl != "")
		{
			$strHtml .= "<li><a href=".$strGoogleplusUrl." target='_blank'><img src='".$strImage."gplus.png"."' /></a></li>";
		}
		if(isset($strPinterestUrl) && $strPinterestUrl != "")
		{
			$strHtml .= "<li><a href=".$strPinterestUrl." target='_blank'><img src='".$strImage."pinterest.jpg"."' /></a></li>";
		}
		if(isset($strStumbleuponUrl) && $strStumbleuponUrl != "")
		{
			$strHtml .= "<li><a href=".$strStumbleuponUrl." target='_blank'><img src='".$strImage."stumbleupon.jpg"."' /></a></li>";
		}
		if(isset($strTumblrUrl) && $strTumblrUrl != "")
		{
			$strHtml .= "<li><a href=".$strTumblrUrl." target='_blank'><img src='".$strImage."tumblr.png"."' /></a></li>";
		}
		if(isset($strRedditUrl) && $strRedditUrl != "")
		{
			$strHtml .= "<li><a href=".$strRedditUrl." target='_blank'><img src='".$strImage."reddit.png"."' /></a></li>";
		}
	$strHtml .= "</ul>";
	$strHtml .= "</div>";
	return $strHtml;
}


add_shortcode("mk_shortcode", "fnDisplayFollowusLinks");
?>