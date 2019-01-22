<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Alert;
use App\news;

class NewsController extends Controller
{
    
    public function index()
    {
        $data = news::orderBy('created_at','DESC')->get();
        return view('news.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        $data = new news;
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->tanggal = date('Y-m-d',strtotime($request->tanggal));
        $data->penulis = $request->penulis;
        
        $path = 'image';
        $image = $request->file('image');
        $nameimage = 'IMAGE-'.Uuid::uuid4()->getHex().'.'.$image->getClientOriginalExtension();
        $mimeimage = $image->getMimeType();
        $nameimage = $request->file('image')->move($path,$nameimage);

        $data->image = $nameimage;
        $data->mime_image = $mimeimage;
        $data->save();

        Alert::success('Success');
        return back();
    }

    public function show($id)
    {
        $data = news::where('id',$id)->first();
        return view('news.detail',compact('data'));
    }
   
    public function update(Request $request, $id)
    {
        
        if($request->file('image') == 0){
            news::where('id',$id)->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => date('Y-m-d',strtotime($request->tanggal)),
                'penulis' => $request->penulis
            ]);
        }else{
            $dt = news::where('id',$id)->first();

            $path = 'image';
            $image = $request->file('image');
            $nameimage = 'IMAGE-'.Uuid::uuid4()->getHex().'.'.$image->getClientOriginalExtension();
            $mimeimage = $image->getMimeType();
            $nameimage = $request->file('image')->move($path,$nameimage);

            news::where('id',$id)->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => date('Y-m-d',strtotime($request->tanggal)),
                'penulis' => $request->penulis,
                'image' => $nameimage,
                'mime_image' => $mimeimage
            ]);

            if (file_exists($dt->image)){
                @unlink($dt->image);
            }

        }
        Alert::success('Sukses');
        return back();
        
    }

    public function destroy($id)
    {
        $dt = news::where('id',$id)->first();
        $del = news::where('id',$id);
        $del->delete();

        if (file_exists($dt->image)){
            @unlink($dt->image);
        }

        Alert::success('Data Berhasil Dihapus');
        return back();
    }
}
