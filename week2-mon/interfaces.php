<?php 

interface IPayment {
    public function charge(int $amount);
    public function isSuccessful() : bool ;
    
}

trait PaymentInfo {
    public function log() {
        echo PHP_EOL . __METHOD__;
    }

    public function warning() {
        echo "Booooooooo";
    }
}

class PaymentProcessor {

    use  PaymentInfo;

    private $payment;
    private $amount;


    public function __construct(IPayment $payment, int $amount) {
        $this->payment = $payment;
        $this->amount = $amount;
    }

    public function isSuccessful() : bool {
        return $this->payment->isSuccessful();
    }

    public function process() {
        $this->payment->charge($this->amount);
    }

}





abstract class  LocalPayment implements IPayment{
    public function isSuccessful() : bool {
        return false;
    }

    public  abstract function charge(int $amount);
}




class Paystack implements IPayment{

    public function charge(int $amount) {
        echo "Calling paystack with $amount\n";
    }
    public function isSuccessful() : bool  {
        return true;
    }
}

class Flutterwave extends LocalPayment {
    public function charge(int $amount) {
        echo "Calling Flutterwave with $amount\n";
    }

    public function isSuccessful() : bool  {
        return true;
    }
    
}


class AjizzyPay implements IPayment {
    public function charge(int $amount) {
        echo "Calling AjizzyPay with $amount\n";
    }

    public function isSuccessful() : bool  {
        return true;
    }
}


$paymentProcessor = new PaymentProcessor(new AjizzyPay(), 1000);
$paymentProcessor->process();

if($paymentProcessor->isSuccessful()) {
    echo "Payment was made successfully";
} else {
    echo "Not successful";
}

$paymentProcessor->log();
$paymentProcessor->warning();


class Template {

    public $items = [];

    public function __get($name) {
       if(!in_array($name, $this->items)) {
           $this->items[] = $name;
       }
    }

    public function __call($name, $arguments) {
        var_dump($name);
        var_dump($arguments);
    }
}

$t = new Template();

$t->aj;
$t->username;
$t->password;

$t->compile("contact.html");

print_r($t->items);