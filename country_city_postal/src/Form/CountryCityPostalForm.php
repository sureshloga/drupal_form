<?php

namespace Drupal\country_city_postal\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;

class CountryCityPostalForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'country_city_postal_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['country'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country'),
      '#required' => TRUE,
    ];

    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#required' => TRUE,
    ];

    $form['postal_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Postal Code'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
	

    return $form;
  }

  

	  /**
	   * {@inheritdoc}
	   */
	  public function submitForm(array &$form, FormStateInterface $form_state) {
		$country = $form_state->getValue('country');
		$city = $form_state->getValue('city');
		$postal_code = $form_state->getValue('postal_code');
		
		$countryList = ['Austria' => 'AT', 'Belgium' => 'BE', 'Bulgaria' => 'BG', 'Cyprus' => 'CY', 'Czechia' => 'CZ', 'Germany' => 'DE', 'Denmark' => 'DK', 'Estonia' => 'EE', 'Spain' => 'ES', 'Finland' => 'FI', 'France' => 'FR', 'United Kingdom of Great Britain and Northern Ireland' => 'GB', 'Greece' => 'GR', 'Croatia' => 'HR', 'Hungary' => 'HU', 'Italy' => 'IT', 'Lithuania' => 'LT', 'Luxembourg' => 'LU', 'Latvia' => 'LV', 'Netherlands' => 'NL', 'Norway' => 'NO', 'Poland' => 'PL', 'Portugal' => 'PT', 'Romania' => 'RO', 'Sweden' => 'SE', 'Slovenia' => 'SI', 'Slovakia' => 'SK', 'United Arab Emirates' => 'AE', 'Afghanistan' => 'AF', 'Albania' => 'AL', 'Armenia' => 'AM', 'Angola' => 'AO', 'Argentina' => 'AR', 'Austria' => 'AT', 'Australia' => 'AU', 'Bosnia and Herzegovina' => 'BA', 'Barbados' => 'BB', 'Bangladesh' => 'BD', 'Belgium' => 'BE', 'Burkina Faso' => 'BF', 'Bulgaria' => 'BG', 'Bahrain' => 'BH', 'Benin' => 'BJ', 'Bermuda' => 'BM', 'Brunei Darussalam' => 'BN', 'Bolivia' => 'BO', 'Brazil' => 'BR', 'Bahamas' => 'BS', 'Bhutan' => 'BT', 'Botswana' => 'BW', 'Belarus' => 'BY', 'Canada' => 'CA', 'Congo' => 'CG', 'Switzerland' => 'CH', 'Côte dIvoire' => 'CI', 'Cook Islands' => 'CK', 'Chile' => 'CL', 'China' => 'CN', 'Colombia' => 'CO', 'Costa Rica' => 'CR', 'Cabo Verde' => 'CV', 'Cyprus' => 'CY', 'Czechia' => 'CZ', 'Germany' => 'DE', 'Denmark' => 'DK', 'Dominican Republic' => 'DO', 'Algeria' => 'DZ', 'Ecuador' => 'EC', 'Estonia' => 'EE', 'Egypt' => 'EG', 'Spain' => 'ES', 'Ethiopia' => 'ET', 'Finland' => 'FI', 'Fiji' => 'FJ', 'France' => 'FR', 'United Kingdom of Great Britain and Northern Ireland' => 'GB', 'Georgia' => 'GE', 'French Guiana' => 'GF', 'Guernsey' => 'GG', 'Ghana' => 'GH', 'Gambia' => 'GM', 'Guadeloupe' => 'GP', 'Greece' => 'GR', 'Guatemala' => 'GT', 'Guinea-Bissau' => 'GW', 'Hong Kong' => 'HK', 'Honduras' => 'HN', 'Croatia' => 'HR', 'Haiti' => 'HT', 'Hungary' => 'HU', 'Indonesia' => 'ID', 'Ireland' => 'IE', 'Israel' => 'IL', 'India' => 'IN', 'Iraq' => 'IQ', 'Iran' => 'IR', 'Iceland' => 'IS', 'Italy' => 'IT', 'Jersey' => 'JE', 'Jamaica' => 'JM', 'Jordan' => 'JO', 'Japan' => 'JP', 'Kenya' => 'KE', 'Kyrgyzstan' => 'KG', 'Cambodia' => 'KH', 'Kiribati' => 'KI', 'Comoros' => 'KM', 'North Korea' => 'KP', 'South Korea' => 'KR', 'Kosovo' => 'KV', 'Kuwait' => 'KW', 'Cayman Islands' => 'KY', 'Kazakhstan' => 'KZ', 'Laos' => 'LA', 'Lebanon' => 'LB', 'Sri Lanka' => 'LK', 'Liberia' => 'LR', 'Lesotho' => 'LS', 'Lithuania' => 'LT', 'Luxembourg' => 'LU', 'Latvia' => 'LV', 'Morocco' => 'MA', 'Moldova' => 'MD', 'Madagascar' => 'MG', 'North Macedonia' => 'MK', 'Mali' => 'ML', 'Myanmar' => 'MM', 'Mongolia' => 'MN', 'Macao' => 'MO', 'Northern Mariana Islands' => 'MP', 'Martinique' => 'MQ', 'Mauritania' => 'MR', 'Malta' => 'MT', 'Mauritius' => 'MU', 'Maldives' => 'MV', 'Malawi' => 'MW', 'Mexico' => 'MX', 'Malaysia' => 'MY', 'Mozambique' => 'MZ', 'Namibia' => 'NA', 'New Caledonia' => 'NC', 'Nigeria' => 'NG', 'Nicaragua' => 'NI', 'Netherlands' => 'NL', 'Norway' => 'NO', 'Nepal' => 'NP', 'Nauru' => 'NR', 'Niue' => 'NU', 'New Zealand' => 'NZ', 'Oman' => 'OM', 'Panama' => 'PA', 'Peru' => 'PE', 'French Polynesia' => 'PF', 'Papua New Guinea' => 'PG', 'Philippines' => 'PH', 'Pakistan' => 'PK', 'Poland' => 'PL', 'Puerto Rico' => 'PR', 'Portugal' => 'PT', 'Paraguay' => 'PY', 'Qatar' => 'QA', 'Réunion' => 'RE', 'Romania' => 'RO', 'Serbia' => 'RS', 'Russian' => 'RU', 'Rwanda' => 'RW', 'Saudi Arabia' => 'SA', 'Solomon Islands' => 'SB', 'Seychelles' => 'SC', 'Sudan' => 'SD', 'Sweden' => 'SE', 'Singapore' => 'SG', 'Slovenia' => 'SI', 'Slovakia' => 'SK', 'Sierra Leone' => 'SL', 'Senegal' => 'SN', 'South Sudan' => 'SS', 'El Salvador' => 'SV', 'Syrian Arab Republic' => 'SY', 'Eswatini' => 'SZ', 'Togo' => 'TG', 'Thailand' => 'TH', 'Timor-Leste' => 'TL', 'Tunisia' => 'TN', 'Tonga' => 'TO', 'Turkey' => 'TR', 'Trinidad and Tobago' => 'TT', 'Tuvalu' => 'TV', 'Taiwan' => 'TW', 'Tanzania' => 'TZ', 'Ukraine' => 'UA', 'Uganda' => 'UG', 'United States of America' => 'US', 'Uruguay' => 'UY', 'Uzbekistan' => 'UZ', 'Venezuela' => 'VE', 'Virgin Islands' => 'VG', 'Virgin Islands' => 'VI', 'Viet Nam' => 'VN', 'Vanuatu' => 'VU', 'Samoa' => 'WS', 'Ceuta' => 'XC', 'Montenegro' => 'XM', 'Mayotte' => 'YT', 'South Africa' => 'ZA', 'Zambia' => 'ZM', 'Zimbabwe' => 'ZW'];
		
		
		$stateCode = $countryList[ucwords($country)];
		
		$url = "https://api.dhl.com/location-finder/v1/find-by-address?countryCode=". $stateCode . "&postalCode=" . $postal_code . "&addressLocality=" . $city;

		// Initialize cURL session
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['DHL-API-Key:demo-key']);
		$output = curl_exec($ch);
		if(curl_errno($ch)) {
			echo 'cURL Error: ' . curl_error($ch);
		}
		curl_close($ch);

		// Decode JSON output
		$resultInfo = json_decode($output, true);
		
		$display = "";
		
		foreach ($resultInfo as $loc => $info) {
			foreach ($info as $values) {
				
				$name = $values["name"];
				$addressInfo = $values["place"]["address"];
				
				$contryCode = $addressInfo["countryCode"];
				$postalCode = $addressInfo["postalCode"];
				$addressLoc = $addressInfo["addressLocality"];
				$streetAddress = $addressInfo["streetAddress"];
				
				$workingHours = ($values["openingHours"]);
				$skipNotWorkWeekend = count($values["openingHours"]);
				
				
				if ($skipNotWorkWeekend != 7) {
					continue;					
				}
				
				$display .=  "<div>LocationName : ". $name . "</div>";
				$display .=  "<div>Address : </div><div>";
					$display .=  "<div>CountryCode : " . $contryCode .  "</div>";
					$display .=  "<div>PostalCode : " . $postalCode . "</div>";
					$display .=  "<div>addressLocality : " . $addressLoc . "</div>";
					$display .=  "<div>streetAddress : " . $streetAddress . "</div>";
				$display .=  "</div>";	
				
				$display .=  "<div>OpeningHours : </div><div>";
				
				foreach ($workingHours as $workHour) {
					$start = $workHour['opens'];
					$end = $workHour['closes'];
					$day = str_replace("http://schema.org/", "", $workHour['dayOfWeek']);
					
					
					$display .= "<div>" . strtolower($day) . ":".  $start - $end . "</div>";					
				}
				$display .=  "</div>";
				$display .=  "<br>";
				
			}
			
		}
		
		
		$htmlMessage = [
			'#markup' => $display,
		];
		
		

		// Handle the form submission, e.g., save data to the database.
		\Drupal::messenger()->addStatus($this->t('Country: @country, City: @city, Postal Code: @postal_code', [
		  '@country' => $country,
		  '@city' => $city,
		  '@postal_code' => $postal_code
		]));
		
		\Drupal::messenger()->addMessage($htmlMessage);
	} 
		  
}
