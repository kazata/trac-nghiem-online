<?php

include_once ('models/m_admin.php');
require_once 'controller.php';
/**
 * Controller Admin
 * Author: Dzu
 * Mail: dzu6996@gmail.com
 **/
class C_Admin extends Controller
{
    private $info  = array(
        'id_admin' => '', 
        'tai_khoan' => '', 
        'ten' => '', 
        'chuc_vu' => '', 
        'ten_cv' => '', 
    );
    /**
     * constructor tạo đối tượng với các thuộc tính nhận từ SESSION
     */
    public function __construct()
    {
    	$this->info['id_admin'] = $_SESSION['id_admin'];
    	$this->info['tai_khoan'] = $_SESSION['tai_khoan'];
    	$this->info['ten'] = $_SESSION['ten'];
    	$this->info['chuc_vu'] = $_SESSION['chuc_vu'];
    	$this->info['ten_cv'] = $this->getQuyen($this->info['chuc_vu'])->mo_ta;		
    }
    // hàm đăng xuất
    public function logout()
    {
    	session_destroy();
    	header( "Refresh:0; url=index.php");
    }
    // hàm lấy tên chức vụ
    public function getQuyen()
    {
    	$cv = new M_Admin();
    	return $cv->getQuyen($this->info['chuc_vu']);
    }
    // hàm lấy danh sách admin từ CSDL
    public function getDSA()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSA();
    }
    // hàm sửa admin
    public function editAdmin($id_admin,$tai_khoan,$mat_khau,$ten)
    {
    	$edit = new M_Admin();
    	return $edit->editAdmin($id_admin,$tai_khoan,$mat_khau,$ten);
    }
    // hàm xóa admin
    public function delAdmin($id_admin)
    {
    	$update = new M_Admin();
    	return $update->delAdmin($id_admin);
    }
    // hàm thêm admin
    public function addAdmin($tai_khoan,$mat_khau,$ten)
    {
    	$add = new M_Admin();
    	return $add->addAdmin($tai_khoan,$mat_khau,$ten);
    }
    // hàm lấy danh sách giáo viên
    public function getDSGV()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSGV();
    }
    // hàm sửa giáo viên
    public function editGV($id_gv,$tai_khoan,$mat_khau,$ten)
    {
    	$edit = new M_Admin();
    	return $edit->editGV($id_gv,$tai_khoan,$mat_khau,$ten);
    }
    // hàm xóa giáo viên
    public function delGV($id_gv)
    {
    	$update = new M_Admin();
    	return $update->delGV($id_gv);
    }
    // hàm thêm giáo viên
    public function addGV($tai_khoan,$mat_khau,$ten)
    {
    	$add = new M_Admin();
    	return $add->addGV($tai_khoan,$mat_khau,$ten);
    }
    // hàm lấy danh sách học sinh
    public function getDSHS()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSHS();
    }
    // hàm sửa học sinh
    public function editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop)
    {
    	$edit = new M_Admin();
    	return $edit->editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop);
    }
    // hàm xóa học sinh
    public function delHS($id_hs,$id_lop)
    {
    	$update = new M_Admin();
    	return $update->delHS($id_hs,$id_lop);
    }
    // hàm thêm học sinh
    public function addHS($tai_khoan,$mat_khau,$ten,$id_lop)
    {
    	$addhs = new M_Admin();
    	return $addhs->addHS($tai_khoan,$mat_khau,$ten,$id_lop);
    }
    // hàm thêm điểm của 1 học sinh mới bảng điểm
    public function addDiem($id_hs,$id_lop)
    {
        $adddiem = new M_Admin();
        return $adddiem->addDiem($id_hs,$id_lop);
    }
    // hàm lấy tên lớp
    public function getTenLop($id_lop)
    {
    	$tenlop = new M_Admin();
    	return $tenlop->getTenLop($id_lop);
    }
    // hàm lấy danh sách lớp
    public function getDSL()
    {
    	$dsl = new M_Admin();
    	return $dsl->getDSL();
    }
    // hàm sửa thông tin lớp
    public function editLop($id_lop,$id_khoi,$ten_lop,$id_gv)
    {
    	$edit = new M_Admin();
    	return $edit->editLop($id_lop,$id_khoi,$ten_lop,$id_gv);
    }
    // hàm xóa lớp
    public function delLop($id_lop)
    {
    	$update = new M_Admin();
    	return $update->delLop($id_lop);
    }
    // hàm thêm lớp
    public function addLop($id_khoi,$ten_lop,$id_gv)
    {
    	$add = new M_Admin();
    	return $add->addLop($id_khoi,$ten_lop,$id_gv);
    }
    // hàm lấy tên khối
    public function getTenKhoi($id_khoi)
    {
    	$tkhoi = new M_Admin();
    	return $tkhoi->getTenKhoi($id_khoi);
    }
    // hàm lấy danh sách khối
    public function getKhoi()
    {
    	$khoi = new M_Admin();
    	return $khoi->getKhoi();
    }
    // hàm lấy tên giáo viên
    public function getTenGV($id_gv)
    {
    	$khoi = new M_Admin();
    	return $khoi->getTenGV($id_gv);
    }
    // hàm lấy danh sách câu hỏi
    public function getDSCH()
    {
        $dsch = new M_Admin();
        return $dsch->getDSCH();
    }
    // hàm sửa câu hỏi
    public function editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $editch = new M_Admin();
        return $editch->editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
    }
    // hàm xóa câu hỏi
    public function delCH($id_cauhoi)
    {
        $delch = new M_Admin();
        return $delch->delCH($id_cauhoi);
    }
    // hàm thêm câu hỏi
    public function addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $addch = new M_Admin();
        return $addch->addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
    }
    // hàm gửi thông báo cho giáo viên
    public function sendGV($chu_de,$noi_dung)
    {
        $send = new M_Admin();
        return $send->sendGV($this->tai_khoan,$this->ten,$chu_de,$noi_dung);
    }
    // hàm lấy thông báo đã gửi cho giáo viên (chuc_vu = 2)
    public function getTBGV()
    {
        $tbgv = new M_Admin();
        return $tbgv->getTBGV();
    }
    // hàm gửi thông báo cho học sinh
    public function sendHS($chu_de,$noi_dung)
    {
        $send = new M_Admin();
        return $send->sendHS($this->tai_khoan,$this->ten,$chu_de,$noi_dung);
    }
    // hàm lấy thông báo đã gửi cho học sinh (chuc_vu = 3)
    public function getTBHS()
    {
        $tbgv = new M_Admin();
        return $tbgv->getTBHS();
    }
    public function showHeadLeft()
    {
        $this->loadView("admin");
        $admin = new V_Admin();
        $admin->showHeadLeft($this->info);
    }
    public function showFoot()
    {
        $this->loadView("admin");
        $admin = new V_Admin();
        $admin->showFoot();
    }
 //hàm hiển thị bảng quán lý admin + bắt các sự kiện thêm, sửa xóa
    public function showQLAdmin()
    {
        $dsa = $this->getDSA();
        $this->loadView("admin");
        $admin = new V_Admin();
        $admin->showQLAdmin($dsa);
    // thực hiện thêm tài khoản admin sau khi nhấn nút thêm. Nếu thông tin đúng thực hiện, sai báo ra màn hình
        if(isset($_POST['add-admin']))
        {
            $ten = Htmlspecialchars(addslashes($_POST['ten']));
            $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
            $mat_khau = md5($_POST['mat_khau']);
            if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
                echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
            else
            {
                $this->addAdmin($tai_khoan,$mat_khau,$ten);
                echo '<meta http-equiv="refresh" content="0" />';
            }
        }
    // thực hiện xóa tài khoản admin sau khi nhấn nút xóa.
        if(isset($_POST['del-admin']))
        {
            $id_admin = Htmlspecialchars($_POST['id_admin']);
            $this->delAdmin($id_admin);
            echo '<meta http-equiv="refresh" content="0" />'; 
        }
        // thực hiện sửa tài khoản admin sau khi nhấn nút lưu. Nếu thông tin đúng thực hiện, sai báo ra màn hình
        if(isset($_POST['edit-admin']))
        {
            $id_admin = Htmlspecialchars($_POST['id_admin']);
            $ten = Htmlspecialchars(addslashes($_POST['ten']));
            $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
            $mat_khau = md5($_POST['mat_khau']);
            if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
                echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
            else
            {
                $this->editAdmin($id_admin,$tai_khoan,$mat_khau,$ten);
                echo '<meta http-equiv="refresh" content="0" />';
            }  
        }
    }
    public function showQLGiaoVien()
    {
        $dsgv = $this->getDSGV();
        $this->loadView("admin");
        $admin = new V_Admin();
        $admin->showQLGiaoVien($dsgv);
// thực hiện thêm giáo viên, nếu thông tin hợp lệ thì thực hiện, sai báo ra màn hình
        if(isset($_POST['add-gv']))
        {
            $ten = Htmlspecialchars(addslashes($_POST['ten']));
            $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
            $mat_khau = md5($_POST['mat_khau']);
            if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
                echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
            else
            {
                $this->addGV($tai_khoan,$mat_khau,$ten);
                echo '<meta http-equiv="refresh" content="0" />';
            }
        }
    // thực hiện xóa giáo viên
        if(isset($_POST['del-gv']))
        {
            $id_gv = Htmlspecialchars($_POST['id_gv']);
            $this->delGV($id_gv);
            echo '<meta http-equiv="refresh" content="0" />'; 
        }
    // thực hiện sửa giáo viên, nếu thông tin hợp lệ thì thực hiện, sai báo ra màn hình
        if(isset($_POST['edit-gv']))
        {
            $id_gv = Htmlspecialchars($_POST['id_gv']);
            $ten = Htmlspecialchars(addslashes($_POST['ten']));
            $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
            $mat_khau = md5($_POST['mat_khau']);
            if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
                echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
            else
            {
                $this->editGV($id_gv,$tai_khoan,$mat_khau,$ten);
                echo '<meta http-equiv="refresh" content="0" />';
            }  
        }
    }
