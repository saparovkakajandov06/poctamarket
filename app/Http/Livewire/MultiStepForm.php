<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Order;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

class MultiStepForm extends Component
{
    use WithFileUploads;
    public $user_name;
    public $user_surname;
    public $user_phone;
    public $email;
    public $user_id;
    public $address;
    public $products = [];
    public $total_price;
    public $status;
    public $comments;
    public $delivery;
    public $delivery_sum;
    public $paymenttype;
    public $online_payment;

    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1;
    }

    /*public function render()
    {

        return view('livewire.multi-step-form');
    }*/

    public function render(Request $request) {

        $productsInCart = $this->getProductsFromCart($request);

        if($productsInCart) {
            $totalPrice = $this->getTotalPrice($productsInCart);
        } else {
            $totalPrice = null;
        }

        return view('livewire.multi-step-form',compact(
            'productsInCart','totalPrice'
        ))->with([
            'cartCount'=>$this->countItems($request),
//            'categories'=>$this->categories,
            'currentUser'=>\Auth::user()
        ]);
    }

    public function increaseStep(){
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){

        $this->currentStep--;
        if ($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    private function getProductsFromCart(Request $request)
    {
        $p = $request->session()->get('products','default');
        if($p != 'default') return $p;
        return false;
    }

    private function getTotalPrice($productsInCart)
    {

        $total = 0;

        foreach($productsInCart as $item) {
            $total += $item['price'] * $item['amount'];
        }

        return $total;
    }

    private function countItems(Request $request)
    {
        $p = $request->session()->get('products','default');
        if($p != 'default') {
            $count = 0;
            foreach($p as $pr) {
                $count = $count + $pr['amount'];
            }
            session(['cartCount' => $count]);
            return $count;
        } else {
            session(['cartCount' => 0]);
            return 0;
        }
    }


}
