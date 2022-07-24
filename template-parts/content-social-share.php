<?php
/**
 * Social Share
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nari
 */

$post_id = get_the_ID();

?>

<div class="nari-social-share">
	<ul>
		<li>
			<a target="_blank" href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?display=popup&u=' . urlencode( get_permalink( $post_id ) ) ); ?>">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18.6667 17.9998H22L23.3333 12.6665H18.6667V9.99984C18.6667 8.6265 18.6667 7.33317 21.3333 7.33317H23.3333V2.85317C22.8987 2.79584 21.2573 2.6665 19.524 2.6665C15.904 2.6665 13.3333 4.87584 13.3333 8.93317V12.6665H9.33334V17.9998H13.3333V29.3332H18.6667V17.9998Z" fill="white"/>
				</svg>
			</a>
		</li>

		<li>
			<a target="_blank" href="<?php echo esc_url( 'http://twitter.com/share?text=' . urlencode( strip_tags( get_the_title() ) ) . '&amp;url=' . urlencode( get_the_permalink( $post_id ) ) ); ?>">
				<svg width="32px" height="27px" viewBox="0 0 32 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g transform="translate(0.000000, 0.497376)" fill="none">
				            <path d="M28.7239488,6.47314231 C28.7434491,6.75524672 28.7434491,7.03735113 28.7434491,7.32205558 C28.7434491,15.9970911 22.1393459,26.0020475 10.0634572,26.0020475 L10.0634572,25.9968474 C6.4962015,26.0020475 3.00304692,24.9802315 0,23.0536014 C0.518708105,23.1160024 1.04001625,23.1472028 1.56262442,23.1485029 C4.51887061,23.1511029 7.39061548,22.1591874 9.71635182,20.3326589 C6.90700792,20.279358 4.44346943,18.4476294 3.58285598,15.7734876 C4.56697136,15.9632906 5.5809872,15.92429 6.5469023,15.6603859 C3.48405444,15.0415762 1.28052001,12.3505341 1.28052001,9.22528532 C1.28052001,9.19668487 1.28052001,9.16938444 1.28052001,9.14208402 C2.19313427,9.65039196 3.21495023,9.93249637 4.26016657,9.96369685 C1.37542149,8.03576673 0.486207597,4.19810677 2.22823482,1.19765988 C5.5614869,5.29922397 10.4794637,7.79266293 15.7588462,8.05656705 C15.229738,5.77633143 15.9525493,3.38689409 17.6581759,1.78396905 C20.3024172,-0.701669793 24.4611822,-0.574267802 26.946821,2.06867349 C28.417144,1.77876896 29.826366,1.23926053 31.1159862,0.47484859 C30.6258785,1.99457234 29.6001625,3.28549251 28.2299411,4.10580532 C29.5312614,3.95240293 30.8026813,3.60399748 32,3.07228918 C31.1185862,4.39310981 30.0083689,5.54362779 28.7239488,6.47314231 Z" fill="white"></path>
				        </g>
				    </g>
				</svg>
			</a>
		</li>

		<li>
			<a target="_blank" href="<?php echo esc_url( 'https://pinterest.com/pin/create/button/?media=' . esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ) ) . '&amp;description=' . urlencode( strip_tags( get_the_title() ) ) . '&amp;url=' . urlencode( get_permalink( $post_id ) ) ); ?>">
				<svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.617 13.227C8.091 15.981 7.45 18.621 5.549 20c-.586-4.162.861-7.287 1.534-10.605-1.147-1.93.138-5.812 2.555-4.855 2.975 1.176-2.576 7.172 1.15 7.922 3.891.781 5.479-6.75 3.066-9.199C10.369-.275 3.708 3.18 4.528 8.245c.199 1.238 1.478 1.613.511 3.322-2.231-.494-2.897-2.254-2.811-4.6.138-3.84 3.449-6.527 6.771-6.9 4.201-.471 8.144 1.543 8.689 5.494.613 4.461-1.896 9.293-6.389 8.945-1.218-.095-1.728-.699-2.682-1.279z" fill="white"/></svg>
			</a>
		</li>

		<li>
			<a target="_blank" href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&amp;title=' . urlencode( strip_tags( get_the_title() ) ) . '&amp;source=' . urlencode( get_permalink( $post_id ) ) . '&amp;url=' . urlencode( get_permalink( $post_id ) ) ); ?>">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9.25333 6.66654C9.25298 7.37378 8.97169 8.05192 8.47134 8.55176C7.97099 9.05161 7.29258 9.33222 6.58533 9.33187C5.87809 9.33152 5.19995 9.05022 4.7001 8.54988C4.20026 8.04953 3.91964 7.37111 3.92 6.66387C3.92035 5.95662 4.20164 5.27849 4.70199 4.77864C5.20234 4.27879 5.88075 3.99818 6.588 3.99854C7.29524 3.99889 7.97338 4.28018 8.47323 4.78053C8.97307 5.28087 9.25369 5.95929 9.25333 6.66654V6.66654ZM9.33333 11.3065H4V27.9999H9.33333V11.3065ZM17.76 11.3065H12.4533V27.9999H17.7067V19.2399C17.7067 14.3599 24.0667 13.9065 24.0667 19.2399V27.9999H29.3333V17.4265C29.3333 9.19987 19.92 9.50654 17.7067 13.5465L17.76 11.3065V11.3065Z" fill="white"/>
				</svg>
			</a>
		</li>
	</ul>
</div>
