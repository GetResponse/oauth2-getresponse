<?php

namespace Getresponse\Oauth\Test\Unit\Provider;

use Getresponse\Oauth\Provider\Getresponse;
use League\OAuth2\Client\Token\AccessToken;

/**
 * Class GetresponseTest
 * @package Getresponse\Oauth\Test\Provider
 */
class GetresponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnDefaultBaseAuthorizationUrl()
    {
        $provider = new Getresponse();

        self::assertEquals('https://app.getresponse.com/oauth2_authorize.html', $provider->getBaseAuthorizationUrl());
    }

    /**
     * @test
     */
    public function shouldReturnCustomBaseAuthorizationUrl()
    {
        $provider = new Getresponse(
            [
                'domain' => 'https://custom-domain.getresponse360.com/'
            ]
        );

        self::assertEquals(
            'https://custom-domain.getresponse360.com/oauth2_authorize.html',
            $provider->getBaseAuthorizationUrl()
        );
    }

    /**
     * @test
     */
    public function shouldReturnDefaultBaseAccessTokenUrl()
    {
        $provider = new Getresponse();

        self::assertEquals('https://api.getresponse.com/v3/token', $provider->getBaseAccessTokenUrl([]));
    }

    /**
     * @test
     */
    public function shouldReturnCustomBaseAccessTokenUrl()
    {
        $provider = new Getresponse(
            [
                'apiEndpoint' => 'https://api3.getresponse360.com/'
            ]
        );

        self::assertEquals('https://api3.getresponse360.com/v3/token', $provider->getBaseAccessTokenUrl([]));
    }

    /**
     * @test
     */
    public function shouldReturnDefaultResourceOwnerDetailsUrl()
    {
        $provider = new Getresponse();

        self::assertEquals(
            'https://api.getresponse.com/v3/accounts',
            $provider->getResourceOwnerDetailsUrl(new AccessToken(['access_token' => 'abc123']))
        );
    }

    /**
     * @test
     */
    public function shouldReturnCustomResourceOwnerDetailsUrl()
    {
        $provider = new Getresponse(
            [
                'apiEndpoint' => 'https://api3.getresponse360.com/'
            ]
        );

        self::assertEquals(
            'https://api3.getresponse360.com/v3/accounts',
            $provider->getResourceOwnerDetailsUrl(new AccessToken(['access_token' => 'abc123']))
        );
    }

    /**
     * @test
     */
    public function shouldReturnAuthorizationHeader()
    {
        $provider = new Getresponse();

        $headers = $provider->getHeaders('abc123');

        self::assertArrayHasKey('Authorization', $headers);
        self::assertEquals($headers['Authorization'], 'Bearer abc123');
    }

    /**
     * @test
     */
    public function shouldNotReturnAuthorizationHeaderIfTokenIsEmpty()
    {
        $provider = new Getresponse();

        $headers = $provider->getHeaders();

        self::assertArrayNotHasKey('Authorization', $headers);
    }

    /**
     * @test
     */
    public function shouldAddXDomainHeaderIfDomainIsDifferentThanDefault()
    {
        $provider = new Getresponse(
            [
                'domain' => 'https://custom-domain.getresponse360.com'
            ]
        );

        $headers = $provider->getHeaders('abc123');

        self::assertArrayHasKey('X-Domain', $headers);
        self::assertEquals($headers['X-Domain'], 'custom-domain.getresponse360.com');
    }
}
