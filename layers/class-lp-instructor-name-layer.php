<?php
class LP_Certificate_Instructor_Name_Layer extends LP_Certificate_Layer {
	public function apply( $data ) {

		$post_id = $data['course_id'];

		$author_id = get_post_field( 'post_author', $post_id );

		global $wpdb;

		$url_query = $wpdb->prepare( "
			SELECT user_login
			FROM {$wpdb->users}
			WHERE ID = $author_id
		", $post_id );

		$author_name = $wpdb->get_var($url_query);
        
        $this->options['text'] = $author_name;
	}
}