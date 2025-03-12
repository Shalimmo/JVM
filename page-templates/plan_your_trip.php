<div class="plan" id="plan-your-trip">

	<header class="plan--header">
		<div class="wrap">
			<h2>
				Plan your trip
			</h2>
			<p>
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>

	<div class="plan--content wrap">

		<form id="form-trip" method="post" accept-charset="utf-8" action="#plan-your-trip" class="plan--form">

			<fieldset>
				<div class="plan--form--header">
					<legend>
						TELL US ABOUT YOU
					</legend>
					<span class="plan--required">
						*required
					</span>
				</div>
				<div class="plan--form--line">
					<label for="trip-name">Name:<sup>*</sup>:</label>
					<input type="text" id="trip-name" name="trip-name" required>
				</div>
				<div class="plan--form--line">
					<label for="trip-mail">E-mail<sup>*</sup>:</label>
					<input type="email" id="trip-mail" name="trip-mail" required>
				</div>
				<div class="plan--form--line">
					<label for="trip-phone">Phone<sup>*</sup>:</label>
					<input type="text" id="trip-phone" name="trip-phone" required>
				</div>

				<!--<p class="plan--form--note">
					Please give us more information about you so we can choose the best option:
				</p>

				<div class="plan--form--line plan--new--fields">
					<label for="trip-interests">Interests:</label>
					<textarea id="trip-interests" name="trip-interests"></textarea>
				</div>-->

				<!--<div class="plan--form--line plan--line__columns">
					<label for="trip-experience">Your favorite experience:</label>
					<textarea id="trip-experience" name="trip-experience"></textarea>
				</div>-->
				<div class="plan--form--line plan--line__columns">
					<label for="trip-budget">Nightly Budget<sup>*</sup>:</label>
					<select id="trip-budget" name="trip-budget">
					<option>Please choose...</option>
					<option>$1,500 - $2,000</option>
					<option>$2,000 - $3,000</option>
					<option>$3,000 - $4,000</option>
					<option>$4,000 - $5,000</option>
					<option>$5,000 and above</option>
					</select>
				</div>

				<!--<div class="plan--form--line plan--line__columns">
					<label for="trip-find">How did you find us?<sup>*</sup></label>
					 <select id="trip-find" name="trip-find">
        				<option>Search engine</option>
        				<option>Newsletter</option>
        				<option>Conde Nast</option>
        				<option>Travel+Leisure</option>
        				<option>Wendy Perrin</option>
        				<option>Social Media</option>
        				<option>Word of mouth</option>
        				<option>Other</option>
      				</select>
				</div>-->

			</fieldset>

			<fieldset>

				<div class="plan--form--header">
					<legend>
						TELL US ABOUT YOUR TRIP
					</legend>
					<span class="plan--required">
						*required
					</span>
				</div>

				<!--<div class="plan--form--line plan--new--fields">
					<label for="trip-depature">Where will you be travelling from?:</label>
					<input type="text" id="trip-depature" name="trip-depature">
				</div>-->
				<div class="plan--form--line">
					<span class="label">Travel dates<sup>*</sup>:</span>

					<div class="plan--form--travel">
						<input id="trip-date-checkIn" name="trip-date-checkIn" placeholder="Check In" type="text" required>
						<label for="trip-date-checkIn"><span class="jmv-calendar"></span></label>

						<input id="trip-date-checkOut" name="trip-date-checkOut" placeholder="Check Out" type="text" required>
						<label for="trip-date-checkOut"><span class="jmv-calendar"></span></label>
					</div>

				</div>
				<div class="plan--form--line plan--line__columns">
					<label for="trip-adults">Adults<sup>*</sup>:</label>
					<div class="range-slider">
						<input type="range" class="input-range js-input-range" id="trip-adults" name="trip-adults" required min="0" max="20" value="0" step="1">
						<span class="range-value"></span>
					</div>
				</div>
				<div class="plan--form--line plan--line__columns">
					<label for="trip-children_0">Children <span>Number and age</span>:</label>
					<div class="plan--form--children">
						<!-- <div class="plan--form--ages"> -->
							<input type="text" class="js-childrenInput" id="trip-children_0" name="trip-children_0">
						<!-- </div> -->
