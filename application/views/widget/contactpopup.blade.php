<div class="container" >
    <div class="row">
        <div class="col-md-3 col-sm-8 col-xs-8" id="contact-popup">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <h3 class="panel-title"><span class="fa fa-comment"></span> Đăng kí xem nhà mẫu</h3>
                </div>
                <div class="panel-body" style="display:none;">
                    <form id="popuplienhe">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và Tên</label>
                            <input type="text" class="form-control" required="" name="name" placeholder="Họ và Tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" required="" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoai</label>
                            <input type="text" class="form-control" required=""  name="mobile" placeholder="Số diện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lời nhắn</label>
                            <textarea class="form-control" id="exampleInputEmail1" name="message" maxlength="140" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" name="submit" value="1">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    canvas{
        left:0px !important;
    }
    #contact-popup{
        bottom:0;
        position:fixed !important;
        right: 0px;
        margin-left:10px;
        z-index: 1000;
        font-size: 0.8rem;
    }
    #contact-popup .panel{
        border-radius: 5px 5px 0 0;
        padding: 0px; 
        margin-bottom: 0px;
    }
    #contact-popup .panel-body{
        padding:15px;
    }
    #contact-popup .top-bar {
        cursor: pointer;
        background: green;
        color: white;
        padding: 10px;
        position: relative;
        overflow: hidden;
        margin: 0px;
    }
</style>