
<!-- Latest Tweet  -->
<section  id="latest-tweet">
	<div class="gray-bg section-padding latest-tweet">
		<div class="container">
			<h2 class="section-title sub"><?php echo esc_html(zels_get_option('twitter_section_title') ); ?></h2>
			<div class="tweet-slider">

				<div class="twitter-icon text-center">
					<span class="icon">
						<i class="fa fa-twitter"> </i>
					</span><!-- /.icon -->
				</div><!-- /.twitter-icon -->

				<div id="tweet-slider" class="carousel slide text-center" data-ride="carousel"> 
					<div class="carousel-inner">



						<?php

						function sanitize_links($tweet) {
							if(isset($tweet->retweeted_status)) {
								$rt_section = current(explode(":", $tweet->text));
								$text = $rt_section.": ";
								$text .= $tweet->retweeted_status->text;
							} else {
								$text = $tweet->text;
							}
							$text = preg_replace('/((http)+(s)?:\/\/[^<>\s]+)/i', '<a href="$0" target="_blank" rel="nofollow">$0</a>', $text );
							$text = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/$1" target="_blank" rel="nofollow">@$1</a>', $text );
							$text = preg_replace('/[#]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/search?q=%23$1" target="_blank" rel="nofollow">$0</a>', $text );
							return $text;

						}

						$tweets_count           = zels_get_option('tweet_count');       
						$name               = zels_get_option('twitter_username');       
						$timeto_store           = zels_get_option('tweet_cache_time');
						$replies_excl   = false;
						$transName = 'list-tweets-'.$name; 
						$backupName = $transName . '-backup'; 
						if(false === ($tweets = get_transient($transName) ) ) :
							require_once (get_template_directory() . '/inc/twitteroauth.php');

						$api_call = new TwitterOAuth(
							zels_get_option('consumer_key'),           
							zels_get_option('consumer_secret'),   
							zels_get_option('access_token'),       
							zels_get_option('access_token_secret')
							);
						$totalToFetch = ($replies_excl) ? max(50, $tweets_count * 3) : $tweets_count;

						$fetchedTweets = $api_call->get(
							'statuses/user_timeline',
							array(
								'screen_name'     => $name,
								'count'           => $totalToFetch,
								'replies_excl' => $replies_excl
								)
							);

						if($api_call->http_code != 200) :
							$tweets = get_option($backupName);

						else :
							$limitToDisplay = min($tweets_count, count($fetchedTweets));

						for($i = 0; $i < $limitToDisplay; $i++) :
							$tweet = $fetchedTweets[$i];
						$name = $tweet->user->name;
						$screen_name = $tweet->user->screen_name;
						$permalink = 'http://twitter.com/'. $name .'/status/'. $tweet->id_str;
						$tweet_id = $tweet->id_str;
						$image = $tweet->user->profile_image_url;
						$text = sanitize_links($tweet);
						$time = $tweet->created_at;
						$time = date_parse($time);
						$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
						$tweets[] = array(
							'text' => $text,
							'scr_name'=>$screen_name,
							'favourite_count'=>$tweet->favorite_count,
							'retweet_count'=>$tweet->retweet_count,
							'name' => $name,
							'permalink' => $permalink,
							'image' => $image,
							'time' => $uTime,
							'tweet_id' => $tweet_id
							);
						endfor;
						set_transient($transName, $tweets, 60 * $timeto_store);
						update_option($backupName, $tweets);
						endif;
						endif;  
						if(!function_exists('twitter_time_diff')) {
							function twitter_time_diff( $from, $to = '' ) {
								$diff = human_time_diff($from,$to);
								$replace = array(
									' hour' => 'h',
									' hours' => 'h',
									' day' => 'd',
									' days' => 'd',
									' minute' => 'm',
									' minutes' => 'm',
									' second' => 's',
									' seconds' => 's',
									);
								return strtr($diff,$replace);
							}
						}
						if($tweets) : ?>
						<?php 
						$i = 0;
						foreach($tweets as $t) : ?>
							<div class="item <?php echo (!$i) ? 'active' : '' ?>">
								<div class="tweet-message">
									<?php
									echo '<div class="tweet"><div class="wdtf-user-card ltr">';

									if(!isset($screen_name)){$screen_name = $name;}


									echo '<div class="tweet">';
									echo "<span class=\"screen_name\">{$t['name']}</span><br>";
									echo "<a href=\"https://twitter.com/{$screen_name}\" target=\"_blank\" dir=\"ltr\">@{$screen_name}</a></div>";


									echo '<div class="clear"></div></div>'; 
									?>
									<div class="tweet_data">
										<?php echo $t['text']; ?>
									</div>


									<div class="tweets-intent-data">
										<?php if($t['favourite_count']!=0 || $t['retweet_count']!=0){?>
										<span class="retweet">
											<?php if($t['retweet_count']!=0)
											{?>
											<span class="stats-favorites">
												<i class="fa fa-retweet"></i><strong><?php echo esc_html($t['retweet_count']);?></strong>Retweet <?php if($t['retweet_count']>1)echo's';?>
											</span>

											<?php } ?>

										</span><br>

										<div class="seperator_wpltf"></div>
										<?php }?>

									</div>

									<span class="tweet-time">
										<?php

										$timeDisplay = human_time_diff($t['time'], current_time('timestamp'));

										$displayAgo = " ago";

										printf(__('%1$s%2$s', 'focuz'), $timeDisplay, $displayAgo);

										?>
									</span>
								</div>
							</div>
						</div>
					<?php 
					$i = 1;
					endforeach; ?>

				<?php else : ?>
					<span>Waiting for twitter.com..API error. Please insert api key.</span>
				<?php endif; ?>


			</div><!-- /.carousel-inner -->
			<a class="slide-nav left" href="#tweet-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
			<a class="slide-nav right" href="#tweet-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
		</div><!-- /#tweet-slider -->

	</div><!-- /.tweet-slider -->
</div><!-- /.container -->
</div><!-- /.latest-tweet -->
</section><!-- /#latest-tweet -->
<!-- Latest Tweet End -->
