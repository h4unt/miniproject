<?php
class User extends App {
    public function index(){
        if(!$this->isLogged()) header('Location: ./?ctrl=user&act=login');
        else header('Location: ./?ctrl=user&act=listUsers');
        //echo'test';
    }

    public function editUser(){
        if(!$this->isLogged()) header('Location: ./?ctrl=user&act=login');
        $user = new userModel();
        if($user->checkExistUsername($_GET['username']) == 1 && isset($_GET['username'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $getUser = $user->getByName($_GET['username']);
                if(!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)){
                    $this->data['msg'] = 'Email không đúng định dạng';
                    $this->data['msgType'] = 'warning';
                }elseif($getUser->email != $_POST['inputEmail'] && $user->checkExistEmail($_POST['inputEmail']) > 0){
                    $this->data['msg'] = 'Email đã có người sử dụng';
                    $this->data['msgType'] = 'warning';
                }elseif(!empty($_POST['inputPassword']) && strlen($_POST['inputPassword']) < 6){
                    $this->data['msg'] = 'Mật khẩu phải từ 6 ký tự';
                    $this->data['msgType'] = 'warning';
                }else{
                    $this->data['msg'] = 'Sửa thành công';
                    $this->data['msgType'] = 'success';  
                    $email = !empty($_POST['inputEmail']) && $getUser->email != $_POST['inputEmail'] ? $_POST['inputEmail'] : $getUser->email;
                    $password = !empty($_POST['inputPassword']) && md5($getUser->password) != $_POST['inputPassword'] ? md5($_POST['inputPassword']) : $getUser->password;
                    $user->editUser($getUser->username,$password,$email,$_POST['inputBirthday']);   
                }

            }   

            $this->view('template/header',array("title" => "Sửa người dùng"));
            $this->data['getUser'] = $user->getByName($_GET['username']);
            $this->view('editUser', $this->data);
            $this->view('template/footer');
        }else{
            header('Location: ./?ctrl=user&act=listUsers');
        }      
    }

    public function delUser(){
        if(!$this->isLogged()) header('Location: ./?ctrl=user&act=login');
        $user = new userModel();
        if($user->checkExistUsername($_GET['username']) == 1 && isset($_GET['username'])){
            $user->delete($_GET['username']);
            header('Location: ./?ctrl=user&act=listUsers');
        }
    }

    public function listUsers(){
        if(!$this->isLogged()) header('Location: ./?ctrl=user&act=login');
        $this->view('template/header',array("title" => "Danh sách người dùng"));
        $user = new userModel();
        $this->data['listUsers'] = $user->getListUsers();
        $this->view('listUsers',$this->data);
        $this->view('template/footer');
    }

    public function logout(){
        session_destroy();
        header('Location: ./?ctrl=user&act=login');
    }

    public function login(){        
        if($this->isLogged()) header('Location: ./?ctrl=user&act=listUsers');
        $user = new userModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!preg_match('/^[a-z0-9_-]{4,16}$/',$_POST['inputUsername'])){
                $this->data['msg'] = 'Tên đăng nhập không hợp lệ';
                $this->data['msgType'] = 'warning';
            }elseif($user->checkExistUsername($_POST['inputUsername']) < 1){
                $this->data['msg'] = 'Tên đăng nhập không tồn tại';
                $this->data['msgType'] = 'warning';
            }elseif($user->checkLogin($_POST['inputUsername'],md5($_POST['inputPassword'])) == 0){
                $this->data['msg'] = 'Thông tin đăng nhập không chính xác';
                $this->data['msgType'] = 'warning';
            }else{
                header('Location: ./');
                $_SESSION['username'] = $_POST['inputUsername'];
            }

        }   
        $this->view('login',$this->data);
    }

    public function register(){  
        $user = new userModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)){
                $this->data['msg'] = 'Email không đúng định dạng';
                $this->data['msgType'] = 'warning';
            }elseif(!preg_match('/^[a-z0-9_-]{4,16}$/',$_POST['inputUsername'])){
                $this->data['msg'] = 'Tên đăng nhập không hợp lệ';
                $this->data['msgType'] = 'warning';
            }elseif($user->checkExistUsername($_POST['inputUsername']) > 0){
                $this->data['msg'] = 'Tên đăng nhập đã có người sử dụng';
                $this->data['msgType'] = 'warning';
            }elseif($user->checkExistEmail($_POST['inputEmail']) > 0){
                $this->data['msg'] = 'Email đã có người sử dụng';
                $this->data['msgType'] = 'warning';
            }elseif(strlen($_POST['inputPassword']) < 6){
                $this->data['msg'] = 'Mật khẩu phải từ 6 ký tự';
                $this->data['msgType'] = 'warning';
            }elseif($_POST['inputPassword'] !== $_POST['inputRePassword']){
                $this->data['msg'] = 'Mật khẩu không khớp';
                $this->data['msgType'] = 'warning';
            }else{
                $this->data['msg'] = 'Tạo tài khoản thành công';
                $this->data['msgType'] = 'success';  
                $user->insertUser($_POST['inputUsername'],md5($_POST['inputPassword']),$_POST['inputEmail'],$_POST['inputBirthday']);   
            }

        }      
        $this->view('register',$this->data);
    }
}