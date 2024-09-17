
<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <meta charset="utf-8">
    <title>Shop mỹ phẩm FOX</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form class="needs-validation" name="frmthanhtoan" action="/vnpay" id="frmCreateOrder" method="post"
                  action="#">
                <h1 class="text-center">Giỏ hàng</h1>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>

                        </thead>
                        <tbody >
                           <?php
                                    $dem=1;
                            ?>
                            @foreach ($cart as $sp )
                                <tr>
                                    <td>
                                        {{ $dem }}
                                    </td>
                                    <td>
                                        {{ $sp->TenSanPham }}
                                    </td>
                                    <td>
                                        {{ $sp->Soluong}}
                                    </td>
                                    <td>
                                        {{ $sp->Gia }}
                                    </td>
                                    <td>
                                        {{ $sp->ThanhTien }}
                                    </td>
                                    
                                   
                                </tr>
                            <?php
                            $dem++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="/" class="btn btn-warning btn-md">
                        <i class="fa fa-arrow-left"
                           aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ
                    </a>
                    <form action={{ url('/vnpay') }} method="POST">
                        @csrf
                        {{-- <input name="total" value="{{$sp->ThanhTien}}"> --}}
                        <button type="submit" class="btn btn-success text-white">Thanh toán VNPAY</button>
                    </form>
                </div>
            </form>
            </div>
        </div>
        
        {{-- <script>
            $(document).ready(function(){
                $('#vnpay').click(function () {
                    $('#checkout').attr('action', "{{ route('vnpay') }}");
                });
            });
        </script> --}}
        <!-- End block content -->
    </main>

   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popperjs/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="assets/js/app.js"></script>

</body>

</html>