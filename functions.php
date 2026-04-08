<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
	// 1. Opcje Motywu (widoczne w panelu bocznym WP)
	Container::make('theme_options', 'Informacje ogólne')
		->add_fields(array(
			Field::make('date', 'crb_event_start', '')
				->set_attribute('placeholder', 'Data rozpoczęcia'),
			Field::make('date', 'crb_event_end', '')
				->set_attribute('placeholder', 'Data zakończenia'),
			Field::make('text', 'crb_edition', 'Edycja')
				->set_attribute('placeholder', 'XIV')
				->set_default_value('default', 'XIV')
				->set_required(true),
			Field::make('checkbox', 'crb_show_date', 'Pokaż datę i edycję na stronie')
				->set_option_value('no')
		));

	Container::make('theme_options', 'Goście')
		->add_fields(array(
			Field::make('complex', 'crb_guests_list', 'Lista gości')
				->add_fields(array(
					Field::make('text', 'title', 'Tytuł')
						->set_attribute('placeholder', 'Inż.'),
					Field::make('text', 'name', 'Imię i nazwisko')
						->set_attribute('placeholder', 'Jan Kocierz'),
					Field::make('text', 'job', 'Stanowisko / Praca')
						->set_attribute('placeholder', 'Katedra Matematyki Stosowanej'),
					Field::make('image', 'photo', 'Zdjęcie'),
					Field::make('textarea', 'description', 'Opis')
						->set_attribute('placeholder', 'Krótki opis gościa, który pojawi się na stronie. Możesz tu wpisać stanowisko, miejsce pracy, a także krótki opis zainteresowań naukowych lub osiągnięć.'),
					Field::make('checkbox', 'show_on_main_page', 'Pokaż na stronie głównej')
				))
				->set_layout('tabbed-vertical')
				->set_header_template('<%- title %> - <%- name %>'),

			Field::make('checkbox', 'crb_show_guests', 'Pokaż zaproszonych gości na stronie')
				->set_option_value('no'),



		));


	Container::make('theme_options', 'Harmonogram')
		->add_fields(array(

			Field::make('complex', 'crb_schedule_list', 'Harmonogram')
				->add_fields(array(
					Field::make('text', 'title', 'Tytuł')
						->set_attribute('placeholder', 'Wprowadzenie do analizy danych'),
					Field::make('time', 'time_start', 'Godzina rozpoczęcia')
						->set_storage_format('H:i')
						->set_picker_options(array(
							'time_24hr' => true,
							'noCalendar' => true,
							'dateFormat' => 'H:i',
							'altInput' => true,
							'altFormat' => 'H:i',
							'allowInput' => true,
							'enableSeconds' => false,
						)),

					Field::make('time', 'time_end', 'Godzina zakończenia')
						->set_storage_format('H:i')
						->set_picker_options(array(
							'time_24hr' => true,
							'noCalendar' => true,
							'dateFormat' => 'H:i',
							'altInput' => true,
							'altFormat' => 'H:i',
							'allowInput' => true,
							'enableSeconds' => false,
						)),

					Field::make('text', 'presenter', 'Prelegent')
						->set_attribute('placeholder', 'Jan Kocierz'),
					Field::make('select', 'day', 'Dzień')
						->add_options(function () {
							$n_days = date_diff(date_create(carbon_get_theme_option('crb_event_start')), date_create(carbon_get_theme_option('crb_event_end')))->days + 1;



							// Zabezpieczenie: jeśli puste lub < 1, pokazujemy chociaż 1 dzień
							if ($n_days < 1) {
								$n_days = 1;
							}
							$options = array();
							// Startujemy od 1, żeby nie było "Dnia 0"
							for ($i = 1; $i <= $n_days; $i++) {
								$options["day_$i"] = "Dzień $i";
							}

							return $options;
						}),
					Field::make('textarea', 'abstract', 'Abstrakt pracy')
						->set_attribute('placeholder', 'Krótki opis prezentacji, który pojawi się na stronie.'),


				))
				->set_layout('tabbed-vertical')
				->set_header_template('<%- day %> - <%- title %> - <%- presenter %> '),
			Field::make('checkbox', 'crb_show_schedule', 'Pokaż harmonogram na stronie')
				->set_option_value('no'),

		));

	Container::make("theme_options", "Zapisy")
		->add_fields(array(
			Field::make('date', 'crb_registration_start_date', 'Data rozpoczęcia zapisów')
				->set_attribute('placeholder', 'Data rozpoczęcia zapisów'),
			Field::make('date', 'crb_registration_end_date', 'Data zakończenia zapisów')
				->set_attribute('placeholder', 'Data zakończenia zapisów'),
			Field::make('date', 'crb_registration_end_date_active', 'Data zakończenia zapisów (aktywni uczestnicy)')
				->set_attribute('placeholder', 'Data zakończenia zapisów dla aktywnych uczestników'),
			Field::make('text', 'crb_form_link', 'Link do formularza rejestracji')
				->set_attribute('placeholder', 'https://docs.google.com/forms/...'),
			Field::make('checkbox', 'crb_show_form', 'Pokaż formularz rejestracji na stronie')
				->set_option_value('no'),
		));

	Container::make('theme_options', 'Komitet Organizacyjny')
		->add_fields(array(
			Field::make('complex', 'crb_committee_list', 'Lista członków komitetu')
				->add_fields('person', array(
					Field::make('text', 'name'),
					Field::make('text', 'role'),
					Field::make('image', 'photo'),
				))
		));

	Container::make('theme_options', 'Linki')
		->add_fields(array(
			Field::make('text', 'crb_facebook_link_sknm', 'Link do Facebooka SKNM')
				->set_attribute('placeholder', 'https://www.facebook.com/...')
				->set_default_value('https://www.facebook.com/sknmpk'),
			Field::make('text', 'crb_facebook_link_wsad', 'Link do Facebooka WSAD')
				->set_attribute('placeholder', 'https://www.facebook.com/...')
				->set_default_value('https://www.facebook.com/profile.php?id=61586222408929'),
			Field::make('text', 'crb_mail', 'Mail')
				->set_attribute('placeholder', 'mail@wsad.pl')
				->set_default_value('sknm.kontakt@gmail.com'),
		));

	Container::make('theme_options', 'Poprzednie edycje')
		->add_fields(array(
			Field::make('complex', 'crb_previous_editions', 'Lista poprzednich edycji')
				->add_fields('edycja', array(
					Field::make('text', 'title', 'Numer edycji')
						->set_attribute('placeholder', 'XIV'),
					Field::make('text', 'year-archive', 'Rok')
						->set_attribute('placeholder', '2025'),
					Field::make('media_gallery', 'photos', 'Zdjęcia z edycji')
						->set_type(array('image')),
				))
		));
}



