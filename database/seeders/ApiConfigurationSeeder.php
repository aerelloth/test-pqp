<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;
use App\Models\ApiConfig;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class ApiConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = config('api.api_key');
        $apiUrl = config('api.api_url');
        $apiVerify = config('api.api_verify');

        $client = new GuzzleClient();
        try {
                $response = $client->request('GET', $apiUrl.'configuration', [
                    RequestOptions::VERIFY => $apiVerify,
                    'headers' => [
                    'Authorization' => 'Bearer '.$apiKey,
                    'accept' => 'application/json',
                  ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            $api_configs = [];
            foreach ($data['images'] as $name => $config) {
                if(is_array($config)) {
                    $config = json_encode($config);
                }
                $api_configs['images_'.$name] = $config;
            }

            $validator = Validator::make($api_configs, [
                'images_base_url' => 'string',
                'images_secure_base_url' => 'string',
                'images_backdrop_sizes' => 'string',
                'images_logo_sizes' => 'string',
                'images_poster_sizes' => 'string',
                'images_profile_sizes' => 'string',
                'images_still_sizes' => 'string',
            ]);
            if (!$validator->fails()) {
                ApiConfig::create($api_configs);
            }
        }
        catch (GuzzleException $e) {
            //par la suite, ajouter le log en BDD et/ou l'envoyer par mail à l'admin
            //echo $e;
        }
    }
}
