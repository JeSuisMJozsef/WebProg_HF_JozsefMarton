<?php
namespace cart;

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];
// TODO Generate getters and setters of properties
    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     */

    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     * @throws Exception
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        $exists=true;
        foreach ($this->items as $key=>$item){

            if ($item->getProduct() === $product && $product->getAvailableQuantity()>=$quantity){
                $item->increaseQuantity();
                global $exists;
                $exists=false;
                return $item;

            }
        }
        if($product->getAvailableQuantity()<$quantity)
            throw new Exception("Quantity is greater than product available quantity");
        if ($exists){
            $ci=new CartItem($product,$quantity);
            array_push($this->items,$ci);
            return  $ci;
        }

    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->items as $key=>$item){
           if ($item->getProduct()===$product){
               unset($this->items[$key]);
           }

        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $sum=0;
        foreach ($this->items as $item){
            $sum+=$item->getQuantity();
        }
        return $sum;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {

        $sum=0;

        foreach ($this->items as $item){
            $sum+=$item->getProduct()->getPrice()*$item->getQuantity();
        }
        return $sum;
    }
}