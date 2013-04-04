<?php

namespace iMobile\Bundle\WebsiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $translator = $this->container->get('translator');
        $menu = $factory->createItem('root');
        
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Inicio'), 'home'),
            array(
                'route' => 'imobile_website_default_index'
            )
        );
        $item->setExtra('safe_label', true);

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Nosotros'), 'user'),
            array(
                'route' => 'imobile_website_default_myv'
            )
        );
        $item->setExtra('safe_label', true);

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Novedades'), 'list-alt'),
            array(
                'route' => 'imobile_website_default_novedades'
            )
        );
        $item->setExtra('safe_label', true);

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Servicios'), 'globe'),
            array(
                'route' => 'imobile_website_default_servicios'
            )
        );
        $item->setExtra('safe_label', true);

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Equipos'), 'th-large'),
            array(
                'route' => 'imobile_website_default_equipos'
            )
        );
        $item->setExtra('safe_label', true);

        $item = $menu->addChild(
            $this->getLabel($translator->trans('Conctactar'), 'envelope'),
            array(
                'route' => 'imobile_website_default_contactar'
            )
        );
        $item->setExtra('safe_label', true);

        return $menu;
    }

    public function rightMenu(FactoryInterface $factory, array $options)
    {
        $translator = $this->container->get('translator');
        $menu = $factory->createItem('root');

        $this->addLocaleMenu($menu);

        return $menu;
    }

    protected function getLabel($text, $icon)
    {
        if ($icon) {
            $label[] = "<i class=\"icon-$icon\"></i>";
        }
        if ($text) {
            $label[] = $text;
        }
        return join('', $label);
    }

    protected function addLocaleMenu($menu)
    {
        $localeHelper = $this->container->get('sonata.intl.templating.helper.locale');
        $currentLang = $this->container->get('request')->getLocale();
        $routeName = $this->container->get('request')->get('_route');

        $languages = array('es', 'en');

        $switcher = $menu->addChild("<i class=\"flag-$currentLang\"></i>");
        $switcher->setExtra('safe_label', true);
        $switcher->setAttribute('style', 'float: right');

        foreach ($languages as $language) {
            $current = false;

            if ($language == $currentLang) {
                $name = $localeHelper->language($language);
                $current = true;
            } else {
                $name = sprintf(
                    '%s (%s)',
                    $localeHelper->language($language, $language),
                    $localeHelper->language($language)
                );
            }
            $name = "<span class=\"flag-$language\">$name</span>";
            $item = $switcher->addChild(
                $name,
                array(
                    'route' => $routeName,
                    'routeParameters' => array('_locale' => $language)
                )
            );
            $item->setExtra('safe_label', true);
            $item->setCurrent($current);
        }
    }
}