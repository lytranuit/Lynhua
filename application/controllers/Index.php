<?php

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
////////////////////////////////
        ////////////
        $this->data['is_login'] = $this->ion_auth->logged_in();
////////////////////////////////// Stle mac dinh
        $this->data['stylesheet_tag'] = array(
            base_url() ."public/bootstrap/css/bootstrap.min.css",
            base_url() ."public/font-awesome/css/font-awesome.min.css",
            "https://fonts.googleapis.com/css?family=Roboto:300,400,700",
            base_url() ."public/bootstrap-select/css/bootstrap-select.min.css",
            base_url() ."public/owl.carousel/assets/owl.carousel.css",
            base_url() ."public/owl.carousel/assets/owl.theme.default.css",
            base_url() ."css/style.default.css",
            base_url() ."css/custom.css"
        );
        $this->data['javascript_tag'] = array(
            base_url() ."public/jquery/jquery.min.js",
            base_url() ."public/popper.js/umd/popper.min.js",
            base_url() ."public/bootstrap/js/bootstrap.min.js",
            base_url() ."public/jquery.cookie/jquery.cookie.js",
            base_url() ."public/waypoints/lib/jquery.waypoints.min.js",
            base_url() ."public/jquery.counterup/jquery.counterup.min.js",
            base_url() ."public/owl.carousel/owl.carousel.min.js",
            base_url() ."public/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js",
            base_url() ."js/jquery.parallax-1.1.3.js",
            base_url() ."public/bootstrap-select/js/bootstrap-select.min.js",
            base_url() ."public/jquery.scrollto/jquery.scrollTo.min.js",
            base_url() ."js/front.js"
        );
    }

    public function _remap($method, $params = array())
    {
        if (!method_exists($this, $method)) {
            show_404();
        }
        $this->$method($params);
    }

    public function listall()
    {
        //echo __DIR__;
        $dirmodule = APPPATH . 'modules/';
        $dir       = APPPATH . 'controllers/';
        $this->load->library('directoryinfo');
        $sortedarray1 = $this->directoryinfo->readDirectory($dir, true);
        $sortedarray2 = $this->directoryinfo->readDirectory($dirmodule, true);
        $arr          = array_merge(array($sortedarray1), $sortedarray2);
    }

    public function page_404()
    {
        echo $this->blade->view()->make('page/404-page', $this->data)->render();
    }

    public function delete_img()
    {
        $this->load->model("hinhanh_model");
        $hinh = $this->hinhanh_model->hinhanh_sudung();
        $this->hinhanh_model->delete_img_not($hinh[0]['id']);
        echo "<pre>";
        print_r($hinh);
        die();
    }

    public function index()
    {
//        echo "<pre>";
        //        print_r($this->data['arr_tin']);
        //        die();

        $this->load->model("slider_model");
        $this->load->model("lydo_model");
        $this->load->model("hinhanh_model");
        $this->load->model("option_model");

        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/flexslider.css");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.flexslider.js");

        /*
         * SLIDER
         */
        $arr_slider = $this->slider_model->where(array('deleted' => 0))->order_by('order')->as_array()->get_all();
        foreach ($arr_slider as &$slider) {
            $hinh              = $this->hinhanh_model->where(array('id_hinhanh' => $slider['id_hinhanh']))->as_array()->get_all();
            $slider['hinhanh'] = $hinh[0]['slider_src'];
        }
        $this->data['arr_slider'] = $arr_slider;

        /*
         * Tông quan
         */

        $tieu_de  = $this->option_model->where(array('name' => "muc0_header"))->as_array()->get();
        $noi_dung = $this->option_model->where(array('name' => "muc0_content"))->as_array()->get();
        if (!empty($tieu_de)) {
            $this->data['tieu_de_muc0'] = $tieu_de['content'];
        }

        if (!empty($noi_dung)) {
            $this->data['noi_dung_muc0'] = $noi_dung['content'];
        }

        /*
         * Hình ảnh
         */
        $muc_hinhanh = $this->option_model->where('name', "muc_hinhanh")->as_array()->get_all();
        foreach ($muc_hinhanh as &$hinhanh) {
            $id_hinhanh     = $hinhanh['content'];
            $img            = $this->hinhanh_model->where(array('id_hinhanh' => $id_hinhanh))->as_array()->get();
            $hinhanh['img'] = $img;
        }
        $this->data['muc_hinhanh'] = $muc_hinhanh;
        /*
         * Lý do
         */
        $tieu_de = $this->option_model->where(array('name' => "muclydo_header"))->as_array()->get();

        $this->data['tieu_de_lydo'] = $tieu_de['content'];

        $arr_lydo = $this->lydo_model->where(array('deleted' => 0))->order_by('order')->as_array()->get_all();
        foreach ($arr_lydo as &$lydo) {
            $hinh            = $this->hinhanh_model->where(array('id_hinhanh' => $lydo['id_hinhanh']))->as_array()->get();
            $lydo['hinhanh'] = $hinh['bg_src'];
        }
        $this->data['arr_lydo'] = $arr_lydo;
        /*
         * Muc 1
         */

        $tieu_de  = $this->option_model->where(array('name' => "muc1_header"))->as_array()->get();
        $noi_dung = $this->option_model->where(array('name' => "muc1_content"))->as_array()->get();
        if (!empty($tieu_de)) {
            $this->data['tieu_de_muc1'] = $tieu_de['content'];
        }

        if (!empty($noi_dung)) {
            $this->data['noi_dung_muc1'] = $noi_dung['content'];
        }

        /*
         * Muc 2
         */

        $tieu_de  = $this->option_model->where(array('name' => "muc2_header"))->as_array()->get();
        $noi_dung = $this->option_model->where(array('name' => "muc2_content"))->as_array()->get();
        if (!empty($tieu_de)) {
            $this->data['tieu_de_muc2'] = $tieu_de['content'];
        }

        if (!empty($noi_dung)) {
            $this->data['noi_dung_muc2'] = $noi_dung['content'];
        }

        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function gioithieu()
    {
        $this->load->model("option_model");
        $gioithieu               = $this->option_model->where(array("name" => 'gioi-thieu'))->as_array()->get_all();
        $this->data['gioithieu'] = $gioithieu[0];
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function login()
    {
        if (!$this->ion_auth->logged_in()) {
            $this->data['title'] = $this->lang->line('login_heading');

            //validate form input
            $this->form_validation->set_rules('identity', "", 'required');
            $this->form_validation->set_rules('password', "", 'required');

            if ($this->form_validation->run() == true) {
                // check to see if the user is logging in
                // check for "remember me"
                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                    //if the login is successful
                    //redirect them back to the home page
                    $this->session->set_flashdata('message', "");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } else {
                    // if the login was un-successful
                    // redirect them back to the login page
                    $this->session->set_flashdata('message', "Tài khoản hoặc mật khẩu không đúng");
                    redirect('index/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
                }
            } else {
                // the user is not logging in so display the login page
                // set the flash data error message if there is one
                $this->data['message'] = $this->session->flashdata('message');
                echo $this->blade->view()->make('page/page', $this->data)->render();
            }
        } else {
            redirect('member', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    public function signin()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

        if ($this->ion_auth->logged_in()) {
            redirect('/', 'refresh');
        }

        $tables                        = $this->config->item('tables', 'ion_auth');
        $identity_column               = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('ten', "", 'required');
        if ($this->form_validation->run() == true) {
            $email    = $this->input->post('email');
            $identity = $this->input->post('username');
            $password = $this->input->post('password');

            $additional_data = array(
                'last_name' => $this->input->post('ten'),
                'phone'     => $this->input->post('dienthoai'),
                'gioitinh'  => $this->input->post("gioitinh"),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', "");
            redirect("index/login", 'refresh');
        } else {
            $this->data['message'] = $this->session->flashdata('message');
            echo $this->blade->view()->make('page/page', $this->data)->render();
        }
    }

    public function page($param)
    {
        $id = $param[0];
        $this->load->model("pageweb_model");
        $tin                 = $this->pageweb_model->where(array('id' => $id))->as_array()->get_all();
        $this->data['tin']   = $tin[0];
        $this->data['title'] = $tin[0]['title'];
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function tin($param)
    {
        $id = $param[0];
        $this->load->model("tin_model");
        $this->load->model("user_model");
        $this->load->model("huong_model");
        $this->load->model("phaply_model");
        $tin         = $this->tin_model->where(array('id_tin' => $id))->as_array()->get_all();
        $author      = $this->user_model->where(array("id" => $tin[0]['id_user']))->fields(array("username"))->as_array()->get_all();
        $huong       = $this->huong_model->where(array("id_huong" => $tin[0]['id_huong']))->fields(array("ten_huong"))->as_array()->get_all();
        $phaply      = $this->phaply_model->where(array("id_phaply" => $tin[0]['id_phaply']))->fields(array("ten_phaply"))->as_array()->get_all();
        $arr_hinhanh = $this->tin_model->get_tin_hinhanh($tin[0]['id_tin']);

        $tin[0]['author']      = $author[0]['username'];
        $tin[0]['phaply']      = isset($phaply[0]['ten_phaply']) ? $phaply[0]['ten_phaply'] : "";
        $tin[0]['huong']       = isset($huong[0]['ten_huong']) ? $huong[0]['ten_huong'] : "";
        $tin[0]['arr_hinhanh'] = $arr_hinhanh;
        if ($tin[0]['gia'] != 0) {
            if ($tin[0]['gia'] < 1000) {
                $tin[0]['gia'] = $tin[0]['gia'] . " triệu";
            } else {
                if ($tin[0]['gia'] % 1000) {
                    $tin[0]['gia'] = number_format($tin[0]['gia'] / 1000, 2, ',', ".") . " tỷ";
                } else {
                    $tin[0]['gia'] = number_format($tin[0]['gia'] / 1000) . " tỷ";
                }
            }
        } else {
            $tin[0]['gia'] = "Thương lượng";
        }
        $this->data['tin'] = $tin[0];
//        echo "<pre>";
        //        print_r($tin);
        //        die();
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/flexslider.css");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.flexslider.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.jcarousel.min.js");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function searchtin()
    {
        $this->load->model("tin_model");
        $this->load->model("user_model");
        $this->load->model("khuvuc_model");
        $this->data['arr_tin'] = $this->tin_model->where(array('deleted' => 0))->as_array()->get_all();
        foreach ($this->data['arr_tin'] as $k => &$tin) {
            $author             = $this->user_model->where(array("id" => $tin['id_user']))->fields(array("username"))->as_array()->get_all();
            $arr_hinhanh        = $this->tin_model->get_tin_hinhanh($tin['id_tin']);
            $quan               = $this->khuvuc_model->where(array("id_khuvuc" => $tin['id_khuvuc']))->as_array()->get_all();
            $tin['author']      = $author[0]['username'];
            $tin['arr_hinhanh'] = $arr_hinhanh;
            $tin['khuvuc']      = $quan[0]['ten_khuvuc'];
            if ($tin['gia'] != 0) {
                if ($tin['gia'] < 1000) {
                    $tin['gia'] = $tin['gia'] . " triệu";
                } else {
                    if ($tin['gia'] % 1000) {
                        $tin['gia'] = number_format($tin['gia'] / 1000, 2, ',', ".") . " tỉ";
                    } else {
                        $tin['gia'] = number_format($tin['gia'] / 1000) . " tỉ";
                    }
                }
            } else {
                $tin['gia'] = "Thương lượng";
            }
        }
//        echo "<pre>";
        //        print_r($this->data['arr_tin']);
        //        die();
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/owl.theme.css");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function tintuc($param)
    {
        $id = $param[0];
        $this->load->model("tintuc_model");
        $this->load->model("user_model");
        $tin         = $this->tintuc_model->where(array('id_tintuc' => $id))->as_array()->get_all();
        $author      = $this->user_model->where(array("id" => $tin[0]['id_user']))->fields(array("username"))->as_array()->get_all();
        $arr_hinhanh = $this->tintuc_model->get_tintuc_hinhanh($tin[0]['id_tintuc']);

        $tin[0]['author']      = $author[0]['username'];
        $tin[0]['arr_hinhanh'] = $arr_hinhanh;
        $this->data['tin']     = $tin[0];
//        echo "<pre>";
        //        print_r($tin);
        //        die();
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/flexslider.css");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.flexslider.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.jcarousel.min.js");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function shopdetail($param)
    {
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    public function shopcart()
    {
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }
    public function searchtintuc()
    {
        $this->load->model("tintuc_model");
        $this->load->model("user_model");
        $this->data['arr_tin'] = $this->tintuc_model->where(array('deleted' => 0))->as_array()->get_all();
        foreach ($this->data['arr_tin'] as $k => &$tin) {
            $author             = $this->user_model->where(array("id" => $tin['id_user']))->fields(array("username"))->as_array()->get_all();
            $arr_hinhanh        = $this->tintuc_model->get_tintuc_hinhanh($tin['id_tintuc']);
            $tin['author']      = $author[0]['username'];
            $tin['arr_hinhanh'] = $arr_hinhanh;
        }
//        echo "<pre>";
        //        print_r($this->data['arr_tin']);
        //        die();
        array_push($this->data['stylesheet_tag'], base_url() . "public/css/froala_style.min.css");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    // log the user out
    public function logout()
    {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function checkEmail()
    {
        $email = $this->input->get('email');
        $this->load->model("user_model");
        $check = $this->user_model->where(array("email" => $email, "deleted" => 0))->as_array()->get_all();
        if (!$check) {
            echo json_encode(true);
        } else {
            echo json_encode(array("Email đã tồn tại!"));
        }
    }

    public function checkUsername()
    {
        $username = $this->input->get('username');
        $this->load->model("user_model");
        $check = $this->user_model->where(array("username" => $username, "deleted" => 0))->as_array()->get_all();
        if (!$check) {
            echo json_encode(true);
        } else {
            echo json_encode(array("Tài khoản đã tồn tại!"));
        }
    }

    public function checkUserpass()
    {
        $id    = $this->input->post('id');
        $pass  = $this->input->post('passwordold');
        $check = $this->ion_auth->hash_password_db($id, $pass);
        if ($check === true) {
            echo json_encode(true);
        } else {
            echo json_encode(array("Password cũ không đúng!"));
        }
    }

    public function quanlypage()
    {
        //phpinfo();die();
        $this->data['template'] = "box";
        $arr_page               = $this->page_model->where(array("deleted" => 0))->as_array()->get_all();
        $page_ava               = array_map(function ($item) {
            return $item['link'];
        }, $arr_page);

        $this->data['arr_page'] = $arr_page;
        //$dirmodule = APPPATH . 'modules/';
        $dir = APPPATH . 'controllers/';
        $this->load->library('directoryinfo');
        $arr = $this->directoryinfo->readDirectory($dir, array("Auth.php", "Ajax.php"));
        $arr = array($arr);
        // $sortedarray2 = $this->directoryinfo->readDirectory($dirmodule, true);
        // $arr = array_merge(array($sortedarray1), $sortedarray2);
        //        echo "<pre>";
        //        print_r($arr);
        //        die();
        $dataselect = array();
        foreach ($arr as $key => $row) {
            $module = mb_strtolower($key, 'UTF-8');
            foreach ($row as $key1 => $row1) {
                $class = mb_strtolower($key1, 'UTF-8');
                foreach ($row1 as $row2) {
                    $method = mb_strtolower($row2, 'UTF-8');
                    if ($module) {
                        $page = $module . "/" . $class . "/" . $method;
                    } else {
                        $page = $class . "/" . $method;
                    }
                    $dataselect[$page] = $page;
                }
            }
        }
        $this->data['page_ava'] = $page_ava;
        $this->data['link']     = $dataselect;

        array_push($this->data['stylesheet_tag'], base_url() . "public/css/dataTables.bootstrap.min.css");
        array_push($this->data['javascript_tag'], base_url() . "public/js/jquery.dataTables.min.js");
        array_push($this->data['javascript_tag'], base_url() . "public/js/dataTables.bootstrap.min.js");
        echo $this->blade->view()->make('page/page', $this->data)->render();
    }

    public function crondata()
    {
        $this->load->model("cron_model");
        $this->load->model("tin_model");
        $this->load->model('hinhanh_model');
        $this->load->model("hinhanh_tin_model");
        include_once "public/dom/simple_html_dom.php";
//        $html = file_get_contents("http://alonhadat.com.vn/dat-nen-phia-tay-tp-so-hong-rieng-bao-so-chi-3-7-tr-nen-giam-gia-den-7-5--1226562.html");
        //        echo $html;

        $page = "http://alonhadat.com.vn/";
        $html = file_get_html($page . 'nha-dat/can-ban/dat-tho-cu-dat-o/2/ho-chi-minh.html');
        //$img = $html->find(".content-item .thumbnail a img");
        $first = $html->find(".content-item");
        foreach ($first as $link) {
            $href = $link->find(".ct_title a", 0)->href;
            $id   = preg_replace('/(.*)-(.*).html*/', "$2", $href);

            /*
             *  check Is Cron
             */
            $checkcron = $this->cron_model->where(array('id_cron' => $id, "hosting" => $page))->get_all();
            if (count($checkcron)) {
                continue;
            }
            /// END
            /*
             *  get info what you need
             */
            $img  = $link->find(".thumbnail a img", 0)->src;
            $date = date("Y-m-d");
            $dir  = FCPATH . "public/uploads/$date/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $img_output = "public/uploads/$date/$id.jpg";
            if (strpos($img, "http://") !== false || strpos($img, "https://") !== false) {

            } else {
                $img = $page . $img;
            }
            file_put_contents($img_output, file_get_contents($img));
            $htmldata     = file_get_html($page . $href);
            $title        = $htmldata->find(".content .title h1", 0)->plaintext;
            $content      = $htmldata->find(".content .detail", 0)->innertext;
            $get_dientich = $htmldata->find(".content .square .value", 0)->plaintext;
            $get_gia      = $htmldata->find(".content .price .value", 0)->plaintext;
            $arr_dientich = explode(" ", $get_dientich);
            $dientich     = strtofloat($arr_dientich[1]);
            $arr_gia      = explode(" ", $get_gia);
            if ($arr_gia[count($arr_gia) - 2] != '') {
////trên m2
                switch (trim($arr_gia[2])) {
                    case "tỷ":
                    $temp = strtofloat($arr_gia[1]);
                    $gia  = $temp * $dientich * 1000;
                    break;
                    default;
                    $temp = strtofloat($arr_gia[1]);
                    $gia  = $temp * $dientich;
                    break;
                }
            } else {
                //// bình thường
                switch ($arr_gia[2]) {
                    case "tỷ":
                    $temp = strtofloat($arr_gia[1]);
                    $gia  = $temp * 1000;
                    break;
                    default;
                    $temp = strtofloat($arr_gia[1]);
                    $gia  = $temp;
                    break;
                }
            }
            $diachi  = $htmldata->find(".content .contact .add .value", 0)->plaintext;
            $data_up = array(
                'title'     => $title,
                'alias'     => sluggable($title),
                'content'   => $content,
                'id_khuvuc' => 1,
                'date'      => date("Y-m-d H:i:s"),
                'id_user'   => 1,
                'id_phaply' => 1,
                'id_huong'  => 1,
                'diachi'    => $diachi,
                'chieudai'  => 0,
                'chieurong' => 0,
                'gia'       => $gia,
                'dientich'  => $dientich,
            );
//            echo "<br>Giá:" . $gia . "<br>Diện tích:" . $dientich;
            //            echo "<br>";
            //            print_r($get_dientich);
            //            echo "<br>";
            //            print_r($get_gia);
            $id_tin = $this->tin_model->insert($data_up);

            ////// UPlad hinh anh
            $data_up = array(
                'ten_hinhanh'  => $id,
                'real_hinhanh' => $id,
                'src'          => $img_output,
                'thumb_src'    => $img_output,
                'bg_src'       => "public/uploads/2016-07-03/768x576_1467537290_0_logo.jpg",
                'slider_src'   => "public/uploads/2016-07-03/768x576_1467537290_0_logo.jpg",
                'id_user'      => 1,
                'deleted'      => 0,
                'date'         => date("Y-m-d H:i:s"),
            );
            $id_image = $this->hinhanh_model->insert($data_up);
            $this->hinhanh_tin_model->insert(array('id_tin' => $id_tin, 'id_hinhanh' => $id_image));

            /*
             *  Save id cron
             */
            $data = array(
                'id_tin'  => $id_tin,
                'hosting' => $page,
                'id_cron' => $id,
                'date'    => date("Y-m-d H:i:s"),
            );
            $this->cron_model->insert($data);
        }
    }

    public function gethinh()
    {
        include_once "public/dom/simple_html_dom.php";
//        $html = file_get_contents("http://alonhadat.com.vn/dat-nen-phia-tay-tp-so-hong-rieng-bao-so-chi-3-7-tr-nen-giam-gia-den-7-5--1226562.html");
        //        echo $html;

        $page = "http://celadoncityreal.com/";
        $html = file_get_html($page);

        //$img = $html->find(".content-item .thumbnail a img");
        $first = $html->find("img");

        foreach ($first as $link) {
            $src = $link->src;
            if (strpos($src, $page) !== false) {
                /*
                 * Lay link internal (Xóa ten page ra khoi src)
                 */
                $des      = FCPATH . "downloads/" . str_replace($page, "", $src);
                $filename = basename($des);
                $path     = str_replace($filename, "", $des);
//                echo $des . "<br>";
                //                echo $filename . "<br>";
                //                echo $path . "<br>";
                //                die();
                /*
                 * LUU FILE
                 */
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                file_put_contents($des, file_get_contents($src));

                print_r($link->src);
            }
        }
    }

}