//hàm hiển thị bảng quán lý lớp + bắt các sự kiện thêm, sửa xóa
    public function showQLLop()
    {
        $dsl = $this->getDSL();
        $dskhoi = $this->getKhoi();
        $dsgv = $this->getDSGV();
        for ($i = 0; $i < count($dsl); $i++) { 
            $khoi[$i] = $this->getTenKhoi($dsl[$i]->id_khoi);
            $gv[$i] = $this->getTenGV($dsl[$i]->id_gv);
        }
        $this->loadView("admin");
        $admin = new V_Admin();
        $admin->showQLLop($dsl,$dskhoi,$dsgv,$khoi,$gv);
    // thực hiện sửa thông tin lớp với các thông tin nhập vào, sai báo ra màn hình
        if(isset($_POST['edit-lop']))
        {
            $id_lop = Htmlspecialchars($_POST['id_lop']);
            $ten_lop = Htmlspecialchars(addslashes($_POST['ten_lop']));
            $id_khoi = Htmlspecialchars(addslashes($_POST['id_khoi']));
            $id_gv = Htmlspecialchars(addslashes($_POST['id_gv']));
            if(empty($ten_lop)||empty($id_khoi)||empty($id_gv))
                echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
            else
            {
                $this->editLop($id_lop,$id_khoi,$ten_lop,$id_gv);
                echo '<meta http-equiv="refresh" content="0" />';
            }  
        }
    // thực hiện bắt sự kiện và xóa 1 lớp
        if(isset($_POST['del-lop']))
        {
         $id_lop = Htmlspecialchars($_POST['id_lop']);
         $this->delLop($id_lop);
         echo '<meta http-equiv="refresh" content="0" />'; 
     }
   // thực hiện thêm 1 lớp với các thông tin nhập vào, sai báo ra màn hình
     if(isset($_POST['add-lop']))
     {
        $ten_lop = Htmlspecialchars(addslashes($_POST['ten_lop']));
        $id_khoi = Htmlspecialchars(addslashes($_POST['id_khoi']));
        $id_gv = Htmlspecialchars(addslashes($_POST['id_gv']));
        if(empty($ten_lop)||empty($id_khoi)||empty($id_gv))
            echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
        else
        {
            $this->addLop($id_khoi,$ten_lop,$id_gv);
            echo '<meta http-equiv="refresh" content="0" />';
        }
    }
}
public function showQLHocSinh()
{
 $dshs = $this->getDSHS();
 $dsl = $this->getDSL();
 for ($i = 0; $i < count($dshs); $i++)
 { 
   $tenlop[$i] = $this->getTenLop($dshs[$i]->id_lop);
   $last_id = $dshs[$i]->id_hs+1;
}
$this->loadView("admin");
$admin = new V_Admin();
$admin->showQLHocSinh($dshs,$dsl,$tenlop,$last_id);
// thực hiện thêm học sinh với các thông tin nhập vào
if(isset($_POST['add-hs']))
{
    $ten = Htmlspecialchars(addslashes($_POST['ten']));
    $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
    $mat_khau = md5($_POST['mat_khau']);
    $id_lop = Htmlspecialchars(addslashes($_POST['id_lop']));
    if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
        echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
    else
    {
        $this->addHS($tai_khoan,$mat_khau,$ten,$id_lop);
        $this->addDiem($last_id,$id_lop);
        echo '<meta http-equiv="refresh" content="0" />';
    }
}
// thực hiện xóa 1 học sinh
if(isset($_POST['del-hs']))
{
    $id_hs = Htmlspecialchars($_POST['id_hs']);
    $id_lop = Htmlspecialchars($_POST['id_lop']);
    $this->delHS($id_hs,$id_lop);
    echo '<meta http-equiv="refresh" content="0" />'; 
}
// thực hiện sửa thông tin học sinh, nếu thông tin hợp lệ thực hiện, sai báo ra màn hình
if(isset($_POST['edit-hs']))
{
    $id_hs = Htmlspecialchars($_POST['id_hs']);
    $ten = Htmlspecialchars(addslashes($_POST['ten']));
    $tai_khoan = Htmlspecialchars(addslashes($_POST['tai_khoan']));
    $mat_khau = md5($_POST['mat_khau']);
    $id_lop = Htmlspecialchars(addslashes($_POST['id_lop']));
    if(empty($ten)||empty($tai_khoan)||empty($mat_khau))
        echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
    else
    {
        $this->editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop);
        echo '<meta http-equiv="refresh" content="0" />';
    }  
}
}
public function showQLCauHoi()
{
    $dsch = $this->getDSCH();
    $dskhoi = $this->getKhoi();
    for ($i = 0; $i < count($dsch); $i++)
       $khoi[$i] = $this->getTenKhoi($dsch[$i]->id_khoi);
   $this->loadView("admin");
   $admin = new V_Admin();
   $admin->showQLCauHoi($dsch,$dskhoi,$khoi);
   // thực hiện thêm câu hỏi, nếu thông tin đúng thực hiện, sai báo ra màn hình
   if(isset($_POST['add-ch']))
   {
    $cau_hoi = Htmlspecialchars(addslashes($_POST['cau_hoi']));
    $id_khoi = Htmlspecialchars(addslashes($_POST['id_khoi']));
    $unit = Htmlspecialchars(addslashes($_POST['unit']));
    $da_1 = Htmlspecialchars(addslashes($_POST['da_1']));
    $da_2 = Htmlspecialchars(addslashes($_POST['da_2']));
    $da_3 = Htmlspecialchars(addslashes($_POST['da_3']));
    $da_4 = Htmlspecialchars(addslashes($_POST['da_4']));
    $da_dung = Htmlspecialchars(addslashes($_POST['da_dung']));
    if(empty($cau_hoi)||empty($id_khoi)||empty($unit)||empty($da_1)||empty($da_2)||empty($da_3)||empty($da_4)||empty($da_dung))
       echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
   else
   {
    $this->addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
    echo '<meta http-equiv="refresh" content="0" />';
}
}
// thực hiện xóa câu hỏi
if(isset($_POST['del-ch']))
{
    $id_cauhoi = Htmlspecialchars($_POST['id_cauhoi']);
    $this->delCH($id_cauhoi);
    echo '<meta http-equiv="refresh" content="0" />'; 
}
// thực hiện sửa câu hỏi, nếu thông tin đúng thực hiện, sai báo ra màn hình 
if(isset($_POST['edit-ch']))
{
    $id_cauhoi = Htmlspecialchars($_POST['id_cauhoi']);
    $cau_hoi = Htmlspecialchars(addslashes($_POST['cau_hoi']));
    $id_khoi = Htmlspecialchars(addslashes($_POST['id_khoi']));
    $unit = Htmlspecialchars(addslashes($_POST['unit']));
    $da_1 = Htmlspecialchars(addslashes($_POST['da_1']));
    $da_2 = Htmlspecialchars(addslashes($_POST['da_2']));
    $da_3 = Htmlspecialchars(addslashes($_POST['da_3']));
    $da_4 = Htmlspecialchars(addslashes($_POST['da_4']));
    $da_dung = addslashes($_POST['da_dung']);
    if(empty($cau_hoi)||empty($id_khoi)||empty($unit)||empty($da_1)||empty($da_2)||empty($da_3)||empty($da_4)||empty($da_dung))
        echo '<script type="text/javascript">alert("không được bỏ trống các trường khi nhập");</script>';
    else
    {
        $this->editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
        echo '<meta http-equiv="refresh" content="0" />';
    } 
}
}
public function showSendNotify()
{
    $tbgv = $this->getTBGV();
    $tbhs = $this->getTBHS();
    $this->loadView("admin");
    $admin = new V_Admin();
    $admin->showSendNotify($tbgv,$tbhs);
 //kiểm tra nội dung và chủ đè không bỏ trống, thực hiện thêm vào CSDL
    if(isset($_POST['send_gv']))
    {
        $chu_de = Htmlspecialchars(trim(addslashes($_POST['chu_de_gv'])));
        $noi_dung = Htmlspecialchars(trim(addslashes($_POST['noi_dung_gv'])));
        if($chu_de != '' && $noi_dung != '')
        {
            $this->sendGV($chu_de,$noi_dung);
            echo '<meta http-equiv="refresh" content="0" />';
        }
    }
    //kiểm tra nội dung và chủ đè không bỏ trống, thực hiện thêm vào CSDL
    if(isset($_POST['send_hs']))
    {
        $chu_de = Htmlspecialchars(trim(addslashes($_POST['chu_de_hs'])));
        $noi_dung = Htmlspecialchars(trim(addslashes($_POST['noi_dung_hs'])));
        if($chu_de != '' && $noi_dung != '')
        {
            $this->sendHS($chu_de,$noi_dung);
            echo '<meta http-equiv="refresh" content="0" />';
        }
    }
}
public function show404()
{
 $this->loadView("admin");
 $admin = new V_Admin();
 $admin->show404();
}

}
?>