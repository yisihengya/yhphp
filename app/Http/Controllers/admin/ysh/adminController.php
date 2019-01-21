<?php

namespace App\Http\Controllers\admin\ysh;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class adminController extends Controller
{

    //多图上传方法
    //上传图片处理的
    public function upload()
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        //判断请求方式是否OPTIONS
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        //调试
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }
        //设置脚本的执行时间
        @set_time_limit(5 * 60);
// Uncomment this one to fake upload time
// usleep(5000);
// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        //临时上传的目录
        $targetDir = 'upload_tmp';
        //文件的上传目录
        $uploadDir = 'upload';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
// Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }
// Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
      //获取后缀名
        $ext = pathinfo($fileName,PATHINFO_EXTENSION);   //  xxxx.jpg   xxxx.png
        $new_name = date('Y-m-d',time()).'-'.uniqid();
        $newfilename = $new_name.'.'.$ext;
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        //DIRECTORY_SEPARATOR   自动识别你的操作系统目录的分隔符号    Linux系统   /         window系统 \
        //$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $newfilename;
// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
// Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
// Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }
                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
// Return Success JSON-RPC response
        $data=[];
        $data["result"]=$newfilename;
        echo json_encode($data);

//        die('{"jsonrpc" : "2.0", "result" : 666.jpg, "id" : "id"}');
    }

    //添加商品分类控制器 Add_Brand
    public function Add_Brand(Request $request){
        if ($request->isMethod('post')){
            $input = $request->except('_token');
            $pid = $request->post('pid');
            $input['addtime'] = date('Y-m-d H:i:s',time());
            if ($request->hasFile('logo')){
                //获取后缀名
                $ext = $request->file('logo')->getClientOriginalExtension();   //  xxxx.jpg   xxxx.png
                $new_name = date('Y-m-d',time()).'-'.uniqid();
                $newfilename = $new_name.'.'.$ext;
                $pathname=public_path('uploads');
//dd($newfilename);
                //移入
                $request->file('logo')->move($pathname,$newfilename);
                $input['logo'] = $newfilename;
            }

            $id = DB::table('dr_category')->insertGetId($input);
            if ($id){
                if ($pid==0){
                    $path = $id;
                }else{
                    $arr = DB::table('dr_category')->where('id',$pid)->first();
                    $path = $arr->path.','.$id;
                }
                $input['path']=$path;
            }
            $num = DB::table('dr_category')->where('id',$id)->update(['path'=>$path]);
            if ($num){
                success('商品分类添加成功!',url('admin/Brand_Manage'));
            }else{
                error('商品分类添加失败!');
            }
        }else{
            $arr = DB::table('dr_category')->get()->toArray();
            $arr = mytree($arr,0,1);
            return view('admin.Add_Brand',["arr"=>$arr]);
        }

    }
    //商品分类管理(列表)控制器 Brand_Manage
    public function Brand_Manage(Request $request){
        if ($request->isMethod('post')){

            $cat_name = $request->input('cat_name');
            $addtime = $request->input('addtime');
            $data = DB::table('dr_category')->where('cat_name', 'like', '%'.$cat_name.'%')
                ->orwhere('desc', 'like', '%'.$cat_name.'%')
                ->where('addtime','like','%'.$addtime.'%')
                ->orderBy('id','desc')
                ->paginate(2);
            //判断查找的内容 数据库中是否存在
            if ($data->items()==null){
                error('您搜索的信息为空');
            }
            $total = DB::table('dr_category')->count();
            //判断ajax提交过来的状态修改分类显示状态
            if ($request->ajax()){
                $startid = $request->post('startid');
                $stopid = $request->post('stopid');
//                dd($stopid,$startid);
                $is_show = DB::table('dr_category')->where('id',$startid)->orwhere('id',$stopid)->select('is_show')->first();
                $id=$is_show->is_show;
//                dd($is_show);
                    //dd($id);
                    $data = [];
                    if($id==1){
                        $res = DB::table('dr_category')->where('id',$startid)->orWhere('id',$stopid)->update(['is_show'=>0]);
                        //dd($res);
                        $data['code'] = 1;
                    }else{
                        $res = DB::table('dr_category')->where('id',$stopid)->orwhere('id',$startid)->update(['is_show'=>1]);
                            $data['code'] = 0;
                    }
                    echo json_encode($data);

                //dd($is_show);
            }
            return view('admin.Brand_Manage',[
                'data'=>$data,
                'total'=>$total,
                'cat_name'=>$cat_name,
                'addtime'=>$addtime
            ]);
        }else{
            $data = DB::table('dr_category')->orderBy('id','desc')->paginate(3);
            $total = DB::table('dr_category')->count();
            return view('admin.Brand_Manage',['data'=>$data,'total'=>$total]);
        }
    }
    //删除商品分类控制器 category_del
    public function category_del(Request $request){
        //单独删除
        if ($request->get('id')){
            $id = $request->get('id');
            //dd($id);
            $r = DB::table('dr_category')->where('id',$id)->delete();
            $data = [];
            if ($r){
                $data['code'] = 1;
                $data['mess'] = '删除成功!';
            }else{
                $data['code'] = 0;
                $data['mess'] = '删除失败!';
            }
            return response()->json($data);
        }
        //批量删除
        if($request->post("data")){
            $data=$request->post("data");
            $id=DB::table('dr_category')->whereIn("id",$data)->delete();
            if($id){
                $data['code']=1;
                $data['mess']='删除成功';
            }else{
                $data['code']=0;
                $data['mess']='删除失败';
            }
            return response()->json($data);
        }
    }

    //修改商品分类控制器 Add_Brand_edit
    public function Add_Brand_edit(Request $request){
        if ($request->isMethod('post')){
            $data = $request->except('_token','id','pid');
            $data['updtime'] = date('Y-m-d H:i:s',time());
            $id = $request->get('id');
            //dd($data);
            //判断是否有图片上传
            if ($request->hasFile('logo')){
                //获取后缀名
                $ext = $request->file('logo')->getClientOriginalExtension();   //  xxxx.jpg   xxxx.png
                $new_name = date('Y-m-d',time()).'-'.uniqid();
                $newfilename = $new_name.'.'.$ext;
                $pathname=public_path('uploads');
                //移入
                $request->file('logo')->move($pathname,$newfilename);
                $data['logo'] = $newfilename;
            }
            $num = DB::table('dr_category')->where('id',$id)->update($data);
            if ($num){
                success('修改成功!',url('admin/Brand_Manage'));
            }else{
                error('修改失败!');
            }
        }else{
            $id = $request->get('id');
            $data = DB::table('dr_category')->where('id',$id)->first();
            if ($data->pid==0){
                $data->category = '顶级栏目';
            }else{
                $res = DB::table('dr_category')->where('id',$data->pid)->first();
                $data->category = $res->cat_name;
            }
            return view('admin/Add_Brand_edit',['data'=>$data]);
        }
    }

    //商品添加控制器add_product
    public function add_product(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token','checkbox','goods_imgs');
            $input['create_time'] = date('Y-m-d H:i:s', time());
            $is_pl = $request->post('is_pl');
            if ($is_pl!=1){
                $input['is_pl'] = 0;
            }
            //dd($input);
            if ($request->hasFile('goods_img')) {
                //获取后缀名
                $ext = $request->file('goods_img')->getClientOriginalExtension();   //  xxxx.jpg   xxxx.png
                $new_name = date('Y-m-d', time()) . '-' . uniqid();
                $newfilename = $new_name . '.' . $ext;
                $pathname = public_path('goods_img_uploads');
                //移入
                $request->file('goods_img')->move($pathname, $newfilename);
                $input['goods_img'] = $newfilename;
            }
            //dd($input);
            $id = DB::table('add_goods')->insertGetId($input);
            if ($id) {
                if ($request->post('goods_imgs')) {
                    $imgs = $request->post('goods_imgs');
                    //多图保存
                    foreach ($imgs as $v) {
                        $data['goods_img'] = $v;
                        $data['addtime'] = date('Y-m-d H:i:s', time());
                        $data['goods_id'] = $id;
                        DB::table('goods_img')->insert($data);
                    }
                }
                success('商品上传成功！', url('admin/Products'));
            } else {
                error("商品上传失败！");
            }
        } else {
            $arr = DB::table('dr_category')->get()->toArray();
            $arr = mytree($arr, 0, 1);
            return view('admin.add_product', ["arr" => $arr]);
        }
    }

    //商品列表控制器 Products
    public function Products(Request $request){
        if ($request->isMethod('post')){
            $goods_name = $request->input('goods_name');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            //dd($goods_name,$start_time,$end_time);
//            $input = $request->except('_token');
//            dd($input);
        $data = DB::table('add_goods')
            ->where('goods_name', 'like', '%'.$goods_name.'%')
            ->where('start_time','like','%'.$start_time.'%')
            ->where('end_time','like','%'.$end_time.'%')
            ->orderBy('addtime','desc')
            ->paginate(2);
        if ($data->items()==null){
            error('您搜索的信息不存在');
        }
            $total = DB::table('add_goods')->count();
            return view('admin.Products',['data'=>$data,'total'=>$total]);
        }else{
            $data = DB::table('add_goods')->orderBy('id','desc')->paginate(5);
            $total = DB::table('add_goods')->count();
            return view('admin.Products',['data'=>$data,'total'=>$total]);
        }
    }

    //修改商品详情控制器 add_product_edit
    public function add_product_edit(Request $request)
    {
        $id = $request->get('id');
        if ($request->isMethod('post')){
            $input = $request->except('_token','checkbox','goods_imgs','cat_id');
            $input['create_time'] = date('Y-m-d H:i:s', time());
            $is_pl = $request->post('is_pl');
            if ($is_pl!=1){
                $input['is_pl'] = 0;
            }
            //dd($input);
            if ($request->hasFile('goods_img')) {
                //获取后缀名
                $ext = $request->file('goods_img')->getClientOriginalExtension();   //  xxxx.jpg   xxxx.png
                $new_name = date('Y-m-d', time()) . '-' . uniqid();
                $newfilename = $new_name . '.' . $ext;
                $pathname = public_path('goods_img_uploads');
                //移入
                $request->file('goods_img')->move($pathname, $newfilename);
                $input['goods_img'] = $newfilename;
            }
            //dd($input);
            $id = DB::table('add_goods')->where('id',$id)->update($input);
            if ($id) {
                if ($request->post('goods_imgs')) {
                    $imgs = $request->post('goods_imgs');
                    //多图保存
                    foreach ($imgs as $v) {
                        $data['goods_img'] = $v;
                        $data['addtime'] = date('Y-m-d H:i:s', time());
                        $data['goods_id'] = $id;
                        DB::table('goods_img')->insert($data);
                    }
                }
                success('商品修改成功！', url('admin/Products'));
            } else {
                error("商品修改失败！");
            }
        }else{

            $data = DB::table('add_goods')->where('id',$id)->first();
//        dd($data);
            $cid = $data->cat_id;
            $c_name = DB::table('dr_category')->where('id',$cid)->pluck('cat_name')->first();
            return view('admin/add_product_edit',['c_name'=>$c_name,'data'=>$data]);
        }
    }

    //删除商品控制器 goods_del
    public function goods_del(Request $request){
        //单独删除
        if ($request->get('id')){
            $id = $request->get('id');
            //dd($id);
            $r = DB::table('add_goods')->where('id',$id)->delete();
            $data = [];
            if ($r){
                $data['code'] = 1;
                $data['mess'] = '删除成功!';
            }else{
                $data['code'] = 0;
                $data['mess'] = '删除失败!';
            }
            return response()->json($data);
        }
        //批量删除
        if($request->post("data")){
            $data=$request->post("data");
            $id=DB::table('add_goods')->whereIn("id",$data)->delete();
            if($id){
                $data['code']=1;
                $data['mess']='删除成功';
            }else{
                $data['code']=0;
                $data['mess']='删除失败';
            }
            return response()->json($data);
        }
    }


    //地图页面控制器 home
    public function home(){
        return view('admin.home');
    }


    public function Order_detailed(){
        return view('admin.Order_detailed');
    }


    //会员列表 控制器 member_list
    public function member_list(){
        return view('admin.member_list');
    }
    //会员列表 控制器 member_list
    public function Order_form(){
        return view('admin.Order_form');
    }
    //退款管理 控制器 Refund
    public function Refund(){
        return view('admin.Refund');
    }
    //交易统计 控制器 Order
    public function Order(){
        return view('admin.Order');
    }
    //物流管理 控制器 Order_Logistics
    public function Order_Logistics(){
        return view('admin.Order_Logistics');
    }
    //订单统计（全国图） 控制器 Order_Chart
    public function Order_Chart(){
        return view('admin.Order_Chart');
    }
    //支付管理 控制器 payment_method
    public function payment_method(){
        return view('admin.payment_method');
    }
    //支付配置 控制器 Payment_Configure
    public function Payment_Configure(){
        return view('admin.Payment_Configure');
    }
    //栏目设置 控制器 system_columns
    public function system_columns(){
        return view('admin.system_columns');
    }
    //自定页面 控制器 form_builder
    public function form_builder(){
        return view('admin.form_builder');
    }
    //自定页面 控制器 form_builder
    public function system_info(){
        return view('admin.system_info');
    }
    //系统日志 控制器 rizhi_list
    public function rizhi_list(){
        return view('admin.rizhi_list');
    }

    //商城列表  控制器 page_list
    public function page_list(){
        return view('admin.page_list');
    }
    //栏目管理  控制器 Columns
    public function Columns(){
        return view('admin.Columns');
    }
    //留言反馈  控制器 feedback
    public function feedback(){
        return view('admin.feedback');
    }
}