function wsad_scripts_enqueue()
{
	$template_url = get_template_directory_uri();


	// Bootstrap (lokalny)
	wp_enqueue_style('bootstrap-css', $template_url . '/assets/bootstrap/css/bootstrap.min.css', array(), '4.6.0');

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic', array(), null);

	// Font Awesome (lokalny)
	wp_enqueue_style('font-awesome', $template_url . '/assets/fonts/font-awesome.min.css', array(), '4.7.0');

	// Simple Line Icons (lokalny)
	wp_enqueue_style('simple-line-icons', $template_url . '/assets/fonts/simple-line-icons.min.css', array(), '2.4.1');

	// Główny arkusz stylów motywu (style.css w folderze assets/css)
	wp_enqueue_style('wsad-main-style', $template_url . '/assets/css/style.css', array('bootstrap-css'), '1.0.0');
	wp_enqueue_style('baguettebox-css', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css');


	// --- SKRYPTY JS ---

	// jQuery (zastępujemy wbudowany WP wersją z Twojego pliku lub używamy 'jquery')
	// Jeśli chcesz użyć dokładnie tego pliku z assets:
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', $template_url . '/assets/js/jquery.min.js', array(), '3.5.1', true);

	// Bootstrap JS
	wp_enqueue_script('bootstrap-js', $template_url . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '4.6.0', true);

	// jQuery Easing (CDN)
	wp_enqueue_script('jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array('jquery'), '1.4.1', true);

	// Stylish Portfolio JS (lokalny)
	wp_enqueue_script('stylish-portfolio-js', $template_url . '/assets/js/stylish-portfolio.js', array('jquery', 'bootstrap-js'), '1.0.0', true);

	wp_enqueue_script('baguettebox-js', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js', array(), '1.11.1', true);

}

add_action('wp_enqueue_scripts', 'wsad_scripts_enqueue', 20);



function plMonth($monthNum)
{
	$months = [
		1 => 'stycznia',
		'lutego',
		'marca',
		'kwietnia',
		'maja',
		'czerwca',
		'lipca',
		'sierpnia',
		'września',
		'października',
		'listopada',
		'grudnia'
	];

	return $months[$monthNum];
}


function create_my_theme_pages()
{
	$pages = [
		'Zapisy' => 'page-zapisy.php',
		'Goscie' => 'page-goscie.php',
		'Poprzednie edycje' => 'page-poprzednie-edycje.php',
	];

	foreach ($pages as $title => $template) {
		if (!get_page_by_path(sanitize_title($title))) {
			wp_insert_post([
				'post_title' => $title,
				'post_content' => '',
				'post_status' => 'publish',
				'post_type' => 'page',
				'page_template' => $template
			]);
		}
	}
}
add_action('after_switch_theme', 'create_my_theme_pages');


add_action('admin_enqueue_scripts', function() {
	wp_add_inline_script(
		'carbon_fields-boot',
		'
		if (window.flatpickr {
		flatpickr..l10ns.default.firstDayOfWeek = 1;
		}
		',
	'after'
	);
});
