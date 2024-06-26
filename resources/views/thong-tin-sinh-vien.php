<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>


    
<div class="container">
    <div class="row mt-5">
        <div class="col-12 mb-5 px-4">
            <div class="bg-white p-3 p-md rounded shadow-sm">
                <form action="editProfile" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-3 fw-bold">Basic Information</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Họ tên</label>
                            <input name="email" value="<?=$infor['name'];?>" type="text" class="form-control shadow-none">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mã sinh viên</label>
                            <input name="name" value="<?=$infor['msv'];?>"  type="text" class="form-control shadow-none">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tuổi</label>
                            <input name="phone" value="<?=$infor['age'];?>" type="number" class="form-control shadow-none">
                        </div>

                        <div class="col-4 mb-5 mt-2 px-4">
                            <h5 class="mb-3 fw-bold">Picture</h5>
                            <img src="https://assets.goal.com/v3/assets/bltcc7a7ffd2fbf71f5/blt3125544effd09308/639f60c65d0ea95c1ee0e6c3/GettyImages-1450106798.jpg" width="380" class="mb-3"><br>
                        </div> 

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Quê quán</label>
                            <input name="password" value="<?=$infor['hometown'];?>" type="text" class="form-control shadow-none">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Sở thích</label>
                            <input name="address" value="<?=$infor['hobbits'];?>" type="text" class="form-control shadow-none">
                        </div>

                        
                        
                          
                    </div>
                </form>
            </div>
        </div>

        

        

    </div>
</div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>