<?php

namespace App\Http\Controllers;

use App\Catagory;
use App\Mail\MailServices;
use App\Tag;
use App\TagRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Mail;




class ProductController extends Controller
{
    //session(['key' => 'value']);


    public function index($id = null)
    {

        $tgInfo = TagRelation::with(['tgInfo'])->get();
        $category = Catagory::all();
        $usre_id = Auth::user()->id;

        if ($id == null) {


            $product = Product::with(['userInfo', 'catInfo', 'tagInfo'])->get();
            //return $product;



            return view('index', compact('product', 'category', 'usre_id ', 'tgInfo'));
            //return response()->json($product);


        } else {
            $product = Product::with(['userInfo', 'catInfo', 'tagInfo'])
                ->Where('category_id', $id)->get();
            return $product;
            //return view('index', compact('product', 'category', 'tgInfo'));
        }
    }

    public function indexOwn()
    {

        $id = Auth::user()->id;
        $product = Product::all()->where('user_id', $id);
        return view('indexOwn', compact('product'));
    }


    public function create()
    {
        $category = Catagory::all();
        $tag = Tag::all();
        return view('create', compact(['category', 'tag']));
    }

    public function store(Request $request)
    {
        //dd($request);
        $data = $request->except(['_token', 'tag_name']);
        //$data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validated = $request->validate([
            'product_name' => 'required',
            'product_details' => 'required',
            'category_id' => 'required',
            'logo' => 'required'
        ]);

        $image = $request->file('logo');

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['logo'] = $image_url;

            if ($ext != 'jpeg' && $ext != 'jpg' && $ext != 'png') {
                return redirect()->route('index')
                    ->with('failed', 'Wrong type of file format');
            }
        }

        DB::transaction(function () use ($data, $request) {
            try {

                $product = new Product;
                $product->product_name = $request->product_name;
                $product->product_details = $request->product_details;
                $product->logo = $data['logo'];
                $product->category_id = $request->category_id;
                $product->user_id = Auth::user()->id;

                $product->save();

                $last_inserted_id = $product['id'];


                $data_tag = $request->tag_name;


                $s = sizeof($data_tag);
                $id_of_tag = array();

                for ($i = 0; $i < $s; $i++) {
                    $data_tg[$i]['tag_name'] = $request->tag_name[$i];
                    $tag = Tag::create($data_tg[$i]);
                    $id_of_tag[$i] = $tag['id'];
                }


                for ($i = 0; $i < $s; $i++) {
                    $dataTag[$i]['tag_id'] = $id_of_tag[$i];
                    $dataTag[$i]['product_id'] = $last_inserted_id;
                }


                $tag = TagRelation::insert($dataTag);
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
        });
        //Session()->flash('success', 'Product Created Successfully!');

        return redirect()->route('index')
            ->with('success', 'Product Created Successfully');
    }



    public function name_sidebar()
    {

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('layouts.sidebar', compact('user'));
    }


    public function show($id)
    {

        $data = Product::with('userInfo')->find($id);
        return view('show', compact('data'));
    }

    public function profile($id)
    {

        $data = User::find($id);

        return view('profile', compact(['data', 'id']));
    }

    public function edit($id)
    {
        $category = Catagory::all();
        $product = Product::find($id);
        $tag = Tag::all();
        return view('edit', compact(['product', 'category', 'tag']));
    }

    public function update(Request $request, $id)
    {

        $oldlogo = $request->old_logo;
        $url = url('/');
        $oldlogo = trim($oldlogo, $url);
        $oldlogo = 'p' . $oldlogo;

        $data = $request->all();

        $image = $request->file('logo');
        if ($image) {

            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['logo'] = $image_url;
        }
        $product = Product::find($id)->update($data);

        $data_tag = $request->tag_name;



        $s = sizeof($data_tag);
        $id_of_tag = array();

        for ($i = 0; $i < $s; $i++) {
            $data_tg[$i]['tag_name'] = $request->tag_name[$i];

            $tag = Tag::create($data_tg[$i]);
            $last_inserted_tag_id = $tag['id'];
            $id_of_tag[$i] = $last_inserted_tag_id;
        }

        $cnt = TagRelation::Where('product_id', $id)->count();
        for ($i = 0; $i < $cnt; $i++) {

            $temp = TagRelation::Where('product_id', $id)->Delete();
        }


        for ($i = 0; $i < $s; $i++) {
            $dataTag[$i]['tag_id'] = $id_of_tag[$i];
            $dataTag[$i]['product_id'] = $id;
        }
        //return $dataTag;

        $tag = TagRelation::insert($dataTag);


        return redirect()->route('index')
            ->with('success', 'Product updated Successfully');
    }



    public function delete($id)
    {
        $data = Product::find($id);
        $oldimage = $data->logo;
        unlink($oldimage);

        $product = Product::find($id)->delete();

        return redirect()->route('index')
            ->with('success', 'Product deleted Successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $product = Product::where('product_name', 'like', '%' . $search . '%')->paginate(5);
        $tgInfo = TagRelation::with(['tgInfo'])->get();
        $category = Catagory::all();

        $id = Auth::user()->id;

        //return $product;

        return view('index', compact('product', 'id', 'tgInfo', 'category'));
    }

    public $email;
    public function testMail(Request $request)
    {
        $file =  $request->file('email_file');
        if ($file) {
            $file_name = date('dmy_H_s_i');
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = $file_name . '.' . $ext;
            $upload_path = 'public/media/';
            $file_url = $upload_path . $file_full_name;
            $success = $file->move($upload_path, $file_full_name);
            $file = $file_url;
        }


        $file = public_path($file);

        //return $file;

        $email = $request;
        $email->file = $file;

        Mail::to($request->to)->send(new MailServices($email));

        // Mail::send('emails.mail', $request->toArray(), function ($message) use ($request, $file) {
        //     $message->to($request->to)
        //         ->cc($request->cc)
        //         ->subject($request->email_subject)
        //         ->attach($file);
        // });
        return redirect('/createmail')
            ->with('success', 'Email Sent successfully');
    }


    public function createMail()
    {
        return view('createMail');
    }
}
