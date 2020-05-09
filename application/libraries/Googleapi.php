<?php

/**
 * @package Google API :  Google Client API
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Contact Controller
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Googleapi
{
    /**
     * Googleapi constructor.
     */
    public function __construct()
    {
        require_once dirname(__FILE__) . '/google-api/vendor/autoload.php';
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Calendar API PHP Quickstart');
        $this->client->setScopes('https://www.googleapis.com/auth/calendar'); //Permissions to google calendar
        $this->client->setAuthConfig('credentials.json');
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $this->client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($this->client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $this->client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $this->client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));
        }
    }

    //return the specific client to controler that help us to know where to update
    public function client()
    {
        return $this->client;
    }
}
