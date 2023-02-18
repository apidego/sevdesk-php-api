<?php
class sevdesk_client {
    protected $api_key = '';
    protected $api_url = 'https://my.sevdesk.de/api/v1/';

    public function __construct(array $configuration) {
        $this->api_key = $configuration['api_key'];

        return true;
    }

    protected function api_call($method, $endpoint, $data): object {
        $curl = curl_init();

        $header = [
            'Content-type: application/json',
            'Authorization: Bearer ' . $this->api_key,
        ];


        if ($method == 'GET') {
            curl_setopt($curl, CURLOPT_URL, $this->api_url . $endpoint . '?' . http_build_query($data));
        } else {
            curl_setopt($curl, CURLOPT_URL, $this->api_url . $endpoint);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_USERAGENT, 'apidego-it-solutions-php-api');

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }


}