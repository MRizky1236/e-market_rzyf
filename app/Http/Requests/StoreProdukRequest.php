<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required',
            'jenis' => 'required',
            'kode' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'jenis.requaired' => 'Data jenis belum di pilih!',
            'nama_produk.required' => 'Data nama produk harus di isi 0__0',
            'harga.required' => 'Harga belum di isi!',
            'harga.numeric' => 'Harga bukan angka!',
            'stok.required' => 'Stok belum diisi!',
            'kode.required' => 'kode Belum diisi!'
        ];
    }
}
