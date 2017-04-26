<?php

namespace Getresponse\Oauth\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

/**
 * Class GetresponseResourceOwner
 * @package Getresponse\Oauth\Provider
 */
class GetresponseResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    /**
     * @var array
     */
    private $accountDetails;

    /**
     * GetresponseResourceOwner constructor.
     * @param array $accountDetails
     */
    public function __construct(array $accountDetails = [])
    {
        $this->accountDetails = $accountDetails;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getValueByKey($this->accountDetails, 'accountId', null);
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->accountDetails;
    }
}
