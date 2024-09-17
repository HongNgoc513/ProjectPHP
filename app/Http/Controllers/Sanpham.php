<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sanpham extends Controller
{
    public function trangchu()
    {
        $loaihang = DB::table('loaihang')->get();
        $user = DB::table('users')->first();
        return view ('index',compact('loaihang','user'));

    }
    public function son()
    {
        $son = DB::table('sanpham')->get();
        return view ('son',compact('son'));
    }
    public function phan()
    {
        $phan = DB::table('sanpham')->get();
        return view ('phan',compact('phan'));
    }
    public function nen()
    {
        $nen = DB::table('sanpham')->get();
        return view ('nen',compact('nen'));
    }
    public function taytrang()
    {
        $taytrang = DB::table('sanpham')->get();
        return view ('taytrang',compact('taytrang'));
    }
    public function suaruamat()
    {
        $suaruamat = DB::table('sanpham')->get();
        return view ('suaruamat',compact('suaruamat'));
    }
    public function taytebaochet()
    {
        $taytebaochet = DB::table('sanpham')->get();
        return view ('taytebaochet',compact('taytebaochet'));
    }
    public function thongbao()
    {
        $giohang = DB::table('giohang')->get();
        return view ('thongbao',compact('giohang'));

    }
    public function shop()
    {
        $review = DB::table('sanpham')->get();
        return view ('shop',compact('review'));
    }
    public function trangsanpham()
    {
        $sanpham= DB::table('sanpham')->get();
        return view ('themsp',compact('sanpham'));
    }
    public function trangdanhsach()
    {
        $sanpham = DB::table('sanpham')->get();
        return view ('danhsachsp',compact('sanpham'));
    }
    public function login()
    {
        $user = DB::table('users')->get();
        return view ('login',compact('user'));
    }
    public function dangnhap(Request $request)
    {
        $tendangnhap = $request->input('tk');
        $matkhau = $request->input('mk');
    
        $user = DB::table('users')->where('Tendangnhap', $tendangnhap)->first();
        
        if($user !== null) {
            if($user->Matkhau == $matkhau) {
                return redirect('/');
            }
        }
        
        return redirect('/login');
    }
    public function loginadmin()
    {
        $user = DB::table('users')->get();
        return view ('loginadmin',compact('user'));
    }
    public function dangnhapadmin(Request $request)
    {
        $tendangnhap = $request->input('tk');
        $matkhau = $request->input('mk');
        $user = DB::table('users')->where('Tendangnhap', $tendangnhap)->first();
        
        if($user !== null) {
            if($user->Matkhau == $matkhau) {
                return redirect('/trangdanhsach');
            }
        }
        return redirect('/loginadmin');
    }
    public function redister()
    {
        $redister = DB::table('users')->get();
        return view ('redister',compact('redister'));
    }
    public function dangki(Request $request)
    {
        $tendangnhap= $request->input('tk');
        $matkhau= $request->input('mk');
        $quyenhan = $request->input('qh');
        $diachi = $request->input('dc');
        $SDT = $request ->input('SDT');
        $check = DB::table('users') -> select('tendangnhap')->where ('tendangnhap',$tendangnhap);
        if($check ->count()==0)
        {
            DB::table('users')->insert([
                'tendangnhap' => $tendangnhap,
                'matkhau' =>$matkhau,
                'quyenhan' =>$quyenhan,
                'diachi' =>$diachi,
                'SDT'=>$SDT
            ]);
        }
        $loaihang = DB::table('users')->get();
        return redirect('/login');
    }
    public function logout()
    {
        $user = DB::table('users')->get();
        return view ('login',compact('user'));
    }
    public function dangxuat(Request $request)
    {
        $tendangnhap = $request->input('tk');
        $user = DB::table('users')->where('Tendangnhap', $tendangnhap)->first();
        if($user !== null ) {
                return redirect('/logout');
        }
        return redirect('/login');
    }
    // public function login()
    // {
    //     $user = DB::table('users')->get();
    //     return view('login', compact('user'));
    // }

    // public function dangnhap(Request $request)
    // {
    //     $tendangnhap = $request->input('tk');
    //     $matkhau = $request->input('mk');

    //     $user = DB::table('users')->where('Tendangnhap', $tendangnhap)->first();

    //     if ($user !== null) {
    //         if ($user->Matkhau == $matkhau) {
    //             // Lưu thông tin người dùng vào session
    //             session(['user' => $user]);

    //             return redirect('/');
    //         }
    //     }

    //     return redirect('/login');
    // }

    // public function logout()
    // {
    //     // Hủy bỏ session của người dùng
    //     session()->flush();

    //     // Chuyển hướng đến trang đăng nhập
    //     return redirect('/login');
    // }
    public function themsanpham(Request $request)
    {
        $tensanpham = $request->input('tensp');
        $masanpham = $request->input('masp');
        $mahang = $request->input('mh');
        $gia = $request->input('gt');
        $img = $request ->input('img');
        $sanphamcheck = DB::table('sanpham') -> select('masanpham')->where ('masanpham',$masanpham);
        if($sanphamcheck ->count()==0)
        {
            DB::table('sanpham')->insert([
                'masanpham' => $masanpham,
                'tensanpham' =>$tensanpham,
                'mahang' =>$mahang,
                'gia' =>$gia,
                'img'=>$img
            ]);
        }
        $loaihang = DB::table('sanpham')->get();
        return redirect('/trangdanhsach');
    }
    public function save(Request $request)
    {
        $masanpham=$request->input('masp');   
        $tensanpham = $request->input('tensp');
        $gia = $request->input('gia');
        $img =$request->input('img');
        DB::table('sanpham')->where('Masanpham',$masanpham)->update([
            'Tensanpham'=>$tensanpham,
            'gia'=>$gia,
            'img' =>$img
        ]);
        $trangthaikhiupdate="Update thành công";
        return redirect("/trangdanhsach");
    }
    public function update(Request $request,$masp)
    {
        $masanpham=$request->input("masp");  
        $tensanpham=$request->input("tensp");
        $mahang =$request->input("mahang");
        $gia=$request->input("gia");
        $trangthaikhiupdate = "update thành công";
        $sanpham=DB::table('sanpham')->select('tensanpham','mahang','masanpham','gia')->where('masanpham', $masp)->first();
        $tensanpham=$sanpham->tensanpham;
        $img = $request->file('upload');
        if ($request->hasFile('upload') && $request->file('upload')->isValid())
        {
            $imageName = $img->getClientOriginalName();
            
            $img->storeAs('public_frontend', $imageName);

            $imageUrl = "/upload/{$imageName}";

            $validatedData['img'] = $imageUrl;
        }
        return view("update",compact('masanpham','tensanpham','gia','mahang','img','trangthaikhiupdate'));
    }
//     public function update(Request $request)
// {
//     $tensanpham = $request->input('tensp');
//     $masanpham = $request->input('masp');
//     $mahang = $request->input('mh');
//     $gia = $request->input('gt');
//     $img = $request->input('img');
    
//     // Kiểm tra xem sản phẩm có tồn tại không
//     $sanphamCheck = DB::table('sanpham')->where('masanpham', $masanpham)->exists();
    
//     if ($sanphamCheck) {
//         // Nếu sản phẩm tồn tại, thực hiện cập nhật thông tin
//         DB::table('sanpham')
//             ->where('masanpham', $masanpham)
//             ->update([
//                 'tensanpham' => $tensanpham,
//                 'mahang' => $mahang,
//                 'gia' => $gia,
//                 'img' => $img
//             ]);
//     } else {
//         // Nếu sản phẩm không tồn tại, có thể xử lý thông báo hoặc tạo mới sản phẩm
//         // Ví dụ: return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
//     }
    
//     // Lấy danh sách sản phẩm sau khi chỉnh sửa
//     $loaihang = DB::table('sanpham')->get();
    
//     // Redirect về trang danh sách
//     return redirect('/update');
// }

    public function delete($masp)
    {   
        DB::table('sanpham')->where('Masanpham',$masp)->delete();
        return redirect("/trangdanhsach");
    }
    public function tatcasp(){
 
        $alls = DB::table('sanpham')->get();
        $sanphams = DB::table('sanpham')->get();
        $cart = DB::table('giohang')->get();
        // $user = DB::table('users')->where('Tendangnhap', $tendangnhap)->first();
        // if($user !== null) {
        //     if($user->Matkhau == $matkhau) {
        //         return redirect('/');
        //     }
        // }
        return view('shop', [
            'alls' => $alls,
            'sanphams' => $sanphams,
            'giohang' => $cart,
        ]);
    }
    public function cart()
    {
        $cart = DB::table('giohang')->get();
        $sanphams = DB::table('sanpham')->get();
        return view ('cart',compact('cart'));
    }
  

public function addToCart(Request $request, $productId)
{
    $product = Sanpham::find($productId);
    $cart = DB::table('giohang')->get();
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }
    DB::table('giohang')->insert([
        'product_id' => $product->id,
        'quantity' => 1, // You can adjust the quantity as needed
        'price' => $product->Gia,
        // You can add more fields as needed
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product added to cart successfully.');
}
public function thongbaodathang(Request $request){
    if ($request->has('vnp_ResponseCode') && $request->has('vnp_TransactionNo')) {
        $responseCode = $request->input('vnp_ResponseCode');

        //if the payment successful
        if ($responseCode == '00') {
            return view('/thongbao');
        } else {
            // Payment failed ;1.
            return redirect('/cart');
        }
    } else {
        // Invalid request
        return redirect('/cart');
    }
    
}
public function thanhtoan()
{
    $cart = DB::table('giohang')->get();

    $hoadon = DB::table('hoadon')->get();
    return view ('thanhtoan',compact('hoadon'));
}
public function vnpay(Request $request){
    $vnp_TmnCode = "GHHNT2HB"; //Mã website tại VNPAY 
    $vnp_HashSecret = "BAGAOHAPRHKQZASKQZASVPRSAKPXNYXS"; //Chuỗi bí mật

    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/thongbaodathang";
    $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = 500000 * 100;
    $vnp_Locale = 'vn';
    $vnp_IpAddr = request()->ip();

    $inputData = array(
        "vnp_Version" => "2.0.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . $key . "=" . $value;
        } else {
            $hashdata .= $key . "=" . $value;
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
       // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    }

//--------------------------------------------------------------
    $this->thongbao($request);

    return redirect($vnp_Url);
}

}