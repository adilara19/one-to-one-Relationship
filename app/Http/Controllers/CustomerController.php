<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Bill;

class CustomerController extends Controller
{
    public function create(){
        $customer_id = 123;
        $title = 'Gözlük';
        $description = 'Atasun Optikten Alındı';
        $total = '2000';

        $customer = Customer::findOrFail($customer_id);

        $order = new Order([
            'customer_id'=>$customer_id,
            'title'=>$title,
            'description'=>$description,
            'total'=>$total
        ]);

        $customer->order()->save($order);

        return "Sipariş Eklendi, Lütfen Veri Tabanını Kontrol Ediniz";
    }


    public function bill(){
        $customer_id = 123;
        $title = 'Gözlük';
        $description = 'Atasun Optikten Alındı';
        $total = '2000';
        
        $customer = Customer::find($customer_id);

        if (!$customer) {
            return "Aradığınız Müşteri Numarasına Sahip Bir Sipariş Faturası Bulunamadı, Lütfen Kontrol Edip Tekrar Deneyiniz.";
        }

        $bill = new Bill([
            'customer_id'=>$customer_id,
            'title'=>$title,
            'description'=>$description,
            'total'=>$total
        ]);
        $customer->bill()->save($bill);

        return "Fatura Bilgisi Ekledi, Veri Tabanını Kontrol Ediniz";
    }

    public function update(){
        $id = '123';
        $title = 'Gözlük';
        $description = 'Atasun Optikten Alındı';
        $total = '2000';

        Order::where('id', $id)->update([
            'title'=>$title,
            'description'=>$description
        ]);

        return "Mevcut Veri Güncellendi, Veri Tabanını Kontrol Ediniz.";
    }
}