<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//header('Access-Control-Allow-Origin: *');
Route::fallback([CoreController::class,'index']);
Route::get('/{arbitrary}.xml',[CoreController::class,'sitemap'])->where('arbitrary','.*');
Route::get('/{arbitrary}.rdf',[CoreController::class,'rdf'])->where('arbitrary','.*');
/*Route::get('/cycle',[CoreController::class,'cycle']);
Route::get('/sogoujubao',[\App\Http\Controllers\TestController::class,'sogou']);
Route::get('/baiduci',function(){
    return view('baidu.getci');
});
//百度找词
Route::get('/baidugetci',[\App\Http\Controllers\BaiduToolController::class,'getCi']);

//搜狗系列
Route::get('/sogouinfo',[\App\Http\Controllers\SogouToolController::class,'info']);//获取站点的id
Route::get('/sogouaddsite',[\App\Http\Controllers\SogouToolController::class,'addSite']);//加站
Route::get('/sogoudelsite',[\App\Http\Controllers\SogouToolController::class,'delSite']);//删除指定站点
Route::get('/sogoudelallsite',[\App\Http\Controllers\SogouToolController::class,'delAllSite']);//删除所有站点
Route::get('/sogoucode',[\App\Http\Controllers\SogouToolController::class,'getCode']);//得到站点的代码并加站
Route::get('/sogouviewurl',function(){
    return view('sogou.urlpush');
});
Route::get('/sogouurl',[\App\Http\Controllers\SogouToolController::class,'addUrl']);//添加URL

//360系列
Route::get('/360addsite',[\App\Http\Controllers\SllToolController::class,'addSite']);//加站
Route::get('/360delsite',[\App\Http\Controllers\SllToolController::class,'delSite']);//删站
Route::get('/360code',[\App\Http\Controllers\SllToolController::class,'getCode']);//得到站点的代码
Route::get('/360verify',[\App\Http\Controllers\SllToolController::class,'verify']);//验证
Route::get('/360delverify',[\App\Http\Controllers\SllToolController::class,'delVerify']);//删除验证文件
Route::get('/360cjysitemap',[\App\Http\Controllers\SllToolController::class,'cjySitemap']);//超级鹰提交地图
Route::get('/360viewmap',function(){
    return view('360.sitemap');
});
Route::get('/360sitemap',[\App\Http\Controllers\SllToolController::class,'sitemap']);//删除验证文件
Route::get('/360updatemap',[\App\Http\Controllers\SllToolController::class,'updateMap']);//更新地图

//字节系列
Route::get('/byteaddsite',[\App\Http\Controllers\ByteToolController::class,'addSite']);//加站
Route::get('/bytedelsite',[\App\Http\Controllers\ByteToolController::class,'delSite']);//删站
Route::get('/bytecode',[\App\Http\Controllers\ByteToolController::class,'getCode']);//得到站点的代码并加站
Route::get('/bytesitemap',[\App\Http\Controllers\ByteToolController::class,'addSitemap']);//添加sitemap
Route::get('/byteurl',[\App\Http\Controllers\ByteToolController::class,'addUrl']);//添加URL

//神马系列
Route::get('/smaddsite',[\App\Http\Controllers\SmToolController::class,'addSite']);//加站
Route::get('/smdelsite',[\App\Http\Controllers\SmToolController::class,'delSite']);//删站
Route::get('/smcode',[\App\Http\Controllers\SmToolController::class,'getCode']);//得到站点的代码并加站
Route::get('/smsitemap',[\App\Http\Controllers\SmToolController::class,'addSitemap']);//添加sitemap*/
