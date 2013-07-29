<?php
/**
* Load Request password using ajax 
*/
function ajaxlogin_password_form($type = 'ajax') {

  $form = drupal_get_form('ajaxlogin_user_pass');
  $output = render($form);

  if ($type == 'ajax') {
    $commands = array();
    // Replace the login form with request for password form
    $commands[] = ajax_command_replace('#ajaxlogin-login-form', $output);
    $page = array('#type' => 'ajax', '#commands' => $commands);
    $commands = ajax_prepare_response($page);
    print ajax_render($commands);
  }
  else {
    return $output;
  }
}

/**
* Request user password form
*/
function ajaxlogin_user_pass($form, &$form_state) {
  module_load_include('pages.inc', 'user');
  global $user;

  $form['#id'] = 'ajaxlogin-user-pass';

  $form['#attributes']['class'] = array('ajaxlogin-user-form');

  $form['errors'] = array('#markup' => '<div id="ajaxlogin-error"></div>');

  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Username or e-mail address'),
    '#size' => 60,
    '#maxlength' => max(USERNAME_MAX_LENGTH, EMAIL_MAX_LENGTH),
    '#required' => TRUE,
  );

  // Allow logged in users to request this also.
  if ($user->uid > 0) {
    $form['name']['#type'] = 'value';
    $form['name']['#value'] = $user->mail;
    $form['mail'] = array(
      '#prefix' => '<p>',
      '#markup' =>  t('Password reset instructions will be mailed to %email. You must log out to use the password reset link in the e-mail.', array('%email' => $user->mail)),
      '#suffix' => '</p>',
    );
  }

  $form['#validate'][] = 'user_pass_validate';
  $form['#submit'][] = 'user_pass_submit';

  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('E-mail new password'),
    '#ajax' => array(
      'path' => 'ajaxlogin/request_password',
    ),
  );

  return $form;
}

/**
* Process user login form using ajax
*/
function ajaxlogin_login_ajax_callback() {
  // Get the form details
  list($form, $form_state) = ajax_get_form();
  drupal_process_form($form['#form_id'], $form, $form_state);
  $commands = array();
  if (!form_get_errors()) {
    // No form error, Lets print a login successful message
    // And do a page reload
    $commands[] = ajax_command_html('#ajaxlogin-error', t('Login successful. You are now being redirected.'));
	
	$result = db_query("SELECT rid FROM {users_roles} u where u.uid = ".$form_state['uid']);
  
		if ($result) {
			while ($row = $result->fetchAssoc()) {
				$rid = $row['rid'];
			}
		}
		
		if (isset($rid)) {
			if ($rid == 4) {
				$settings_data = array('ajaxlogin_reload' => TRUE,'redirect_page' => 'accommodation');
			} else if ($rid == 5) {
				$settings_data = array('ajaxlogin_reload' => TRUE,'redirect_page' => 'traveller');
			} else if ($rid == 3) {
				$settings_data = array('ajaxlogin_reload' => TRUE,'redirect_page' => 'admin');
			}
		} else {
			$settings_data = array('ajaxlogin_reload' => TRUE);
		}
		
	
    
    array_unshift($commands, ajax_command_settings($settings_data, FALSE));
	//drupal_goto('/user');window.location.reload();
  }
  else {
    // throw out errors
    $commands[] = ajax_command_html('#ajaxlogin-error', theme('status_messages'));
  }
  //print $user->id;
  //print_r($commands);
  //print_r($form_state['uid']);
  

  return drupal_json_encode($commands);
}

/**
* Request password ajax call
*/
function ajaxlogin_request_password_ajax_callback() {
  module_load_include('pages.inc', 'user');

  list($form, $form_state) = ajax_get_form();
  drupal_process_form($form['#form_id'], $form, $form_state);
  $commands = array();
  if (!form_get_errors()) {
    // Status containing message "Further instructions have been send to your..."
    $commands[] = ajax_command_html('#ajaxlogin-user-pass', theme('status_messages'));
  }
  else {
    $commands[] = ajax_command_html('#ajaxlogin-error', theme('status_messages'));
  }
  return drupal_json_encode($commands);
}
?>