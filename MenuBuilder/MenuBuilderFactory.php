<?php

namespace RickWest\MenuBuilderBundle\MenuBuilder;

use RickWest\MenuBuilderBundle\Models\Menu;
use RickWest\MenuBuilderBundle\Models\MenuItem;

/**
 * Class MenuBuilderFactory
 * @package RickWest\MenuBuilderBundle\MenuBuilder
 */
final class MenuBuilderFactory implements MenuBuilderFactoryInterface
{
    /** @var Menu[] */
    private $menus = [];

    /**
     * @param MenuBuilderInterface $builder
     */
    public function add(MenuBuilderInterface $builder)
    {
        $this->menus[] = $builder->build();
    }

    /**
     * @param string $name
     * @return Menu
     */
    public function create(string $name)
    {
        return new Menu($name);
    }

    /**
     * @param string $url
     * @param string $label
     * @param array $options
     * @return MenuItem
     */
    public function item(string $url, string $label, array $options = [])
    {
        return new MenuItem($url, $label, $options);
    }

    /**
     * @return Menu[]
     */
    public function menus()
    {
        return $this->menus;
    }
}