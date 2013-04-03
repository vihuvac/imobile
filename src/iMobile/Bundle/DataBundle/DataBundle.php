<?php

namespace iMobile\Bundle\DataBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DataBundle extends Bundle
{
	/**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}