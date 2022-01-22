<?php 
get_header();
/*
Template Name: API Response

*/

?>

<table class="table">
	<tr>
		<th>Name</th>
		<th>UserName</th>
		<th>Email</th>
		<th>Phone</th>
	</tr>
<?php 

$url = 'https://jsonplaceholder.typicode.com/users';

$arguments = array(
    'method' => 'GET'
);

$response = wp_remote_get( $url, $arguments );


if ( is_wp_error( $response ) ) {
	$error_message = $response->get_error_message();
	return "Something went wrong: $error_message";
} else {

	$totaldatas=json_decode(wp_remote_retrieve_body( $response ) );
	
	foreach ($totaldatas as $value) {
		?>
		<tr>
			<td><?=$value->name; ?></td>
			<td><?=$value->username; ?></td>
			<td><?=$value->email; ?></td>
			<td><?=$value->phone; ?></td>
		</tr>
		<?php
	}
}
?>

</table>
<?php get_footer(); ?>