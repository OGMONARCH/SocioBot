<?php

namespace App\Services;

use Facebook\Facebook;

class FacebookPoster
{
    protected $fb;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => config('services.facebook.client_id'),
            'app_secret' => config('services.facebook.client_secret'),
            'default_graph_version' => 'v12.0',
        ]);
    }

    public function postMessage($message, $accessToken)
    {
        try {
            $response = $this->fb->post('/me/feed', ['message' => $message], $accessToken);
            return $response->getGraphNode()->asArray();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            return 'Graph returned an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            return 'Facebook SDK returned an error: ' . $e->getMessage();
        }
    }
}
