<?php

namespace Srini\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SriniUserBundle extends Bundle
{
    public function getParent()
    {
        return "FOSUserBundle";
    }
}
