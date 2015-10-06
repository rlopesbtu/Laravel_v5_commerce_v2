<?php namespace CodeCommerce\Http\Controllers;
use CodeCommerce\product;
use CodeCommerce\category;
use CodeCommerce\Http\Requests;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use CodeCommerce\Tag;

class ProductsController extends Controller
{

    private $productModel;

    public function __construct(product $productModel)
    {
        $this->productModel = $productModel;
    }

	public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    public function store(Requests\productRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect('admin/products');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');
        $product = $this->productModel->find($id);
        return view('products.edit',compact('product','categories'));
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    public function update(Requests\productRequest $request, $id)
    {
       $this->productModel->find($id)->update($request->all());
       return redirect()->route('products');
    }

    public function images($id)
    {
       $product = $this->productModel->find($id);
        return view('products.images', compact('product'));
    }


    public function createImage($id)
    {
        $product = Product::find($id);
        return view('products.create_image', compact('product'));
    }

    /**
     * @param Request $request
     * @param $id
     * @param ProductImage $productImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        if(file_exists(public_path().'/uploads'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }
         $product = $image->product;
         $image->delete();
         $meuStorage = Storage::disk('public_local');
          if($meuStorage->exists($image->id.'.'.$image->extension)){
              $meuStorage->delete($image->id.'.'.$image->extension);
          }

        return redirect()->route('products.images',['id'=>$product->id]);
    }
}
