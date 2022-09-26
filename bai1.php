<?php
   interface phepTinh{
    function cong();
    function tru();
    function nhan();
    function chia();
}

class tinhToan implements phepTinh{
    private $a;
    private $b;
    public function cong(){
        return $this->a + $this->b;
    }
    public function tru(){
        return $this->a - $this->b;
    }
    public function nhan(){
        return $this->a * $this->b;
    }
    public function chia(){
        return $this->a / $this->b;
    }
    public function __construct($a, $b, $c){
        $this->a = $a;
        $this->b = $b;
        switch($c){
            case '+':
                echo 'Phép cộng: '.$this->cong();
                break;
            case '-':
                echo 'Phép trừ: '.$this->tru();
                break;
            case '*':
                echo 'Phép nhân: '.$this->nhan();
                break;
            case '/':
                echo 'Phép chia: '.$this->chia();
                break;
        }
    }
}

$tinh = new tinhToan(5, 10, '+');
?>