<!-- 						<span class="js-button-more plan--children--btn"><span class="jmv-add"></span>More</span> -->
					</div>
				</div>

				<div class="plan--form--line plan--line__columns">
					<label for="trip-bedrooms">Number of bedrooms:</label>
					<div class="range-slider">
						<input type="range" class="input-range js-input-range" id="trip-bedrooms" name="trip-bedrooms" required min="0" max="10" value="0" step="1">
						<span class="range-value"></span>
					</div>
				</div>

			</fieldset>

			<fieldset>
				
				<div class="plan--form--line">
					<input type="checkbox" checked="checked" id="trip-newsletter" name="trip-newsletter">
					<label for="trip-newsletter"><span></span>I would you like to receive your monthly newsletter.</label>
				</div>

				<div class="g-recaptcha" data-sitekey="6Lf0qRETAAAAALtKhw0rKd4Nm0Q8d-cHXE7eTJr5"></div>

				<input type="submit" class="js-trip-submit" value="Send">
				<input type="reset" class="js-trip-button" value="Clear fields">

				<div class="js-mensaje plan--form--mensaje">

					<?php
					if (count($_POST) > 0)
					{
						//Leemos los Datos
						$formulario = array();
						$formulario['name'] = (isset($_POST['trip-name'])) ? (string)trim($_POST['trip-name']) : '';
						$formulario['mail'] = (isset($_POST['trip-mail'])) ? (string)trim($_POST['trip-mail']) : '';
						$formulario['phone'] = (isset($_POST['trip-phone'])) ? (string)trim($_POST['trip-phone']) : '';

						$formulario['interests'] = (isset($_POST['trip-interests'])) ? (string)trim($_POST['trip-interests']) : '';
						$formulario['budget'] = (isset($_POST['trip-budget'])) ? (string)trim($_POST['trip-budget']) : '';
						$formulario['find'] = (isset($_POST['trip-find'])) ? (string)trim($_POST['trip-find']) : '';

						$formulario['depature'] = (isset($_POST['trip-depature'])) ? (string)trim($_POST['trip-depature']) : '';
						$formulario['checkIn'] = (isset($_POST['trip-date-checkIn'])) ? (string)trim($_POST['trip-date-checkIn']) : '';
						$formulario['checkOut'] = (isset($_POST['trip-date-checkOut'])) ? (string)trim($_POST['trip-date-checkOut']) : '';

						$formulario['adults'] = (isset($_POST['trip-adults'])) ? (string)trim($_POST['trip-adults']) : '';

						$formulario['children_0'] = (isset($_POST['trip-children_0'])) ? (string)trim($_POST['trip-children_0']) : '';

						$formulario['bedrooms'] = (isset($_POST['trip-bedrooms'])) ? (string)trim($_POST['trip-bedrooms']) : '';

						$formulario['newsletter'] = (isset($_POST['trip-newsletter'])) ? 'Yes' : '';

						if( isset( $_POST['g-recaptcha-response'] ) )
						{
							$captcha=$_POST['g-recaptcha-response'];
						}
						if(!$captcha){
							echo '<p class="error">Please check the the captcha form.</p>';
							exit;
						}
						$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le9xAkTAAAAAMd91KxsAJDJ6tc276B_a7aiB_RQ&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

						if($response.success==false)
						{
							echo '<p class="error">You are spammer!</p>';
						}else
						{
							echo '<script type="text/javascript">'; 
							echo 'window.location.href = "https://villas.journeymexico.com/jmv-thank-you";';
							echo '</script>';
						}

						
						//Leemos la IP del Usuario
						if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) 
						{
							//check ip from share internet
							$ip = $_SERVER['HTTP_CLIENT_IP'];
						} 
						elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) 
						{
							//to check ip is pass from proxy
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} 
						else 
						{
							$ip = $_SERVER['REMOTE_ADDR'];
						}
						$ip_usuario = apply_filters( 'wpb_get_ip', $ip );
						$current_time = current_time( 'Y-m-d H:i:s' );
						$url= $_SERVER["REQUEST_URI"];
						$host= $_SERVER["HTTP_HOST"];

						//Insertamos el registro en el post type "nodo_suscripcion"
						$my_post = array(
						  'post_title'    => wp_strip_all_tags($formulario['name'] . ' - ' . $formulario['mail'], true),
						  'post_status'   => 'publish',
						  'post_author'   => 1,
						  'post_type'	  => 'nodo_suscripcion'
						);
						
						// Save Data
						$post_id = wp_insert_post( $my_post );

						//Verify
						if ($post_id != 0)
						{
							// Save Custom Fields
							if ( ! update_post_meta ($post_id, 'name', $formulario['name'] ) ) add_post_meta( $post_id, 'name', $formulario['name'] );
							if ( ! update_post_meta ($post_id, 'mail', $formulario['mail'] ) ) add_post_meta( $post_id, 'mail', $formulario['mail'] );
							if ( ! update_post_meta ($post_id, 'phone', $formulario['phone'] ) ) add_post_meta( $post_id, 'phone', $formulario['phone'] );
							if ( ! update_post_meta ($post_id, 'interests', $formulario['interests'] ) ) add_post_meta( $post_id, 'interests', $formulario['interests'] );
							if ( ! update_post_meta ($post_id, 'budget', $formulario['budget'] ) ) add_post_meta( $post_id, 'budget', $formulario['budget'] );
							if ( ! update_post_meta ($post_id, 'find', $formulario['find'] ) ) add_post_meta( $post_id, 'find', $formulario['find'] );
							if ( ! update_post_meta ($post_id, 'depature', $formulario['depature'] ) ) add_post_meta( $post_id, 'depature', $formulario['depature'] );
							if ( ! update_post_meta ($post_id, 'checkIn', $formulario['checkIn'] ) ) add_post_meta( $post_id, 'checkIn', $formulario['checkIn'] );
							if ( ! update_post_meta ($post_id, 'checkOut', $formulario['checkOut'] ) ) add_post_meta( $post_id, 'checkOut', $formulario['checkOut'] );
							if ( ! update_post_meta ($post_id, 'adults', $formulario['adults'] ) ) add_post_meta( $post_id, 'adults', $formulario['adults'] );
							if ( ! update_post_meta ($post_id, 'children_0', $formulario['children_0'] ) ) add_post_meta( $post_id, 'children_0', $formulario['children_0'] );
							if ( ! update_post_meta ($post_id, 'bedrooms', $formulario['bedrooms'] ) ) add_post_meta( $post_id, 'bedrooms', $formulario['bedrooms'] );
							if ( ! update_post_meta ($post_id, 'newsletter', $formulario['newsletter'] ) ) add_post_meta( $post_id, 'newsletter', $formulario['newsletter'] );

							if ( ! update_post_meta ($post_id, 'date', $current_time ) ) add_post_meta( $post_id, 'date', $current_time );
							if ( ! update_post_meta ($post_id, 'ip', $ip_usuario ) ) add_post_meta( $post_id, 'ip', $ip_usuario );
						}
						
						//Enviamos un Correo de Notificacion
						function wpse27856_set_content_type(){
						    return "text/html";
						}
						add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
						$to = 'sean@journeymexico.com';
						$subj = 'New request from JM Villas';
						$body = '<html>';
						$body.= '	<body>';
						$body.= '		<h2>About </strong>'.$formulario['name'].'</h2>';
						$body.= '		<p><strong>E-mail: </strong>'.$formulario['mail'].'</p>';
						$body.= '		<p><strong>Phone: </strong>'.$formulario['phone'].'</p>';
						if ($formulario['interests'] !== '')
						{
							$body.= '	<p><strong>Interests: </strong>'.$formulario['interests'].'</p>';
						}
						if ($formulario['budget'] !== '')
						{
							$body.= '	<p><strong>Nightly budget: </strong>'.$formulario['budget'].'</p>';
						}
						if ($formulario['find'] !== '')
						{
							$body.= '	<p><strong>How did you find us?: </strong>'.$formulario['find'].'</p>';
						}
						if ($formulario['newsletter'] !== '')
						{
							$body.= '	<p><strong>Want to receive our monthly newsletter:</strong> Yes</p>';
						}
						$body.= '		<h2>About the trip</h2>';
						$body.= '		<p><strong>Will you be travelling from: </strong>'.$formulario['depature'].'</p>';
						$body.= '		<p><strong>Check In date: </strong>'.$formulario['checkIn'].'</p>';
						$body.= '		<p><strong>Check Out date: </strong>'.$formulario['checkOut'].'</p>';
						$body.= '		<p><strong>Adults: </strong>'.$formulario['adults'].'</p>';
						$body.= '		<p><strong>Children: </strong>'.$formulario['children_0'].'</p>';
						if ($formulario['bedrooms'] !== '')
						{
							$body.= '	<p><strong>Number of bedrooms: </strong>'.$formulario['bedrooms'].'</p>';
						}

						$body.= '<p><strong>Requested Villa: </strong>'."https://".$host.$url.'</p>';
						$body.= '	</body>';
						$body.= '</html>';
						$headers = array('Content-Type: text/html; charset=UTF-8');
						$headers[] = 'Bcc: hunter@journeymexico.com, edgar@journeymexico.com, rich@journeymexico.com';
						wp_mail( $to, $subj, $body, $headers );
						
						// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
						remove_filter( 'wp_mail_content_type', 'wpse27856_set_content_type' );

						// Sent! alert
					}
					else 
					{
						// Nothing to show
					} ?>

				</div>

			</fieldset>



		</form>
	</div>

</div>