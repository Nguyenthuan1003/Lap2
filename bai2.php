<?php
    class conNguoi{
        protected $ten;
        protected $tuoi;
        protected $gioiTinh;
        protected $ngaySinh;
        protected $canNang;
        protected $chieuCao;
    }
    class monThiDau{
        private $ten;
        private $dkChieuCao;
        private $dkCanNang;
        private $dkTuoi;
        private $dkTuoiCao;

        public function __construct($ten,$chieuCao,$canNang, $tuoi, $dkTuoi){
            $this->ten = $ten;
            $this->dkChieuCao = $chieuCao;
            $this->dkCanNang = $canNang;
            $this->dkTuoi = $tuoi;
            $this->dkTuoiCao = $dkTuoi;
        }
        public function getName(){
            return $this->ten;
        }
        public function getHeight(){
            return $this->dkChieuCao;
        }
        public function getWeight(){
            return $this->dkCanNang;
        }
        public function getAge(){
            return $this->dkTuoi;
        }
        public function getOld(){
            return $this->dkTuoiCao;
        }
    }
    class vanDongVien extends conNguoi{
        private $soHuyChuong;
        private $cacMonDaThiDau = [];
        public function __construct($ten, $tuoi, $gioiTinh, $ngaySinh, $canNang, $chieuCao,$huyChuong, $thiDau){
            $this->ten = $ten;
            $this->tuoi = $tuoi;
            $this->gioiTinh = $gioiTinh;
            $this->ngaySinh = $ngaySinh;
            $this->canNang = $canNang;
            $this->chieuCao = $chieuCao;
            $this->soHuyChuong = $huyChuong;
            $this->cacMonDaThiDau = $thiDau;
        }
        public function layThongTin(){
            echo "Thông tin vận động viên: <br>
            - Tên: $this->ten <br>
            - Tuổi: $this->tuoi <br>
            - Giới tính: $this->gioiTinh <br>
            - Ngày sinh: $this->ngaySinh <br>
            - Cân nặng: $this->canNang <br>
            - Chiều cao: $this->chieuCao <br>
            - Số huy chương: $this->soHuyChuong <br>
            - Các môn đã thi đấu:<br>" ;
            foreach($this->cacMonDaThiDau as $item){
                echo " &nbsp + $item <br>";
            }
           
        }

        public function thiDau($monThiDau, $soHuyChuong){
                if($this->chieuCao < $monThiDau->getHeight() || $this->canNang < $monThiDau->getWeight() || $this->tuoi < $monThiDau->getAge() || $this->tuoi > $monThiDau->getOld()){
                    echo "Bạn vi phạm điều kiện thi đấu";
                    if($this->soHuyChuong < $soHuyChuong){
                        $this->soHuyChuong = 0;
                    }else{
                        $this->soHuyChuong -= $soHuyChuong;
                    }
                }else{
                    $this->soHuyChuong+=$soHuyChuong;
                    if(!in_array($monThiDau->getName(), $this->cacMonDaThiDau)){
                        array_push($this->cacMonDaThiDau, $monThiDau->getName());
                        echo $this->layThongTin();
                    }
                }
            }
            
        }
$monThi = new monThiDau('Chạy 500m', 170, 65, 18 ,45);
$monThi1 = new monThiDau('Chạy 1000m', 180, 70, 20, 35);
$vanDongVien1 = new vanDongVien('Nguyễn Văn A', 25, 1, date("1997-12-12"), 68, 172, 0, []);
$vanDongVien1->thiDau($monThi, 2);
$vanDongVien1->thiDau($monThi1, 2);
?>