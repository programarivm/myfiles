<?php
namespace NonceShield;

use NonceShield\Exception\UnstartedSessionException;

/**
 * Html class.
 *
 * Renders html tags with the nonce token embedded.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @link https://programarivm.com
 * @license GPL
 */
class Html
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        if (empty(session_id())) {
            throw new UnstartedSessionException();
        }
    }

    /**
     * Returns a hidden HTML input with the value of the current nonce token embedded.
     *
     * @param array $attrs
     */
    public function input($attrs)
    {
        if (empty(session_id())) {
            throw new UnstartedSessionException();
        }

        return '<input type="hidden" name="' . $attrs['name'] . '" id="' . $attrs['id'] . '" value="' . $attrs['value'] . '" />';
    }
}
