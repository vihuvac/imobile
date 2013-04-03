<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // Defaults (Symfony 2.2)
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),

            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Sensio\Bundle\BuzzBundle\SensioBuzzBundle(),

            // Migrations
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),

            // Users
            new FOS\UserBundle\FOSUserBundle(),

            // Sonata
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Sonata\UserBundle\SonataUserBundle(),

            // Simplethings
            new SimpleThings\EntityAudit\SimpleThingsEntityAuditBundle(),

            // Ladybug
            new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle(),

            // Menus
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Paginator
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),

            // Bootstrap
            new Braincrafted\BootstrapBundle\BraincraftedBootstrapBundle(),
            new iMobile\Bundle\DataBundle\DataBundle(),

            // Website
            new iMobile\Bundle\WebsiteBundle\WebsiteBundle(),

            // sonata Extensions
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
