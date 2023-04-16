<?php

namespace App\Support\Basket;

use \App\Menu;
use \App\support\storage\Contracts;
use App\support\storage\Contracts\StorageInterface;
use function Symfony\Component\Translation\t;

class Basket
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function add(Menu $menu , int $quantity)
    {
        if($this->has($menu))
        {
            $quantity = $this->get($menu)['quantity'] + $quantity;
        }
        $this->update($menu, $quantity);
    }

    public function update(Menu $menu, $quantity)
    {

        if(!$quantity)
        {
            dump($quantity);
            return $this->storage->unset($menu->id);
        }

        $this->storage->set($menu->id, [
            'quantity' => $quantity
        ]);

    }

    public function has(Menu $menu)
    {
        return $this->storage->exists($menu->id);
    }

    public function get(Menu $menu)
    {
        return $this->storage->get($menu->id);
    }

    public function all()
    {
        $menus = Menu::find(array_keys($this->storage->all()));

        return $menus;
    }

    public function keys()
    {
        return array_keys($this->storage->all());
    }

    public function remove(Menu $menu)
    {
       return $this->storage->unset($menu->id);
    }

    public function subtotal()
    {
        $total = 0;
        foreach ($this->all() as $items)
        {
            $total += $items->food->price;
        }
        return $total;
    }

    public function itemCount()
    {
        return $this->storage->count();
    }

    public function clear()
    {
        $this->storage->clear();
    }

}
