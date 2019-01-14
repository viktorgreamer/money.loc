<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Contries;
use app\modules\admin\models\Faqs;
use app\utils\D;
use Faker\Factory;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionGenerateFaqs()
    {
        D::$isConsole = true;
        $faker = Factory::create();
        foreach (range(1, 30) as $item) {
            $faq = new Faqs();
            $faq->question = $faker->text(50);
            $faq->answer = $faker->text(400);
            $faq->lg = 1;
            $faq->save();
        }
        return ExitCode::OK;
    }

    public function actionInsertCountries()
    {
        $countries = "Abkhazia
Australia
Austria
Azerbaijan
Albania
Algeria
American Samoa
Anguilla
Angola
Andorra
Antarctica
Antigua and Barbuda
Argentina
Armenia
Aruba
Afghanistan
Bahamas
Bangladesh
Barbados
Bahrain
Belarus
Belize
Belgium
Benin
Bermuda
Bulgaria
Bolivia, plurinational state of
Bonaire, Sint Eustatius and Saba
Bosnia and Herzegovina
Botswana
Brazil
British Indian Ocean Territory
Brunei Darussalam
Burkina Faso
Burundi
Bhutan
Vanuatu
Hungary
Venezuela
Virgin Islands, British
Virgin Islands, U.S.
Vietnam
Gabon
Haiti
Guyana
Gambia
Ghana
Guadeloupe
Guatemala
Guinea
Guinea-Bissau
Germany
Guernsey
Gibraltar
Honduras
Hong Kong
Grenada
Greenland
Greece
Georgia
Guam
Denmark
Jersey
Djibouti
Dominica
Dominican Republic
Egypt
Zambia
Western Sahara
Zimbabwe
Israel
India
Indonesia
Jordan
Iraq
Iran, Islamic Republic of
Ireland
Iceland
Spain
Italy
Yemen
Cape Verde
Kazakhstan
Cambodia
Cameroon
Canada
Qatar
Kenya
Cyprus
Kyrgyzstan
Kiribati
China
Cocos (Keeling) Islands
Colombia
Comoros
Congo
Congo, Democratic Republic of the
Korea, Democratic People's republic of
Korea, Republic of
Costa Rica
Cote d'Ivoire
Cuba
Kuwait
Curaçao
Lao People's Democratic Republic
Latvia
Lesotho
Lebanon
Libyan Arab Jamahiriya
Liberia
Liechtenstein
Lithuania
Luxembourg
Mauritius
Mauritania
Madagascar
Mayotte
Macao
Malawi
Malaysia
Mali
United States Minor Outlying Islands
Maldives
Malta
Morocco
Martinique
Marshall Islands
Mexico
Micronesia, Federated States of
Mozambique
Moldova
Monaco
Mongolia
Montserrat
Burma
Namibia
Nauru
Nepal
Niger
Nigeria
Netherlands
Nicaragua
Niue
New Zealand
New Caledonia
Norway
United Arab Emirates
Oman
Bouvet Island
Isle of Man
Norfolk Island
Christmas Island
Heard Island and McDonald Islands
Cayman Islands
Cook Islands
Turks and Caicos Islands
Pakistan
Palau
Palestinian Territory, Occupied
Panama
Holy See (Vatican City State)
Papua New Guinea
Paraguay
Peru
Pitcairn
Poland
Portugal
Puerto Rico
Macedonia, The Former Yugoslav Republic Of
Reunion
Russian Federation
Rwanda
Romania
Samoa
San Marino
Sao Tome and Principe
Saudi Arabia
Swaziland
Saint Helena, Ascension And Tristan Da Cunha
Northern Mariana Islands
Saint Barthélemy
Saint Martin (French Part)
Senegal
Saint Vincent and the Grenadines
Saint Kitts and Nevis
Saint Lucia
Saint Pierre and Miquelon
Serbia
Seychelles
Singapore
Sint Maarten
Syrian Arab Republic
Slovakia
Slovenia
United Kingdom
United States
Solomon Islands
Somalia
Sudan
Suriname
Sierra Leone
Tajikistan
Thailand
Taiwan, Province of China
Tanzania, United Republic Of
Timor-Leste
Togo
Tokelau
Tonga
Trinidad and Tobago
Tuvalu
Tunisia
Turkmenistan
Turkey
Uganda
Uzbekistan
Ukraine
Wallis and Futuna
Uruguay
Faroe Islands
Fiji
Philippines
Finland
Falkland Islands (Malvinas)
France
French Guiana
French Polynesia
French Southern Territories
Croatia
Central African Republic
Chad
Montenegro
Czech Republic
Chile
Switzerland
Sweden
Svalbard and Jan Mayen
Sri Lanka
Ecuador
Equatorial Guinea
Åland Islands
El Salvador
Eritrea
Estonia
Ethiopia
South Africa
South Georgia and the South Sandwich Islands
South Ossetia
South Sudan
Jamaica
Japan
";
        D::$isConsole = true;

        $countries = explode("\n", $countries);
        if ($countries) {
            foreach ($countries as $country) {
                D::success($country);
                $new_country = new Contries();
                $new_country->name = $country;
                $new_country->save();
            }
        }
    }
}
