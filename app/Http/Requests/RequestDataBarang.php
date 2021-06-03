<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDataBarang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_brg' => 'required',
            'keterangan' => 'required|min:3|max:1000',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'nama_brg.required'                   => 'Nama tidak boleh kosong',
            'keterangan.required'                 => 'Keterangan tidak boleh kosong',
            'keterangan.min'                      => 'harus lebih dari 3 kata',
            'keterngan.max'                       => 'tidak boleh lebih dari 100 kata',
            'kategori.required'                   => 'Pilih salah satu ketegori yang telah di sediakan',
            'harga.required'                      => 'Harga barang tidak boleh kosong',
            'stok.required'                       => 'Stok barang tidak boleh kosong',
            'foto.required'                       => 'Foto wajib diisi.',
            'foto.image'                          => 'Foto wajib dalam bentuk image',
            'foto.mimes'                          => 'Foto wajib dalam bentuk image'
        ];
    }
}
