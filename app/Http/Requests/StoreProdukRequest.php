<?php

namespace App\Http\Requests;

use App\Enums\KategoriProduk;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nama_produk" => ['required', 'string', 'max:255'],
            "deskripsi_produk" => ['required', 'string', 'max:255'],
            "harga_produk" => ['required', 'integer'],
            "kategori_produk" => ['required', Rule::in([KategoriProduk::ELEKTRONIK->value, KategoriProduk::KOMPUTER->value])],
            "berat_produk" => ['required', 'integer'],
            "stok_produk" => ['required', 'integer'],
            "gambar_produk" => ['image'],
        ];
    }
}
