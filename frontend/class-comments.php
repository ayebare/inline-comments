<?php
class INCOM_Comments {

	function __construct() {
		add_action('wp_footer', array( $this, 'generateCommentsAndForm' ) );
	}

	// /*
	//  * Get PHP code. Can be decoded in JS file with JSON.parse(@comments_php)
	//  */
	// function getCode() {
	// 	$items = $this->generateCode();

	//     $str = serialize($items);
	//     $comments_php = json_encode( unserialize( $str) );
	// 	return $comments_php;
	// }

	// private function generateCode() {
	// 	$code = array();

	// 	$postId = 'post_id=' . get_the_ID();
	// 	$comments = get_comments( $postId );

	// 	foreach($comments as $comment) :
	// 		$code[] = '<p>' . $comment->comment_content . '</p>';
	// 	endforeach;

	// 	return $code;
	// }

	function generateCommentsAndForm() {
		echo '<div id="comments-and-form">';

		$this->generateCommentsList();
		$this->generateCommentForm();

		echo '</div>';	//<!--#incom_commentform-->
	}

	private function generateCommentsList() {
		$comments = get_comments( 'post_id=' . get_the_ID() );

		foreach($comments as $comment) :
			echo '<p>' . $comment->comment_content . '</p>';
		endforeach;
	}

	private function generateCommentForm() {
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		comment_form(array(
			//'id_form' => '',
			'comment_form_before' => '',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'title_reply' => '',
			'title_reply_to' => '',
			'logged_in_as' => '<p class="logged-in-as">' .
			    sprintf(
			    __( 'Logged in as <a href="%1$s">%2$s</a>.' ),
			      admin_url( 'profile.php' ),
			      $user_identity
			    ) . '</p>'
			)
		);
	}

}

function initialize_incom_comments() {
	$incom_comments = new INCOM_Comments();
}
add_action( 'init', 'initialize_incom_comments' );