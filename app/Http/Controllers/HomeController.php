<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sanpham;
use App\Models\Danhmuc; 
use App\Repositories\ISanphamRepository;

class HomeController extends Controller
{

    private $sanphamRepository;

    public function __construct(ISanphamRepository $sanphamRepository)
    {
        $this->sanphamRepository = $sanphamRepository;
    }

    public function index()
    {
        $alls = $this->sanphamRepository->allProduct();
        $sanphams = $this->sanphamRepository->relatedProduct();
        return view('pages.home', [
            'alls' => $alls,
            'sanphams' => $sanphams,

        ]);
    }

    public function detail($id)
    {
        // Lấy thông tin của sản phẩm dựa trên $id
        $sanpham = Sanpham::findOrFail($id);
        $randoms = $this->sanphamRepository->randomProduct()->take(5);
        return view('pages.detail', ['sanpham' => $sanpham, 'randoms' => $randoms]);
    }

    public function search(Request $request)
    {
        $searchs = $this->sanphamRepository->searchProduct($request);
        return view('pages.search')->with('searchs', $searchs)->with('tukhoa', $request->input('tukhoa'));
    }
    

    public function viewAll()
    {
        $viewAllPaginations = $this->sanphamRepository->viewAllWithPagi();
        return view('pages.viewall', ['sanphams' => $viewAllPaginations]);
    }
    public function services()
    {
        return view('pages.services');
    }

    public function showProductsByDanhMuc($id)
   {
    // Lấy thông tin danh mục
    $danhmuc = Danhmuc::findOrFail($id);

    // Lấy danh sách sản phẩm thuộc danh mục
    $sanphams = Sanpham::where('id_danhmuc', $id)->paginate(12);

    // Trả về view hiển thị danh mục và sản phẩm
    return view('pages.hienthi', compact('danhmuc', 'sanphams'));
}
}

