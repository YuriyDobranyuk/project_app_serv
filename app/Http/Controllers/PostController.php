<?php
namespace App\Http\Controllers;

//use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Filesystem\Filesystem;
use App\Models\Order;
use App\Models\File;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShippedNew;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Order::all();

        dd($posts);

        return view('public.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $idFile = '';
        $fileArray = [];
        if($request->file){
            $uploadedFile = $request->file;
            $fileName = $uploadedFile->getClientOriginalName();
            $resultFilePath = Storage::putFile('photos', $uploadedFile, 'public');
            $resultFileGetSize = Storage::size($resultFilePath);
            $resultFileGetUrl = Storage::url($resultFilePath);
            $fileArray = [
                'name' => explode('/', $resultFilePath)[1],
                'old_name' => $fileName,
                'file_path' => $resultFileGetUrl,
                'size' => $resultFileGetSize,
            ];
            $file = File::create([
                'name' => $fileArray['name'],
                'old_name' => $fileArray['old_name'],
                'file_path' => $fileArray['file_path'],
                'size' => $fileArray['size'],
            ]);
            $file->users()->attach($userId);
            $idFile = $file->getKey();
        }
        $order = Order::create([
            'topic' => $request->topic,
            'message' => $request->message,
            'fileId' => $idFile,
        ]);
        $order->users()->attach($userId);

        Mail::to('dobranyuk@gmail.com')->send(new OrderShipped());
//        dd([$currentUser,$file,$order]);
//        $order->file()->attach($file);
        return redirect('/post/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
