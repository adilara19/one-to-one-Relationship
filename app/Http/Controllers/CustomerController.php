<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Bill;

class CustomerController extends Controller
{

    //* Sipariş Oluşturmak İçin
    public function create(){
        $customer_id = 345;
        $title = 'Puzzle';
        $description = '1000 Parça Göbeklitepe Puzzle';
        $total = '2850';

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


    //* Alınan Siparişin Faturasını Oluşturmak İçin
    public function bill(){
        $customer_id = 345;
        $title = 'Puzzle';
        $description = '1000 Parça Göbeklitepe Puzzle';
        $total = '2850';
        
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


    //* Mevcut Siparişi Güncellemek İçin
    public function updateOrder(){
        $id = '4'; //Burada aldığımız id ürünün kendi id'si. Bunun yerine customer_id girersek update işlemini gerçekleştirmeyecektir.
        $title = 'Ayakkabı';
        $description = 'Adidas';
        $total = '3850';

        Order::where('id', $id)->update([
            'title'=>$title,
            'description'=>$description,
            'total'=>$total
        ]);

        return "Mevcut Sipariş Güncellendi, Veri Tabanını Kontrol Ediniz.";
    }

    //* Mevcut Faturayı Güncellemek İçin
    public function updateBill(){
        $id = '4'; //Burada aldığımız id ürünün kendi id'si. Bunun yerine customer_id girersek update işlemini gerçekleştirmeyecektir.
        $title = 'Ayakkabı';
        $description = 'Adidas';
        $total = '3850';

        Bill::where('id', $id)->update([
            'title'=>$title,
            'description'=>$description,
            'total'=>$total
        ]);

        return "Mevcut Fatura Güncellendi, Veri Tabanını Kontrol Ediniz.";
    }


    //* Veri Okuyabilmek İçin
    public function read(){
        $customer_id = 123;

        $customer = Customer::findorFail($customer_id);
        return $customer->order->title;
    }


    //* Siparişi order_id ile Orders Tablosundan Silmek İçin
    public function deleteOrder(){
        $order_id = 5;

        Order::where('id', $order_id)->delete();

        return "Mevcut Sipariş Silindi, Veri Tabanını Kontrol Ediniz.";
    }


    //* Müşteriyi customer_id ile Customers Tablosundan Silmek İçin
    public function deleteCustomer(){
        $customer_id = 345;

        Customer::where('id', $customer_id)->delete();

        return "Mevcut Müşteri Silindi, Veri Tabanını Kontrol Ediniz.";
    }


    //* Faturayı order_id ile Billings Tablosundan Silmek İçin
    public function deleteBill(){
        $order_id = 5;

        Bill::where('id', $order_id)->delete();

        return "Mevcut Fatura Silindi, Veri Tabanını Kontrol Ediniz.";
    }
}