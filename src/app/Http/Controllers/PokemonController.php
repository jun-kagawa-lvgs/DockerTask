<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;


class PokemonController extends Controller
{
    public function get_sheet_data()
    {
        // require_once dirname(__FILE__) . '/../../../vendor/autoload.php';

        putenv('GOOGLE_APPLICATION_CREDENTIALS=/var/www/laravel_docker/gsheet-355401-bb172207a152.json');
        $ssid = '1PsZcHjnMcXt37ANGdmMGJZIgzJuLaYds83rX7R3h05E';
        $range = 'sheet1!A1:C151';

        $client = new \Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(\Google_Service_Sheets::SPREADSHEETS);

        $service = new \Google_Service_Sheets($client);

        $result = $service->spreadsheets_values->get($ssid, $range);
        $values = $result->getValues();
        foreach($values as $row) {
            $pokemon = new Pokemon();
            $pokemon->updateOrCreate(
                ['id' => $row[0]],
                ['id' => $row[0], 'name' => $row[1], 'flavor_text' => $row[2]],
            );  
        }
        return 'done';
    }
    public function get(){
        $pokemons = Pokemon::all();
        return view('index', ['pokemons' => $pokemons]);
    }
}
